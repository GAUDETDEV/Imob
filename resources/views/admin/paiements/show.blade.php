@extends('layouts.admin')

@section('title', 'Détails')

@section('content')

<div class="mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.paiements.index') }}">Retour</a></li>
        </ol>
    </nav>
</div>

    <h1>@yield('title')</h1>

    <div class="container mt-5">

        <div class="card">
            <div class="card-header" style="background-color: rgb(53, 53, 53); color: rgb(0, 231, 62);">
                Paiement # {{ $paiement->id }}
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Montant : {{ number_format($paiement->montant, thousands_separator: ' ' ) }} frs</h5>
                        <p class="card-text"><strong>Contrat ID :</strong> {{ $paiement->contrat_id }}</p>
                        <p class="card-text"><strong>Statut :</strong>
                            @if ($paiement->statut == 'en attente')
                            <span class="badge rounded-pill text-bg-secondary">en attente</span>
                            @elseif ($paiement->statut == 'complet')
                            <span class="badge rounded-pill text-bg-success">complet</span>
                            @elseif ($paiement->statut == 'échoué')
                            <span class="badge rounded-pill text-bg-danger">échoué</span>
                            @endif
                        </p>
                        <p class="card-text"><strong>Date de paiement :</strong> {{ $paiement->payment_date }}</p>
                        <p class="card-text"><strong>Méthode de paiement :</strong> {{ $paiement->payment_methode }}</p>
                        @if($paiement->notes)
                            <p class="card-text"><strong>Notes :</strong> {{ $paiement->notes }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
