<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Filters\RecipeFilters;
use Validator;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    /**
     * RecipesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RecipeFilters $filters)
    {
       $recipes = $this->getRecipes($filters);
       return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uploadrecipes', compact('uploadrecipes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {	
	$this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
	    'recipe_steps' => 'required',
	    'picture' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

	 // Handle File Upload
        if($request->hasFile('picture')) {
            // Get filename with extension            
	 $filenameWithExt = $request->file('picture')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
           // Get just ext
            $extension = $request->file('picture')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
          // Upload Image
            $path = $request->file('picture')->    storeAs('recipes', $fileNameToStore);
        } else {
            $fileNameToStore = 'default.jpg';
        }
	  
       $recipe = Recipe::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'body'  => request('body'),
	    'recipe_steps' => request('recipe_steps'),
	    'picture' => $fileNameToStore
        ]);

        return redirect($recipe->path());    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
	// increase view count
	$recipe->increment('views');

         return view('recipes.show', [
            'recipe' => $recipe,
            'replies' => $recipe->replies()->paginate(20)
        ]);
    }

   /**
     * Fetch all relevant recipes.
     *
     * @param RecipeFilters $filters
     * @return mixed
     */
    protected function getRecipes(RecipeFilters $filters)
    {
        $recipes = Recipe::latest()->filter($filters);
          return $recipes->get();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
