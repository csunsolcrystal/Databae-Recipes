<?php

namespace App\Http\Controllers;

use App\Recipe;

use Illuminate\Http\Request;

class PagesController extends Controller
{
public function home(Recipe $recipes) {

   $recipes = $recipes->orderBy('views', 'desc')->get();
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
}