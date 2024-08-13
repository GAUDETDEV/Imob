@extends('layouts.admin')

@section('title', 'Liste rendez-vous')

@section('content')

    <div class="d-flex justify-content-between align-items-center mt-5">

        <h1>@yield('title')</h1>

        <a href="{{route('admin.appointments.create')}}" class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Planifier</a>

    </div>

    <div class="container mt-5">


        <div class="mt-3 container">
            @include('shared.form.filtre_appointment')
        </div>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Agent</th>
                    <th>Client</th>
                    <th>Propriété</th>
                    <th>Début</th>
                    <th>Fin</th>
                    <th>Statut</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($appointments as $appointment)

                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->agent->nom }}</td>
                    <td>{{ $appointment->client->nom }}</td>
                    <td>{{ $appointment->property->type }}</td>
                    <td>{{ $appointment->date_debut }}</td>
                    <td>{{ $appointment->date_fin }}</td>
                    <td>
                        @if ($appointment->statut == 'prévu')
                        <span class="badge rounded-pill text-bg-primary">prévu</span>
                        @elseif ($appointment->statut == 'réalisé')
                        <span class="badge rounded-pill text-bg-success">réalisé</span>
                        @elseif ($appointment->statut == 'annulé')
                        <span class="badge rounded-pill text-bg-secondary">annulé</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            @if ($appointment->statut == 'prévu')
                            <a href="{{route('admin.appointments.edit', $appointment->id)}}" class="btn btn" style="background-color: #639009; color: white;">Modifier</a>
                            @endif
                            <a href="{{route('admin.appointments.show', $appointment->id)}}" class="btn btn" style="background-color: #0f0f0e; color: #639009;">Détails</a>
                            <a href="{{route('admin.appointments.destroy', $appointment->id)}}" class="btn btn" style="background-color: #ee3c00; color: white;">Supprimer</a>
                        </div>
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="8" class="text-center text-danger">
                        Oups! aucun rendez-vous n'a été ajouté à la liste.
                    </td>
                </tr>

                @endforelse


            </tbody>

        </table>
        <div class="container">
            {{$appointments->links()}}
        </div>

    </div>

@endsection
