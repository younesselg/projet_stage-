@extends('layouts.admin')

@section('title', 'Détails Adhérent - ' . $adherent->getFullNameAttribute())
@section('header', 'Détails de l\'Adhérent')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h4 class="card-title mb-0">
                    <i class="fas fa-user me-2"></i>
                    Informations de l'Adhérent
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Photo Section -->
                    <div class="col-md-4 text-center mb-4">
                        @if($adherent->photo)
                            <img src="{{ asset($adherent->photo) }}" 
                                 alt="Photo de {{ $adherent->getFullNameAttribute() }}" 
                                 class="img-fluid rounded shadow"
                                 style="max-width: 250px; height: auto;">
                        @else
                            <div class="bg-light rounded d-flex align-items-center justify-content-center shadow" 
                                 style="width: 250px; height: 250px; margin: 0 auto;">
                                <i class="fas fa-user fa-5x text-muted"></i>
                            </div>
                        @endif
                        <div class="mt-3">
                            <h5>{{ $adherent->getFullNameAttribute() }}</h5>
                            <p class="text-muted">
                                <i class="fas fa-calendar-plus me-1"></i>
                                Inscrit le {{ $adherent->created_at->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>

                    <!-- Information Section -->
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-muted">Nom</label>
                                <p class="form-control-plaintext h5">{{ $adherent->nom }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-muted">Prénom</label>
                                <p class="form-control-plaintext h5">{{ $adherent->prenom }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-muted">CIN</label>
                                <p class="form-control-plaintext h5">{{ $adherent->cin }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-muted">Date de Naissance</label>
                                <p class="form-control-plaintext h5">
                                    {{ $adherent->date_naissance->format('d/m/Y') }}
                                    <small class="text-muted">
                                        ({{ now()->diffInYears($adherent->date_naissance) }} ans)
                                    </small>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-muted">Email</label>
                                <p class="form-control-plaintext h5">
                                    <i class="fas fa-envelope me-2 text-primary"></i>
                                    {{ $adherent->email }}
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-muted">Téléphone</label>
                                <p class="form-control-plaintext h5">
                                    <i class="fas fa-phone me-2 text-success"></i>
                                    {{ $adherent->telephone }}
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold text-muted">Adresse</label>
                                <p class="form-control-plaintext h5">
                                    <i class="fas fa-map-marker-alt me-2 text-danger"></i>
                                    {{ $adherent->adresse }}
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-muted">Sport Pratiqué</label>
                                <p class="form-control-plaintext h5">
                                    <span class="badge bg-info fs-6">{{ $adherent->sport }}</span>
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-muted">Niveau</label>
                                <p class="form-control-plaintext h5">
                                    <span class="badge bg-success fs-6">{{ $adherent->niveau }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-muted">Date d'Inscription</label>
                                <p class="form-control-plaintext h5">
                                    <i class="fas fa-clock me-2 text-warning"></i>
                                    {{ $adherent->created_at->format('d/m/Y H:i') }}
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-muted">Dernière Modification</label>
                                <p class="form-control-plaintext h5">
                                    <i class="fas fa-history me-2 text-secondary"></i>
                                    {{ $adherent->updated_at->format('d/m/Y H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <hr>
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="{{ route('admin.adherents.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>
                            Retour à la liste
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('admin.adherents.edit', $adherent) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Modifier
                        </a>
                        <form action="{{ route('admin.adherents.destroy', $adherent) }}" 
                              method="POST" 
                              class="d-inline"
                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet adhérent ? Cette action est irréversible.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ms-2">
                                <i class="fas fa-trash me-2"></i>
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection