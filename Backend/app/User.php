<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = ['username', 'first_name', 'last_name'];

    /**
     * Get the route key name for Laravel.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }
    /**
     * Fetch all recipes that were created by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recipes()
    {
        return $this->hasMany(Recipe::class)->paginate(15);
    }
   /**
     * Get the total amount of ratings for each recipe that were created by the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function totalRatings()
    {
	 // get all my recipes made
          $recipes = $this->hasMany(Recipe::class)->get();
	  $count = 0;
	  forEach($recipes as $recipe) {
	      $count += $recipe->ratings->where('rated_id', $recipe->id)->count();
	  }
	return $count;
    }

    /**
     * Get the average of ratings for each recipe that were created by the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function totalAverageRatings()
    {
	 // get all my recipes made
          $recipes = $this->hasMany(Recipe::class)->get();

	//if our recipes are completely empty return empty recipes, otherwise, continue
	if($recipes->isEmpty())
	  return 0;

	  $count = 0;
	  $totalRatings = 1;
	  forEach($recipes as $recipe) {
		if($recipe->hasRatings()) {
	      $count += $recipe->getRating();
		$totalRatings += 1;
	     }
	  }
	
	return round($count/$totalRatings, 2);
    }

     /**
     * Get the top three highest rated recipes that were created by the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getTopRatings()
    {
	/// get all my recipes made
          $recipes = $this->hasMany(Recipe::class)->get();

//if our recipes are completely empty return empty recipes, otherwise, continue
	if($recipes->isEmpty())
	  return $recipes;

	foreach($recipes as $recipe) {
	$newrecipes[] = $recipe;
      }

      // Using the new array, sort the rating by descending values by comparing
usort($newrecipes,function(Recipe $recipe, Recipe $recipe2){
	if($recipe->hasRatings() && $recipe2->hasRatings())
    return $recipe->getRating() < $recipe2->getRating();
});
       //repopulate the $recipes variable with the sorted rating recipes as priority
      $recipes = $newrecipes;
	return $recipes;	
    }


}
