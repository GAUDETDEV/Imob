@extends('layouts.admin')

@section('title', 'Détails de la Transaction')

@section('content')

    <div class="mt-5">
        <h1>@yield('title')</h1>
    </div>

    <div class="container mt-5">

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $paiement->id }}</td>
            </tr>
            <tr>
                <th>Contrat ID</th>
                <td>{{ $paiement->contrat_id }}</td>
            </tr>
            <tr>
                <th>Transaction ID</th>
                <td>{{ $paiement->transaction_id }}</td>
            </tr>
            <tr>
                <th>Montant</th>
                <td>{{ number_format($paiement->montant, thousands_separator: ' ' ) }} frs</td>
            </tr>
            <tr>
                <th>Statut</th>
                <td>{{ $paiement->statut }}</td>
            </tr>
            <tr>
                <th>Date de Paiement</th>
                <td>{{ $paiement->payment_date }}</td>
            </tr>
            <tr>
                <th>Mode de Paiement</th>
                <td>{{ $paiement->payment_methode }}</td>
            </tr>
            <tr>
                <th>Notes</th>
                <td>{{ $paiement->notes }}</td>
            </tr>
            <tr>
                <th>Date de Création</th>
                <td>{{ $paiement->created_at }}</td>
            </tr>
            <tr>
                <th>Date de Mise à Jour</th>
                <td>{{ $paiement->updated_at }}</td>
            </tr>
        </table>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Retour</a>
    </div>

@endsection
