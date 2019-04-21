@extends('layouts.app')

@section('content')
<div class="border rounded-0 bg-light shadow container my-4">
	<div class="row my-4">
		<div class="col-xs-6 col-lg-8">
			<h1 class="mb-2">Contact Us</h1>
			<h2 class="mb-2 mt-4 pt-2">Email</h2>
			<a href="mailto:support@mail.databaerecipes.com">support@mail.databaerecipes.com</a>
			<h2 class="mt-5">Connect With us on Social Media</h2>
          <ul class="social-links col-lg-12 col-md-12 col-6 list-unstyled d-flex justify-content-left">
            <li><a href="#"><i class="fab fa-facebook lead px-2"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter lead px-2"></i></a></li>
            <li><a href="#"><i class="fab fa-github lead px-2"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram lead px-2"></i></a></li>
          </ul>
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
