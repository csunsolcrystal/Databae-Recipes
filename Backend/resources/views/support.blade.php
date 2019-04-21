@extends('layouts.app')

@section('content')
<div class="border rounded-0 bg-light shadow container my-4">
	<div class="row my-4">
		<div class="col-xs-6 col-lg-8">
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
						
			<h1>Need Help? Submit a Support Ticket</h1>
			<form class="form-horizontal" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form group">
					<label for="inputTitle">Category</label>
					<div class="form-row align-items-center mb-4">
						<div class="col-auto my-1">
							<select class="custom-select mr-sm-2" name="categorySelection" id="category">
								<option value="">Choose...</option>
								<option value="Account Issues">Account Issues</option>
								<option value="Submitting Issues">Submitting Issues</option>
								<option value="Report Problems/Errors">Report Problems/Errors</option>
							</select>
						</div>
					</div>
					<label for="subject">Subject</label>
					<input type="subject" name="title" class="form-control mb-4" id="subject" required>
					<label for="textArea">What is the problem?</label>
					<textarea class="form-control mb-4" placeholder="Describe your problem in detail..." name="ticketIssue" id="ticketIssue" rows="3" required></textarea>
					<label for="email">Email Address</label>
					<input type="email" name="email" class="form-control mb-2" id="email" required>
				</div>
				<button type="submit" class="btn btn-primary mt-4 mb-4">
					Submit
				</button>
			</form>
		</div>
	</div>
</div>
@endsection
