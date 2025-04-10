<x-master title="detail controller">

    <div class="container py-4">
        <div class="row mb-4">
            <div class="col">
                <h1 class="text-center mb-4">Détails de l'utilisateur</h1>
                <div class="d-flex justify-content-start mb-3">
                    @if ($user->role === 'technicien')
                    @if(Auth::check() && Auth::user()->role != 'technicien')
                    <a href="{{ route('users.techniciens') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Retour à la liste des technicien
                    </a>
                    @endif
                    @else
                    <a href="{{ route('users.commercials') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Retour à la liste des technicien
                    </a>
                    @endif
                
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="bg-light p-4 rounded shadow-sm">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <h2 class="border-bottom pb-2 mb-3 text-primary"> {{ $user->name }}</h2>
                            <h5 class="text-muted mb-3">email : {{ $user->email }}</h5>
                        </div>
                        @if(Auth::check() && Auth::user()->role != 'technicien')
                        <div class="col-md-4 text-md-end">
                            <div class="d-flex justify-content-md-end gap-2 mt-3">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit me-2"></i>Modifier
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Voulez-vous vraiment supprimer le compte')"
                                        class="btn btn-danger">
                                        <i class="fas fa-trash me-2"></i>Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-hover">
                                <tbody>


                                    <tr>
                                        <th class="bg-light">
                                            <i class="fas fa-map-marker-alt me-2"></i>email:
                                        </th>
                                        <td>{{ $user->email }}</td>
                                    </tr>

                                    <tr>
                                        <th class="bg-light">
                                        <i class="fas fa-phone me-2 text-muted"></i>phone :
                                        </th>
                                        <td>{{ $user->phone }}</td>
                                    </tr>

                                    <tr>
                                        <th class="bg-light">
                                        <i class="fas fa-id-card me-2 text-muted"></i>Cin :
                                        </th>
                                        <td>{{ $user->cin }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">
                                        <i class="fas fa-user-tag me-2 text-muted"></i>Rôle :
                                        </th>
                                        <td>{{ $user->role }}</td>
                                    </tr>
                                    @if ($user->role === 'technicien')
                                        <tr>
                                            <th class="bg-light">
                                            <i class="fas fa-map-marker-alt me-2 text-muted"></i>Address :
                                            </th>
                                            <td>{{ $user->address }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                            <i class="fas fa-cogs me-2 text-muted"></i>Speciality :
                                            </th>
                                            <td>{{ $user->speciality }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                            <i class="fas fa-briefcase me-2 text-muted"></i>Experience :
                                            </th>
                                            <td>{{ $user->experience }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                            <i class="fas fa-toggle-on me-2 text-muted"></i>Status :
                                            </th>
                                            <td>{{ $user->status }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

</x-master>