@extends('Layouts.default',['titre'=>'About'])

@section('content')
<div class="container">
		<h2>What is {{config('app.name')}}?</h2>

		<p>{{config('app.name')}} is a clone app of <a target="_blank" href="https://laramap.com">Laramap.com</a>.</p>
		<div class="row">
			<div class="col-md-6">
			<p class="alert alert-warning"><strong><i class="fa fa-warning"></i> This app has modifed by <a target="_blank" href="https://twitter.com/yasserChaib5">@Yasser</a> for learning purposes.</strong></p>
			</div>
		</div>

		<p>Feel free to help to improve the <a target="_blank" href="https://github.com/mercuryseries/{{config('app.name')}}">source code</a>.</p>

		<hr>

		<h2>What is Laramap?</h2>
		<p>Laramap is the website by which {{config('app.name')}} was inspired :).</p>
		<p>More info <a target="_blank" href="https://laramap.com/p/about">here</a>.</p>

		<hr>

		<h2>Which tools and services are used in {{config('app.name')}}?</h2>
		<p>Basically it's built on Laravel &amp; Bootstrap. But there's a bunch of services used for email and other sections.</p>
		<ul>
			<li>Laravel</li>
			<li>Bootstrap</li>
			<li>Amazon S3</li>
			<li>Mandrill</li>
			<li>Google Maps</li>
			<li>Gravatar</li>
			<li>Antony Martin's Geolocation Package</li>
			<li>Michel Fortin's Markdown Parser Package</li>
			<li>Heroku</li>
		</ul>
</div>
@endsection