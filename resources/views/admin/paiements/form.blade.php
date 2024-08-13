@extends('layouts.admin')

@section('title', $paiement->exists ? "Editez un paiement" : "Enregistrer un paiement")

@section('content')

<div class="mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.paiements.index') }}">Retour</a></li>
        </ol>
    </nav>
</div>

<h1>@yield("title")</h1>

<form class="vstack gap-2 mt-5" action="{{ route($paiement->exists ? 'admin.paiements.update' : 'admin.paiements.store', $paiement) }}" method="post" style="background-color: rgb(236, 236, 236); border-radius: 5px; padding: 20px;">

    @csrf
    @method($paiement->exists ? 'put' : 'post')

    <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="contrat_id" class="form-label">Type de contrat</label>
                <select name="contrat_id" id="contrat_id" class="form-control">
                    @foreach($contrats as $contrat)
                        <option value="{{ $contrat->id }}">{{ $contrat->type }} - {{ $contrat->statut }} de {{ number_format($contrat->montant, thousands_separator: ' ' ) }} frs </option>
                    @endforeach
                </select>
                @if ($errors)
                @error('contrat_id')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="statut" class="form-label">Statut</label>
                <select name="statut" id="statut" class="form-control">
                    <option value="en attente">En attente</option>
                    <option value="complet">Complet</option>
                    <option value="échoué">Echoué</option>
                </select>
                @if ($errors)
                @error('statut')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="montant" class="form-label">Montant</label>
                <input type="text" name="montant" id="montant" class="form-control" value="{{ $paiement->montant }}">
                @if ($errors)
                @error('montant')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="payment_date" class="form-label">Date paiement</label>
                <input type="datetime-local" name="payment_date" id="payment_date" class="form-control" value="{{ $paiement->payment_date }}">
                @if ($errors)
                @error('payment_date')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="payment_methode" class="form-label">Méthode paiement</label>
                <input type="text" name="payment_methode" id="payment_methode" class="form-control" value="{{ $paiement->payment_methode }}">
                @if ($errors)
                @error('payment_methode')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="notes" class="form-label">Notes</label>
                <input type="text" name="notes" id="notes" class="form-control" value="{{ $paiement->notes }}">
                @if ($errors)
                @error('notes')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>

    </div>

    <div class="mt-3">
        <div class="mb-3">
            @if ($paiement->exists)
                <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Mettre à jour</button>
            @else
                <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Ajouter</button>
            @endif
        </div>
    </div>

</form>

@endsection
