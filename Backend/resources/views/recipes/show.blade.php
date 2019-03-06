@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#">{{ $recipe->creator->username }}</a> posted:
                        {{ $recipe->title }}
                    </div>

                    <div class="panel-body">
                        {{ $recipe->body }}
                    </div>
                </div>

                @foreach ($replies as $reply)
                    @include ('recipes.reply')
                @endforeach

                {{ $replies->links() }}

                @if (auth()->check())
                    <form method="POST" action="{{ $recipe->path() . '/replies' }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control" placeholder="Have something to say?"
                                      rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-default">Post</button>
                    </form>
                @else
                    <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in this
                        discussion.</p>
                @endif
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>
                            This recipe was published {{ $recipe->created_at->diffForHumans() }} by
                            <a href="#">{{ $recipe->creator->username }}</a>, and currently
                            has {{ $recipe->replies_count }} {{ str_plural('comment', $recipe->replies_count) }}.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection