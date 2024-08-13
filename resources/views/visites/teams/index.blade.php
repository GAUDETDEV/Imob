@extends('layouts.app')

@section('content')

    <style>
        /* Hero Section */
        .hero {
            background: url('https://static.realting.com/uploads/images/3f1/445e22c2280ba1273ef81a36f446a.webp') no-repeat center center/cover;
            color: #fff;
            text-align: center;
            padding: 100px 0;
            height: 500px;
            box-shadow: 0 4px 8px 0 rgba(0, 255, 170, 0.2), 0 6px 20px 0 rgba(255, 136, 1, 0.19);
        }

        .hero .container {
            max-width: 600px;
            margin-top: 100px;
        }

        .hero h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: rgb(0, 255, 26);
        }

        .hero p {
            margin-bottom: 20px;
            font-size: 25px;
        }


        .container {
            margin-top: 100px;
        }

        .container h2{
            text-align: center;
            font-weight: lighter;
        }

        .container h3{
            text-align: center;
            font-weight: bold;
            font-size: 40px;
        }


        .typing-effect {
            overflow: hidden;
            border-right: .15em solid black;
            white-space: nowrap;
            animation: typing 3s steps(30, end), blink-caret .75s step-end infinite;
        }

        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }
        @keyframes blink-caret {
            from, to { border-color: transparent; }
            50% { border-color: black; }
        }

        /*section affichage d'équipe*/

        .card {

            border: none;
            box-shadow: 0 0 4px #74a689;
            margin: 5px;
            padding:10px;

        }


        .card .card-body h5{

            color:#396f50;

        }


        .overlay {
            background-color: rgba(0, 0, 0, 0.5); /* Couleur et opacité de l'overlay */
            padding: 100px;
            border-radius: 10px;
        }


        .overlay h3{
            color: white;
            text-align: center;
        }



    </style>

    <div class="hero" id="home">
        <div class="container">
            <h1 class="typing-effect">NOTRE ÉQUIPE</h1>
            <p>Agents</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
             @forelse ($teams as $team)
            <div class="col">
                <div class="card" style="width: 20rem; height: 30rem;">
                    <h2>{{$team->nom}} {{$team->prenom}}</h2>
                    @if($team->photo_profil)
                        <img src="{{ Storage::url($team->photo_profil) }}" class="card-img-top" alt="{{ $team->nom }}" style="width: 100%; height: 15rem;">
                    @else
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="No Image">
                    @endif
                    <hr>
                    <div class="card-body">
                        <h5 class="card-title">Email</h5>
                        <p class="card-text"> {{$team->email}} </p>
                        <h5 class="card-title">Téléphone</h5>
                        <p class="card-text"> {{$team->telephone}} </p>
                    </div>
                </div>
            </div>

            @empty

            <div class="overlay">
                <h3>Aucune équipe n'a été créée!</h3>
            </div>

            @endforelse

        </div>
    </div>

    <div class="mt-5">
        {{$teams->links()}}
    </div>


@endsection
