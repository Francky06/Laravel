@extends('layouts.app')

@section('content')

    <h1>Créer un nouveau client</h1><br> 
    <form action="{{ route('clients') }}" method="POST">
        @include('includes.form')
        <button type="submit" class="btn btn-success">Ajouter un client</button>
    </form>

@endsection