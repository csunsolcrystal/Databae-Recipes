@extends('layouts.app')

@section('content')
<div class="border rounded-0 bg-light shadow container my-4">
	<div class="row my-4">
		<div class="col-xs-6 col-lg-8">
			<h1>Contact Us</h1>
			<h2>Email</h2>
			<p>support@mail.databaerecipes.com</p>
			<h2>Phone</h2>
			<p>555-555-5555</p>
			<h2>Social Media</h2>
			HTML
			<!--Facebook-->
			<a class="btn-floating btn-lg btn-fb" type="button" role="button"><i class="fab fa-facebook-f"></i></a>
			<!--Twitter-->
			<a class="btn-floating btn-lg btn-tw" type="button" role="button"><i class="fab fa-twitter"></i></a>
			<!--Instagram-->
			<a class="btn-floating btn-lg btn-ins" type="button" role="button"><i class="fab fa-instagram"></i></a>
		</div>
		<div class="col-xs-6 col-lg-4">
			<div class="border rounded-0 bg-light container my-4">
				<h2>FAQs</h2>
				<ul>
					<li>Why is my pee pee hard?</li>
					<li>My recipe isn't uploading.</li>
					<li>I'm getting an error when I log in.</li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
