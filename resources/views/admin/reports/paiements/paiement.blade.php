@extends('layouts.admin')

@section('title', 'Rapport des Paiements')

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
                    <th>Transaction</th>
                    <th>Utilisateur</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($paiements as $paiement)
                <tr>
                    <td>{{ $paiement->id }}</td>
                    <td>{{ $paiement->transaction->type }}</td>
                    <td>{{ $paiement->transaction->user->nom }}</td>
                    <td>{{ number_format($paiement->montant, thousands_separator: ' ' ) }} frs</td>
                    <td>{{ $paiement->payment_date }}</td>
                    <td>{{ $paiement->statut }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{route('admin.reports.paiements.show', $paiement->id)}}" class="btn btn" style="background-color: #0f0f0e; color: #639009;">Détails</a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-danger">
                        Oups! aucun rapport n'a été généré!
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>
        <div class="container">
            {{$paiements->links()}}
        </div>

    </div>

@endsection
