<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('content')



<style>

    .container-fluid{

    padding: 200px;

    }

    form {
        max-width: 700px;
        margin: 0 auto;
        padding: 40px;
        background: #b2dbb3;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="tel"],
    input[type="file"]{
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    input[type="email"]:focus,
    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="tel"]:focus,
    input[type="file"]:focus{
        border-color: #66afe9;
        box-shadow: 0 0 5px rgba(102, 175, 233, 0.5);
    }


    button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #074439;
        color: white;
        cursor: pointer;
        transition: background-color 0.7s;
    }
    button:hover {
        color: rgba(21, 78, 4, 0.648);
        background: rgb(255, 255, 255);
        transform: scale(1.2);
    }
</style>



<div class="container-fluid">

    <div class="row">

        <div class="col">



        </div>

        <div class="col">
            <form id="contactForm" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">

                @csrf

                <h2>Inscription</h2>

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" value="{{ old('nom') }}">
                            @if ($errors)
                            @error('nom')
                                <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                            @enderror
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="prenom">Prenom</label>
                            <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}">
                            @if ($errors)
                            @error('prenom')
                                <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                            @enderror
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="email">Adresse-Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}">
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
                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" name="password" value="{{ old('password') }}">
                            @if ($errors)
                            @error('password')
                                <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                            @enderror
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="password-confirm">Confirmer Mot de passe</label>
                            <input type="password" id="password-confirm" name="password_confirmation" id="password-confirm" autocomplete="new-password" value="{{ old('password_confirmation') }}">
                            @if ($errors)
                            @error('password-confirm')
                                <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                            @enderror
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="telephone">Téléphone</label>
                            <input type="tel" id="telephone" name="telephone" value="{{ old('telephone') }}">
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
                            <label for="adresse">Adresse</label>
                            <input type="text" id="adresse" name="adresse" value="{{ old('adresse') }}">
                            @if ($errors)
                            @error('adresse')
                                <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                            @enderror
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="ville">Ville</label>
                            <input type="text" id="ville" name="ville" value="{{ old('ville') }}">
                            @if ($errors)
                            @error('ville')
                                <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                            @enderror
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="code_postal">Code-Postal</label>
                            <input type="text" id="code_postal" name="code_postal" value="{{ old('code_postal') }}">
                            @if ($errors)
                            @error('code_postal')
                                <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                            @enderror
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="pays">Pays</label>
                            <input type="text" id="pays" name="pays" value="{{ old('pays') }}">
                            @if ($errors)
                            @error('pays')
                                <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                            @enderror
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="photo">Importer une photo</label>
                            <input type="file" id="photo" name="photo">
                            @if ($errors)
                            @error('photo')
                                <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                            @enderror
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row d-none">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="etat">Etat</label>
                            <input type="text" id="etat" name="etat" value="{{ old('pays') }}">
                            @if ($errors)
                            @error('etat')
                                <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                            @enderror
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="role">Role</label>
                            <input type="text" id="role" name="role" value="admin">
                            @if ($errors)
                            @error('role')
                                <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                            @enderror
                            @endif
                        </div>
                    </div>
                </div>

                <button type="submit">S'inscrire</button>

            </form>

        </div>


    </div>

</div>

<!--scripts d'animation du formulaire d'inscription-->


@endsection
