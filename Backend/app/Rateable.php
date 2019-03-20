<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
trait Rateable
{
    /**
     * A recipe can be rated.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rated');
    }
    /**
     * Rate the current recipe.
     *
     * @return Model
     */
    public function rate()
    {
        $attributes = ['user_id' => auth()->id(), 'recipe_id' => $this->id];
        if (!$this->ratings()->where($attributes)->exists()) {
            return $this->ratings()->create($attributes);
        }
    }
    /**
     * Determine if the current recipe has been rated by user.
     *
     * @return boolean
     */
    public function isRated()
    {
      return !! $this->ratings->where('user_id', auth()->id())->where('rated_id', $this->id)->where('rated_type', get_class($this))->count();
    }

    /**
     * Determine if recipe has ratings
     *
     * @return boolean
     */
    public function hasRatings()
    {
        return !! $this->ratings->count();
    }

    /**
     * Fetch the rated status as a property.
     *
     * @return bool
     */
    public function getIsRatedAttribute()
    { 
        return $this->isRated();
    }

    /**
     * Get the number of ratings for the recipe.
     *
     * @return integer
     */
    public function getRatingsCountAttribute()
    {
        return $this->ratings->count();
    }

    /**
     * Calculate the average rating of the recipe.
     *
     * @return integer
     */
    public function getRating()
    {
	if($this->hasRatings()) {
        $sumofratings = $this->ratings->where('rated_id', $this->id)->where('rated_type', get_class($this))->sum('rated_amount');
	$totalratings = $this->ratings->where('rated_id', $this->id)->where('rated_type', get_class($this))->count();
	$rating = ($sumofratings * 5) / ($totalratings * 5);
	
	return round($rating, 2);
	}
	return 0;
    }

}