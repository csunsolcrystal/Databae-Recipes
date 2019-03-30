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
			<input type="Title" name="title" class="form-control mb-4" id="inputTitle">
			
			<label for="inputTitle">Category</label>
			<div class="form-row align-items-center mb-4">
			<div class="col-auto my-1">
			<select class="custom-select mr-sm-2" name="category" id="category">
			<option selected>Choose...</option>
			<option value="Breakfast">Breakfast</option>
			<option value="Lunch">Lunch</option>
			<option value="Dinner">Dinner</option>
			<option value="Dessert">Dessert</option>
			<option value="Appetizer/Snacks">Appetizer/Snacks</option>
			<option value="Drinks">Drinks</option>
			</select>
			</div>
		</div>
			<label for="inputTag">Tags (optional)</label>
			<input type="Tag" name="tag" class="form-control mb-4" id="inputTag" placeholder="#sweet #healthy etc...">
			
			<label for="exampleTextarea">Recipe Description</label>
			<textarea class="form-control mb-4" name="recipeDescription" id="recipeDescription" rows="3"></textarea>
			
			<label for="exampleTextarea">Cook Time</label>
			<input type="cooktimer" name="cookTime" class="form-control mb-4" id="inputCookTime" placeholder="45 minutes, 30 minutes...">
			
			<label for="exampleTextarea">Prep Time</label>
			<input type="preptimer" name="prepTime" class="form-control mb-4" id="inputPrepTime" placeholder="45 minutes, 30 minutes...">
			
			<label for="exampleTextarea">Footnotes (optional)</label>
			<textarea class="form-control mb-4" name="footnotes" id="recipeFootNotes" rows="3"></textarea>
			
			<label for="exampleTextarea">Recipe Ingredients</label>
			<textarea class="form-control mb-4" name="ingredients" id="recipeIngredients" rows="3" placeholder="Put each ingredient on its own each line."></textarea>

			<label for="exampleTextarea">Recipe Steps</label>
			<textarea class="form-control mb-4" name="recipe_steps" placeholder="Put each step on its own each line." id="recipeSteps" rows="3"></textarea>

			<label for="exampleInputFile">Upload Cover image</label>
			@csrf
			<input type="file" class="form-control-file" name="picture" id="pictureFile" aria-describedby="fileHelp">
			<small id="fileHelp" class="form-text text-muted mb-4">Please upload a valid image file. Size of image should not be more than 2MB.</small>
			
			<label for="exampleInputFile">Upload Gallery Pictures (optional)</label>
			 <div class="input-group control-group increment" >
          <input type="file" name="gallery[]" class="form-control">
          <div class="input-group-btn"> 
            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
          </div>
        </div>
        <div class="clone hide">
          <div class="control-group input-group mt-4" style="margin-top:10px">
            <input type="file" name="gallery[]" class="form-control">
            <div class="input-group-btn">
              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
          </div>
        </div>

			<button type="submit" class="btn btn-primary mt-4">
									Submit
								</button>
		</div>
	</form>
	<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>

</div>
@endsection
