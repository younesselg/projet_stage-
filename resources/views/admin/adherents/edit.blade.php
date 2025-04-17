@extends('app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Modifier un Adhérent</h2>
                        <a href="{{ route('adherents.index') }}" class="btn btn-light">
                            <i class="fas fa-arrow-left"></i> Retour à la liste
                        </a>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('adherents.update', $adherent->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                           id="nom" name="nom" value="{{ old('nom', $adherent->nom) }}" required>
                                    @error('nom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="prenom" class="form-label">Prénom <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('prenom') is-invalid @enderror" 
                                           id="prenom" name="prenom" value="{{ old('prenom', $adherent->prenom) }}" required>
                                    @error('prenom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label for="cin" class="form-label">CIN <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('cin') is-invalid @enderror" 
                                           id="cin" name="cin" value="{{ old('cin', $adherent->cin) }}" required>
                                    @error('cin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="date_naissance" class="form-label">Date de naissance <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('date_naissance') is-invalid @enderror" 
                                           id="date_naissance" name="date_naissance" value="{{ old('date_naissance', $adherent->date_naissance->format('Y-m-d')) }}" required>
                                    @error('date_naissance')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="adresse" class="form-label">Adresse <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('adresse') is-invalid @enderror" 
                                          id="adresse" name="adresse" rows="2" required>{{ old('adresse', $adherent->adresse) }}</textarea>
                                @error('adresse')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label for="telephone" class="form-label">Téléphone <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control @error('telephone') is-invalid @enderror" 
                                           id="telephone" name="telephone" value="{{ old('telephone', $adherent->telephone) }}" required>
                                    @error('telephone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email', $adherent->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label for="sport" class="form-label">Sport choisi <span class="text-danger">*</span></label>
                                    <select class="form-select @error('sport') is-invalid @enderror" 
                                            id="sport" name="sport" required>
                                        <option value="">Sélectionnez un sport</option>
                                        <option value="football" {{ old('sport', $adherent->sport) == 'football' ? 'selected' : '' }}>Football</option>
                                        <option value="basketball" {{ old('sport', $adherent->sport) == 'basketball' ? 'selected' : '' }}>Basketball</option>
                                        <option value="handball" {{ old('sport', $adherent->sport) == 'handball' ? 'selected' : '' }}>Handball</option>
                                    </select>
                                    @error('sport')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="numero_appogee" class="form-label">Numéro d'appogée <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('numero_appogee') is-invalid @enderror" 
                                           id="numero_appogee" name="numero_appogee" value="{{ old('numero_appogee', $adherent->numero_appogee) }}" required>
                                    @error('numero_appogee')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="photo" class="form-label">Photo d'identité</label>
                                <input type="file" class="form-control @error('photo') is-invalid @enderror" 
                                       id="photo" name="photo" accept="image/*">
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Format accepté: JPG, PNG (max 2MB)</small>
                                
                                @if($adherent->photo)
                                    <div class="mt-2">
                                        <p>Photo actuelle :</p>
                                        <img src="{{ asset($adherent->photo) }}" alt="Photo actuelle" class="img-thumbnail" style="max-width: 150px;">
                                    </div>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-4 py-2">Mettre à jour</button>
                                <a href="{{ route('adherents.index') }}" class="btn btn-outline-secondary px-4 py-2 ms-2">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('photo').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('photoPreview');
                if (!preview) {
                    const img = document.createElement('img');
                    img.id = 'photoPreview';
                    img.src = e.target.result;
                    img.alt = 'Aperçu photo';
                    img.className = 'img-thumbnail mt-2';
                    img.style.maxWidth = '150px';
                    document.querySelector('input[name="photo"]').parentNode.appendChild(img);
                } else {
                    preview.src = e.target.result;
                }
            }
            reader.readAsDataURL(file);
        }
    });

    document.querySelector('form').addEventListener('submit', function(e) {
        const telephone = document.getElementById('telephone').value;
        if (!/^0[5-7][0-9]{8}$/.test(telephone)) {
            alert('Veuillez entrer un numéro de téléphone marocain valide (ex: 0612345678)');
            e.preventDefault();
        }
    });
</script>
@endsection 