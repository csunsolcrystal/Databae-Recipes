<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('Databae', 'Databae') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link rel="stylesheet" href="css/signin.css">

	<!-- Styles -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<!-- Favicon -->
	<link rel="shortcut icon" href="/img/favicon2.ico" />

</head>

<body background="img/foodbg.jpg">
	<div id="app">
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="{{ route('home') }}">DataBae Recipes</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="#">Recipes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">User Recipes</a>
					</li>
				</ul>
				<form class="form-inline ml-auto mr-auto">
					<div class="btn-group">
						<input class="form-control" type="text" placeholder="Search Recipes..." aria-label="Search" style="width: 500px">
						<button class="btn btn-default" type="submit">
							<img src="img/search_icon.png" alt="Smiley face" height="20" width="20">
						</button>
					</div>
				</form>
			</div>
			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ml-auto">
				<!-- Authentication Links -->
				@guest
				<li class="nav-item">
					<a class="btn btn-dark navbar-btn login-btn" href="{{ route('login') }}">{{ __('Login') }}</a>
				</li>
				<li class="nav-item">
					@if (Route::has('register'))
					<a class="btn btn-danger navbar-btn login-btn" href="{{ route('register') }}">{{ __('Register') }}</a>
					@endif
				</li>
				@else
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						{{ Auth::user()->username }} <span class="caret"></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>
				@endguest
			</ul>
		</nav>
		<main class="py-4">
			@yield('content')
		</main>
	</div>
</body>

</html>
