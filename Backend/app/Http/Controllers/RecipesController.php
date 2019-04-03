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
        $this->middleware('auth')->except(['index', 'show', 'categories', 'categoryshow']);
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
	   $background = "";
	   
	  
	   // recipes created on or after monday but before the next monday is picked
	   foreach($recipes as $recipe) {
		   if((strtotime($recipe->created_at) >= strtotime("monday this week")) && strtotime($recipe->created_at) <= strtotime("monday next week"))
		$recipeweek[] = $recipe;
      }
	  
	  // if there isnt any, then just grab random one
	if (empty($recipeweek))
	$recipeweek[] = $recipes;
	
	   // Using the new array, sort the rating by descending values by comparing
	usort($recipeweek,function(Recipe $recipe, Recipe $recipe2){
    return $recipe->getRating() < $recipe2->getRating();
	});
	// this could of been done by arrays but got lazy will fix later
	
	   if($category == "breakfast") {
		   $title = "Breakfast and Brunch Recipes";
		   $banner = "/img/beans-bread-breakfast-103124.jpg";
		   $text1 = "Start your day with an easy pancake or omelet breakfast. Or plan a showstopping brunch with quiches, waffles, casseroles, and more!";
		   $text2 = "Follow to get the latest breakfast and brunch recipes, articles and more!";
		   $background = "/img/bread-breakfast-coffee-374052.jpg";
	   }
	
	 if($category == "lunch") {
		   $title = "Lunch";
		   $banner = "/img/burger-chips-dinner-70497.jpg";
		   $text1 = "Start your day with an easy hamburger or delicate sandwiches. Or plan a showstopping lunch with sushi, chicken salad, burritos, and more!";
		   $text2 = "Follow to get the latest lunch recipes, articles and more!";
		   $background = "/img/bread-bun-burger-1639562.jpg";
	   }
	   
	   if($category == "dinner") {
		   $title = "Dinner";
		   $banner = "/img/blur-close-up-cutlery-370984.jpg";
		   $text1 = "Start your evening with an nice steak or delicious spaghetti. Or plan a showstopping dinner with barbecued chicken, homemade pizza, alfredo pasta, and more!";
		   $text2 = "Follow to get the latest dinner recipes, articles and more!";
		   $background = "/img/celebrate-celebration-cheers-1268558.jpg";
	   }
	   if($category == "dessert") {
		   $title = "Dessert";
		   $banner = "/img/cream-glass-strawberries-8382.jpg";
		   $text1 = "Enjoy your day with an nice chocolate cake topped with whipped cream or homemade donuts topped with special toppings. Or plan a showstopping dessert with chocolate cake, homemade brownies, cupcakes, and more!";
		   $text2 = "Follow to get the latest dessert recipes, articles and more!";
		   $background = "/img/bakery-biscuit-cake-40516.jpg";
	   }
	   if($category == "snacks") {
		   $title = "Appetizer/Snacks";
		   $banner = "/img/close-up-delicious-dinner-1108775.jpg";
		   $text1 = "Looking for a quick snack? How about some dishes involving chips with cheese and avocado dip? Or looking for an easy snack to make?";
		   $text2 = "Follow to get the latest snack/appetizer recipes, articles and more!";
		   $background = "/img/appetite-burger-cheeseburger-1484669.jpg";
	   }
	   if($category == "drinks") {
		   $title = "drinks";
		   $banner = "/img/alcohol-beverage-black-background-1028637.jpg";
		   $text1 = "Looking for to make unique alcoholic drinks for the party? Try some of these recipes";
		   $text2 = "Follow to get the latest drinks recipes, articles and more!";
		   $background = "/img/alcohol-bar-beer-1283219.jpg";
	   }
       return view('recipes.categorypage', [
            'recipes' => $recipes,
			'banner' => $banner,
			'text1' => $text1,
			'text2' => $text2,
			'background' => $background,
			'title' => ucfirst($title),
			'category' => ucfirst($category),
			'recipeweek' => $recipeweek[0]
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
	    'picture' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:10000',
		 'gallery.*' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:10000'
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
