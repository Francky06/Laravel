@extends('layouts.app')

@section('content')

    <h1>Editer le profil de {{$client->name}}</h1><br> 
    <form action="{{ route('clients/update', ['client' => $client->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @include('includes.form')
        <button type="submit" class="btn btn-success">Sauvegarder</button>
    </form>

@endsection