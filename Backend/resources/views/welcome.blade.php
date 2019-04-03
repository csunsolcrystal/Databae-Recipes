@extends('layouts.app')

@section('content')
<!-------------------- Image Slideshow -------------------->
<div class="container mt-4">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="img/burg.jpg" alt="First slide">
				<div class="carousel-caption d-none d-md-block">
					<h1>Spicy Bacon Burgers</h1>
					<p>Something with a little heat!</p>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="img/cookies.jpeg" alt="Second slide">
				<div class="carousel-caption d-none d-md-block">
					<h1>10 Holiday Treats</h1>
					<p>Sweeten up the holidays with these holiday treats.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="img/chorizo.jpg" alt="Third slide">
				<div class="carousel-caption d-none d-md-block">
					<h1>Chorizo Pasta</h1>
					<p>This is actual shit tbh. Don't make it.</p>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>
<!-- Bottom Content -->
@endsection

@section('bottomcontent')
<div class="container" style="margin-top: 50px">
<div class="card-group mb-4">
	@foreach($recipes as $recipe)
		<a href="/recipes/{{$recipe->id}}" class="card mr-4" style="max-width: 369px;color: inherit; text-decoration: inherit;z-index: 1;">
			<img class="card-img-top" height="247px" src="/storage/recipes/{{ $recipe->picture }}" alt="{{ $recipe->title }}">
			<div class="card-body">
				<h5 class="card-title">{{ $recipe->title }}</h5>
				@if($recipe->hasRatings())<p class="card-text">@for($i=0; $i < round($recipe->getRating()); $i++) <span class="fa fa-star checked"></span>@endfor @for($i2 = 0; $i2< 5-round($recipe->getRating()); $i2++) <span class="fa fa-star"></span>@endfor</p>
				@else <p class="card-text"><small class="text-muted">It has yet to be rated!</small></p>
				@endif
				<p class="card-text">{{ str_limit($recipe->body, $limit = 150, $end = '...') }}</p>
				<p class="card-text"><small class="text-muted">{{ number_format($recipe->views) }} {{ str_plural('view', number_format($recipe->views)) }} {{ number_format($recipe->replies_count) }} {{ str_plural('comment', number_format($recipe->replies_count)) }}</small></p>
				<p class="card-text"><small class="text-muted">Last updated {{ $recipe->updated_at->diffForHumans() }}</small></p>
			</div>
			</a>
		@if($loop->iteration == 6) @php break; @endphp @endif
		@if($loop->iteration % 3 == 0) </div><div class="card-group"> @endif
		@endforeach
	</div>
</div>
@endsection