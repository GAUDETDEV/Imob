@extends('layouts.admin')

@section('title', 'Utilisateurs')

@section('content')

    <div class="d-flex justify-content-between align-items-center mt-5">

        <h1>@yield('title')</h1>

        <a href="{{route('admin.users.create')}}" class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Ajoutez un utilisateur</a>

    </div>

    <div class="container mt-5">

        <div class="mt-3 container">
            @include('shared.form.filtre_user')
        </div>

        <div class="mb-3">
            <a href="{{ route('admin.users.export.pdf') }}" class="btn btn" style="background-color: #cc2306; color: rgb(251, 251, 251);">Télécharger en PDF</a>
            <a href="{{ route('admin.users.export.excel') }}" class="btn btn" style="background-color: rgb(41, 109, 45); color: #ffffff;">Télécharger en Excel</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Ville</th>
                    <th>Etat</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($users as $user)

                <tr>
                    <td>
                        @if ($user->photo_profil)
                            <img src="{{ Storage::url($user->photo_profil) }}" alt="{{ $user->photo_profil }}" style="width: 3rem; height: 3rem;">
                        @else
                            <img src="{{ asset('https://ehealth-freelancer.at/wp-content/uploads/2023/04/icon_laravel.png') }}" alt="image" style="width: 4rem; height: 4rem; border-radius: 10rem;">
                        @endif
                    </td>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->telephone }}</td>
                    <td>{{ $user->ville }}</td>
                    <td>
                        @if ($user->etat == 'actif')
                        <span class="badge rounded-pill text-bg-success">Actif</span>
                        @elseif ($user->etat == 'inactif')
                        <span class="badge rounded-pill text-bg-secondary">Inactif</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn" style="background-color: #639009; color: white;">Modifier</a>
                            <a href="{{route('admin.users.show', $user->id)}}" class="btn btn" style="background-color: #0f0f0e; color: #639009;">Détails</a>
                            @if($user->etat == "inactif")
                            <a href="{{route('admin.users.destroy', $user->id)}}" class="btn btn" style="background-color: #ee3c00; color: white;">Supprimer</a>
                            @endif
                        </div>
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="6" class="text-center text-danger">
                        Oups! aucun user n'a été ajouté à la liste.
                    </td>
                </tr>

                @endforelse


            </tbody>

        </table>
        <div class="container">
            {{ $users->appends(['query' => request('query')])->links() }}
        </div>

    </div>

@endsection
