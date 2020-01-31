<?php
namespace App\Http\Controllers;
use App\Recipe;
class RepliesController extends Controller
{
    /**
     * Create a new RepliesController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Persist a new reply.
     * 
     * @param  Recipe $recipe
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Recipe $recipe)
    {
	$this->validate(request(), ['body' => 'required']);

        $recipe->addReply([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);
       // Make the updated_at column update the timestamps when there is a new reply
	$recipe->touch();
        return back();
    }
}