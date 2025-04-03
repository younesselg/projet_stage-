@extends('app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center mb-0">Formulaire d'Inscription</h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('inscription.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                           id="nom" name="nom" value="{{ old('nom') }}" required>
                                    @error('nom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="prenom" class="form-label">Prénom <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('prenom') is-invalid @enderror" 
                                           id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                                    @error('prenom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label for="cin" class="form-label">CIN <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('cin') is-invalid @enderror" 
                                           id="cin" name="cin" value="{{ old('cin') }}" required>
                                    @error('cin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="date_naissance" class="form-label">Date de naissance <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('date_naissance') is-invalid @enderror" 
                                           id="date_naissance" name="date_naissance" value="{{ old('date_naissance') }}" required>
                                    @error('date_naissance')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="adresse" class="form-label">Adresse <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('adresse') is-invalid @enderror" 
                                          id="adresse" name="adresse" rows="2" required>{{ old('adresse') }}</textarea>
                                @error('adresse')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label for="telephone" class="form-label">Téléphone <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control @error('telephone') is-invalid @enderror" 
                                           id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                                    @error('telephone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}" required>
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
                                        <option value="football" {{ old('sport') == 'football' ? 'selected' : '' }}>Football</option>
                                        <option value="basketball" {{ old('sport') == 'basketball' ? 'selected' : '' }}>Basketball</option>
                                        <option value="volleyball" {{ old('sport') == 'volleyball' ? 'selected' : '' }}>Volleyball</option>
                                    </select>
                                    @error('sport')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="niveau" class="form-label">Niveau <span class="text-danger">*</span></label>
                                    <select class="form-select @error('niveau') is-invalid @enderror" 
                                            id="niveau" name="niveau" required>
                                        <option value="">Sélectionnez votre niveau</option>
                                        <option value="debutant" {{ old('niveau') == 'debutant' ? 'selected' : '' }}>Débutant</option>
                                        <option value="intermediaire" {{ old('niveau') == 'intermediaire' ? 'selected' : '' }}>Intermédiaire</option>
                                        <option value="avance" {{ old('niveau') == 'avance' ? 'selected' : '' }}>Avancé</option>
                                        <option value="professionnel" {{ old('niveau') == 'professionnel' ? 'selected' : '' }}>Professionnel</option>
                                    </select>
                                    @error('niveau')
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
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input @error('conditions') is-invalid @enderror" 
                                       type="checkbox" id="conditions" name="conditions" required>
                                <label class="form-check-label" for="conditions">
                                    J'accepte les <a href="#" data-bs-toggle="modal" data-bs-target="#conditionsModal">conditions générales</a> <span class="text-danger">*</span>
                                </label>
                                @error('conditions')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-4 py-2">S'inscrire</button>
                                <button type="reset" class="btn btn-outline-secondary px-4 py-2 ms-2">Annuler</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="conditionsModal" tabindex="-1" aria-labelledby="conditionsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="conditionsModalLabel">Conditions Générales d'Adhésion</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>1. Adhésion au club</h6>
                <p>L'adhésion au club sportif est valable pour une saison sportive (du 1er septembre au 31 août de l'année suivante).</p>
                
                <h6>2. Cotisation annuelle</h6>
                <p>La cotisation annuelle est fixée à 50 DH. Elle comprend l'accès aux installations sportives et l'encadrement par nos entraîneurs.</p>
                
                <h6>3. Certificat médical</h6>
                <p>Un certificat médical de non contre-indication à la pratique sportive est obligatoire pour toute inscription.</p>
                
                <h6>4. Responsabilité</h6>
                <p>Le club décline toute responsabilité en cas d'accident survenu en dehors des entraînements et compétitions officielles.</p>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">J'ai compris</button>
            </div>
        </div>
    </div>
</div>

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
        
        // const cin = document.getElementById('cin').value;
        // if (!/^[A-Za-z]{1,2}[0-9]/.test(cin)) {
        //     alert('Veuillez entrer un CIN valide (ex: AB123456)');
        //     e.preventDefault();
        // }
    });
</script>
@endsection