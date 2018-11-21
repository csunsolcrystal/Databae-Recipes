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

<body background="img/foodbg.jpg">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">DataBae Recipes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Recipes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">User Recipes</a>
                </li>
            </ul>
            <form class="form-inline">
                <input class="form-control" type="text" placeholder="Search Recipes..." aria-label="Search">
                <button class="btn btn-default" type="submit">
					<img src="img/search_icon.png" alt="Smiley face" height="20" width="20">
				</button>
            </form>
        </div>
        <div>
            <a href="#" target="_blank" class="fab fa-facebook"></a>
        </div>
        <!-- Sign in Button -->
        <a href="/login" class="btn btn-dark navbar-btn login-btn">Sign In</a>
        <a href="/signup" class="btn btn-danger navbar-btn login-btn">Register</a>
    </nav>
    <!-- Registration and Sign In -->
    <div class="container" style="max-width: 300px">
        <form class="form-signin">
            <img class="mb-4" src="./Signin Template for Bootstrap_files/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Log In</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
            <a href="/signup">Not a member? Create an Account</a>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Footer -->
    <footer style="text-align: center">
        <p>Copyright &#169 2018 by DataBae Solutions, LLC</p>
    </footer>
</body>

</html>
