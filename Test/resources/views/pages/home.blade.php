@extends('base')

@section('title')
	Home
@endsection

@section('content')

	<h1>Hello World</h1>
	<p>It's {{strftime('%Hh%M')}}, oh Time to Code !!</p>
	<img src="{{asset('images/call.png')}}" alt="Call Member">	
@endsection