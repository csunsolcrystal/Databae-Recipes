<?php

namespace App;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
	use Cachable;
    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

   /**
     * Fetch the model that was rated.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function rated()
    {
        return $this->morphTo();
    }
}
