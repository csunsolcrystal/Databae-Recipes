@extends('layouts.app')

@section('content')
{!! Form::Open(['url' => 'sendmail']) !!}

<div class="col_half">
   {!! Form::label('name', 'Name: ' ) !!}
   {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="col_half col_last">
   {!! Form::label('email', 'E-Mail: ' ) !!}
   {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="clear"></div>

<div class="col_full col_last">
   {!! Form::label('subject', 'Subject: ' ) !!}
   {!! Form::text('subject', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="clear"></div>

<div class="col_full">
    {!! Form::label('bodymessage', 'Message: ' ) !!}
    {!! Form::textarea('bodymessage', null, ['class' => 'form-control', 'required', 'size' => '30x6']) !!}
</div>


<div class="col_full">
     {!! Form::submit('Send') !!}
</div>
{!! Form::close() !!}
<!--
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
					<label for="textArea">Describe your problem here...</label>
					<textarea class="form-control mb-4" name="Describe your problem here..." id="ticketIssue" rows="3"></textarea>
					<label for="email">Email Address</label>
					<input type="email" name="title" class="form-control mb-4" id="email">
				</div>
				<button type="submit" class="btn btn-primary mt-4 mb-4">
					Submit
				</button>
			</form>
		</div>
	</div>
</div>
-->
@endsection
