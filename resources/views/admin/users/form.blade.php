@extends('layouts.admin')

@section('title', $user->exists ? "Editez un utilisateur" : "Creez un utilisateur")

@section('content')

<h1>@yield("title")</h1>


<div class="mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.users.index') }}">Retour</a></li>
        </ol>
    </nav>
</div>


<form class="vstack gap-2 mt-5" action="{{ route($user->exists ? 'admin.users.update' : 'admin.users.store', $user) }}" method="post" enctype="multipart/form-data" style="background-color: rgb(236, 236, 236); border-radius: 5px; padding: 20px;">

    @csrf
    @method($user->exists ? 'put' : 'post')



    @if ($user->exists)

    <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" value="{{$user->prenom}}">
                @if ($errors)
                @error('prenom')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" value="{{$user->nom}}">
                @if ($errors)
                @error('nom')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" name="adresse" id="adresse" value="{{$user->adresse}}">
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
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="tel" class="form-control" name="telephone" id="telephone" value="{{$user->telephone}}">
                @if ($errors)
                @error('telephone')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" class="form-control" name="ville" id="ville" value="{{$user->ville}}">
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
                <input type="text" class="form-control" name="code_postal" id="code_postal" value="{{$user->code_postal}}">
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
                <label for="pays" class="form-label">pays</label>
                <input type="text" class="form-control" name="pays" id="pays" value="{{$user->pays}}">
                @if ($errors)
                @error('pays')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="etat" class="form-label">Etat</label>
                <select id="etat" class="form-control" name="etat" required>
                    <option value="actif">Actif</option>
                    <option value="inactif">Inactif</option>
                </select>
                @if ($errors)
                @error('etat')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select id="role" class="form-control" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="agent">Agent</option>
                    <option selected value="client">Client</option>
                </select>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="photo" class="form-label">Importer une photo:</label>
                <input type="file" class="form-control-file" id="photo" name="photo">
                @if ($errors)
                    @error('photo')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                @endif
            </div>
        </div>
        @if ($user->exists)
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">

                    <p>Photo de profil actuelle</p>
                    @if ($user->photo_profil)
                        <img src="{{ Storage::url($user->photo_profil) }}" alt="{{ $user->photo_profil }}" style="width: 80%; border-radius: 10px;">
                    @else
                        <img src="{{ asset('https://ehealth-freelancer.at/wp-content/uploads/2023/04/icon_laravel.png') }}" alt="image" style="width: 80%; border-radius: 10px;">
                    @endif

                </div>
            </div>
        @endif
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                @if ($user->exists)
                    <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Mettre à jour</button>
                @else
                    <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Creér</button>
                @endif
            </div>
        </div>

    </div>


    @else


    <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" value="{{$user->prenom}}">
                @if ($errors)
                @error('prenom')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" value="{{$user->nom}}">
                @if ($errors)
                @error('nom')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="email" class="form-label">Adresse Mail</label>
                <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
                @if ($errors)
                @error('email')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="password">
                @if ($errors)
                @error('password')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="password-confirm" class="form-label">Confirmer le mot de passe</label>
                <input type="password" class="form-control" name="password_confirmation" id="password-confirm" required autocomplete="new-password">
                @if ($errors)
                @error('password_confirmation')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="tel" class="form-control" name="telephone" id="telephone" value="{{$user->telephone}}">
                @if ($errors)
                @error('telephone')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" name="adresse" id="adresse" value="{{$user->adresse}}">
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
                <input type="text" class="form-control" name="ville" id="ville" value="{{$user->ville}}">
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
                <input type="text" class="form-control" name="code_postal" id="code_postal" value="{{$user->code_postal}}">
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
                <label for="pays" class="form-label">pays</label>
                <input type="text" class="form-control" name="pays" id="pays" value="{{$user->pays}}">
                @if ($errors)
                @error('pays')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="photo" class="form-label">Importer une photo:</label>
                <input type="file" class="form-control-file" id="photo" name="photo">
                @if ($errors)
                    @error('photo')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                @endif
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="etat" class="form-label">Etat</label>
                <select id="etat" class="form-control" name="etat" required>
                    <option value="actif">Actif</option>
                    <option value="inactif">Inactif</option>
                </select>
                @if ($errors)
                @error('etat')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select id="role" class="form-control" name="role" required>
                    <option selected value="admin">Admin</option>
                    <option value="agent">Agent</option>
                    <option value="client">Client</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="mb-3">
                @if ($user->exists)
                    <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Mettre à jour</button>
                @else
                    <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Creér</button>
                @endif
            </div>
        </div>

    </div>


    @endif


</form>



@endsection
