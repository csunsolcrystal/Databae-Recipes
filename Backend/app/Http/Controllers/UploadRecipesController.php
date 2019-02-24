<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;


class UploadRecipesController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | UploadRecipes Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the uploading of new recipes by users
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

     public function uploadrecipes() {
	return view('uploadrecipes');
     }

    /**
     * Where to redirect users after uploading.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming upload recipe request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'steps' => ['required', 'string', 'max:255'],
	    'imagelocation' => '',
        ]);
    }

    /**
     * Create a new user recipe after a valid-check of the user-input data.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return UploadRecipe::create([
            'username' => Auth::User()->username;
            'title' => $data['title'],
	    'description' => $data['description'],
	    'steps' => $data['steps'],
            'imagelocation' => $data['imagelocation'],
        ]);
    }
}
