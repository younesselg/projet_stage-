
@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2>Gérer vos adhérents avec facilité</h2>
    <p class="lead">
        <a href="{{ route('inscription') }}" style="text-decoration: none; color: #007bff; font-weight: bold;">
        Inscrivez-vous</a>, gérez et suivez vos activités sportives.
    </p>
    
    <img src="{{ asset('football.jpeg') }}" alt="Football" class="img-fluid mt-4" style="max-width: 100%; height: auto;">
</div>
@endsection