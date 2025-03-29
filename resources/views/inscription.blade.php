@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Formulaire d'Inscription</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('inscription.store') }}" method="POST">
                    @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="prenom">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom">
                            </div>
                        </div>

                        <!-- Email et Téléphone -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telephone">Numéro de Téléphone</label>
                                <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Entrez votre numéro de téléphone">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="branche">Branche de la Faculté</label>
                            <select class="form-control" id="branche" name="branche">
                                <option value="smp">SMP</option>
                                <option value="smc">SMC</option>
                                <option value="math_appliquees">Math Appliquées</option>
                                <option value="math_informatique">Math Informatique</option>
                                <option value="biologies_geologies">Biologies et Géologies</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sport">Type de Sport</label>
                            <select class="form-control" id="sport" name="sport">
                                <option value="football">Football</option>
                                <option value="basketball">Basketball</option>
                                <option value="handball">Handball</option>
                            </select>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg">S'inscrire</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection