
@extends('layouts.admin')

@section('title', $photo->titre_photo)

@section('content')

    <div class="mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ url()->previous() }}">Retour</a></li>
            </ol>
        </nav>
    </div>

    <h1> {{$photo->titre_photo}} </h1>

    <div class="container mt-4" style="background-color: rgb(236, 236, 236); border-radius: 10px; padding: 10px;">
        <form action="{{route('admin.properties.photo.update',['photo' => $photo->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group mt-3">
                <label for="photo" class="form-label">Importer une photo:</label>
                <input type="file" class="form-control-file" id="photo" name="photo">
                @if ($errors)
                @error('photo')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
            <div class="form-group mt-3">
                <label for="titre_photo" class="form-label">Donnez un titre à la photo:</label>
                <input type="text" class="form-control" id="titre_photo" name="titre_photo" value="{{ $photo->titre_photo }}">
                @if ($errors)
                @error('titre_photo')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
            <div class="form-group mt-3">
                <label for="description_photo" class="form-label">Faite une petite description de la photo:</label>
                <textarea class="form-control" id="description_photo" name="description_photo">{{ $photo->description_photo }}</textarea>
                @if ($errors)
                @error('description_photo')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
            <button type="submit" class="btn btn mt-3" style="background-color: #212221; color: rgb(3, 216, 17);">Modifier</button>
        </form>
    </div>

@endsection






















