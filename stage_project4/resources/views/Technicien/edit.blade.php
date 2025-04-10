<x-master title="edit technicien">

        <h1 class="d-flex justify-content-center" >Modifier techniciens</h1>

        <div>
                    <div class="form-group --}}
            <form action="{{ route('techniciens.update',['technicien'=> $technicien->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="technicien-name" id="name" class="form-control" value="{{ $technicien->name }}">
                        @error('technicien-name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group
                    ">
                        <label for="email">Email</label>
                        <input type="email" name="technicien-email" id="email" class="form-control" value="{{ $technicien->email }}">
                        @error('technicien-email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="technicien-address" id="address" class="form-control" value="{{ $technicien->address }}">
                        @error('technicien-address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="technicien-phone" id="phone" class="form-control" value="{{ $technicien->phone }}">
                        @error('technicien-phone ')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="speciality">Speciality</label>
                        <select name="technicien-speciality" id="speciality" class="form-control">
                            <option value="electricien">Electricien</option>
                            <option value="plombier">Plombier</option>
                            <option value="menuisier">Menuisier</option>
                            <option value="peintre">Peintre</option>
                        </select>
                        @error('technicien-speciality')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                    <label for="experience">Experience</label>
                    <input type="number" name="technicien-experience" id="experience" class="form-control" value="{{ $technicien->experience }}">
                    @error('technicien-experience')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>
                    <div class="form-group
                    ">
                    <label for="status">status</label>
                    <select name="technicien-status" id="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    @error('technicien-status')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
                </div>

            
                
        </div>

</x-master>