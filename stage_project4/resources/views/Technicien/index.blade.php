
<x-master title="liste des techniciens">

    <div class="container py-4">
        <div class="row mb-4">
            <div class="col">
                <h1 class="text-center mb-4">Technicien</h1>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a class="btn btn-success" href="{{ route('users.create') }}">
                        <i class="fas fa-plus-circle me-2"></i>Ajouter Technicien
                    </a>
                    <span class="badge bg-primary rounded-pill">{{ count($techniciens) }} technicien</span>
                </div>
            </div>
        </div>
    
        @if(count($techniciens) > 0)
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Nom</th>
                            <th>phone</th>
                            <th>Adress</th>
                            <th>spécialité</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($techniciens as $technicien)
                        <tr>
                            <td class="fw-bold">{{ $technicien->name }}</td>
                            <td>{{ $technicien->phone }}</td>
                            <td>{{ $technicien->address }}</td>
                            <td>{{ $technicien->speciality ?? 'Non renseignée' }}</td>
                            <td>{{ $technicien->status ?? 'Non renseignée' }}</td>
                            <td class="text-center">
                                <a href="{{ route('users.show', ['user' => $user['id']]) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-info-circle me-1"></i>Détails
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center" role="alert">
                <i class="fas fa-info-circle me-2"></i>Aucun technicien trouvé
            </div>
        @endif
    </div>
</x-master>