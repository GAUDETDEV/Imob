@extends('layouts.admin')

@section('title', 'Rapport des Achats')

@section('content')

    <div class="d-flex justify-content-between align-items-center mt-5">

        <h1>@yield('title')</h1>

    </div>

    <div class="container mt-5">

        <!--
        <div class="mt-3 container">

        </div>
        -->

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

                @forelse ($achats as $achat)
                <tr>
                    <td>{{ $achat->id }}</td>
                    <td>{{ $achat->property->type }}</td>
                    <td>{{ $achat->user->nom }}</td>
                    <td>{{ number_format($achat->amount, thousands_separator: ' ' ) }} frs</td>
                    <td>{{ $achat->transaction_date }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{route('admin.reports.achats.show', $achat->id)}}" class="btn btn" style="background-color: #0f0f0e; color: #639009;">Détails</a>
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
            {{$achats->links()}}
        </div>

    </div>

@endsection
