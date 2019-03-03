<div class="container-fluid">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="/">DataBae Recipes</a>
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
		<!-- Sign in Button -->
		<ul class="navbar-nav ml-auto">
			<!-- Authentication Links -->
			@guest
			<div class="btn-group">
				<a class="btn btn-dark navbar-btn login-btn" href="{{ route('login') }}">{{ __('Login') }}</a>
				@if (Route::has('register'))
				<a class="btn btn-danger navbar-btn login-btn" href="{{ route('register') }}">{{ __('Register') }}</a>
				@endif
			</div>
			@else
			<a href="/uploadrecipes" class="btn btn-secondary navbar-btn login-btn" style="margin-right: 50px">Upload a Recipe</a>
			<li class="nav-item dropdown">
				<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
					<img class="rounded-circle" width="30px" height="30px" src="/storage/avatars/{{ Auth::user()->avatar }}" /> {{ Auth::user()->username }} <span class="caret"></span>
				</a>

				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="/profile">
						Profile
					</a>

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
</div>
