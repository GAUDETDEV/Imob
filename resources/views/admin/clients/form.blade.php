@extends('layouts.admin')

@section('title', $client->exists ? "Editez un client" : "Creez un client")

@section('content')


<div class="mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.clients.index') }}">Retour</a></li>
        </ol>
    </nav>
</div>

<h1>@yield("title")</h1>

<form class="vstack gap-2 mt-5" action="{{ route($client->exists ? 'admin.clients.update' : 'admin.clients.store', $client) }}" method="post" style="background-color: rgb(236, 236, 236); border-radius: 5px; padding: 20px;">

    @csrf
    @method($client->exists ? 'put' : 'post')

    <div class="container">

        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" value="{{$client->nom}}">
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
                    <input type="tel" class="form-control" name="telephone" id="telephone" value="{{$client->telephone}}">
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
                    <input type="text" class="form-control" name="adresse" id="adresse" value="{{$client->adresse}}">
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
                    <input type="text" class="form-control" name="ville" id="ville" value="{{$client->ville}}">
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
                    <input type="number" class="form-control" name="code_postal" id="code_postal" value="{{$client->code_postal}}">
                    @if ($errors)
                    @error('code_postal')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>

            @if ($client->exists)

            @else
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{$client->email}}">
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
                            <option value="Homme">Homme</option>
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
                    <input type="text" class="form-control" name="nationalite" id="nationalite" value="{{$client->nationalite}}">
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
                    <input type="date" class="form-control" name="date_naissance" id="date_naissance" value="{{$client->date_naissance}}">
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
                    <label for="biographie" class="form-label">Biogrphie</label>
                    <textarea class="form-control" name="biographie" id="biographie" cols="10" rows="10">{{$client->biographie}}</textarea>
                    @if ($errors)
                    @error('biographie')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>
        </div>

    </div>

    <div class="container">

        @if ($client->exists)
            <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Mettre à jour</button>
        @else
            <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Creér</button>
        @endif

    </div>

</form>

@endsection
