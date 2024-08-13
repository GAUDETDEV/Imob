@extends('layouts.admin')

@section('title', 'Home')

@section('content')

    <div class="d-flex justify-content-between align-items-center mt-5">

        <h1 class="mb-4">Tableau de Bord</h1>

    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Utilisateurs</h5>
                        <p class="card-text">{{ $usersCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Propriétés</h5>
                        <p class="card-text">{{ $propertiesCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Transactions</h5>
                        <p class="card-text">{{ $transactionsCount }}</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="mt-5">Transactions Récentes</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Contrat ID</th>
                    <th>Montant</th>
                    <th>Type</th>
                    <th>Date de Paiement</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentTransactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->contrat_id }}</td>
                    <td>{{ number_format($transaction->amount, thousands_separator: ' ' )}} frs</td>
                    <td>{{ $transaction->type }}</td>
                    <td>{{ $transaction->transaction_date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h2 class="mt-5">Évolution des Transactions</h2>
        <canvas id="transactionsChart" width="400" height="200"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('transactionsChart').getContext('2d');
        const transactionsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($monthlyTransactions->map(fn($item) => Carbon\Carbon::create($item->month)->format('F Y'))),
                datasets: [{
                    label: 'Montant des Transactions',
                    data: @json($monthlyTransactions->pluck('total')),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


@endsection
