@extends('layouts.app')

@section('content')
<div class="mt-5">
    <h1 class="text-3xl text-green-500 mt-5 mb-5">Salut {{ auth()->user()->name }}</h1>
    <h1 class="text-3xl text-green-500 mt-5 mb-5">Tableau de Bord</h1>
    @foreach ( auth()->user()->likes as $like )
        <div class="px-3 py-5 mb-5 mt-5 shadow-sm hover:shadow-md rounded border border-gray-300">
            <h2 class="text-xl font-bold text-green-700">{{ $like->title}}</h2>
            <p class="text-md text-gray-800">{{ $like->description}}</p>
            <div class="flex items-center">
            </div>
            <span class="text-sm text-gray-600"> {{ number_format($like->price / 100, 2, ',', ' ') }} €</span>
        </div> 
    @endforeach
</div>
@endsection