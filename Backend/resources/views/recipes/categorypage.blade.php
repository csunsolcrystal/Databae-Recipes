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
    <div class="container" style="margin-top: 50px">
		<div class="card-group mb-4">
			@foreach($recipes as $recipe)
			<a href="/recipes/{{$recipe->id}}" class="card mr-4" style="max-width: 369px;color: inherit; text-decoration: inherit;z-index: 1;">
				<img class="card-img-top" width="369px" height="247px" src="/storage/recipes/{{ $recipe->picture }}" alt="{{ $recipe->title }}">
				<div class="card-body">
					<h5 class="card-title">{{ $recipe->title }}</h5>
					@if($recipe->hasRatings())<p class="card-text">@for($i=0; $i < round($recipe->getRating()); $i++) <span class="fa fa-star checked"></span>@endfor @for($i2 = 0; $i2< 5-round($recipe->getRating()); $i2++) <span class="fa fa-star"></span>@endfor</p>@endif
					<p class="card-text">{{ str_limit($recipe->body, $limit = 150, $end = '...') }}</p>
					<p class="card-text"><small class="text-muted">{{ number_format($recipe->views) }} {{ str_plural('view', number_format($recipe->views)) }} {{ number_format($recipe->replies_count) }} {{ str_plural('comment', number_format($recipe->replies_count)) }}</small></p>
					<p class="card-text"><small class="text-muted">Last updated {{ $recipe->updated_at->diffForHumans() }}</small></p>
				</div>
			</a>
			@if($loop->iteration % 3 == 0) </div><div class="card-group mb-4"> @endif
			@endforeach
		</div></a>
	</div>
  </body>
@endsection