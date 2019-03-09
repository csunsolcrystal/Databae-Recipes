@extends('layouts.app')

@section('content')
<!-------------------- Image Slideshow -------------------->
<div class="container">
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
<!-- Bottom Content	-->
@endsection;
<div class="card-group">
	@foreach($recipes as $recipe)
	<a href='/recipes/{{$recipe->id}}'>
		<div class="card">
			<img class="card-img-top" width="369px" height="247px" src="/storage/recipes/{{ $recipe->picture }}" alt="{{ $recipe->title }}">
			<div class="card-body">
				<h5 class="card-title"><a href='/recipes/{{$recipe->id}}'>{{ $recipe->title }}</a></h5>
				<p class="card-text">{{ str_limit($recipe->body, $limit = 150, $end = '...') }}</p>
				<p class="card-text"><small class="text-muted">{{ $recipe->replies_count }} {{ str_plural('comment', $recipe->replies_count) }}</small></p>
				<p class="card-text"><small class="text-muted">Last updated {{ $recipe->updated_at->diffForHumans() }}</small></p>
			</div>
		</div>
		@endforeach
</div></a>
