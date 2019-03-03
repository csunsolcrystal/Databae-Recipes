@extends('layouts.app')

@section('content')
<!-- Forms -->
<div class="container" style="max-width: 500px;">
	<form>
		<div class="form group">
			<label for="inputTitle">Title</label>
			<input type="Title" class="form-control" id="inputTitle">
			<label for="exampleTextarea">Recipe Description</label>
			<textarea class="form-control" id="recipeDescription" rows="3"></textarea>
			<label for="exampleTextarea">Recipe Steps</label>
			<textarea class="form-control" id="recipeDescription" rows="3"></textarea>
			<label for="exampleInputFile">File input</label>
			<input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
			<small id="fileHelp" class="form-text text-muted">Upload an image for your recipe here.</small>
			<a href="/" class="btn btn-primary navbar-btn login-btn" style="margin-right: 50px">Submit</a>
		</div>
	</form>
</div>
@endsection
