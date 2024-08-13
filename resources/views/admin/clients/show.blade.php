@extends('layouts.admin')

@section('title', 'Détails')

@section('content')

<div class="mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.clients.index') }}">Retour</a></li>
        </ol>
    </nav>
</div>

    <h1>@yield('title')</h1>

    <div class="container mt-5">

        <div class="card">
            <div class="card-header" style="background-color: rgb(53, 53, 53); color: rgb(0, 231, 62);">
                <h2>{{ $client->nom }}</h2>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col">
                        <p><strong>Email :</strong> {{ $client->email }}</p>
                        <p><strong>Telephone :</strong> {{ $client->telephone }}</p>
                        <p><strong>Adresse :</strong> {{ $client->adresse }}</p>
                        <p><strong>Ville :</strong> {{ $client->ville }}</p>
                        <p><strong>Code Postal :</strong> {{ $client->code_postal }}</p>
                        <p><strong>Date de Naissance :</strong> {{ $client->date_naissance }}</p>
                    </div>
                    <div class="col">
                        <p><strong>Sexe :</strong> {{ $client->sexe }}</p>
                        <p><strong>Nationalité :</strong> {{ $client->nationalite }}</p>
                        <p><strong>Numéro d'Identification :</strong> {{ $client->numero_identification }}</p>
                        <p><strong>Biographie :</strong> {!! nl2br($client->biographie) !!}</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('admin.clients.index') }}" class="btn btn" style="background-color: rgb(1, 247, 42); color: rgb(3, 3, 3);">Retour à la liste des clients</a>
        </div>

    </div>

@endsection
