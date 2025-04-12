<!-- Sidebar navigation avec possibilité de réduire/étendre -->
<div class="sidebar bg-light" id="sidebar" data-collapsed="false">
    <div class="sidebar-header d-flex justify-content-between align-items-center px-3 py-3">
        <a class="navbar-brand sidebar-text" href="#">Services</a>
        <button id="sidebarCollapseBtn" class="btn btn-sm btn-light border">
            <i class="fas fa-chevron-left" id="toggle-icon"></i>
        </button>
    </div>
    <hr>
    <ul class="nav flex-column">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login.show') }}">
                    <i class="fas fa-sign-in-alt me-2"></i> <span class="sidebar-text">Se connecter</span>
                </a>
            </li>
        @endguest
        
        @if(Auth::check() && Auth::user()->role != 'technicien')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fas fa-home me-2"></i> <span class="sidebar-text">Dashboard</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clients.index') }}">
                    <i class="fas fa-users me-2"></i> <span class="sidebar-text">Clients</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="/serviceClient">
                    <i class="fas fa-headset me-2"></i> <span class="sidebar-text">Service Client</span>
                </a>
            </li>
            
            @can('isAdmin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.commercials') }}">
                        <i class="fas fa-briefcase me-2"></i> <span class="sidebar-text">Commercial</span>
                    </a>
                </li>
            @endcan
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.techniciens') }}">
                    <i class="fas fa-tools me-2"></i> <span class="sidebar-text">Techniciens</span>
                </a>
            </li>

            
            <!-- Intervention avec select au lieu de dropdown -->
            <li class="nav-item">
                <div class="px-3 py-2">
                    <label for="interventionSelect" class="form-label">
                        <i class="fas fa-calendar-check me-2"></i> <span class="sidebar-text">Intervention</span>
                    </label>
                    <form action="{{ route('intervention') }}" method="GET" class="sidebar-text">
                        <select name="intervention" id="interventionSelect" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">Sélectionner</option>
                            <option value="en_cour" {{ request('intervention') == 'en_cour' ? 'selected' : '' }}>En Cours</option>
                            <option value="non_confirmer" {{ request('intervention') == 'non_confirmer' ? 'selected' : '' }}>Non Confirmée</option>
                            <option value="terminer" {{ request('intervention') == 'terminer' ? 'selected' : '' }}>Terminée</option>
                        </select>
                    </form>
                </div>
            </li>
            
           
        @endif
    </ul>
    
    @auth
        <div class="sidebar-footer">
            <div class="user-info px-3 py-2 mb-2">
                <div class="d-flex align-items-center">
                    <i class="fas fa-user me-2"></i>
                    <span class="fw-bold sidebar-text">{{ Auth()->user()->name }}</span>
                </div>
            </div>
            <form action="{{ route('login.logout') }}" method="GET" class="px-3">
                <button type="submit" class="btn btn-danger w-100">
                    <i class="fas fa-sign-out-alt me-2"></i> <span class="sidebar-text">Déconnexion</span>
                </button>
            </form>
        </div>
    @endauth
</div>

<!-- Top navbar for mobile toggle -->
<nav class="navbar navbar-expand-lg navbar-light bg-light d-lg-none">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Services</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>




