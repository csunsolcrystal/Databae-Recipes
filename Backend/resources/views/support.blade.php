@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
	<title>Laravel 5.4 Cloudways Contact US Form Example</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<h1>Contact US Form</h1>
		@if(Session::has('success'))
		<div class="alert alert-success">
			{{ Session::get('success') }}
		</div>
		@endif
		{!! Form::open(['route'=>'contactus.store']) !!}
		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			{!! Form::label('Name:') !!}
			{!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
			<span class="text-danger">{{ $errors->first('name') }}</span>
		</div>
		<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
			{!! Form::label('Email:') !!}
			{!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}
			<span class="text-danger">{{ $errors->first('email') }}</span>
		</div>
		<div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
			{!! Form::label('Message:') !!}
			{!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Enter Message']) !!}
			<span class="text-danger">{{ $errors->first('message') }}</span>
		</div>
		<div class="form-group">
			<button class="btn btn-success">Contact US!</button>
		</div>
		{!! Form::close() !!}
	</div>
</body>

</html>
<!--
=======
>>>>>>> parent of 85af20b5... a
=======
>>>>>>> parent of 85af20b5... a
=======
>>>>>>> parent of 85af20b5... a
<div class="border rounded-0 bg-light shadow container my-4">
	<div class="row my-4">
		<div class="col-xs-6 col-lg-8">
			<h1>Need Help? Submit a Support Ticket</h1>
			<form class="form-horizontal" method="POST" enctype="multipart/form-data">
				<div class="form group">
					<label for="inputTitle">Category</label>
					<div class="form-row align-items-center mb-4">
						<div class="col-auto my-1">
							<select class="custom-select mr-sm-2" name="category" id="category">
								<option selected>Choose...</option>
								<option value="Breakfast">Account</option>
								<option value="Lunch">Submitting</option>
								<option value="Dinner">Submitting a Recipe</option>
								<option value="Dessert">Yeet</option>
							</select>
						</div>
					</div>
					<label for="subject">Subject</label>
					<input type="subject" name="title" class="form-control mb-4" id="subject">
					<label for="message">Describe your problem here...</label>
					<textarea class="form-control mb-4" name="Describe your problem here..." id="message" rows="3"></textarea>
					<label for="email">Email Address</label>
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
					<input type="email" name="mail" class="form-control mb-4" id="email">
=======
					<input type="email" name="title" class="form-control mb-2" id="email">
>>>>>>> parent of 85af20b5... a
=======
					<input type="email" name="title" class="form-control mb-2" id="email">
>>>>>>> parent of 85af20b5... a
=======
					<input type="email" name="title" class="form-control mb-2" id="email">
>>>>>>> parent of 85af20b5... a
				</div>
				<button type="submit" class="btn btn-primary mt-4 mb-4">
					Submit
				</button>
			</form>
		</div>
	</div>
</div>
@endsection
