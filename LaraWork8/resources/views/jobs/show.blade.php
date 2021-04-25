@extends('layouts.app')


@section('content')
    <h1 class="text-3xl text-green-500 mt-5 mb-5">Mission</h1>


        <div class="px-3 py-5 mb-5 mt-5 shadow-sm hover:shadow-md rounded border border-gray-300">
            <h2 class="text-xl font-bold text-green-700">{{ $job->title}}</h2>
            <p class="text-md text-gray-800">{{ $job->description}}</p>
            <div class="flex items-center">
            </div>
            <span class="text-sm text-gray-600"> {{ number_format($job->price / 100, 2, ',', ' ') }} €</span>
        </div> 

@endsection