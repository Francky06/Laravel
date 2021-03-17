@extends('base')

@section('title', 'About | '. config('app.name'))


@section('content')
	<title>About</title>
	<h1>Hello Freeks</h1>
	<p>Oh Dear, it's time to sleep <span class="text-pink-500">&hearts;</span></p>
	<img src="{{asset('images/color.jpg')}}" alt="Colors">
	<p class="mt-5"><a href="{{ route('home') }}" class="text-indigo-500">Retour</a></p>
@stop

