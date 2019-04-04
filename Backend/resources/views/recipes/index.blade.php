@extends('layouts.app')

@section('content')	
	 <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">All
        <small>Recipes</small>
      </h1>

      <!-- Recipe -->
	  @foreach($recipes as $recipe)
      <div class="row mb-5">
        <div class="col-md-7">
          <a href="/recipes/{{$recipe->id}}">
            <img class="img-fluid rounded mb-3 mb-md-0" width="700px" height = "300px" src="/storage/recipes/{{ $recipe->picture }}" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>{{ $recipe->title }}</h3>
          @if($recipe->hasRatings())
			  <p class="card-text">@for($i=0; $i < round($recipe->getRating()); $i++) <span class="fa fa-star checked"></span>@endfor @for($i2 = 0; $i2< 5-round($recipe->getRating()); $i2++) <span class="fa fa-star"></span>@endfor</p>@endif
					<p class="card-text">{{ str_limit($recipe->description, $limit = 150, $end = '...') }}</p>
					<p class="card-text"><small class="text-muted">{{ number_format($recipe->views) }} {{ str_plural('view', number_format($recipe->views)) }} {{ number_format($recipe->replies_count) }} {{ str_plural('comment', number_format($recipe->replies_count)) }}</small></p>
					<p class="card-text"><small class="text-muted">Last updated {{ $recipe->updated_at->diffForHumans() }}</small></p>
          <a class="btn btn-primary" href="/recipes/{{$recipe->id}}">View Recipe</a>
        </div>
      </div>
	  @endforeach
      <!-- /.row -->
      <hr>
	  <div class="row justify-content-center mt-3"> {{ $recipes->links() }} </div> 
@endsection