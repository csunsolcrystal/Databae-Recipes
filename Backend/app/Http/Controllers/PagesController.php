<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
public function home() {
	return view('welcome');
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