
@extends('layouts.admin')

@section('title', $property->type)

@section('content')

<div class="mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.properties.index') }}">Retour</a></li>
        </ol>
    </nav>
</div>


<div class="container mt-4">

    <h1>
        {{ $property->type }} - {{ $property->surface }} m²

        @if ($property->etat == 'Achat')
        <span class="badge retatounded-pill text-bg-danger">Achat</span>
        @elseif ($property->etat == 'Vente')
        <span class="badge rounded-pill text-bg-danger">Vente</span>
        @elseif ($property->etat == 'Location')
        <span class="badge rounded-pill text-bg-danger">Location</span>
        @endif

    </h1>

<!--section affichage des medias-->

    <div class="container mt-5">
        @include('shared.carousel.photo')
    </div>

    <div class="container mt-5">
        @include('shared.card.video')
    </div>

    <div class="text-primary fw-bold mt-5" style="font-size: 4rem;">

        <p style="color:rgb(85, 130, 88);">{{ number_format($property->prix, thousands_separator: ' ')}} fr</p>

    </div>

<!--section affichage de details-->

    <hr>

    <div class="mt-4">

        <div class="row">

            <div class="col-6">
                <h2>Caractéristiques</h2>
                <table class="table table-striped">
                    <tr>
                        <td>Surface habitable</td>
                        <td>{{ $property->surface }} m²</td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>{{ $property->type }}</td>
                    </tr>
                    <tr>
                        <td>Localisation</td>
                        <td>
                            {{ $property->adresse }} <br>

                            {{ $property->ville }} / code postal : {{ $property->code_postal }}
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Spécificités</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse ($options as $option)
                            <li class="list-group-item">{{ $option->option_value }} - {{ $option->option_name }}</li>
                            @empty
                            <li class="list-group-item text-danger text-center"><p>Aucune option n'a été associée à la propriété!</p></li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Description</h2>
                    </div>
                    <div class="card-body">
                        {!! nl2br($property->description) !!}
                    </div>

                </div>

            </div>

        </div>

    </div>

<!--section ajout de media de medias-->

    <hr>

    <div class="container" style="background-color: rgb(236, 236, 236); border-radius: 5px; padding: 20px;">

        <h2>Autres options</h2>

        <div class="row mt-3">

            <div class="col">
                <form action="{{route('admin.propertiesPhoto.store',['property' => $property->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                        <input type="text" class="form-control" id="titre_photo" name="titre_photo">
                        @if ($errors)
                        @error('titre_photo')
                            <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                        @enderror
                        @endif
                    </div>
                    <div class="form-group mt-3">
                        <label for="description_photo" class="form-label">Faite une petite description de la photo:</label>
                        <textarea class="form-control" id="description_photo" name="description_photo"></textarea>
                        @if ($errors)
                        @error('description_photo')
                            <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                        @enderror
                        @endif
                    </div>
                    <button type="submit" class="btn btn mt-3" style="background-color: #212221; color: rgb(3, 216, 17);">Ajouter</button>
                </form>
            </div>


            <div class="col">
                <form action="{{route('admin.propertiesVideo.store',['property' => $property->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="video" class="form-label">Importer une Video:</label>
                        <input type="file" class="form-control-file" id="video" name="video">
                        @if ($errors)
                        @error('video')
                            <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                        @enderror
                        @endif
                    </div>
                    <div class="form-group mt-3">
                        <label for="titre_video" class="form-label">Donnez un titre à la vidéo:</label>
                        <input type="text" class="form-control" id="titre_video" name="titre_video">
                        @if ($errors)
                        @error('titre_video')
                            <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                        @enderror
                        @endif
                    </div>
                    <div class="form-group mt-3">
                        <label for="description_video" class="form-label">Faite une petite description de la vidéo:</label>
                        <textarea class="form-control" id="description_video" name="description_video"></textarea>
                        @if ($errors)
                        @error('description_video')
                            <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                        @enderror
                        @endif
                    </div>
                    <button type="submit" class="btn btn mt-3" style="background-color: #212221; color: rgb(3, 216, 17);">Ajouter</button>
                </form>
            </div>

        </div>

    </div>


</div>

@endsection
