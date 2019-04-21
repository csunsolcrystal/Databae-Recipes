@extends('layouts.app')

@section('content')
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
					<input type="email" name="mail" class="form-control mb-4" id="email">
				</div>
				<button type="submit" class="btn btn-primary mt-4 mb-4">
					Submit
				</button>
			</form>
		</div>
	</div>
</div>
@endsection
