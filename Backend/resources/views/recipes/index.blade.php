@extends('layouts.app')

@section('bottomcontent')

@php
$numofCols = 4;
$rowCount = 0;
@endphp

<div class="row">
<!--	<div class="card-group">-->
		@foreach($recipes as $recipe)
		<div class="card">
		<a href='/recipes/{{$recipe->id}}'>
				<img class="card-img-top" width="369px" height="247px" src="/storage/recipes/{{ $recipe->picture }}" alt="{{ $recipe->title }}">
				<div class="card-body">
					<h5 class="card-title"><a href='/recipes/{{$recipe->id}}'>{{ $recipe->title }}</a></h5>
					<p class="card-text">{{ str_limit($recipe->body, $limit = 150, $end = '...') }}</p>
					<p class="card-text"><small class="text-muted">{{ $recipe->replies_count }} {{ str_plural('comment', $recipe->replies_count) }}</small></p>
					<p class="card-text"><small class="text-muted">Last updated {{ $recipe->updated_at->diffForHumans() }}</small></p>
				</div>
			</div>
		</a>
<!--	</div>-->
@php 
$rowCount++;
@endphp
@if($rowCount % $numofCols == 0) 
@php 
 echo 'div class="row">'
@endphp
</div>
@endif
@endforeach
@endsection
=======
</div>
@endsection;
>>>>>>> bc489a9ca2c2f5a7f8228f0d5fd84c2b6db04d88
