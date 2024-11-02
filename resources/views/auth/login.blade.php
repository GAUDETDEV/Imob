<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')

<style>

    .container-fluid{

        padding: 200px;

    }

    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 40px;
        background: #b2dbb3;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    input[type="email"],
    input[type="password"]{
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    input[type="email"]:focus,
    input[type="password"]:focus{
        border-color: #66afe9;
        box-shadow: 0 0 5px rgba(102, 175, 233, 0.5);
    }
    button {
        margin-top: 30px;
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

            <form id="contactForm" method="POST" action="{{ route('login') }}">
                @csrf
                <h2>{{ __('Connexion')}}</h2>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Se rappeller de moi ?') }}
                    </label>
                </div>

                <button type="submit">Se connecter</button>

                @if (Route::has('password.request'))
                    <a class=" btn btn-link"href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif

            </form>

        </div>

    </div>


</div>
@endsection
