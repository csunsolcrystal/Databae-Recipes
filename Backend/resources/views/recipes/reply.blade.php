<div class="card">
            <div class="card-header d-flex justify-content-between" ><a href="/user/{{ $reply->owner->id }}">{{ '@' }}{{ $reply->owner->username }}</a><small text="muted">{{ $reply->created_at->diffForHumans() }}</small></div>
            <div class="card-body">
              <h4>Reply Title</h4>
              <p class="text-justify">{{ $reply->body }}</p>
              <div class="row">
                <div class="col-md-12">
                  <ul class="social-links col-lg-12 col-md-12 col-6 list-unstyled d-flex mt-5 justify-content-end"><a class="btn btn-secondary mx-2" href="#"><i class="fas fa-heart mx-1"></i>1 Favorites</a><a class="btn btn-secondary" href="#"><i class="fas fa-heart mx-1"></i>2 Favorites</a></ul>
                </div>
              </div>
            </div>
          </div>