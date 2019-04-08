<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\User;
use App\Rating;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function find(Request $request)
    {

    return Recipe::search($request->get('q'))->with('user')->with(['ratings' => function ($query) {
	$query
	->groupBy('ratings.rated_id')
	->selectRaw('sum(ratings.rated_amount) as total_ratings, ratings.rated_id')
	->pluck('total_ratings', 'ratings.rated_id');
	}])->disableCache()->get();

    }


}
