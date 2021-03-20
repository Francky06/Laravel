@extends('layout')

@section('content')

    <h1>Editer le profil de {{$client->name}}</h1><br> 
    <form action="/first/lara5.8/public/clients/{{$client->id}}" method="POST">
        @method('PATCH')
        @include('includes.form')
        <button type="submit" class="btn btn-success">Sauvegarder</button>
    </form>

@endsection