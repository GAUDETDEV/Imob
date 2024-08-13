@extends('layouts.admin')

@section('title', "Ajdout d'option")

@section('content')

<div class="mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.options.properties.index') }}">Retour</a></li>
        </ol>
    </nav>
</div>

<h1>Ajouter une nouvelle option de propriété</h1>

<form class="vstack gap-2 mt-5" action="{{ route('admin.options.properties.store') }}" method="post" style="background-color: rgb(236, 236, 236); border-radius: 5px; padding: 20px;">

    @csrf
    @method('post')

    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="property_id" class="form-label">ID de la propriété</label>
                <select name="property_id" id="property_id" class="form-control">
                    @foreach($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->type }} - {{ $property->surface }} m² - {{ number_format($property->prix, thousands_separator: ' ' ) }} frs</option>
                    @endforeach
                </select>
                @if ($errors)
                @error('property_id')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="option_name" class="form-label">Nom de l'option</label>
                <input type="text" class="form-control" id="option_name" name="option_name">
                @if ($errors)
                @error('option_name')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="option_value" class="form-label">Valeur de l'option</label>
                <input type="text" class="form-control" id="option_value" name="option_value">
                @if ($errors)
                @error('option_value')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
    </div>

    <div class="mt-3">
        <div class="mb-3">
            <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Ajouter</button>
        </div>
    </div>

</form>

@endsection
