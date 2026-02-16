

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club sportifs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="images/png" href="{{ asset('favicon.png') }}">

</head>
<body>
    <header id="main-header" class=" text-white text-center py-4 bg-primary" >
        <h1>Club de sport Mohamed Iᵉʳ</h1>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand text-dark" href="#accueil">Club Sport</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item me-3">
                            <a class="nav-link text-white hover-underline" href="#accueil">Accueil</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link text-white hover-underline" href="#apropos">À Propos</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link text-white hover-underline" href="#services">Services</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link text-white hover-underline" href="#temoignages">Témoignages</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link text-white hover-underline" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-warning text-dark fw-bold ms-2" href="{{ route('admin.login') }}">
                                <i class="fas fa-user-shield me-1"></i> Administration
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
    @yield('content')
        <section id="accueil" class="py-4">
        <div class="container">
                <div class="text-center mb-5">
                    <br>
                    <br><br>
                    <h2>Gérer vos adhérents avec facilité</h2>
                    <p class="lead">
                    <a href="{{ route('inscription') }}" onclick="showForm('inscription')" 
                        style="text-decoration: none; color: #007bff; font-weight: bold;">
                        Inscrivez-vous
                        </a>, gérez et suivez vos activités sportives.
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('admin.login') }}" class="btn btn-warning btn-lg text-dark fw-bold">
                            <i class="fas fa-user-shield me-2"></i>
                            Espace Administration
                        </a>
                    </div>
                </div>
        </div>
        </section>



<section id="apropos" class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 order-md-1 order-2">
                <h2>À Propos de Nous</h2>
                <p class="mb-4">
                La Faculté des Sciences d'Oujda dispose de plusieurs terrains dédiés au football, au basketball et au handball.<br>
                    <strong>Création : 2022</strong>
                </p>
                
                <!-- Icônes réseaux sociaux -->
                <div class="social-icons mt-4">
                    <h5>Suivez-nous :</h5>
                    <a href="https://www.facebook.com/UniversityOUJDA/" target="_blank" class="text-decoration-none me-3">
                        <i class="fab fa-facebook fa-2x"></i>
                    </a>
                    <a href="https://www.facebook.com/UniversityOUJDA/" target="_blank" class="text-decoration-none me-3">
                        <i class="fab fa-x fa-2x"></i>
                    </a>
                    <a href="https://www.facebook.com/UniversityOUJDA/" target="_blank" class="text-decoration-none me-3">
                        <i class="fab fa-linkedin fa-2x"></i>
                    </a>
                    <a href="https://www.facebook.com/UniversityOUJDA/" target="_blank" class="text-decoration-none">
                        <i class="fab fa-github fa-2x"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/basketball.jpg') }}" 
                     alt="Équipe de basketball" 
                     class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<section id="services" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">NOS SERVICES</h2>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-user-plus fa-3x mb-3 text-primary"></i>
                        <h3>Inscription en ligne</h3>
                        <p class="text-muted">
                            Les adhérents peuvent s'inscrire facilement à diverses disciplines sportives 
                            et payer leurs cotisations en ligne.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-users-cog fa-3x mb-3 text-primary"></i>
                        <h3>Gestion des adhérents</h3>
                        <p class="text-muted">
                            Les administrateurs peuvent ajouter, modifier ou supprimer des membres 
                            rapidement et efficacement.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-money-bill-wave fa-3x mb-3 text-primary"></i>
                        <h3>Suivi des paiements</h3>
                        <p class="text-muted">
                            Gérez facilement les cotisations et générez des reçus pour les paiements effectués.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5 pt-4">
            <div class="alert alert-info d-inline-block">
                <h4 class="alert-heading">Besoin d'aide ?</h4>
                <p class="mb-0">Contactez notre équipe pour toute assistance</p>
            </div>
        </div>
    </div>
</section>

