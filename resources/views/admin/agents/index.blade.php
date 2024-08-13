@extends('layouts.admin')

@section('title', 'Agents')

@section('content')

    <div class="d-flex justify-content-between align-items-center mt-5">

        <h1>@yield('title')</h1>

        <a href="{{route('admin.agents.create')}}" class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Ajoutez un agent</a>

    </div>

    <div class="container mt-5">

        <div class="mt-3 container">
            @include('shared.form.filtre_agent')
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

                @forelse ($agents as $agent)

                <tr>
                    <td>{{ $agent->nom }}</td>
                    <td>{{ $agent->email }}</td>
                    <td>{{ $agent->telephone }}</td>
                    <td>{{ $agent->adresse }}</td>
                    <td>{{ $agent->ville }}</td>
                    <td>{{ $agent->sexe }}</td>
                    <td>{{ $agent->nationalite }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{route('admin.agents.edit', $agent->id)}}" class="btn btn" style="background-color: #639009; color: white;">Modifier</a>
                            <a href="{{route('admin.agents.show', $agent->id)}}" class="btn btn" style="background-color: #0f0f0e; color: #639009;">Détails</a>
                            <a href="{{route('admin.agents.destroy', $agent->id)}}" class="btn btn" style="background-color: #ee3c00; color: white;">Supprimer</a>
                        </div>
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="8" class="text-center text-danger">
                        Oups! aucun agent n'a été ajouté à la liste.
                    </td>
                </tr>

                @endforelse


            </tbody>

        </table>
        <div class="container">
            {{$agents->links()}}
        </div>

    </div>

@endsection
