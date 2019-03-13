@extends('layouts.app')

@section('content')
    <div class="py-5">
    <div class="container">
	<div class="card-body">
	<div class="row">
					@if (session('error'))
					<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">&#215</button>
						{{ session('error') }}
					</div>
					@endif

@if (count($errors) > 0)
						<div class="alert alert-danger">

							<button type="button" class="close" data-dismiss="alert">&#215</button>

							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
					</div>
				</div>

      <div class="row">
        <div class="col-md-6 pb-4"><img class="card-img-top" src="/storage/recipes/{{ $recipe->picture }}" alt="Card image cap">
          <div class="card">
            <div class="card-header">Introduction</div>
            <div class="card-body">
              <h4>Description</h4>
              <p>{{ $recipe->body }}</p>
            </div>
          </div>
        </div>
        <div class="" style="">
          <div class="col-md-12">
            <h2 class="pb-2" contenteditable="false">{{ $recipe->title }}&nbsp;<small class="text-muted"><br>Recipe by <a href="#">{{ $recipe->creator->username }}</a></small></h2>
            <div class="embed-responsive embed-responsive-16by9">
              <iframe src="https://www.youtube.com/embed/ctvlUvN6wSE?controls=0" allowfullscreen="" class="embed-responsive-item"></iframe>
            </div>
		<form class="rating" name="rating" method="POST" id="product1">
		{{ csrf_field() }}
  <button type="submit" class="star" data-star="1">
			&#9733;
			<span class="screen-reader">1 Star</span>
	</button>
  
  <button type="submit" class="star" data-star="2">
			&#9733;
			<span class="screen-reader">2 Stars</span>
	</button>
  
  <button type="submit" class="star" data-star="3">
			&#9733;
			<span class="screen-reader">3 Stars</span>
	</button>
  
  <button type="submit" class="star" data-star="4">
			&#9733;
			<span class="screen-reader">4 Stars</span>		       
	</button>
  
  <button type="submit" class="star" data-star="5">
			&#9733;
			<span class="screen-reader">5 Stars</span>
	</button>
<input type="hidden" name="ratedAmount" id="ratedAmount">
</form>
<script src="/js/rating.js"></script>
@if($recipe->hasRatings())
<span class="a-icon-alt">{{ $recipe->getRating() }} stars out of 5 stars</span>
@else
<span class="a-icon-alt">It has yet to be rated!</span>
@endif
<p>{{ number_format($recipe->views) }} {{ str_plural('view', number_format($recipe->views)) }}</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">Recipe Instructions</div>
            <div class="card-body">
              <h4>Recipe Steps</h4>
              <p>{{ $recipe->recipe_steps }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="pb-2">Comments</h3>
          <div class="card">
	 @foreach ($replies as $reply)
	 @include ('recipes.reply')
            <div class="card-body">
		{{ $replies->links() }}
            </div>
	@endforeach
           </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
	 @if (auth()->check())
	<div>
       </div>
	    <form method="POST" action="{{ $recipe->path() . '/replies' }}">
		 {{ csrf_field() }}

          <div class="form-group"><textarea name="body" id="body" class="form-control mt-2" placeholder="Have something to say?" rows="5"></textarea><button type="submit" class="btn btn-default pt-2">Post</button></form>
	 @else
                    <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in this
                        discussion.</p>
                @endif
	</div>
        </div>
      </div>
    </div>
  </div>
@endsection