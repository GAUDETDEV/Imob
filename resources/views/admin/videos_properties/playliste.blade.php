
@extends('layouts.admin')

@section('title', $property->type)

@section('content')

    <div class="mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.properties.index') }}">propriétés</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.properties.show', $property->id) }}">Retour</a></li>
            </ol>
        </nav>
    </div>

    <div class="container mt-4">
        <h1>Playliste</h1>

        <button type="button" class="btn btn" data-bs-toggle="modal" data-bs-target="#addVideoModal" style="background-color: #212221; color: rgb(3, 216, 17);">Ajouter une video</button>

<!--zone d'inclusion de model-->
        @include('shared.modal.add_video')


        <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">

            @forelse($video_playlistes as $video_playliste)

            <div class="col">

                <div class="card h-100" style="box-shadow: 0 4px 8px 0 rgb(3, 216, 17), 0 6px 20px 0 rgb(3, 216, 17);">
                    <div class="card-body">
                        <video controls style="width: 100%;">
                            <source src="{{ Storage::url($video_playliste->file_path_video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div>
                            <h5 class="card-title" style="color: rgb(82, 159, 68); text-decoration: underline;">{{ $video_playliste->titre_video }}</h5>
                            <p class="card-text" style="color: rgb(49, 49, 49);">{!! nl2br($video_playliste->description_video) !!}</p>
                        </div>
                    </div>
                    <div class="card-footer mt-3">
                        <a href="{{route('admin.properties.video.edit',['video'=>$video_playliste->id])}}" class="btn btn" style="background-color: #639009; color: white;">Modifier</a>
                        <a href="{{route('admin.properties.video.destroy',['video'=>$video_playliste->id])}}" class="btn btn" style="background-color: #ee3c00; color: white;">Supprimer</a>
                    </div>
                </div>

            </div>

            @empty

            <div class="container" style="color:rgb(49, 49, 49); text-align: center; font-size: 3em;">
                <p>Aucune Vidéo</p>
                <i class="fa-solid fa-video fa-5x"></i>
            </div>

            @endforelse

        </div>
    </div>

@endsection






















