@extends('layouts.app')


@section('content')
    <h1 class="text-3xl text-green-500 mt-5 mb-5">Nos dernières Missions</h1>

    @foreach ($jobs as $job )
        <livewire:job :job="$job"/>
    @endforeach
@endsection