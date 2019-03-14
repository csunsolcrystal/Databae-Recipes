@extends('layouts.app')

@section('content')	
<div class="container" style="margin-top: 50px">
		<div class="card-group">
			@foreach($recipes as $recipe)
			<a href='/recipes/{{$recipe->id}}'>
			<div class="card" style="max-width: 369px;">
				<img class="card-img-top" width="369px" height="247px" src="/storage/recipes/{{ $recipe->picture }}" alt="{{ $recipe->title }}">
				<div class="card-body">
					<h5 class="card-title"><a href='/recipes/{{$recipe->id}}'>{{ $recipe->title }}</a></h5>
					@if($recipe->hasRatings())<p class"card-text">@for($i=0; $i < round($recipe->getRating()); $i++) <span class="fa fa-star checked"></span>@endfor @for($i2 = 0; $i2< 5-round($recipe->getRating()); $i2++) <span class="fa fa-star"></span>@endfor</p>@endif
					<p class="card-text">{{ str_limit($recipe->body, $limit = 150, $end = '...') }}</p>
					<p class="card-text"><small class="text-muted">{{ number_format($recipe->views) }} {{ str_plural('view', number_format($recipe->views)) }} {{ number_format($recipe->replies_count) }} {{ str_plural('comment', number_format($recipe->replies_count)) }}</small></p>
					<p class="card-text"><small class="text-muted">Last updated {{ $recipe->updated_at->diffForHumans() }}</small></p>
				</div>
			</div>
			@if($loop->iteration % 3 == 0) </div><div class="card-group"> @endif
			@endforeach
		</div></a>
	</div>@endsection