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
                <td>{{ $vente->id }}</td>
            </tr>
            <tr>
                <th>Contrat ID</th>
                <td>{{ $vente->contrat_id }}</td>
            </tr>
            <tr>
                <th>Montant</th>
                <td>{{ number_format($vente->amount, thousands_separator: ' ' ) }} frs</td>
            </tr>
            <tr>
                <th>Statut</th>
                <td>{{ $vente->type }}</td>
            </tr>
            <tr>
                <th>Date de Paiement</th>
                <td>{{ $vente->transaction_date }}</td>
            </tr>
            <tr>
                <th>Mode de Paiement</th>
                <td>{{ $payment_methode }}</td>
            </tr>
            <tr>
                <th>Notes</th>
                <td>{{ $notes }}</td>
            </tr>
            <tr>
                <th>Date de Création</th>
                <td>{{ $vente->created_at }}</td>
            </tr>
            <tr>
                <th>Date de Mise à Jour</th>
                <td>{{ $vente->updated_at }}</td>
            </tr>
        </table>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Retour</a>
    </div>

@endsection
