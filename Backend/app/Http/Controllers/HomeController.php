<?php

namespace App\Http\Controllers;

use App\Recipe;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
	// Page results
	public function getSearch(Request $request)
    {
    	if($request->has('q')){
    		$recipes = Recipe::search($request->disableCache()->get('q'))->disableCache()->get();	
    	}else{
    		$recipes = Recipe::paginate(15)->disableCache()->get();
    	}


    	return view('recipes.index', compact('recipes'));
    }
}