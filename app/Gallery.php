<?php

namespace App;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use Cachable;
	
	protected $cacheCooldownSeconds = 120;
}
