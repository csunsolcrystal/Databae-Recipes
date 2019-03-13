<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Recipe;
use App\Rating;

class RatingController extends Controller
{
   /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a new rating in the database.
     *
     * @param  Recipe $recipe
     */
    public function store(Request $request, Recipe $recipe)
    {
	$this->validate($request, [
            'ratedAmount' => 'required|numeric|min:1|max:5'
        ]);
	
	if($recipe->isRated()) {
	   return redirect()->back()->with("error","You have already rated this recipe!");
	}
	    Rating::create([
            'user_id' => auth()->id(),
            'rated_amount' => request('ratedAmount'),
            'rated_id'  => $recipe->id,
	    'rated_type' => get_class($recipe)
         ]);

        return redirect($recipe->path());
        //return $recipe->rating();
    }
}
