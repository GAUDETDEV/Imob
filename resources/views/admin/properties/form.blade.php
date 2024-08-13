@extends('layouts.admin')

@section('title', $property->exists ? "Editez un bien" : "Creez un bien")

@section('content')

<div class="mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.properties.index') }}">Retour</a></li>
        </ol>
    </nav>
</div>

<h1>@yield("title")</h1>

<form class="vstack gap-2 mt-5" action="{{ route($property->exists ? 'admin.properties.update' : 'admin.properties.store', $property) }}" method="post" style="background-color: rgb(236, 236, 236); border-radius: 5px; padding: 20px;">

    @csrf
    @method($property->exists ? 'put' : 'post')

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" name="adresse" id="adresse" value="{{$property->adresse}}">
                @if ($errors)
                @error('adresse')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" class="form-control" name="ville" id="ville" value="{{$property->ville}}">
                @if ($errors)
                @error('ville')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="code_postal" class="form-label">Code postal</label>
                <input type="text" class="form-control" name="code_postal" id="code_postal" value="{{$property->code_postal}}">
                @if ($errors)
                @error('code_postal')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" name="type" id="type" value="{{$property->type}}">
                @if ($errors)
                @error('type')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="surface" class="form-label">Surface en m²</label>
                <input type="number" class="form-control" name="surface" id="surface" value="{{$property->surface}}">
                @if ($errors)
                @error('surface')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="number" class="form-control" name="prix" id="prix" value="{{$property->prix}}">
                @if ($errors)
                @error('prix')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 d-none">
            <div class="mb-3">
                <label for="statut" class="form-label">Statut</label>
                <select id="statut" class="form-control" name="statut" required>
                    <option selected value="disponible">disponible</option>
                    <option value="vendu">vendu</option>
                    <option value="loué">loué</option>
                    <option value="acheté">acheté</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="mb-3">
                <label for="etat" class="form-label">Etat</label>
                <select id="etat" class="form-control" name="etat" required>
                    <option value="achat">Achat</option>
                    <option value="vente">Vente</option>
                    <option value="location">Location</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="" cols="5" rows="10">{{$property->description}}</textarea>
                @if ($errors)
                @error('description')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
    </div>

    <div class="container">
        <div class="mb-3">
            @if ($property->exists)
                <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Mettre à jour</button>
            @else
                <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Creér</button>
            @endif
        </div>
    </div>


</form>


@endsection
