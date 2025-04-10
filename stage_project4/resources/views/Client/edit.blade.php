<x-master title="edit client">

    <div class="container mt-4">
        <h1 class="text-center mb-4">Modifier Client</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('clients.update', $client->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Client Name</label>
                            <input type="text" name="client_name" id="name" class="form-control"
                                value="{{ old('client_name', $client->client_name) }}">
                            @error('client_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="entreprise_name" class="form-label">Entreprise Name</label>
                            <input type="text" name="entreprise_name" id="text" class="form-control"
                                value="{{ old('entreprise_name', $client->entreprise_name) }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="date_demande" class="form-label">Date Demande</label>
                            <input type="date" name="date_demande" id="date_demande" class="form-control"
                                value="{{ old('date_demande', $client->date_demande) }}">
                            @error('date_demande')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="origine_demande" class="form-label">Origine de Demande</label>
                            <select name="origine_demande" id="status" class="form-select">
                                <option value="whatsapp" {{ old('origine_demande', $client->origine_demande) == 'whatsapp' ? 'selected' : '' }}>WhatsApp</option>
                                <option value="mail" {{ old('origine_demande', $client->origine_demande) == 'mail' ? 'selected' : '' }}>Mail</option>
                                <option value="direct" {{ old('origine_demande', $client->origine_demande) == 'direct' ? 'selected' : '' }}>Direct</option>
                            </select>
                            @error('origine_demande')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="col-md-4">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" name="contact" id="name" class="form-control"
                                value="{{ old('contact', $client->contact) }}">
                            @error('contact')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="type_besoin" class="form-label">Type De Besoin</label>
                            <select name="type_besoin" id="status" class="form-select">
                                <option value="service" {{ old('type_besoin', $client->type_besoin) == 'service' ? 'selected' : '' }}>Service</option>
                                <option value="Marchandise" {{ old('type_besoin', $client->type_besoin) == 'Marchandise' ? 'selected' : '' }}>Marchandise</option>
                                <option value="Service_et_Marchandise" {{ old('type_besoin', $client->type_besoin) == 'Service_et_Marchandise' ? 'selected' : '' }}>Service et Marchandise</option>
                                <option value="autre" {{ old('type_besoin', $client->type_besoin) == 'autre' ? 'selected' : '' }}>Autre</option>
                            </select>
                            @error('type_besoin')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="categorie_besoin" class="form-label">Categories de besoin</label>
                            <select name="categorie_besoin" id="status" class="form-select">
                                <option value="" {{ old('categorie_besoin', $client->categorie_besoin) == '' ? 'selected' : '' }}>Choisir une catégorie</option>
                                <option value="Nettoyage" {{ old('categorie_besoin', $client->categorie_besoin) == 'Nettoyage' ? 'selected' : '' }}>Nettoyage</option>
                                <option value="Climatisation" {{ old('categorie_besoin', $client->categorie_besoin) == 'Climatisation' ? 'selected' : '' }}>Climatisation</option>
                                <option value="Deratisation" {{ old('categorie_besoin', $client->categorie_besoin) == 'Deratisation' ? 'selected' : '' }}>Dératisation</option>
                                <option value="Surveillance" {{ old('categorie_besoin', $client->categorie_besoin) == 'Surveillance' ? 'selected' : '' }}>Surveillance</option>
                                <option value="Plomberie" {{ old('categorie_besoin', $client->categorie_besoin) == 'Plomberie' ? 'selected' : '' }}>Plomberie</option>
                                <option value="Serrurier" {{ old('categorie_besoin', $client->categorie_besoin) == 'Serrurier' ? 'selected' : '' }}>Serrurier</option>
                                <option value="Gardinnage" {{ old('categorie_besoin', $client->categorie_besoin) == 'Gardinnage' ? 'selected' : '' }}>Gardinnage</option>
                                <option value="Pienture" {{ old('categorie_besoin', $client->categorie_besoin) == 'Pienture' ? 'selected' : '' }}>Peinture</option>
                                <option value="Electricite" {{ old('categorie_besoin', $client->categorie_besoin) == 'Electricite' ? 'selected' : '' }}>Electricité</option>
                                <option value="Demenagement" {{ old('categorie_besoin', $client->categorie_besoin) == 'Demenagement' ? 'selected' : '' }}>Déménagement</option>
                                <option value="Amenagement" {{ old('categorie_besoin', $client->categorie_besoin) == 'Amenagement' ? 'selected' : '' }}>Aménagement</option>
                                <option value="Bricolage" {{ old('categorie_besoin', $client->categorie_besoin) == 'Bricolage' ? 'selected' : '' }}>Bricolage</option>
                                <option value="Anti_nuisibles" {{ old('categorie_besoin', $client->categorie_besoin) == 'Anti_nuisibles' ? 'selected' : '' }}>Anti nuisibles</option>
                                <option value="Autre" {{ old('categorie_besoin', $client->categorie_besoin) == 'Autre' ? 'selected' : '' }}>Autre</option>
                            </select>
                            @error('categorie_besoin')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="nature_service" class="form-label">Nature De Service</label>
                            <input type="text" name="nature_service" id="name" class="form-control"
                                value="{{ old('nature_service', $client->nature_service) }}">
                            @error('nature_service')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="marchandiz" class="form-label">Marchandise</label>
                            <input type="text" name="marchandiz" id="name" class="form-control"
                                value="{{ old('marchandiz', $client->marchandiz) }}">
                            @error('marchandiz')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nom_commerciale" class="form-label">Nom De Commercial</label>
                            <input type="text" name="nom_commerciale" id="name" class="form-control"
                                value="{{ old('nom_commerciale', $client->nom_commerciale) }}">
                        </div>

                        <div class="col-md-6">
                            <label for="date_visite" class="form-label">Date Visite</label>
                            <input type="date" name="date_visite" id="name" class="form-control"
                                value="{{ old('date_visite', $client->date_visite) }}">
                            @error('date_visite')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="type_cadence" class="form-label">Précisez la Type de cadence</label>
                        <select name="type_cadence" id="status" class="form-select">
                            <option value="Ponctuelle" {{ old('type_cadence', $client->type_cadence) == 'Ponctuelle' ? 'selected' : '' }}>Ponctuelle</option>
                            <option value="Reguliere" {{ old('type_cadence', $client->type_cadence) == 'Reguliere' ? 'selected' : '' }}>Régulière</option>
                            <option value="Autre" {{ old('type_cadence', $client->type_cadence) == 'Autre' ? 'selected' : '' }}>Autre</option>
                        </select>
                        @error('type_cadence')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="client_address" class="form-label">Address</label>
                        <input type="text" name="client_address" id="name" class="form-control"
                            value="{{ old('client_address', $client->client_address) }}">
                        @error('client_address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="intervention" class="form-label">Intervention</label>
                        <select name="intervention" id="status" class="form-select">
                            <option value="non_confirmer" {{ old('intervention', $client->intervention) == 'non_confirmer' ? 'selected' : '' }}>Non confirmée</option>
                            <option value="en_cour" {{ old('intervention', $client->intervention) == 'en_cour' ? 'selected' : '' }}>En cours</option>
                            <option value="terminer" {{ old('intervention', $client->intervention) == 'terminer' ? 'selected' : '' }}>Terminée</option>
                        </select>
                        @error('intervention')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="detail_service" class="form-label">Détail du service</label>
                            <textarea name="detail_service" id="name" class="form-control"
                                rows="4">{{ old('detail_service', $client->detail_service) }}</textarea>
                            @error('detail_service')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function toggleFields() {
                const typeBesoin = document.querySelector('select[name="type_besoin"]').value;
                const typeCadence = document.querySelector('select[name="type_cadence"]').value;

                const natureService = document.querySelector('input[name="nature_service"]').closest('.col-md-3');
                const marchandiz = document.querySelector('input[name="marchandiz"]').closest('.col-md-3');
                const categorieBesoin = document.querySelector('select[name="categorie_besoin"]').closest('.col-md-3');

                let autreBesoinInput = document.getElementById('autre_besoin_input');
                if (!autreBesoinInput) {
                    const newInput = document.createElement('div');
                    newInput.className = 'col-md-3';
                    newInput.id = 'autre_besoin_input';
                    newInput.innerHTML = `
                        <label for="autre_besoin" class="form-label">Précisez le type de besoin</label>
                        <input type="text" name="autre_besoin" class="form-control" value="{{ old('autre_besoin', $client->autre_besoin) }}" />
                    `;
                    categorieBesoin.parentNode.insertBefore(newInput, categorieBesoin.nextSibling);
                    autreBesoinInput = newInput;
                }

                autreBesoinInput.style.display = (typeBesoin === 'autre') ? 'block' : 'none';

                // Nature et Marchandiz
                natureService.style.display = (typeBesoin !== 'Marchandise' && typeBesoin !== 'autre') ? 'block' : 'none';
                marchandiz.style.display = (typeBesoin !== 'service' && typeBesoin !== 'autre') ? 'block' : 'none';
                categorieBesoin.style.display = (typeBesoin !== 'autre') ? 'block' : 'none';

                // Type cadence
                let autreCadenceInput = document.getElementById('autre_cadence_input');
                if (!autreCadenceInput) {
                    const parent = document.querySelector('select[name="type_cadence"]').closest('.col-md-6');
                    const newInput = document.createElement('div');
                    newInput.className = 'mt-2';
                    newInput.id = 'autre_cadence_input';
                    newInput.innerHTML = `
                        <label for="autre_type_cadence" class="form-label">Autre type de cadence</label>
                        <input type="text" name="autre_type_cadence" class="form-control" value="{{ old('autre_type_cadence', $client->autre_type_cadence) }}" />
                    `;
                    parent.appendChild(newInput);
                    autreCadenceInput = newInput;
                }

                autreCadenceInput.style.display = (typeCadence === 'Autre') ? 'block' : 'none';
            }

            // Initial call
            toggleFields();

            // Add event listeners
            document.querySelector('select[name="type_besoin"]').addEventListener('change', toggleFields);
            document.querySelector('select[name="type_cadence"]').addEventListener('change', toggleFields);
        });
    </script>
    @endpush

</x-master>
