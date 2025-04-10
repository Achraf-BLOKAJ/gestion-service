<form action="{{ route('technicien.store', ['user_id' => $user->id]) }}" method="POST">
    @csrf
    <div class="form-group">
        <input type="hidden" name="user_id" value="{{ $user->id }}" />
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
            @error('address')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="speciality">Speciality</label>
            <select name="speciality" id="speciality" class="form-control">
                <option value="electricien">Electricien</option>
                <option value="plombier">Plombier</option>
                <option value="menuisier">Menuisier</option>
                <option value="peintre">Peintre</option>
            </select>
            @error('speciality')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="experience">Experience</label>
            <input type="number" name="experience" id="experience" class="form-control"
                value="{{ old('experience') }}">
            @error('experience')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
            @error('status')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