<section id="temoignages" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">TÉMOIGNAGES</h2>
        
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body p-4 p-md-5 text-center">
                        <div class="mb-4">
                            <span class="display-4 text-primary">66</span>
                            <p class="text-muted">Membres satisfaits</p>
                        </div>
                        
                        <blockquote class="blockquote mb-4">
                            <p class="fs-4">
                                "Cette application a simplifié la gestion de notre club de manière incroyable. 
                                Nos membres l'adorent!"
                            </p>
                        </blockquote>
                        
                        <div class="mb-4">
                            <div class="star-rating">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                        </div>
                        
                        <div>
                            <h5 class="mb-1">EL-GRAOUI YOUNESS</h5>
                            <p class="text-muted mb-0">Administrateur de club de sport</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body p-4 p-md-5 text-center">
                        <div class="mb-4">
                            <span class="display-4 text-primary">42</span>
                            <p class="text-muted">Événements organisés</p>
                        </div>
                        
                        <blockquote class="blockquote mb-4">
                            <p class="fs-4">
                                "La gestion des tournois est devenue tellement plus simple grâce à cette plateforme. 
                                Un gain de temps considérable!"
                            </p>
                        </blockquote>
                        
                        <div class="mb-4">
                            <div class="star-rating">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star-half-alt text-warning"></i>
                            </div>
                        </div>
                        
                        <div>
                            <h5 class="mb-1">BOUDKHILI ADIL</h5>
                            <p class="text-muted mb-0">Administrateur de club de sport</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">CONTACT</h2>
        
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h4 class="mb-4">Informations de contact</h4>
                        
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                <strong>Adresse :</strong> 
                                BV Mohammed VI, B.P. 524, Oujda 60000, Maroc
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-phone text-primary me-2"></i>
                                <strong>Téléphone :</strong>  +212 536 50 06 14
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-envelope text-primary me-2"></i>
                                <strong>Email :</strong> facultescience@ump.ac.ma
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-globe text-primary me-2"></i>
                                <strong>Site web :</strong> 
                                <a href="https://www.ump.ma/" target="_blank">www.ump.ac.ma</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-0">
                        <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3291.716729080044!2d-1.9391509241749603!3d34.41429587300741!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7871e8a3135e07%3A0x1c9e0d6e3b5d8f1e!2sUniversit%C3%A9%20Mohammed%20Premier!5e0!3m2!1sfr!2sma!4v1719345671238!5m2!1sfr!2sma"
                            width="100%" 
                            height="100%" 
                            style="border:0; min-height: 300px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>


<section id="contact" class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="text-center mb-4">CONTACTEZ-NOUS</h2>
                        
                        <form>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Adresse e-mail</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="5" required></textarea>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-4 py-2">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <!-- Modifiez cette partie dans votre footer -->
            <div class="col-md-6 mb-3 mb-md-0 text-center text-md-start">
                <button onclick="location.reload()" class="btn btn-link p-0 border-0 bg-transparent">
                    <div class="d-flex align-items-center">
                        
                        <div class="text-start">
                            <p class="mb-1 fw-bold">جامعة محمد الأول وجدة</p>
                            <p class="mb-0 small">UNIVERSITE MOHAMMED PREMIER OUJDA</p>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-1">&copy; {{ date('Y') }} Tous droits réservés</p>
            </div>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        navLinks.forEach(link => {
                            link.classList.toggle('active', 
                                link.getAttribute('href') === `#${entry.target.id}`);
                        });
                    }
                });
            }, {
                threshold: 0.5
            });
            
            document.querySelectorAll('section').forEach(section => {
                observer.observe(section);
            });
            
            
            document.addEventListener('keydown', function(e) {
                if (e.altKey && e.key >= '1' && e.key <= '5') {
                    const index = parseInt(e.key) - 1;
                    if (navLinks[index]) {
                        navLinks[index].focus();
                        document.querySelector(navLinks[index].getAttribute('href'))
                            .scrollIntoView({ behavior: 'smooth' });
                    }
                }
            });
        });
        
function handleInscriptionClick(e) {
    
    const header = document.getElementById('main-header');
    header.classList.add('header-alt');
    
    document.body.style.opacity = '0.5';
    setTimeout(() => {
        document.body.style.opacity = '1';
        document.body.style.transition = 'opacity 0.3s ease';
    }, 300);
}

    document.querySelectorAll('a[href*="inscription"]').forEach(link => {
        link.addEventListener('click', handleInscriptionClick);
    });

    mix.copy('resources/images/favicon.ico', 'public/favicon.ico');
    </script>
</body>
</html>