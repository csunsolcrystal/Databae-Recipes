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
    		$recipes = Recipe::search($request->get('q'))->disableCache()->paginate(15);	
    	}else{
    		$recipes = Recipe::disableCache()->paginate(15);
    	}


    	return view('recipes.index', compact('recipes'));
    }
}