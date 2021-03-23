@extends('layouts.app')


@section('content')

    <h1>{{$client->name}}</h1><br>
    <p><strong>Email :</strong> {{$client->email}}</p>
    <p><em>Entreprise : {{$client->entreprise->name}}</em></p>

    @if ($client->image) 
        <img src="{{asset('storage/' . $client->image)}}" class="img-thumbnail" alt="avatar" width="200">
    @endif
    <br>
    <a href="{{$client->id}}/edit" class="btn btn-secondary my-3">Editer<a>

    <form action="{{$client->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>





@endsection