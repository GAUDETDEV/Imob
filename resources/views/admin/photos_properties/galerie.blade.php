
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
        <h1>Galérie Photo</h1>

        <button type="button" class="btn btn" data-bs-toggle="modal" data-bs-target="#addPhotoModal" style="background-color: #212221; color: rgb(3, 216, 17);">Ajouter une Photo</button>

<!--zone d'inclusion de model-->
        @include('shared.modal.add_photo')

        <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">

            @forelse($photo_galeries as $photo_galerie)

            <div class="col">

                <div class="card h-100" style=" box-shadow: 0 4px 8px 0 rgb(3, 216, 17), 0 6px 20px 0 rgb(3, 216, 17);">
                    <img src="{{ Storage::url($photo_galerie->file_path_photo) }}" class="card-img-top" alt="{{ $photo_galerie->titre_photo }}" style="width: 100%;">
                    <div class="card-body">

                        <div>
                            <h5 class="card-title" style="color: rgb(82, 159, 68); text-decoration: underline;">{{ $photo_galerie->titre_photo }}</h5>
                            <p class="card-text" style="color: rgb(49, 49, 49);">{!! nl2br($photo_galerie->description_photo) !!}</p>
                        </div>

                        <div class="card-footer mt-3">
                            <a href="{{route('admin.properties.photo.edit',['photo'=>$photo_galerie->id])}}" class="btn btn" style="background-color: #639009; color: white;">Modifier</a>
                            <a href="{{route('admin.properties.photo.destroy',['photo'=>$photo_galerie->id])}}" class="btn btn" style="background-color: #ee3c00; color: white;">Supprimer</a>
                        </div>

                    </div>
                </div>

            </div>

            @empty

            <div class="container" style="color:rgb(144, 144, 144); text-align: center; font-size: 3em;">
                <p>Aucune photo</p>
                <i class="fa-regular fa-image fa-5x"></i>
            </div>

            @endforelse
        </div>
    </div>

@endsection






















