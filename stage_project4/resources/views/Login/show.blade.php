<x-master title="Connexion">
    <h3>Connexion</h3>

    @if ($errors->any())
        <x-alert type="danger">
            <h6>Erreur(s) : </h6>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email ou Nom d'utilisateur</label>
            <input type="text" name="login" class="form-control" value="{{ old('login') }}" />
            @error('login')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Mot de Passe</label>
            <input type="password" name="password" class="form-control" />
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-grid my-2">
            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
        </div>
    </form>
</x-master>
