@extends('layouts.app')

@section('content')
<!-- Forms -->
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Profile Picture</div>

				<div class="card-body">
					<div class="row">
						@if ($message = Session::get('success'))

						<div class="alert alert-success alert-block">

							<button type="button" class="close" data-dismiss="alert">&#215</button>

							<strong>{{ $message }}</strong>

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
					<div class="row justify-content-center">

						<div class="profile-header-container">
							<div class="profile-header-img">
								<img class="rounded-circle" width="auto" height="150px" src="/storage/avatars/{{ $user->avatar }}" />
								<!-- badge -->
								<div class="rank-label-container">
								</div>
							</div>
						</div>

					</div>
					<div class="row justify-content-center">
						<form action="/profile" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
								<small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
							</div>
							<center><button type="submit" name="form1" class="btn btn-primary">Submit</button></center>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Change password</div>

				<div class="card-body">
					@if (session('errorpassword'))
					<div class="alert alert-danger">
						{{ session('errorpassword') }}
					</div>
					@endif
					@if (session('successpassword'))
					<div class="alert alert-success">
						{{ session('successpassword') }}
					</div>
					@endif
					<form class="form-horizontal" method="POST" href="{{ route('profile') }}">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
							<label for="new-password" class="col-md-4 control-label">Current Password</label>

							<div class="col-md-6">
								<input id="current-password" type="password" class="form-control" name="current-password" required>

								@if ($errors->has('current-password'))
								<span class="help-block">
									<strong>{{ $errors->first('current-password') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
							<label for="new-password" class="col-md-4 control-label">New Password</label>

							<div class="col-md-6">
								<input id="new-password" type="password" class="form-control" name="new-password" required>

								@if ($errors->has('new-password'))
								<span class="help-block">
									<strong>{{ $errors->first('new-password') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>

							<div class="col-md-6">
								<input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" name="form3" class="btn btn-primary">
									Change Password
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Personal Information</div>

				<div class="card-body">
					@if (session('errorname'))
					<div class="alert alert-danger">
						{{ session('errorname') }}
					</div>
					@endif
					@if (session('successname'))
					<div class="alert alert-success">
						{{ session('successname') }}
					</div>
					@endif
					<form class="form-horizontal" method="POST" href="{{ route('profile') }}">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('first-name') ? ' has-error' : '' }}">
							<label for="first-name" class="col-md-4 control-label">First Name - {{ $user->first_name }}</label>

							<div class="col-md-6">
								<input id="first-name" type="text" class="form-control" name="first-name" required>

								@if ($errors->has('first-name'))
								<span class="help-block">
									<strong>{{ $errors->first('first-name') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('last-name') ? ' has-error' : '' }}">
							<label for="last-name" class="col-md-4 control-label">Last Name - {{ $user->last_name }}</label>

							<div class="col-md-6">
								<input id="last-name" type="text" class="form-control" name="last-name" required>

								@if ($errors->has('last-name'))
								<span class="help-block">
									<strong>{{ $errors->first('last-name') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" name="form2" class="btn btn-primary">
									Submit
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
