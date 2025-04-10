<x-master title="Gestion de Services - Accueil">

    <!-- Section Fonctionnalités -->
    <div class="container mb-5" id="features">
        <h2 class="text-center mb-5">Les fonctionnalités principales</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4"> <!-- Utilisation de row-cols pour s'adapter à l'écran -->
            <div class="col">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="feature-icon bg-primary bg-gradient text-white rounded-circle p-3 mb-3 mx-auto" style="width: 60px; height: 60px;">
                            <i class="bi bi-people-fill fs-4">{{$clients}}</i>
                        </div>
                        <h5 class="card-title">Gestion des clients</h5>
                        <p class="card-text">Gérez facilement vos clients et leurs informations.</p>
                        <a href="{{ route('clients.index') }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="feature-icon bg-primary bg-gradient text-white rounded-circle p-3 mb-3 mx-auto" style="width: 60px; height: 60px;">
                            <i class="bi bi-tools fs-4">{{$techniciens}}</i>
                        </div>
                        <h5 class="card-title">Gestion des techniciens</h5>
                        <p class="card-text">Gérez facilement vos techniciens et leurs informations.</p>
                        <a href="{{ route('users.techniciens') }}" class="stretched-link"></a>
                    </div>              
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="feature-icon bg-primary bg-gradient text-white rounded-circle p-3 mb-3 mx-auto" style="width: 60px; height: 60px;">
                            <i class="bi bi-headset fs-4">{{$commercials}}</i>
                        </div>
                        <h5 class="card-title">Gestion des commerciaux</h5> <!-- Corrigé le titre -->
                        <p class="card-text">Gérez facilement vos commerciaux et leurs informations.</p> <!-- Corrigé la description -->
                        <a href="{{ route('users.commercials') }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="bg-light py-5 mb-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-3">
                    <h2 class="display-4 fw-bold text-primary">+500</h2>
                    <p class="text-muted">Clients satisfaits</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h2 class="display-4 fw-bold text-primary">98%</h2>
                    <p class="text-muted">Taux de résolution</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h2 class="display-4 fw-bold text-primary">24/7</h2>
                    <p class="text-muted">Support disponible</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5 text-center">
        <h2 class="mb-4">Prêt à optimiser votre gestion de services ?</h2>
        <p class="lead mb-4">Rejoignez des centaines d'entreprises qui ont déjà amélioré leur efficacité</p>
        @guest
            <a href="{{ route('login.show') }}" class="btn btn-primary btn-lg px-5">Commencer maintenant</a>
        @else
            <a href="{{ route('users.index') }}" class="btn btn-primary btn-lg px-5">Accéder à mon tableau de bord</a>
        @endguest
    </div> -->
</x-master>
