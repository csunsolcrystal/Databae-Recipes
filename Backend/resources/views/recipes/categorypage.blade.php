@extends('layouts.app')

@section('content')
<body class="" style="background: url(/img/background-board-chillies-1435895.jpg);margin: 0;background-position: center;background-repeat: no-repeat;background-size: cover;" >
<div class="border rounded-0 bg-light shadow container my-4">
    <div class="py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"> <a href="/">Home</a> </li>
              <li class="breadcrumb-item"> <a href="/recipes/">Recipes</a> </li>
              <li class="breadcrumb-item"> <a href="/recipes/categories/">Categories</a> </li>
              <li class="breadcrumb-item active">{{ $category }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="py-2">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="hub-header" style="	background-image: url({{ $banner }});	margin: 0;	background-position: center;	background-repeat: no-repeat;	background-size: cover;">     
              <div class="title-section editorial">
                <h1 class="text-light" style="	text-shadow: 0px 0px 8px black;">
                  <span class="title-section__text title">{{ $title }}</span>
                </h1>
                <span class="title-section__text subtitle text-white" style="	text-shadow: 0px 0px 8px black;"><i>{{ $text1 }}</i></span>
                <div class="title-section__follow ng-scope" data-ng-controller="ar_controllers_hub_stream" data-ng-init="init('bk', 78, 'Breakfast')">
                  <span class="hub-follow-blurb text-white" style="	text-shadow: 0px 0px 8px black;"><i>{{ $text2 }}</i></span>
                  <a class="hub-follow" ng-class="{'highlighted': isFollowing}" ng-click="followStream()">
                    <span class="svg-icon--recipe-navbar--heart_off svg-icon--recipe-navbar--heart_off-dims"></span>
                    <span class="svg-icon--recipe-navbar--heart_on svg-icon--recipe-navbar--heart_on-dims"></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="py-2">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center border rounded shadow" style="">Recipe of the Week</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="py-1 border-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-lg-3 order-2 order-md-1 col-md-4"> <img class="d-block img-fluid" src="https://static.pingendo.com/img-placeholder-3.svg"> </div>
              <div class="flex-column justify-content-center offset-lg-1 align-items-start order-1 order-md-2 col-md-8 d-flex p-3">
                <h3>Recipe Title</h3>
                <p class="mb-3">I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary.</p> <a class="btn btn-primary" href="#">Read Recipe</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Content -->
    <div class="container">
      <!-- Page Heading -->
      <h1 class="my-4">{{ $category }} <small>All Recipes</small>
      </h1>
      <div class="row">
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project One</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Two</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Three</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Four</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Five</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Six</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <!-- Pagination -->
    </div>
  </div>
  </body>
@endsection