    
@extends('layout')
    
@section('content')
    <h1>Clients</h1>  
    <div>
        @foreach($clients as $client)
        <li>{{$client->name}} : <em class="text-muted">{{$client->email}}</em></li>
        @endforeach
    </div>
    <hr>

    <form action="clients" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" name="pseudo" class="form-control @error('pseudo') is-invalid @enderror" placeholder="Entrez votre pseudo">
            @error('pseudo')  
            <div class="invalid-feedback">
                Ce champ est requis <br>
                {{$errors->first('pseudo')}} 
            </div>
            @enderror
        </div>
         <div class="form-group">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Entrez votre mail">
            @error('email')  
            <div class="invalid-feedback">
                Ce champ est requis <br>
                {{$errors->first('email')}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <select class="form-select" aria-label="Default select example" name="status" @error('status') is-invalid @enderror">
                <option value="1">Actif</option>
                <option value="0">Inactif</option>
            </select>
             @error('status')  
            <div class="invalid-feedback">
                {{$errors->first('status')}}
            </div>
            @enderror
        </div>


        <button type="submit" class="btn btn-success">Ajouter un client</button>
    </form>
@endsection