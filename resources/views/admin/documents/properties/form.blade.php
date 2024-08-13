@extends('layouts.admin')

@section('title', "Enregistrer un document")

@section('content')

<div class="mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.documents.properties.index') }}">Retour</a></li>
        </ol>
    </nav>
</div>

<h1>@yield("title")</h1>

<form class="vstack gap-2 mt-5" action="{{ route('admin.documents.properties.store') }}" method="post" enctype="multipart/form-data" style="background-color: rgb(236, 236, 236); border-radius: 5px; padding: 20px;">

    @csrf
    @method('post')

    <div class="row">

        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="mb-3">
                <label for="property_id" class="form-label">Propriété</label>
                <select name="property_id" id="property_id" class="form-control">
                    @foreach($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->type }} - {{ $property->statut }} au prix de {{ number_format($property->prix, thousands_separator: ' ' ) }} frs </option>
                    @endforeach
                </select>
                @if ($errors)
                @error('property_id')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="mb-3">
                <label for="document_name" class="form-label">Nom du document</label>
                <input type="text" class="form-control" name="document_name" id="document_name" class="form-control">
                @if ($errors)
                @error('document_name')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="mb-3">
                <label for="document_type" class="form-label">Type de document</label>
                <select name="document_type" id="document_type" class="form-control">
                    <option value="pdf" selected>PDF</option>
                    <option value="xlsx">Excel</option>
                    <option value="docs">Word</option>
                    <option value="txt">Texte</option>
                    <option value="doc">Document</option>
                    <option value="autres">Autres</option>
                </select>
                @if ($errors)
                @error('document_type')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="mb-3">
                <label for="document">Fichier</label>
                <input type="file" name="document" id="document" class="form-control">
                @if ($errors)
                @error('document')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="description" name="description" id="description" class="form-control">
                @if ($errors)
                @error('description')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
    </div>

    <div class="mt-3">
        <div class="mb-3">
            <button type="submit" class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Télécharger</button>
        </div>
    </div>

</form>

@endsection
