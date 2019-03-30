<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Gallery;
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
        $this->middleware('auth')->except(['index', 'show', 'categories']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RecipeFilters $filters)
    {
       $recipes = $this->getRecipes($filters);
	   $recipes = Recipe::paginate(15);
       return view('recipes.index', compact('recipes'));
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryshow($category)
    {
	   $recipes = Recipe::where('category', $category)->paginate(6);
	   $banner ="";
	   $text1 = "";
	   $text2= "";
	   $title = "";
	   if($category == "breakfast") {
		   $title = "Breakfast and Brunch Recipes";
		   $banner = "/img/beans-bread-breakfast-103124.jpg";
		   $text1 = "Start your day with an easy pancake or omelet breakfast. Or plan a showstopping brunch with quiches, waffles, casseroles, and more!";
		   $text2 = "Follow to get the latest breakfast and brunch recipes, articles and more!";
	   }
	
       return view('recipes.categorypage', [
            'recipes' => $recipes,
			'banner' => $banner,
			'text1' => $text1,
			'text2' => $text2,
			'title' => ucfirst($title),
			'category' => ucfirst($category)
        ]);
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
     * Categories
     *
     * @return \Illuminate\Http\Response
     */

    public function categories()
    {
        return view('recipes.categories', compact('recipes'));
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
			'category' => 'required',
            'recipeDescription' => 'required',
			'ingredients' => 'required',
			'cookTime' => 'required|max:255',
			'prepTime' => 'required|max:255',
	    'recipe_steps' => 'required',
	    'picture' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
		 'gallery.*' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
	$steps = $request->recipe_steps;
	$steps = preg_replace("/(\r?\n){2,}/", "\n", $steps);
	
	$ingredients = $request->ingredients;
	$ingredients = preg_replace("/(\r?\n){2,}/", "\n", $ingredients);

	 // Handle Cover File Upload
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
			'category' => request('category'),
            'description' => request('recipeDescription'),
			'ingredients' => $ingredients,
			'tags' => request('tag'),
			'footnotes' => request('footnotes'),
			'cookTime' => request('cookTime'),
			'prepTime' => request('prepTime'),
	    'recipe_steps' => $steps,
	    'picture' => $fileNameToStore
        ]);
		
		// Handle Gallery File Uploads
		if($request->hasfile('gallery')) {
			foreach($request->file('gallery') as $image) {
				$form= new Gallery();
				$name=time().'.'.$image->getClientOriginalName();
				$image->move(public_path().'/storage/gallery/'.$recipe->id.'/', $name);
				$data = $name;
				$form->recipe_id = $recipe->id;
				$form->filename=$data;
				$form->save();
			}

		}
		
        return redirect($recipe->path());    
    }
	
	/**
	*
	*
	* Categories
	*
       public function categories() {
	return view('recipes.categories');
	}
    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe, Gallery $gallery)
    {
	// increase view count but also prevent timestamps from being changed
	$recipe->timestamps = false;
	$recipe->increment('views');
	$gallery = Gallery::where('recipe_id', $recipe->id)->get();
         return view('recipes.show', [
            'recipe' => $recipe,
            'replies' => $recipe->replies()->paginate(20),
			'galleries' => $gallery
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
