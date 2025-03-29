
@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row">
    <div class="col-md-6">
        <h1 class="display-4 mb-4">A Propos de Club</h1>
        <p class="lead">
        Nous sommes un club sportif passionné dédié au développement du basketball 
        et à la promotion d'un mode de vie sain pour nos membres.
        </p>
        <p>
            Fondé en 2010, notre club a formé des centaines de joueurs et organisé 
            de nombreux tournois régionaux et nationaux.
        </p>
    </div>
    <div class="col-md-6">
        <img src="{{asset('basketball.jpg')}}" class="img-fluid rounded shadow-lg" alt="basketball">
    </div>
    </div>
</div>
@endsection