
@extends('layouts.admin')

@section('title', $property->type)

@section('content')

<div class="mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.appointments.index') }}">Retour</a></li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header" style="background-color: rgb(53, 53, 53); color: rgb(0, 231, 62);">
        <h2>Détails du rendez-vous</h2>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col">
                <p><strong>Agent :</strong> {{ $agent->nom }}</p>
                <p><strong>Client :</strong> {{ $client->nom }}</p>
                <p><strong>Propriété :</strong> {{ $property->type }} d'une surperfie de {{ $property->surface }} m², située à {{ $property->ville }} ({{ $property->adresse }}) {{ $property->statut }} au prix de : {{ number_format($property->prix, thousands_separator: ' ' ) }} frs</p>
                <p><strong>Date et heure de début: :</strong> {{ $appointment->date_debut }}</p>
                <p><strong>Date et heure de fin:</strong> {{ $appointment->date_fin }}</p>
                <p><strong>Statut :</strong>
                    @if ($appointment->statut == 'prévu')
                    <span class="badge rounded-pill text-bg-primary">prévu</span>
                    @elseif ($appointment->statut == 'réalisé')
                    <span class="badge rounded-pill text-bg-success">réalisé</span>
                    @elseif ($appointment->statut == 'annulé')
                    <span class="badge rounded-pill text-bg-secondary">annulé</span>
                    @endif
                </p>
                <p><strong>Notes :</strong> {!! nl2br($appointment->notes) !!}</p>
            </div>

        </div>
    </div>
</div>


@endsection
