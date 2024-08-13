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

        .hero .btn {
            background: #454545;
            color: #00f5a7;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .hero .btn:hover {
            background: #ffffff;
            color: #080808;
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


        .background-image-1 {
            background-image: url('https://st3.idealista.pt/news/arquivos/styles/fullwidth_xl/public/2023-02/media/image/200912673.jpg?VersionId=TvjBUnAHtEUTlc7w7tv6NcN6HdrYFszJ&itok=oM5UI4FD');
            height: 50vh; /* Ajustez la hauteur selon vos besoins */
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

        .background-image-1 a{
            text-decoration: none;
            color:rgb(55, 255, 0);
            font-size: 50px;
            transition: color 0.7s;
        }

        .background-image-1 a:hover{
            color:rgb(255, 255, 255);
        }


        .background-image-2 {
            background-image: url('https://st3.idealista.pt/news/arquivos/styles/fullwidth_xl/public/2023-02/media/image/200912673.jpg?VersionId=TvjBUnAHtEUTlc7w7tv6NcN6HdrYFszJ&itok=oM5UI4FD');
            height: 50vh; /* Ajustez la hauteur selon vos besoins */
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

        .background-image-2 a{
            text-decoration: none;
            color:rgb(254, 254, 254);
            font-size: 50px;
            transition: color 0.7s;
        }

        .background-image-2 a:hover{
            color:rgb(13, 255, 17);
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
        /*section nouveauté à acheter*/

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


        /*mise en style du carousel*/
        #photoCarousel{

            background: #2d3627;
            color: rgb(116, 220, 168);
            padding: 100px;
            font-size: 20px;
            font-weight: bold;
            width: 100%;
            height: 60vh;

        }

        #photoCarousel strong{
            color: rgb(12, 182, 0);
            font-size: 30px;
            font-weight: bold;
        }

        .centered-block {
            height: 200px; /* Adjust the height as needed */
        }




    </style>

    <div class="hero" id="home">
        <div class="container">
            <h1 class="typing-effect">Nouveautés immobilières</h1>
            <p>EXCLUSIVITÉS IMOBI</p>
            <a href="{{route('visitor.all.properties.index')}}" class="btn">Explorer</a>
        </div>
    </div>

    <div class="container">
        <h2>QUE RECHERCHEZ VOUS ?</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="image-container col-xl-6 col-md-6 col-sm-12">

                <div class="background-image-1">
                    <div class="overlay">
                        <h1> <a href="{{route('visitor.achats.properties.index')}}">Achat</a> </h1>
                    </div>
                </div>

            </div>
            <div class="image-container col-xl-6 col-md-6 col-sm-12">

                <div class="background-image-2">
                    <div class="overlay">
                        <h1> <a href="{{route('visitor.locations.properties.index')}}">Location</a> </h1>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="container">
        <h2>NOUVEAUTÉS</h2>
        <h3>À acheter</h3>
    </div>

    <div class="container">
        <div class="row">
             @forelse ($properties_achats as $properties_achat)
            <div class="col">
                <div class="card" style="width: 25rem; height: 35rem;">
                    @if($properties_achat->mainPhoto())
                        <a href="{{route('visitor.achats.properties.show', $properties_achat->id)}}"><img src="{{ Storage::url($properties_achat->mainPhoto()->file_path_photo) }}" class="card-img-top" alt="{{ $properties_achat->title }}" style="width: 100%; height: 15rem;"></a>
                    @else
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="No Image">
                    @endif
                    <h4><span class="badge text-bg-danger">{{$properties_achat->etat}}</span></h4>
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('visitor.achats.properties.show', $properties_achat->id)}}">{{ $properties_achat->type }}</a></h5>
                        <p class="card-text"> {{$properties_achat->surface}} m² - {{$properties_achat->ville}} {{$properties_achat->code_postal}} </p>
                        <div class="text-primary fw-bold" style="font-size: 1.4rem;">
                            <span>{{ number_format($properties_achat->prix, thousands_separator: ' ')}} frs</span>
                            <hr>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    @foreach($properties_achat->options as $option)
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
                    <h3>Aucun bien à achéter n'a été ajouté!</h3>
                </div>

            @endforelse
        </div>

        @if (count($properties_locations) < 0)
            <a href="{{route('visitor.locations.achats.index')}}" class="btn btn" style="color:rgb(157, 234, 168); background:rgb(6, 180, 29); padding: 10px 20px;">Voir plus</a>
        @endif

    </div>

    <hr>

    <div class="container">
        <h2>NOUVEAUTÉS</h2>
        <h3>À Louer</h3>
    </div>

    <div class="container">
        <div class="row">
             @forelse ($properties_locations as $properties_location)
            <div class="col">
                <div class="card" style="width: 25rem; height: 35rem;">
                    @if($properties_location->mainPhoto())
                        <a href="{{route('visitor.locations.properties.show', $properties_location->id)}}"><img src="{{ Storage::url($properties_location->mainPhoto()->file_path_photo) }}" class="card-img-top" alt="{{ $properties_location->title }}" style="width: 100%; height: 15rem;"></a>
                    @else
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="No Image">
                    @endif
                    <h4><span class="badge text-bg-danger">{{$properties_location->etat}}</span></h4>
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('visitor.locations.properties.show', $properties_location->id)}}">{{ $properties_location->type }}</a></h5>
                        <p class="card-text"> {{$properties_location->surface}} m² - {{$properties_location->ville}} {{$properties_location->code_postal}} </p>
                        <div class="text-primary fw-bold" style="font-size: 1.4rem;">
                            <span>{{ number_format($properties_location->prix, thousands_separator: ' ')}} frs</span>
                            <hr>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    @foreach($properties_location->options as $option)
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
                    <h3>Aucun bien à louer n'a été ajouté!</h3>
                </div>

            @endforelse
        </div>

        @if (count($properties_locations) < 0)
            <a href="{{route('visitor.locations.properties.index')}}" class="btn btn" style="color:rgb(157, 234, 168); background:rgb(6, 180, 29); padding: 10px 20px;">Voir plus</a>
        @endif

    </div>

    <hr>

    <div class="container">
        <h2>AVIS DE NOS CLIENTS</h2>
    </div>

    <div class="container">

        <div id="photoCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($reviews as $index => $review)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="d-flex justify-content-center align-items-center centered-block" >
                    <p class="text-center" >
                        <strong>{{ $review->visitor_last_name }} {{ $review->visitor_name }}</strong> : << {!! nl2br($review->content) !!} >>
                    </p>
                    </div>
                    <div class="carousel-caption d-none d-md-block">

                    </div>
                </div>

                @empty
                <div class="text-center">
                    <a href="" class="text-danger text-center" style="text-decoration: none;"> Donnez votre avis! </a>
                </div>
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#photoCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#photoCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <script>
            $('.carousel').carousel();
        </script>

    </div>


@endsection
