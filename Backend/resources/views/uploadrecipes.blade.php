@extends('layouts.app')

@section('content')
<!-- Forms -->
<div class="container" style="max-width: 500px;">

<div class="card-body">
	<div class="row">
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
			

	<form class="form-horizontal" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form group">
			<label for="inputTitle">Title</label>
			<input type="Title" name="title" class="form-control" id="inputTitle">

			<label for="exampleTextarea">Recipe Description</label>
			<textarea class="form-control" name="body" id="recipeDescription" rows="3"></textarea>

			<label for="exampleTextarea">Recipe Steps</label>
			<textarea class="form-control" name="recipe_steps" placeholder="Put each step on its own each line." id="recipeDescription" rows="3"></textarea>

			<label for="exampleInputFile">Upload Cover image</label>
			@csrf
			<input type="file" class="form-control-file" name="picture" id="pictureFile" aria-describedby="fileHelp">
			<small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
			<button type="submit" class="btn btn-primary">
									Submit
								</button>
		</div>
	</form>
</div>
@endsection
