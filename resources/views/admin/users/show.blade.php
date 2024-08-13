@extends('layouts.admin')

@section('title', 'Détails de l\'utilisateur')

@section('content')

    <div class="mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.users.index') }}">Retour</a></li>
            </ol>
        </nav>
    </div>

    <div class="container mt-5">
        <h1>@yield('title')</h1>

        <div class="card">
            <div class="card-header" style="background-color: rgb(53, 53, 53); color: rgb(0, 231, 62);">
                <h2>{{ $user->role }} : {{ $user->nom }} {{ $user->prenom }}</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        @if ($user->photo_profil)
                            <img src="{{ Storage::url($user->photo_profil) }}" alt="{{ $user->photo_profil }}" style="width: 12rem; height:16rem; border-radius: 10px;">
                        @else
                            <img src="{{ asset('https://ehealth-freelancer.at/wp-content/uploads/2023/04/icon_laravel.png') }}" alt="image" style="width: 12rem; height: 16rem; border-radius: 10px;">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                            <li class="list-group-item"><strong>Téléphone:</strong> {{ $user->telephone }}</li>
                            <li class="list-group-item"><strong>Adresse:</strong> {{ $user->adresse }}</li>
                            <li class="list-group-item"><strong>Ville:</strong> {{ $user->ville }}</li>
                            <li class="list-group-item"><strong>État:</strong>
                                @if ($user->etat == 'actif')
                                <span class="badge rounded-pill text-bg-success">Actif</span>
                                @elseif ($user->etat == 'inactif')
                                <span class="badge rounded-pill text-bg-secondary">Inactif</span>
                                @endif
                            </li>
                            <li class="list-group-item"><strong>Code Postal:</strong> {{ $user->code_postal }}</li>
                            <li class="list-group-item"><strong>Pays:</strong> {{ $user->pays }}</li>
                            <li class="list-group-item"><strong>Rôle:</strong> {{ ucfirst($user->role) }}</li>
                            <li class="list-group-item"><strong>Mot de passe:</strong> <a class="btn btn" data-bs-toggle="modal" data-bs-target="#modifyPasswordModal" style="background-color: rgb(1, 249, 59); color: rgb(0, 0, 0);">Modifier</a> @include('shared.modal.modify_password') </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
