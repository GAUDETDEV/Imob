@extends('layouts.admin')

@section('title', 'Détails')

@section('content')

<div class="mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.contrats.index') }}">Retour</a></li>
        </ol>
    </nav>
</div>

    <h1>@yield('title')</h1>

    <div class="container mt-5">

        <div class="card">
            <div class="card-header" style="background-color: rgb(53, 53, 53); color: rgb(0, 231, 62);">
                <h2>Contrat de : {{ $contrat->type }}</h2>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col">
                        <p><strong>Type :</strong> {{ $contrat->type }}</p>
                        <p><strong>date de debut :</strong> {{ $contrat->date_debut }}</p>
                        <p><strong>date de fin :</strong> {{ $contrat->date_fin }}</p>
                        <p><strong>montant :</strong> {{ number_format($contrat->montant, thousands_separator: ' ' )}} Frs</p>
                        <p><strong>statut :</strong>
                            @if ($contrat->statut == 'actif')
                            <span class="badge rounded-pill text-bg-primary">acfif</span>
                            @elseif ($contrat->statut == 'terminé')
                            <span class="badge rounded-pill text-bg-success">terminé</span>
                            @elseif ($contrat->statut == 'annulé')
                            <span class="badge rounded-pill text-bg-secondary">annulé</span>
                            @endif
                        </p>
                        <p><strong>Description :</strong> {!! nl2br($contrat->description) !!}</p>
                    </div>
                    <div class="col">
                        <p><strong>Propriété :</strong> {{ $property->type }}</p>
                        <p><strong>Client :</strong> {{ $client->nom }}</p>
                        <p><strong>Agent :</strong> {{ $agent->nom }}</p>
                        <p><strong>date de création :</strong> {{ $contrat->created_at }}</p>
                        <p><strong>Dernière modification :</strong> {{ $contrat->updated_at }}</p>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
