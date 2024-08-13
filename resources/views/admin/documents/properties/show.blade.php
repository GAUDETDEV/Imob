@extends('layouts.admin')

@section('title', 'Document détaillé')

@section('content')

<div class="mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ url()->previous() }}">Retour</a></li>
        </ol>
    </nav>
</div>

    <h1>Détails du document de propriété</h1>

<div class="container mt-5">

    <div class="card mb-4">
        <div class="card-header" style="background-color: rgb(53, 53, 53); color: rgb(0, 231, 62);">
            <h5 class="card-title">{{ $document->document_name }}</h5>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>Type :</strong> {{ $document->document_type }}</p>
            <p class="card-text"><strong>Description :</strong> {{ $document->description }}</p>
            <p class="card-text"><strong>Date de téléchargement :</strong> {{ $document->upload_date }}</p>
            <p class="card-text"><strong>Fichier :</strong> <a class="btn btn" href="{{ Storage::url($document->file_path) }}" target="_blank" style="background-color: rgb(53, 53, 53); color: rgb(0, 231, 62);">Télécharger</a></p>
        </div>
    </div>

</div>

@endsection
