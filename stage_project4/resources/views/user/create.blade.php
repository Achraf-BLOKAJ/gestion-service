<x-master title="create commercial">
    <h3>Ajouter User</h3>
    @if ($errors->any())
        <x-alert type='danger'>
            <h6>Errors : </h6>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif
<div class="container mt-4">
<div class="row justify-content-center">
<div class="card">
<div class="card-body">
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Username</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="row mb-3">
        <div class="col-md-4">
            <label class="form-label">CIN</label>
            <input type="text" name="cin" class="form-control" value="{{ old('cin') }}" />
            @error('cin')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label class="form-label">Numéro de téléphone</label>
            <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}" />
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label class="form-label">Mot de Passe</label>
            <input type="password" name="password" class="form-control" />
        </div>
        <div class="col-md-6">
            <label class="form-label">Confirmation de Mot de Passe</label>
            <input type="password" name="password_confirmation" class="form-control" />
        </div>
        <div class="col-md-6">
            <label class="form-label">Rôle</label>
            <select name="role" id="role" class="form-control" required>
                                    <option value="">Choisissez le Rôle</option>
                                    @if(Auth::check() && Auth::user()->role != 'commercial')
                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="commercial" {{ old('role') == 'commercial' ? 'selected' : '' }}>Commercial</option>
                                    @endif
                                    <option value="technicien" {{ old('role') == 'technicien' ? 'selected' : '' }}>Technicien</option>
                                </select>
            @error('role')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Formulaire supplémentaire pour Technicien -->
        <div id="technicien-form" style="display: none;">
        <div class="row mb-3">
        <div class="col-md-6">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}" />
                @error('address')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Speciality</label>
                <select name="speciality" id="speciality" class="form-control">
                <option value="" {{ old('categorie_besoin') == '' ? 'selected' : '' }}>Choisir une catégorie</option>
                                    <option value="Nettoyage" {{ old('categorie_besoin') == 'Nettoyage' ? 'selected' : '' }}>Nettoyage</option>
                                    <option value="Climatisation" {{ old('categorie_besoin') == 'Climatisation' ? 'selected' : '' }}>Climatisation</option>
                                    <option value="Deratisation" {{ old('categorie_besoin') == 'Deratisation' ? 'selected' : '' }}>Dératisation</option>
                                    <option value="Surveillance" {{ old('categorie_besoin') == 'Surveillance' ? 'selected' : '' }}>Surveillance</option>
                                    <option value="Plomberie" {{ old('categorie_besoin') == 'Plomberie' ? 'selected' : '' }}>Plomberie</option>
                                    <option value="Serrurier" {{ old('categorie_besoin') == 'Serrurier' ? 'selected' : '' }}>Serrurier</option>
                                    <option value="Gardinnage" {{ old('categorie_besoin') == 'Gardinnage' ? 'selected' : '' }}>Gardinnage</option>
                                    <option value="Pienture" {{ old('categorie_besoin') == 'Pienture' ? 'selected' : '' }}>Peinture</option>
                                    <option value="Electricite" {{ old('categorie_besoin') == 'Electricite' ? 'selected' : '' }}>Electricité</option>
                                    <option value="Demenagement" {{ old('categorie_besoin') == 'Demenagement' ? 'selected' : '' }}>Déménagement</option>
                                    <option value="Amenagement" {{ old('categorie_besoin') == 'Amenagement' ? 'selected' : '' }}>Aménagement</option>
                                    <option value="Bricolage" {{ old('categorie_besoin') == 'Bricolage' ? 'selected' : '' }}>Bricolage</option>
                                    <option value="Anti_nuisibles" {{ old('categorie_besoin') == 'Anti_nuisibles' ? 'selected' : '' }}>Anti nuisibles</option>
                                    <option value="Autre" {{ old('categorie_besoin') == 'Autre' ? 'selected' : '' }}>Autre</option>
                </select>
                @error('speciality')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            </div>
            <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="experience">Experience</label>
                <input type="number" name="experience" id="experience" class="form-control"
                    value="{{ old('experience') }}">
                @error('experience')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="status">Status</label>
                <select name="status" id="status" class="form-control">
                                        <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                @error('status')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
        </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-block">
                Enregistrer
            </button>
        </div>
    </form>

    <script>
        // Afficher ou cacher le formulaire supplémentaire pour technicien
        document.getElementById('role').addEventListener('change', function () {
            const role = this.value;
            if (role === 'technicien') {
                document.getElementById('technicien-form').style.display = 'block';
            } else {
                document.getElementById('technicien-form').style.display = 'none';
            }
        });
    </script>

</x-master>