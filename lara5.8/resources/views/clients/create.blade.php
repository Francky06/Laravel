@extends('layout')

@section('content')

    <h1>Créer un nouveau client</h1><br> 
    <form action="/first/lara5.8/public/clients" method="POST">
        @csrf

        <div class="form-group">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Entrez votre pseudo">
            @error('name')  
            <div class="invalid-feedback">
                Ce champ est requis <br>
                {{$errors->first('name')}} 
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
            <select  aria-label="Default select example" name="status" class="form-select @error('status') is-invalid @enderror">
                <option value="1">Actif</option>
                <option value="0">Inactif</option>
            </select>
             @error('status')  
            <div class="invalid-feedback">
                {{$errors->first('status')}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <select  aria-label="Default select example" name="entreprise_id" class="form-select @error('entreprise_id') is-invalid @enderror">
                @foreach ( $entreprises as $entreprise )
                    <option value="{{$entreprise->id}}">{{$entreprise->name}}</option>
                @endforeach
            </select>
             @error('entreprise_id')  
            <div class="invalid-feedback">
                {{$errors->first('entreprise_id')}}
            </div>
            @enderror
        </div>


        <button type="submit" class="btn btn-success">Ajouter un client</button>
    </form>

@endsection