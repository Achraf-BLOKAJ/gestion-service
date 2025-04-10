<x-master title="liste des clients">
@if(Auth::check() && Auth::user()->role == 'technicien')
<h1>YOU ARE NOT ALLABELR TO THIS PAGE</h1>
@else
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center mb-1">Clients</h1>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a  href="{{ route('clients.create') }}">
                        <button class="btn btn-primary">Ajouter un client</button>
                    </a>
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
                            <th>Intervention</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td class="fw-bold">{{ $client['client_name'] }}</td>
                                <td>{{ $client['contact'] }}</td>
                                <td>{{ $client->client_address }}</td>
                                <td>{{ $client->date_visite }}</td>
                                <td>
                                    <form method="POST" action="{{ route('clients.updateIntervention', $client->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <select onchange="this.form.submit()" name="intervention" class="form-select">
                                            <option value="">{{ $client->intervention }}</option>
                                            <option value="en_cour" {{ $client->intervention == 'en_cour' ? 'selected' : '' }}>en cours</option>
                                            <option value="non_confirmer" {{ $client->intervention == 'non_confirmer' ? 'selected' : '' }}>non confirmée</option>
                                            <option value="terminer" {{ $client->intervention == 'terminer' ? 'selected' : '' }}>terminé</option>
                                        </select>
                                    </form>
                                </td>
                                
                                
                                <td class="text-center">
                                    <a href="{{ route('clients.show', ['client' => $client['id']]) }}"
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
                <i class="fas fa-info-circle me-2"></i>Aucun client trouvé
            </div>

        @endif
    </div>
@endif
</x-master> 