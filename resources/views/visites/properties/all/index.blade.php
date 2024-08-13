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

        /*section affichage de tous les biens*/

        .card{

            border: none;
            box-shadow: 0 0 4px #74a689;
            margin: 5px;

        }

        .container .btn{

            border: none;
            box-shadow: 0 0 4px #74a689;
            text-align: center;
            margin-top: 5%;

        }

        .card .card-title a{
            text-decoration: none;
            font-size: 30px;
            color:rgb(0, 0, 0);
        }

        .card .card-title a:hover{
            color:rgb(6, 180, 29);
        }

        .card .text-primary span{
            color:rgb(0, 0, 0);
            font-weight: lighter;
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
            <h1 class="typing-effect">NOS PROPRIÉTÉS EN EXCLUSIVITÉ</h1>
            <p>Toutes les propriétés</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
             @forelse ($properties as $property)
            <div class="col">
                <div class="card" style="width: 25rem; height: 35rem;">
                    @if($property->mainPhoto())
                        <a href="{{route('visitor.all.properties.show',$property->id)}}"><img src="{{ Storage::url($property->mainPhoto()->file_path_photo) }}" class="card-img-top" alt="{{ $property->title }}" style="width: 100%; height: 15rem;"></a>
                    @else
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="No Image">
                    @endif
                    <h4><span class="badge text-bg-danger">{{$property->etat}}</span></h4>
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('visitor.all.properties.show',$property->id)}}">{{ $property->type }}</a></h5>
                        <p class="card-text"> {{$property->surface}} m² - {{$property->ville}} {{$property->code_postal}} </p>
                        <div class="text-primary fw-bold" style="font-size: 1.4rem;">
                            <span>{{ number_format($property->prix, thousands_separator: ' ')}} frs</span>
                            <hr>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    @foreach($property->options as $option)
                                        <small style="padding-right: 5px;">{{ $option->option_name }}</small>
                                        <strong style="padding-right: 5px;">{{ $option->option_value }}</strong>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @empty

            <div class="overlay">
                <h3>Aucun bien n'a été ajouté!</h3>
            </div>

            @endforelse
        </div>
    </div>

    <div class="mt-5">
        {{$properties->links()}}
    </div>


@endsection
