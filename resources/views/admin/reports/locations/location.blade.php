@extends('layouts.admin')

@section('title', 'Rapport des Locations')

@section('content')

    <div class="d-flex justify-content-between align-items-center mt-5">

        <h1>@yield('title')</h1>

    </div>

    <div class="container mt-5">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Propriété</th>
                    <th>Utilisateur</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($locations as $location)
                <tr>
                    <td>{{ $location->id }}</td>
                    <td>{{ $location->property->type }}</td>
                    <td>{{ $location->user->nom }}</td>
                    <td>{{ number_format($location->amount, thousands_separator: ' ' ) }} frs</td>
                    <td>{{ $location->transaction_date }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{route('admin.reports.locations.show', $location->id)}}" class="btn btn" style="background-color: #0f0f0e; color: #639009;">Détails</a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-danger">
                        Oups! aucun rapport n'a été généré!
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>
        <div class="container">
            {{$locations->links()}}
        </div>

    </div>

@endsection
