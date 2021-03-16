@extends('base')

@section('title', 'About | '. config('app.name'))


@section('content')
	<title>About</title>
	<h1>Hello Freeks</h1>
	<p>Oh Dear, it's time to sleep &hearts;</p>
	<img src="{{asset('images/color.jpg')}}" alt="Colors">
	<p><a href="{{ route('home') }}">Retour</a></p>
@stop

