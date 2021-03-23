   
@extends('layouts.app')
    
@section('content')

    <h1>Clients</h1><br> 
    <!-- Utilisez namespace --> 
    @can('create', App\Client::class)
    <div>
        <button><a href="{{ route('clients/create')}}">Nouveau client<a></button>
    </div>
    <br>
    @endcan

    <div>  
        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Entreprise</th>
                </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)                
                <tr>
                <th scope="row">{{$client->id}}</th>
                    <td><a href="clients/{{$client->id}}">{{$client->name}}<a></td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->status}}</td>
                    <td>{{$client->entreprise->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>  
    </div> 

@endsection