@extends('layout')


@section('content')

    <h1>{{$client->name}}</h1><br>
    <p><strong>Email :</strong> {{$client->email}}</p>
    <p><em>Entreprise : {{$client->entreprise->name}}</em></p>
    <a href="{{$client->id}}/edit" class="btn btn-secondary my-3">Editer<a>





@endsection