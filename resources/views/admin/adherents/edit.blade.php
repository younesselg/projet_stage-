@extends('layouts.admin')

@section('title', 'Modifier Adhérent - ' . $adherent->getFullNameAttribute())
@section('header', 'Modifier un Adhérent')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-warning text-white">
                <h4 class="card-title mb-0">
                    <i class="fas fa-edit me-2"></i>
                    Modifier les Informations
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.adherents.update', $adherent) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <!-- Photo Section -->
                        <div class="col-md-4 text-center mb-4">
                            <div class="mb-3">
                                @if($adherent->photo)
                                    <img src="{{ asset($adherent->photo) }}" 
                                         alt="Photo actuelle" 
                                         class="img-fluid rounded shadow mb-3"
                                         style="max-width: 200px; height: auto;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center shadow mb-3" 
                                         style="width: 200px; height: 200px; margin: 0 auto;">
                                        <i class="fas fa-user fa-3x text-muted"></i>
                                    </div>
                                @endif
                                <p class="text-muted">Photo actuelle</p>
                            </div>
                            
                            <div class="mb-3">
                                <label for="photo" class="form-label">Changer la photo</label>
                                <input type="file" 
                                       class="form-control @error('photo') is-invalid @enderror" 
                                       id="photo" 
                                       name="photo"
                                       accept="image/*">
                                <div class="form-text">Format: JPG, PNG, JPEG (max 2MB)</div>
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Form Section -->
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('nom') is-invalid @enderror" 
                                           id="nom" 
                                           name="nom" 
                                           value="{{ old('nom', $adherent->nom) }}" 
                                           required>
                                    @error('nom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="prenom" class="form-label">Prénom <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('prenom') is-invalid @enderror" 
                                           id="prenom" 
                                           name="prenom" 
                                           value="{{ old('prenom', $adherent->prenom) }}" 
                                           required>
                                    @error('prenom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cin" class="form-label">CIN <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('cin') is-invalid @enderror" 
                                           id="cin" 
                                           name="cin" 
                                           value="{{ old('cin', $adherent->cin) }}" 
                                           required>
                                    <div class="form-text">Numéro de carte d'identité</div>
                                    @error('cin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="date_naissance" class="form-label">Date de Naissance <span class="text-danger">*</span></label>
                                    <input type="date" 
                                           class="form-control @error('date_naissance') is-invalid @enderror" 
                                           id="date_naissance" 
                                           name="date_naissance" 
                                           value="{{ old('date_naissance', $adherent->date_naissance->format('Y-m-d')) }}" 
                                           required>
                                    @error('date_naissance')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email', $adherent->email) }}" 
                                           required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="telephone" class="form-label">Téléphone <span class="text-danger">*</span></label>
                                    <input type="tel" 
                                           class="form-control @error('telephone') is-invalid @enderror" 
                                           id="telephone" 
                                           name="telephone" 
                                           value="{{ old('telephone', $adherent->telephone) }}" 
                                           required>
                                    @error('telephone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="adresse" class="form-label">Adresse <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('adresse') is-invalid @enderror" 
                                          id="adresse" 
                                          name="adresse" 
                                          rows="3" 
                                          required>{{ old('adresse', $adherent->adresse) }}</textarea>
                                @error('adresse')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="sport" class="form-label">Sport Pratiqué <span class="text-danger">*</span></label>
                                    <select class="form-select @error('sport') is-invalid @enderror" 
                                            id="sport" 
                                            name="sport" 
                                            required>
                                        <option value="">Sélectionnez un sport</option>
                                        <option value="Football" {{ old('sport', $adherent->sport) == 'Football' ? 'selected' : '' }}>Football</option>
                                        <option value="Basketball" {{ old('sport', $adherent->sport) == 'Basketball' ? 'selected' : '' }}>Basketball</option>
                                        <option value="Tennis" {{ old('sport', $adherent->sport) == 'Tennis' ? 'selected' : '' }}>Tennis</option>
                                        <option value="Natation" {{ old('sport', $adherent->sport) == 'Natation' ? 'selected' : '' }}>Natation</option>
                                        <option value="Athlétisme" {{ old('sport', $adherent->sport) == 'Athlétisme' ? 'selected' : '' }}>Athlétisme</option>
                                    </select>
                                    @error('sport')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="niveau" class="form-label">Niveau <span class="text-danger">*</span></label>
                                    <select class="form-select @error('niveau') is-invalid @enderror" 
                                            id="niveau" 
                                            name="niveau" 
                                            required>
                                        <option value="">Sélectionnez un niveau</option>
                                        <option value="Débutant" {{ old('niveau', $adherent->niveau) == 'Débutant' ? 'selected' : '' }}>Débutant</option>
                                        <option value="Intermédiaire" {{ old('niveau', $adherent->niveau) == 'Intermédiaire' ? 'selected' : '' }}>Intermédiaire</option>
                                        <option value="Avancé" {{ old('niveau', $adherent->niveau) == 'Avancé' ? 'selected' : '' }}>Avancé</option>
                                        <option value="Expert" {{ old('niveau', $adherent->niveau) == 'Expert' ? 'selected' : '' }}>Expert</option>
                                    </select>
                                    @error('niveau')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <hr>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.adherents.show', $adherent) }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>
                                    Annuler
                                </a>
                                <div>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save me-2"></i>
                                        Enregistrer les modifications
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection