@extends('layouts.app')

@section('content')
<body style="background: url(/img/background-board-chillies-1435895.jpg);margin: 0;background-position: center;background-repeat: no-repeat;background-size: cover;" >
<div class="border rounded-0 bg-light shadow container my-4">
    <div class="py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"> <a href="/home">Home</a> </li>
              <li class="breadcrumb-item active"><a href="/recipes">Recipes</a> </li>
              <li class="breadcrumb-item active">Categories</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4 class="">Category Recipes</h4>
            <p class="">Here you will find recipes based on categories.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h5 class="text-center border rounded-0 border-light shadow-lg">Top Breakfast</h5>
          </div>
          <div class="col-md-4">
            <h4 class="text-center border rounded-0 border-light shadow-lg">Top Lunch</h4>
          </div>
          <div class="col-md-4">
            <h4 class="text-center border rounded-0 border-light shadow-lg">Top Dinner</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="py-3">
      <div class="container">
        <div class="row">
			@forEach($topBreakfasts as $topBreakfast)
          <div class="col-md-4">
            <div class="card"> <img class="card-img-top" src="/storage/recipes/{{ $topBreakfast->picture }}" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">{{ $topBreakfast->title }}</h4>
                <p class="card-text">{{ $topBreakfast->description }}</p> <a href="{{ $topBreakfast->path() }}" class="btn btn-primary">Read recipe</a>
              </div>
            </div>
          </div>
		  @php break; @endphp
			@endforeach
		   @forEach($topLunches as $topLunch)
          <div class="col-md-4">
            <div class="card"> <img class="card-img-top" src="/storage/recipes/{{ $topLunch->picture }}" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">{{ $topLunch->title }}</h4>
                <p class="card-text">{{ $topLunch->description }}</p> <a href="{{ $topLunch->path() }}" class="btn btn-primary">Read recipe</a>
              </div>
            </div>
			</div>
			@php break; @endphp
			@endforeach
			@forEach($topDinners as $topDinner)
          <div class="col-md-4">
            <div class="card"> <img class="card-img-top" src="/storage/recipes/{{ $topDinner->picture }}" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">{{ $topDinner->title }}</h4>
                <p class="card-text">{{ $topDinner->description }}</p> <a href="{{ $topDinner->path() }}" class="btn btn-primary">Read recipe</a>
              </div>
            </div>
          </div>
		  @php break; @endphp
			@endforeach
        </div>
      </div>
    </div>
    <div class="py-5">
      <div class="container">
        <div class="row">
          <a href="/recipes/categories/breakfast" class="col-md-4 col-6 p-3" style="max-width: 369px;color: inherit; text-decoration: inherit;z-index: 1;"> <img class="d-block rounded" height="174px" src="/img/blur-breakfast-close-up-376464.jpg" width="348px">
            <h3 class="my-3"><b>Breakfast</b></h3>
            <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
          </a>
          <a href="/recipes/categories/lunch" class="col-md-4 col-6 p-3" style="max-width: 369px;color: inherit; text-decoration: inherit;z-index: 1;"> <img class="d-block rounded" src="/img/beverages-brunch-cocktail-5317.jpg" width="348px" height="174px">
            <h3 class="my-3"> <b>Lunch</b></h3>
            <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend.</p>
          </a>
          <a href="/recipes/categories/dinner" class="col-md-4 col-6 p-3" style="max-width: 369px;color: inherit; text-decoration: inherit;z-index: 1;"> <img class="d-block rounded" src="/img/asparagus-barbecue-bbq-675951.jpg" width="348px" height="174px">
            <h3 class="my-3"> <b>Dinner</b></h3>
            <p>So absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke.</p>
          </a>
        </div>
      </div>
    </div>
    <div class="py-5">
      <div class="container">
        <div class="row">
          <a href="/recipes/categories/dessert" class="col-md-4 col-6 p-3" style="max-width: 369px;color: inherit; text-decoration: inherit;z-index: 1;"> <img class="d-block rounded" src="/img/berries-blueberries-cake-1126359.jpg" width="348px" height="174px">
            <h3 class="my-3"><b>Dessert</b></h3>
            <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
          </a>
          <a href="/recipes/categories/snacks" class="col-md-4 col-6 p-3" style="max-width: 369px;color: inherit; text-decoration: inherit;z-index: 1;"> <img class="d-block rounded" src="/img/appetizers-biscuits-buffet-37922.jpg" width="348px" height="174px">
            <h3 class="my-3"> <b>Appetizers/Snacks</b></h3>
            <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend.</p>
          </a>
          <a href="/recipes/categories/drinks" class="col-md-4 col-6 p-3" style="max-width: 369px;color: inherit; text-decoration: inherit;z-index: 1;"> <img class="d-block rounded" src="/img/beverages-cold-color-drinks-1643324.jpg" width="348px" height="174px">
            <h3 class="my-3" contenteditable="true"> <b>Drinks</b></h3>
            <p>So absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke.</p>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>
@endsection