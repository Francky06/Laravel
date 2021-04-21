@extends('layouts.app')


@section('content')
    <h1 class="text-3xl text-green-500 mt-5 mb-5">Nos dernières Missions</h1>

    @foreach ($jobs as $job )
        <div class="px-3 py-5 mb-5 mt-5 shadow-sm hover:shadow-md rounded border border-gray-300">
            <h2 class="text-xl font-bold text-green-700">{{ $job->title}}</h2>
            <p class="text-md text-gray-800">{{ $job->description}}</p>
            <div class="flex items-center">
                <span class="h-2 w-2 bg-green-300 rounded-full mr-1 mt-1"></span>
                <a href="#" class="hover:text-green-500">Consulter la mission</a>
            </div>
            <span class="text-sm text-gray-600"> {{ number_format($job->price / 100, 2, ',', ' ') }} €</span>
        </div> 
    @endforeach
@endsection