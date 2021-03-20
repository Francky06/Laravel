@extends('layout')


@section('content')

    <h1>{{$client->name}}</h1><br>
    <p><strong>Email :</strong> {{$client->email}}</p>
    <p><em>Entreprise : {{$client->entreprise->name}}</em></p>





@endsection