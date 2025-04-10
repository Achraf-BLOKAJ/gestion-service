<x-master title="Commercial">
@if(Auth::check() && Auth::user()->role == 'technicien')
<h1>YOU ARE NOT ALLABELR TO THIS PAGE</h1>
@else
    <div class="container">
        <div class="row">
            <div class="col">
                @if (request()->routeIs('users.commercials'))
                    <h2 class="text-center mb-4">Liste des Commerciaux</h2>
                @elseif (request()->routeIs('users.techniciens'))
                    <h2 class="text-center mb-4"> Liste des Techniciens</h2>
                @endif
                
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <a class="btn btn-success" href="{{ route('users.create') }}">
                        @if (request()->routeIs('users.commercials'))
                            <i class="fas fa-plus-circle me-2"></i>Ajouter commercial
                        @elseif (request()->routeIs('users.techniciens'))
                            <i class="fas fa-plus-circle me-2"></i>Ajouter technicien
                        @endif
                    </a>
                    <span class="badge bg-primary rounded-pill">{{ count($users) }} commercials</span>
                </div>
            </div>
        </div>

        @if(count($users) > 0)
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Phone</th>
                            @if (request()->routeIs('users.techniciens'))
                                <th>Adress</th>
                                <th>spécialité</th>
                                <th>Status</th>
                            @endif
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="fw-bold">{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user->phone }}</td>

                                @if (request()->routeIs('users.techniciens'))
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->speciality ?? 'Non renseignée' }}</td>
                                    <td>{{ $user->status ?? 'Non renseignée' }}</td>
                                @endif
                                <td class="text-center">
                                    <a href="{{ route('users.show', ['user' => $user['id']]) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-info-circle me-1"></i>Détails
                                    </a>
                                </td>
                            </tr>
                        @endforeach
            </div>
        @else
            <div class="alert alert-info text-center" role="alert">
                <i class="fas fa-info-circle me-2"></i>Aucun commercial trouvé
            </div>
        @endif
    </div>
    @endif
</x-master>