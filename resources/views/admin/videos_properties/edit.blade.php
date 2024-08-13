
@extends('layouts.admin')

@section('title', $video->titre_video)

@section('content')

    <div class="mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ url()->previous() }}">Retour</a></li>
            </ol>
        </nav>
    </div>

    <h1> {{$video->titre_video}} </h1>

    <div class="container mt-4" style="background-color: rgb(236, 236, 236); border-radius: 10px; padding: 10px;">
        <form action="{{route('admin.properties.video.update',['video' => $video->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group mt-3">
                <label for="video" class="form-label">Importer une video:</label>
                <input type="file" class="form-control-file" id="video" name="video">
                @if ($errors)
                @error('video')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
            <div class="form-group mt-3">
                <label for="titre_video" class="form-label">Donnez un titre à la video:</label>
                <input type="text" class="form-control" id="titre_video" name="titre_video" value="{{ $video->titre_video }}">
                @if ($errors)
                @error('titre_video')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
            <div class="form-group mt-3">
                <label for="description_video" class="form-label">Faite une petite description de la video:</label>
                <textarea class="form-control" id="description_video" name="description_video">{{ $video->description_video }}</textarea>
                @if ($errors)
                @error('description_video')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
            <button type="submit" class="btn btn mt-3" style="background-color: #212221; color: rgb(3, 216, 17);">Modifier</button>
        </form>
    </div>

@endsection






















