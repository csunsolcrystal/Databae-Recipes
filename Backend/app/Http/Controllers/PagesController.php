<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Filters\RecipeFilters;

use Illuminate\Http\Request;

class PagesController extends Controller
{
public function home(RecipeFilters $filters) {
	//return view('welcome');
$recipes = $this->getRecipes($filters);
       return view('welcome', compact('welcome'));
		 return view('welcome', compact('welcome'));
	}

public function signup() {
	return view('signup');
	}

public function login() {
	return view('login');
	}
public function uploadrecipes() {
	return view('uploadrecipes');
	}
public function browse() {
	return view('browse');
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

}