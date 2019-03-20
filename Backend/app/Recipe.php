<?php
namespace App;
use App\Filters\RecipeFilters;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

use Nicolaslopezj\Searchable\SearchableTrait;

class Recipe extends Model
{
	use Rateable, SearchableTrait;

     protected $searchable = [
        'columns' => [
            'recipes.title' => 10,
	    'users.username'=> 5,
	    'recipes.body' => 3,
        ],
        'joins' => [
            'users' => ['recipes.user_id', 'users.id'],
	    'ratings' => ['recipes.id', 'ratings.rated_id'],
        ],
	'groupBy' => 'recipes.id'
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }

	
    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];
    
    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('replyCount', function ($builder) {
            $builder->withCount('replies');
        });
   }
   
   /**
     * Get a string path for the recipe.
     *
     * @return string
     */
    public function path()
    {
        return '/recipes/' . $this->id;
    }
    /**
     * A recipe may have many replies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * A recipe belongs to a creator.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Add a reply to the recipe.
     *
     * @param $reply
     */
    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }

   /**
     * Apply all relevant recipe filters.
     *
     * @param  Builder       $query
     * @param  RecipeFilters $filters
     * @return Builder
     */
    public function scopeFilter($query, RecipeFilters $filters)
    {
        return $filters->apply($query);
    }

}