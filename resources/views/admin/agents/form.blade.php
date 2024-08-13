@extends('layouts.admin')

@section('title', $agent->exists ? "Editez un agent" : "Creez un agent")

@section('content')

<div class="mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.agents.index') }}">Retour</a></li>
        </ol>
    </nav>
</div>

<h1>@yield("title")</h1>

<form class="vstack gap-2 mt-5" action="{{ route($agent->exists ? 'admin.agents.update' : 'admin.agents.store', $agent) }}" method="post" enctype="multipart/form-data" style="background-color: rgb(236, 236, 236); border-radius: 5px; padding: 20px;">

    @csrf
    @method($agent->exists ? 'put' : 'post')

    <div class="container">

        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" value="{{$agent->nom}}">
                    @if ($errors)
                    @error('nom')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="telephone" class="form-label">Téléphone</label>
                    <input type="tel" class="form-control" name="telephone" id="telephone" value="{{$agent->telephone}}">
                    @if ($errors)
                    @error('telephone')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" class="form-control" name="adresse" id="adresse" value="{{$agent->adresse}}">
                    @if ($errors)
                    @error('adresse')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" class="form-control" name="ville" id="ville" value="{{$agent->ville}}">
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
                    <input type="text" class="form-control" name="code_postal" id="code_postal" value="{{$agent->code_postal}}">
                    @if ($errors)
                    @error('code_postal')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>

            @if ($agent->exists)

            @else
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{$agent->email}}">
                    @if ($errors)
                    @error('email')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>
            @endif

        </div>

        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="sexe">Genres</label>
                        <select class="form-control" id="sexe" name="sexe">
                            <option selected value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>
                    @if ($errors)
                    @error('sexe')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="nationalite" class="form-label">Nationalité</label>
                    <input type="text" class="form-control" name="nationalite" id="nationalite" value="{{$agent->nationalite}}">
                    @if ($errors)
                    @error('nationalite')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="date_naissance" class="form-label">Date de naissance</label>
                    <input type="date" class="form-control" name="date_naissance" id="date_naissance" value="{{$agent->date_naissance}}">
                    @if ($errors)
                    @error('date_naissance')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col">
                <div class="mb-3">
                    <label for="biographie" class="form-label">Biographie</label>
                    <textarea class="form-control" name="biographie" id="biographie" cols="5" rows="10">{{$agent->biographie}}</textarea>
                    @if ($errors)
                    @error('biographie')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="specialite" class="form-label">Spécialité</label>
                    <input type="text" class="form-control" name="specialite" id="specialite" value="{{$agent->specialite}}">
                    @if ($errors)
                    @error('specialite')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo de profil:</label>
                    <input type="file" class="form-control-file" id="photo" name="photo">
                    @if ($errors)
                    @error('photo')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>


            @if ($agent->exists)
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <p>Photo de profil actuelle</p>
                    <img src="{{ Storage::url($agent->photo_profil) }}" alt="{{ $agent->photo_profil }}" style="width: 80%; border-radius: 10px;">
                </div>
            </div>
            @endif

        </div>

    </div>

    <div class="container">

        @if ($agent->exists)
            <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Mettre à jour</button>
        @else
            <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Creér</button>
        @endif

    </div>

</form>

@endsection
