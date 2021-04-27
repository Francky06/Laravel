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


        <section x-data="{open: false}">
            <a href="#" class="text-green-500" @click="open = !open">Soumettre sa candidature</a>
            <form action="{{ route('proposal.store', $job)}}" method="POST" class="w-full" x-cloak x-show="open">
                @csrf
                <textarea class="p-3 w-full font-thin bg-gray-100 mt-3" style="height: 250px;" name="content"></textarea>
                <button type="submit" class="block bg-green-700 text-white px-3 py-2 mt-3">Valider</button>
            </form>
        </section>

@endsection