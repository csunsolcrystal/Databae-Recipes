<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Rating;

use Illuminate\Http\Request;

class PagesController extends Controller
{
public function home() {
// Collect all the recipes ordered by views then sort them into an 'array'
$recipes = Recipe::oldest()->orderBy('views', 'desc')->get();
	foreach($recipes as $recipe) {
	$newrecipes[] = $recipe;
      }
      // Using the new array, sort the rating by descending values by comparing
usort($newrecipes,function(Recipe $recipe, Recipe $recipe2){
	if($recipe->hasRatings() && $recipe2->hasRatings())
    return $recipe->getRating() < $recipe2->getRating();
});
       //repopulate the $recipes variable with the sorted rating recipes as priority
      $recipes = $newrecipes;
return view('welcome', compact('recipes'));
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
public function user(){
	return view('user');
	}
}
