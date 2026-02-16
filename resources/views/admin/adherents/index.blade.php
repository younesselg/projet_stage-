@extends('layouts.admin')

@section('title', 'Gestion des Adhérents')
@section('header', 'Gestion des Adhérents')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title mb-0">
                    <i class="fas fa-users me-2"></i>
                    Liste des Adhérents
                </h4>
            </div>
            <div class="card-body">
                @if($adherents->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Nom Complet</th>
                                    <th>CIN</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Sport</th>
                                    <th>Niveau</th>
                                    <th>Date Inscription</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($adherents as $adherent)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($adherent->photo)
                                                <img src="{{ asset($adherent->photo) }}" 
                                                     alt="Photo" 
                                                     class="rounded-circle" 
                                                     width="40" 
                                                     height="40"
                                                     style="object-fit: cover;">
                                            @else
                                                <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" 
                                                     style="width: 40px; height: 40px;">
                                                    <i class="fas fa-user text-white"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ $adherent->prenom }} {{ $adherent->nom }}</strong>
                                        </td>
                                        <td>{{ $adherent->cin }}</td>
                                        <td>{{ $adherent->email }}</td>
                                        <td>{{ $adherent->telephone }}</td>
                                        <td>
                                            <span class="badge bg-info">{{ $adherent->sport }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">{{ $adherent->niveau }}</span>
                                        </td>
                                        <td>{{ $adherent->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.adherents.show', $adherent) }}" 
                                                   class="btn btn-info btn-sm btn-action" 
                                                   title="Voir détails">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.adherents.edit', $adherent) }}" 
                                                   class="btn btn-warning btn-sm btn-action" 
                                                   title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.adherents.destroy', $adherent) }}" 
                                                      method="POST" 
                                                      class="d-inline"
                                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet adhérent ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-danger btn-sm btn-action" 
                                                            title="Supprimer">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Statistics -->
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body text-center">
                                    <h3>{{ $adherents->count() }}</h3>
                                    <p class="mb-0">Total Adhérents</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white">
                                <div class="card-body text-center">
                                    <h3>{{ $adherents->where('sport', 'Football')->count() }}</h3>
                                    <p class="mb-0">Joueurs Football</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-info text-white">
                                <div class="card-body text-center">
                                    <h3>{{ $adherents->where('sport', 'Basketball')->count() }}</h3>
                                    <p class="mb-0">Joueurs Basketball</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body text-center">
                                    <h3>{{ $adherents->where('niveau', 'Débutant')->count() }}</h3>
                                    <p class="mb-0">Débutants</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-users fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Aucun adhérent trouvé</h4>
                        <p class="text-muted">Commencez par ajouter des adhérents via le formulaire d'inscription.</p>
                        <a href="{{ route('inscription') }}" class="btn btn-primary">
                            <i class="fas fa-user-plus me-2"></i>
                            Ajouter un adhérent
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection