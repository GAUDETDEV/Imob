@extends('layouts.admin')

@section('title', 'Détails')

@section('content')

<div class="mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.agents.index') }}">Retour</a></li>
        </ol>
    </nav>
</div>

    <h1>@yield('title')</h1>

    <div class="container mt-5">

        <div class="card">
            <div class="card-header" style="background-color: rgb(53, 53, 53); color: rgb(0, 231, 62);">
                <h2>{{ $agent->nom }}</h2>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col">
                        <p><strong>Email :</strong> {{ $agent->email }}</p>
                        <p><strong>Telephone :</strong> {{ $agent->telephone }}</p>
                        <p><strong>Adresse :</strong> {{ $agent->adresse }}</p>
                        <p><strong>Ville :</strong> {{ $agent->ville }}</p>
                        <p><strong>Code Postal :</strong> {{ $agent->code_postal }}</p>
                        <p><strong>Date de Naissance :</strong> {{ $agent->date_naissance }}</p>
                    </div>
                    <div class="col">
                        <p><strong>Sexe :</strong> {{ $agent->sexe }}</p>
                        <p><strong>Nationalité :</strong> {{ $agent->nationalite }}</p>
                        <p><strong>Numéro d'Identification :</strong> {{ $agent->numero_identification }}</p>
                        <p><strong>Spécialisté :</strong> {{ $agent->specialite }}</p>
                        <p><strong>Biographie :</strong> {!! nl2br($agent->biographie) !!}</p>
                    </div>
                    <div class="col">
                        <p><strong>Photo</strong></p>
                        <img src="{{ Storage::url($agent->photo_profil) }}" alt="{{ $agent->photo_profil }}" style="width: 150px; height: 150px; border-radius: 10px;">
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
