@extends('layouts/app')

@section('content')
        <div class="profile-header-wrapper">
            <div class="container">
                <img class="img-thumbnail img-responsive center-block" width="180" src="/storage/avatars/{{ $user->avatar }}" \>
                <h1>{{ $user->first_name }} {{ $user->last_name }}</h1>
                <h2>{{ $user->username }}</h2>
            </div>
        </div>
    </div>
@endsection
