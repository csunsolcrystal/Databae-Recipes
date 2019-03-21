@extends('layouts.app')

@section('content')
    <div class="py-1">
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
       <div class="py-5" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="carousel slide" data-ride="carousel" id="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active"> <img class="d-block img-fluid w-100 mx-auto" width="750px" src="/storage/recipes/{{ $recipe->picture }}" height="340px" style="">
                <div class="carousel-caption">
                  <h5 class="m-0">{{ $recipe->title }}</h5>
                  <p>Picture #1</p>
                </div>
              </div>
              <div class="carousel-item"> <img class="d-block img-fluid w-100" src="/storage/recipes/{{ $recipe->picture }}">
                <div class="carousel-caption">
                  <h5 class="m-0">{{ $recipe->title }}</h5>
                  <p>Picture #2</p>
                </div>
              </div>
              <div class="carousel-item"> <img class="d-block img-fluid w-100" src="/storage/recipes/{{ $recipe->picture }}">
                <div class="carousel-caption">
                  <h5 class="m-0">{{ $recipe->title }}</h5>
                  <p>Picture #3</p>
                </div>
              </div>
            </div> <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carousel" role="button" data-slide="next"> <span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span> </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12"><img class="img-fluid d-block rounded-circle mx-auto" src="/storage/avatars/{{ $recipe->creator->avatar }}" width="120px" height="120px">
          <h3 class="text-center pt-5"><i class="fa fa-user fa-fw lead"></i>{{ $recipe->creator->first_name }} {{ $recipe->creator->last_name }}</h3>
          <h6 class="text-center text-secondary" style=""><a href="/user/{{ $recipe->creator->id }}">{{'@'}}{{ $recipe->creator->username }}</a></h6>
          <center></center>
          <ul class="social-links col-lg-12 col-md-12 col-6 list-unstyled d-flex justify-content-center">
            <li><a href="#"><i class="fab fa-facebook lead px-2"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter lead px-2"></i></a></li>
            <li><a href="#"><i class="fab fa-github lead px-2"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram lead px-2"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h2 class="text-center mb-4"><i class="fas fa-utensils"></i>&nbsp;Ingredients</h2>
          <ul class="">
            <li><i>Garlic</i></li>
          </ul>
        </div>
        <div class="col-md-6">
          <h1 class="text-center text-body mb-3" style="">{{ $recipe->title }}</h1>
          <div class="row d-flex justify-content-center">
            <div class="col-md-12 mb-4">
              <h6 class="text-center mb-3">
	      @if($recipe->isRated)
	      @if($recipe->hasRatings())@for($i=0; $i < round($recipe->getRating()); $i++) <span class="fa fa-star checked"></span>@endfor @for($i2 = 0; $i2< 5-round($recipe->getRating()); $i2++) <span class="fa fa-star"></span>@endfor @endif Overall Rating: {{ $recipe->getRating() }}</h6>
              @else	      
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
	  <h6 class="text-center mb-3">Overall rating: It has no ratings yet!</h6>
	     @endif
	      <h6 class="text-center mb-3"><i class="fas fa-clock mx-1"></i>Cooking time: 45 minutes | Prep time: 15 minutes</h6>
              <h6 class="text-center"><i class="fa fa-user fa-fw"></i>Total views: {{ $recipe->views }} | <i class="fas fa-comments mx-1"></i>Total Comments: {{$recipe->replies->count() }}</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
	     <h4 class="">Description</h4>
              <p class="text-justify">{!! nl2br(e($recipe->body)) !!}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2 class=""><i class="fas fa-book"></i>&nbsp;Directions</h2>
           @foreach(preg_split("/((\r?\n)|(\r\n?))/", $recipe->recipe_steps) as $step)
		<h5>Step {{ $loop->iteration }}:</h5>
              <p style="margin-bottom: 50px">{{ $step }}</p>
	 @endforeach
        </div>
        <div class="col-md-6">
          <h4 class="">Footnotes</h4>
          <p class="mt-4">{!! nl2br(e("Lorem ipsum dolor sit amet, ius erroribus incorrupte at, at nam etiam summo nostrum, sit ut sanctus convenire. Pro ad nullam intellegam. Ei sea vivendum petentium, eam eu primis deleniti. Suas modus dictas ut vim. His doming nonumes id. Mea ad exerci praesent repudiare.

Dicit aperiam habemus sea et, audiam laboramus argumentum has te, cu pri everti persecuti. No iuvaret suavitate nam. No vis molestie phaedrum accusamus, no vidisse noluisse scribentur vim, probatus pericula in ius. Eos posse luptatum mandamus eu, cu zril luptatum vivendum eos. Usu eligendi referrentur id, sit fugit facer an.")) !!}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="pb-2">Comments</h3>
	<div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="text-center" ><i class="fas fa-heart mx-1"></i>Best Comment</h5>
                </div>
              </div>
              <div class="card">
                <div class="card-header d-flex justify-content-between"><a href="#">@username</a><small text="muted">3 days ago</small></div>
                <div class="card-body">
                  <h4>Amazing! Would make again!</h4>
                  <p class="text-justify">This food was amazing!</p>
                  <div class="row">
                    <div class="col-md-12 mt-5">
                      <ul class="social-links col-lg-12 col-md-12 col-6 list-unstyled d-flex justify-content-end"><a class="btn btn-secondary mx-2" href="#"><i class="fas fa-heart mx-1"></i>3 Favorites</a><a class="btn btn-secondary" href="#"><i class="fas fa-hands-helping mx-1"></i>1 Helpful</a></ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="text-center"><i class="fas fa-hands-helping mx-1">Highest Rated Comment</i></h5>
                </div>
              </div>
              <div class="card">
                <div class="card-header d-flex justify-content-between"><a href="#">@username</a><small text="muted">3 days ago</small></div>
                <div class="card-body">
                  <h4>This requires some decent skills</h4>
                  <p class="text-justify">Creative skills required</p>
                  <div class="row">
                    <div class="col-md-12 mt-5">
                      <ul class="social-links col-lg-12 col-md-12 col-6 list-unstyled d-flex justify-content-end"><a class="btn btn-secondary mx-2" href="#"><i class="fas fa-heart mx-1"></i>3 Favorites</a><a class="btn btn-secondary" href="#"><i class="fas fa-hands-helping mx-1"></i>10 Helpful</a></ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card" style="margin-top: 50px">
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

          <div class="form-group mt-5"><textarea name="body" id="body" class="form-control mt-2" placeholder="Have something to say?" rows="5"></textarea><button type="submit" class="btn btn-default pt-2">Post</button></form>
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