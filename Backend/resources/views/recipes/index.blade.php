@extends('layouts.app')

@section('content')	
<div class="row">
  <div class="col-md-6 col-lg-4">
		<div class="card-group">
			@foreach($recipes as $recipe)
			<a href='/recipes/{{$recipe->id}}'>
			<div class="card" style="width: 18rem;">
				<img src="/storage/recipes/{{ $recipe->picture }}" class="card-img-top" style="object-fit: cover;" alt="{{ $recipe->title }}">
				<div class="card-body">
					<h5 class="card-title"><a href='/recipes/{{$recipe->id}}'>{{ $recipe->title }}</a></h5>
					<p class="card-text">{{ str_limit($recipe->body, $limit = 150, $end = '...') }}</p>
					<p class="card-text"><small class="text-muted">{{ $recipe->replies_count }} {{ str_plural('comment', $recipe->replies_count) }}</small></p>
					<p class="card-text"><small class="text-muted">Last updated {{ $recipe->updated_at->diffForHumans() }}</small></p>
				</div>
			</div>
			@endforeach
		</div></a>
	</div>
</div>
@endsection