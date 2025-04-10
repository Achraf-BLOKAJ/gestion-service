<x-master title="Liste des Clients">

    <div class="container py-4">
        <div class="row mb-4">
            <div class="col">
                <h1 class="text-center mb-4">Intervention en Cours</h1>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge bg-primary rounded-pill">{{ count($clients) }} clients</span>
                </div>
            </div>
        </div>

        @if(count($clients) > 0)
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Nom</th>
                            <th>Contact</th>
                            <th>Adresse</th>
                            <th>Date de Visite</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td class="fw-bold">{{ $client->client_name }}</td>
                                <td>{{ $client->contact }}</td>
                                <td>{{ $client->client_address }}</td>
                                <td>{{ $client->date_visite }}</td>
                                <td class="text-center">
                                    <a href="{{ route('clients.show', ['client' => $client->id]) }}"
                                        class="btn btn-sm btn-outline-primary">
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
                Aucun client trouvé pour cette intervention en cours.
            </div>
        @endif
    </div>

</x-master>

