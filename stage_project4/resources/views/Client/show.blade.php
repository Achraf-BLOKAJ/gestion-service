<x-master title="Detail">
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col">
                <h1 class="text-center mb-4">Détails du client</h1>
                <div class="d-flex justify-content-start mb-3">
                    <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Retour à la liste
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="bg-light p-4 rounded shadow-sm">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <h2 class="border-bottom pb-2 mb-3 text-primary">{{ $client->client_name }}</h2>
                            @if($client->entreprise_name)
                                <h5 class="text-muted mb-3">{{ $client->entreprise_name }}</h5>
                            @endif
                        </div>
                        <div class="col-md-4 text-md-end">
                            <div class="d-flex justify-content-md-end gap-2 mt-3">
                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit me-2"></i>Modifier
                                </a>
                                <form action="{{ route('clients.destroy', $client->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash me-2"></i>Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-hover">
                                <tbody>
                                    @if($client->contact)
                                    <tr>
                                        <th class="bg-light" style="width: 40%">
                                            <i class="fas fa-user me-2"></i>Contact
                                        </th>
                                        <td>
                                            @if($client->origine_demande === 'whatsapp')
                                                <a href="https://wa.me/{{ $client->contact }}" target="_blank">
                                                    {{ $client->contact }}
                                                </a>
                                            @elseif($client->origine_demande === 'direct')
                                                <a href="tel:{{ $client->contact }}">
                                                    {{ $client->contact }}
                                                </a>
                                            @elseif($client->origine_demande === 'mail')
                                                <a href="mailto:{{ $client->contact }}">
                                                    {{ $client->contact }}
                                                </a>
                                            @else
                                                {{ $client->contact }}
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    
                                    @if($client->client_address)
                                    <tr>
                                        <th class="bg-light">
                                            <i class="fas fa-map-marker-alt me-2"></i>Adresse
                                        </th>
                                        <td>{{ $client->client_address }}</td>
                                    </tr>
                                    @endif
                                    
                                    @if($client->date_demande)
                                    <tr>
                                        <th class="bg-light">
                                            <i class="fas fa-calendar-alt me-2"></i>Date Demande
                                        </th>
                                        <td>{{ $client->date_demande }}</td>
                                    </tr>
                                    @endif
                                    
                                    @if($client->date_visite)
                                    <tr>
                                        <th class="bg-light">
                                            <i class="fas fa-calendar-check me-2"></i>Date Visite
                                        </th>
                                        <td>{{ $client->date_visite }}</td>
                                    </tr>
                                    @endif
                                    
                                    @if($client->origine_demande)
                                    <tr>
                                        <th class="bg-light">
                                            <i class="fas fa-tags me-2"></i>Origine Demande
                                        </th>
                                        <td>{{ $client->origine_demande }}</td>
                                    </tr>
                                    @endif
                                    
                                    @if($client->nom_commerciale)
                                    <tr>
                                        <th class="bg-light">
                                            <i class="fas fa-id-card me-2"></i>Nom Commercial
                                        </th>
                                        <td>{{ $client->nom_commerciale }}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <table class="table table-hover">
                                <tbody>
                                    @if($client->type_besoin)
                                    <tr>
                                        <th class="bg-light" style="width: 40%">
                                            <i class="fas fa-tasks me-2"></i>Type Besoin
                                        </th>
                                        <td>{{ $client->type_besoin }}</td>
                                    </tr>
                                    
                                    @if($client->type_besoin === 'autre' && isset($client->autre_besoin))
                                    <tr>
                                        <th class="bg-light">
                                            <i class="fas fa-info-circle me-2"></i>Précision du Besoin
                                        </th>
                                        <td>{{ $client->autre_besoin }}</td>
                                    </tr>
                                    @endif
                                    @endif
                                    
                                    @if($client->categorie_besoin && $client->type_besoin !== 'autre')
                                    <tr>
                                        <th class="bg-light">
                                            <i class="fas fa-layer-group me-2"></i>Catégorie Besoin
                                        </th>
                                        <td>{{ $client->categorie_besoin }}</td>
                                    </tr>
                                    @endif
                                    
                                    @if($client->nature_service && ($client->type_besoin === 'service' || $client->type_besoin === 'Service_et_Marchandise'))
                                    <tr>
                                        <th class="bg-light">
                                        <i class="fas fa-cogs me-2 text-muted"></i>Nature Service
                                        </th>
                                        <td>{{ $client->nature_service }}</td>
                                    </tr>
                                    @endif
                                    
                                    @if($client->marchandiz && ($client->type_besoin === 'Marchandise' || $client->type_besoin === 'Service_et_Marchandise'))
                                    <tr>
                                        <th class="bg-light">
                                            <i class="fas fa-shopping-cart me-2"></i>Marchandises
                                        </th>
                                        <td>{{ $client->marchandiz }}</td>
                                    </tr>
                                    @endif
                                    
                                    @if($client->type_cadence)
                                    <tr>
                                        <th class="bg-light">
                                            <i class="fas fa-sync-alt me-2"></i>Type Cadence
                                        </th>
                                        <td>{{ $client->type_cadence }}</td>
                                    </tr>
                                    
                                    @if($client->type_cadence === 'Autre' && isset($client->autre_type_cadence))
                                    <tr>
                                        <th class="bg-light">
                                            <i class="fas fa-info-circle me-2"></i>Précision Cadence
                                        </th>
                                        <td>{{ $client->autre_type_cadence }}</td>
                                    </tr>
                                    @endif
                                    @endif
                                    
                                    @if($client->intervention)
                                    <tr>
                                        <th class="bg-light">
                                            <i class="fas fa-tools me-2"></i>Intervention
                                        </th>
                                        <td>{{ $client->intervention }}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @if($client->detail_service)
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card bg-white">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="fas fa-info-circle me-2"></i>Détails du service
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <p>{{ $client->detail_service }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-master>