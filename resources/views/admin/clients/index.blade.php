@extends('layouts.admin')

@section('title', 'liste clients')

@section('content')

    <div class="d-flex justify-content-between align-items-center mt-5">

        <h1>Clients</h1>

        <a href="{{route('admin.clients.create')}}" class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Ajoutez un client</a>

    </div>

    <div class="container mt-5">

        <div class="mt-3 container">
            @include('shared.form.filtre_client')
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Sexe</th>
                    <th>Nationalité</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($clients as $client)

                <tr>
                    <td>{{ $client->nom }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->telephone }}</td>
                    <td>{{ $client->adresse }}</td>
                    <td>{{ $client->ville }}</td>
                    <td>{{ $client->sexe }}</td>
                    <td>{{ $client->nationalite }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{route('admin.clients.edit', $client->id)}}" class="btn btn" style="background-color: #639009; color: white;">Modifier</a>
                            <a href="{{route('admin.clients.show', $client->id)}}" class="btn btn" style="background-color: #0f0f0e; color: #639009;">Détails</a>
                            <a href="{{route('admin.clients.destroy', $client->id)}}" class="btn btn" style="background-color: #ee3c00; color: white;">Supprimer</a>
                        </div>
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="8" class="text-center text-danger">
                        Oups! aucun client n'a été ajouté à la liste.
                    </td>
                </tr>

                @endforelse


            </tbody>

        </table>
        <div class="container">
            {{$clients->links()}}
        </div>

    </div>

@endsection
