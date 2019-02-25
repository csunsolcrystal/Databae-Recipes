<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Other CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link rel="stylesheet" href="css/signin.css">

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon2.ico" />

	<title>Databae</title>
</head>

<body>
<!-- Navbar -->
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
						{{ Auth::user()->username }} <span class="caret"></span>
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

    <div class="container">
        <div class="row">
            @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">&#120</button>

                    <strong>{{ $message }}</strong>

                </div>

            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row justify-content-center">

            <div class="profile-header-container">
                <div class="profile-header-img">
                    <img class="rounded-circle" width="auto" height="150px" src="/storage/avatars/{{ $user->avatar }}" />
                    <!-- badge -->
                    <div class="rank-label-container">
                        <span class="label label-default rank-label">{{$user->username}}</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="row justify-content-center">
            <form action="/profile" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>	
</body>
</html>