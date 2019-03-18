@extends('layouts.app')

@section('content')
       <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="px-lg-5 d-flex flex-column justify-content-center col-lg-6">
          <h1>{{ $user->username }}</h1>
          <p class="mb-3 lead">{{ $user->first_name }} {{ $user->last_name }}<br><br>Total amount of rating recipes:<b> {{ $user->totalRatings() }} </b><br><br>Average Ratings:<b> {{ $user->totalAverageRatings() }} out of 5 stars </b></p>
        </div>
        <div class="col-lg-6"> <img class="img-fluid d-block" width="50%" height="75%" src="/storage/avatars/{{ $user->avatar }}"><a class="btn btn-secondary mt-3" href="#">Message</a> 
	</div>
      </div>
    </div>
  </div>
<div class="py-5 border-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">Top recipes</h1>
        </div>
      </div>
      <div class="row">
	@foreach($user->getTopRatings() as $recipe)
	<div class="col-md-4 col-6 p-3">
        <a href="/recipes/{{$recipe->id}}" class="card" style="max-width: 369px;color: inherit; text-decoration: inherit;z-index: 1;">
			<img class="card-img-top" width="369px" height="247px" src="/storage/recipes/{{ $recipe->picture }}" alt="{{ $recipe->title }}">
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
			</div>
		@if($loop->iteration == 3) @php break; @endphp @endif
		@endforeach
  </div>
</div>
@endsection

@section('bottomcontent')
  <div class="py-3 border-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1>All Recipes</h1>
        </div>
      </div>
      <div class="row justify-content-center">
	@foreach($user->recipes() as $recipe)
	<div class="col-md-4 col-6 p-3">
        <a href="/recipes/{{$recipe->id}}" class="card" style="max-width: 330px;color: inherit; text-decoration: inherit;z-index: 1;">
			<img class="card-img-top" width="369px" height="247px" src="/storage/recipes/{{ $recipe->picture }}" alt="{{ $recipe->title }}">
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
			</div>
		@if($loop->iteration % 3 == 0) </div><div class="row"> @endif
		@endforeach
       </div>
	<div class="row justify-content-center mt-3"> {{ $user->recipes()->links() }} </div>
    </div>
  </div>
@endsection
