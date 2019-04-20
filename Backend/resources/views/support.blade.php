@extends('layouts.app')

@section('content')
<div class="border rounded-0 bg-light shadow container my-4">
	<h1>Need Help? Submit a Support Ticket</h1>
	<div class="container" style="max-width: 600px;">
<form class="form-horizontal" method="POST" enctype="multipart/form-data">
		<div class="form group">
			<label for="inputTitle">Problem Summary</label>
			<input type="Title" name="title" class="form-control mb-4" id="inputTitle">
			
			<label for="inputTitle">Category</label>
			<div class="form-row align-items-center mb-4">
			<div class="col-auto my-1">
			<select class="custom-select mr-sm-2" name="category" id="category">
			<option selected>Choose...</option>
			<option value="Breakfast">Account</option>
			<option value="Lunch">Viewing Recipes</option>
			<option value="Dinner">Submitting a Recipe</option>
			<option value="Dessert">Yeet</option>
			</select>
			</div>
		</div>
	</div>
</form>
</div>
</div>
@endsection