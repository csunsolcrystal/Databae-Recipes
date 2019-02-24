<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadRecipes extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'steps', 'imagelocation',
    ];


}
