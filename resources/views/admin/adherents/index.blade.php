@extends('app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Liste des Adhérents</h2>
                        <a href="{{ route('inscription') }}" class="btn btn-light">
                            <i class="fas fa-plus"></i> Nouvel Adhérent
                        </a>
                    </div>
                    <div class="card-body p-4">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Photo</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>CIN</th>
                                        <th>Numéro d'appogée</th>
                                        <th>Sport</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($adherents as $adherent)
                                        <tr>
                                            <td>{{ $adherent->id }}</td>
                                            <td>
                                                @if($adherent->photo)
                                                    <img src="{{ asset($adherent->photo) }}" alt="Photo de {{ $adherent->nom }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                                @else
                                                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border-radius: 5px;">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ $adherent->nom }}</td>
                                            <td>{{ $adherent->prenom }}</td>
                                            <td>{{ $adherent->cin }}</td>
                                            <td>{{ $adherent->numero_appogee }}</td>
                                            <td>{{ ucfirst($adherent->sport) }}</td>
                                            <td>{{ $adherent->email }}</td>
                                            <td>{{ $adherent->telephone }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('adherents.edit', $adherent->id) }}" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i> Modifier
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $adherent->id }}">
                                                        <i class="fas fa-trash"></i> Supprimer
                                                    </button>
                                                </div>

                                                <!-- Modal de confirmation de suppression -->
                                                <div class="modal fade" id="deleteModal{{ $adherent->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $adherent->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger text-white">
                                                                <h5 class="modal-title" id="deleteModalLabel{{ $adherent->id }}">Confirmer la suppression</h5>
                                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Êtes-vous sûr de vouloir supprimer l'adhérent <strong>{{ $adherent->prenom }} {{ $adherent->nom }}</strong> ?</p>
                                                                <p class="text-danger">Cette action est irréversible.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                                <form action="{{ route('adherents.destroy', $adherent->id) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center py-4">
                                                <div class="alert alert-info mb-0">
                                                    <i class="fas fa-info-circle me-2"></i> Aucun adhérent n'a été trouvé.
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            {{ $adherents->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 