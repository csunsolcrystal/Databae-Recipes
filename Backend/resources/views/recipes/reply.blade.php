
  <div class="card-fluid mt-3">
    <div class="card-header d-flex justify-content-between">
      <a href="/user/{{ $reply->owner->id }}">{{ '@' }}{{
      $reply->owner->username }}</a><small text="muted">{{
      $reply->updated_at->diffForHumans() }}</small>
    </div>

    <div class="card-body">
      <h4>Reply Title</h4>

      <p class="text-justify">{{ $reply->body }}</p>

      <div class="row">
        <div class="col-md-12">
          <div style="margin-left: 2em" class=
          "social-links col-lg-12 col-md-12 col-6 list-unstyled d-flex mt-5 justify-content-end">
	<form method="POST" action="/replies/{{ $reply->id }}/favorites">
	   {{ csrf_field() }}
	<button type="submit" class="btn btn-danger mx-2">
           <i class="fas fa-heart mx-1"></i>{{ $reply->getFavoritesCountAttribute() }} {{ str_plural('Favorite', $reply->getFavoritesCountAttribute()) }}
	</button>
	</form>
	</div>
        </div>
      </div>
    </div>
  </div>