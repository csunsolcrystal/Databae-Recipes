@extends('layouts.app')

@section('content')	
<div class="container" style="margin-top: 50px">
		<div class="card-group mb-4">
			@foreach($recipes as $recipe)
			<a href="/recipes/{{$recipe->id}}" class="card" style="max-width: 369px;color: inherit; text-decoration: inherit;z-index: 1;">
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
@endsection