
@extends('layouts.app')
    
@section('content')

    @if (!session()->has('message'))
    <div>
        <h1>Contactez-nous</h1>
    </div>
    <br>
    <form action="{{url ('contact')}}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nom Prenom" value="{{old('name')}}">
            @error('name')  
            <div class="invalid-feedback">
                Ce champ est requis <br>
                {{$errors->first('name')}} 
            </div>
            @enderror
        </div>

         <div class="form-group">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{old('email')}}">
            @error('email')  
            <div class="invalid-feedback">
                Ce champ est requis <br>
                {{$errors->first('email')}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <textarea name="message" cols="30" rows="10" class="form-control @error('message') is-invalid @enderror" placeholder="Entrez votre message">{{old('message')}}</textarea>  
              @error('message')  
            <div class="invalid-feedback">
                Ce champ est requis <br>
                {{$errors->first('message')}}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Envoyer</button>
    </form>  

    @endif
@endsection