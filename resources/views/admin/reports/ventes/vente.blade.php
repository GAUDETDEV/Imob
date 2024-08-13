@extends('layouts.admin')

@section('title', 'Rapport des Ventes')

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

                @forelse ($ventes as $vente)
                <tr>
                    <td>{{ $vente->id }}</td>
                    <td>{{ $vente->property->type }}</td>
                    <td>{{ $vente->user->nom }}</td>
                    <td>{{ number_format($vente->amount, thousands_separator: ' ' ) }} frs</td>
                    <td>{{ $vente->transaction_date}}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{route('admin.reports.ventes.show', $vente->id)}}" class="btn btn" style="background-color: #0f0f0e; color: #639009;">Détails</a>
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
            {{$ventes->links()}}
        </div>

    </div>

@endsection
