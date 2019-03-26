<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Recipe;
use App\FavoriteRecipe;
use App\Reply;
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
     * Store a new favorite reply rating in the database.
     *
     * @param  Reply $reply
     */
    public function storeFavoriteReply(Request $request, Reply $reply)
    {
 

	if($reply->isFavorited()) {
			FavoriteRecipe::where([
			'user_id' => auth()->id(),
			'favorited_id' => $reply-> id,
			'favorited_type' => get_class($reply)
		])->delete();
			return redirect()->back();
		}
		
		FavoriteRecipe::create([
			'user_id' => auth()->id(),
			'favorited_id' => $reply-> id,
			'favorited_type' => get_class($reply)
		]);
		return redirect()->back();

    }
	

	 /**
     * Store a new favorite recipe in the database.
     *
     * @param  FavoriteRecipe $recipe
     */
    public function storeFavoriteRecipe(Request $request, Recipe $recipe) {
		if($recipe->isFavorited()) {
			FavoriteRecipe::where([
			'user_id' => auth()->id(),
			'favorited_id' => $recipe-> id,
			'favorited_type' => get_class($recipe)
		])->delete();
			return redirect()->back();
		}
		
		FavoriteRecipe::create([
			'user_id' => auth()->id(),
			'favorited_id' => $recipe-> id,
			'favorited_type' => get_class($recipe)
		]);
		return redirect()->back();
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
