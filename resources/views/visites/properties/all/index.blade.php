@extends('layouts.app')

@section('content')

        <!-- page-title -->
        <section class="page__title p_relative">
            <div class="bg-layer parallax-bg" data-parallax='{"y": 20}' style="background-image:url({{asset('assets/images/resource/page-title.png')}})">
            </div>
            <div class="container">
                <div class="content-box p_relative">
                    <h1 class="title">All Properties</h1>
                    <ul class="bread-crumb">
                        <li><a href="index.html"><span class="icon-icon-16"></span>Home</a></li>
                        <li><span class="icon-57"></span>Properties</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end-->

        <section class="propertiest__section two page p_relative">
            <div class="propertiest__contents see__pad">
                <div class="anim-icon">
                    <div class="icon icon-01 float-bob-y" style="background-image:url(assets/images/icons/icon-18.svg)"></div>
                </div>
                <div class="container">

                    {{-- debut barre de recherche d'un bien en particulier --}}

                    @include("shared.form.search_property_visitor")

                    {{-- fin barre de recherche d'un bien en particulier --}}

                    <div class="row mt-3">
                        @forelse ($properties as $property)
                        <div class="col-xl-4 col-lg-6 col-md-12 pb-24">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        @if($property->mainPhoto())
                                        <a href="{{route('visitor.all.properties.show',$property->id)}}">
                                            <img src="{{ Storage::url($property->mainPhoto()->file_path_photo) }}" style="height: 300px; width: 100%;" alt="{{ $property->title }}">
                                        </a>
                                        @else
                                        <a href="{{route('visitor.all.properties.show',$property->id)}}">
                                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="No Image" style="height: 300px; width: 100%;">
                                        </a>
                                        @endif
                                    </figure>
                                    <div class="image__icon__box">
                                        <ul class="image__icon clearfix">
                                            <li><a href="propertypropertyproperty.html"><span class="icon-icon-31"></span></a></li>
                                            <li><a href="propertypropertyproperty.html"> <span class="icon-icon-02"></span></a></li>
                                            <li><a href="compare-details.html"> <span class="icon-icon-24"></span></a></li>
                                            <li><a href="assets/images/feature/features-1.png" class="lightbox-image p_relative" data-fancybox="gallery"><span class="icon-icon-47"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="price__section">
                                        <div class="price">
                                            <span>{{ number_format($property->prix, thousands_separator: ' ')}} frs {{-- / <span class="year">yr</span>--}} </span>
                                        </div>
                                        <div class="img__count">
                                            <span class="icon-icon-25"></span>
                                            <span>
                                                {{ count($property->photos) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <div class="review__section">
                                        <div class="review">
                                            <p><span class="icon-icon-43"></span> <span class="font__bold">5.0</span> <span> (30 Reviews)</span> </p>
                                        </div>
                                        <div class="catagory">
                                            <span>{{$property->etat}}</span>
                                        </div>
                                    </div>
                                    <div class="properties__title">
                                        <h4> <a href="{{route('visitor.all.properties.show',$property->id)}}">{{$property->type}} en {{$property->etat}}</a> </h4>
                                    </div>
                                    <ul class="more__details">
                                        {{-- <li><span class="icon-icon-04"></span>03</li> --}}
                                        @forelse($property->options as $option)
                                        <li><span class="icon-icon-06"></span>{{ $option->option_name }} - {{ $option->option_value }}</li>
                                        @empty
                                        <li><span class="icon-icon-06"></span> 0 </li>
                                        @endforelse
                                        <li><span class="icon-icon-42"></span> {{$property->surface}} M²</li>
                                        {{-- <li><span class="icon-icon-34"></span>2</li> --}}
                                    </ul>
                                    <div class="author-info ">
                                        {{-- <div class="author">
                                            <figure class="author-thumb"><img src="{{asset('assets/images/feature/author-1.png')}}" alt=""></figure>
                                            <span>Annette Black</span>
                                        </div> --}}
                                        <div class="view__btn">
                                            <a href="{{route('visitor.all.properties.show',$property->id)}}">Voir les détails <span class="icon-57"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty


                        @endforelse
                        {{-- <div class="col-xl-4 col-lg-6 col-md-12 pb-24">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="property-details.html">
                                            <img src="assets/images/feature/feature-2.png" alt="">
                                        </a>
                                    </figure>
                                    <div class="image__icon__box">
                                        <ul class="image__icon clearfix">
                                            <li> <a href="propertyproperty.html"><span class="icon-icon-31"></span></a></li>
                                            <li><a href="propertyproperty.html"> <span class="icon-icon-02"></span></a></li>
                                            <li><a href="compare-details.html"> <span class="icon-icon-24"></span></a></li>
                                            <li><a href="assets/images/feature/features-2.png" class="lightbox-image p_relative" data-fancybox="gallery"><span class="icon-icon-47"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="price__section">
                                        <div class="price">
                                            <span>$25,235.00 / <span class="year">yr</span> </span>
                                        </div>
                                        <div class="img__count">
                                            <span class="icon-icon-25"></span>
                                            <span>10</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <div class="review__section">
                                        <div class="review">
                                            <p><span class="icon-icon-43"></span> <span class="font__bold">5.0</span> <span> (30 Reviews)</span> </p>
                                        </div>
                                        <div class="catagory">
                                            <span>Residentails</span>
                                        </div>
                                    </div>
                                    <div class="properties__title">
                                        <h4> <a href="property-details.html">Shop For Rent Eaton Centre</a> </h4>
                                    </div>
                                    <ul class="more__details">
                                        <li><span class="icon-icon-04"></span>03</li>
                                        <li><span class="icon-icon-05"></span>02</li>
                                        <li><span class="icon-icon-42"></span> 600 Sq Ft</li>
                                        <li><span class="icon-icon-34"></span>2</li>
                                    </ul>
                                    <div class="author-info ">
                                        <div class="author">
                                            <figure class="author-thumb"><img src="assets/images/feature/author-2.png" alt=""></figure>
                                            <span>Annette Black</span>
                                        </div>
                                        <div class="view__btn">
                                            <a href="property-details.html">View Details <span class="icon-57"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-12 pb-24">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="property-details.html">
                                            <img src="assets/images/feature/feature-3.png" alt="">
                                        </a>
                                    </figure>
                                    <div class="image__icon__box">
                                        <ul class="image__icon clearfix">
                                            <li> <a href="property.html"><span class="icon-icon-31"></span></a></li>
                                            <li><a href="property.html"> <span class="icon-icon-02"></span></a></li>
                                            <li><a href="compare-details.html"> <span class="icon-icon-24"></span></a></li>
                                            <li><a href="assets/images/feature/features-3.png" class="lightbox-image p_relative" data-fancybox="gallery"><span class="icon-icon-47"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="price__section">
                                        <div class="price">
                                            <span>$25,235.00 / <span class="year">yr</span> </span>
                                        </div>
                                        <div class="img__count">
                                            <span class="icon-icon-25"></span>
                                            <span>10</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <div class="review__section">
                                        <div class="review">
                                            <p><span class="icon-icon-43"></span> <span class="font__bold">5.0</span> <span> (30 Reviews)</span> </p>
                                        </div>
                                        <div class="catagory">
                                            <span>Residentails</span>
                                        </div>
                                    </div>
                                    <div class="properties__title">
                                        <h4> <a href="property-details.html">Modern Villa For Rent</a> </h4>
                                    </div>
                                    <ul class="more__details">
                                        <li><span class="icon-icon-04"></span>03</li>
                                        <li><span class="icon-icon-05"></span>02</li>
                                        <li><span class="icon-icon-42"></span> 600 Sq Ft</li>
                                        <li><span class="icon-icon-34"></span>2</li>
                                    </ul>
                                    <div class="author-info ">
                                        <div class="author">
                                            <figure class="author-thumb"><img src="assets/images/feature/author-3.png" alt=""></figure>
                                            <span>Annette Black</span>
                                        </div>
                                        <div class="view__btn">
                                            <a href="property-details.html">View Details <span class="icon-57"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-12 pb-24">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="property-details.html">
                                            <img src="assets/images/feature/feature-4.png" alt="">
                                        </a>
                                    </figure>
                                    <div class="image__icon__box">
                                        <ul class="image__icon clearfix">
                                            <li> <a href="property.html"><span class="icon-icon-31"></span></a></li>
                                            <li><a href="property.html"> <span class="icon-icon-02"></span></a></li>
                                            <li><a href="compare-details.html"> <span class="icon-icon-24"></span></a></li>
                                            <li><a href="assets/images/feature/features-4.png" class="lightbox-image p_relative" data-fancybox="gallery"><span class="icon-icon-47"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="price__section">
                                        <div class="price">
                                            <span>$25,235.00 / <span class="year">yr</span> </span>
                                        </div>
                                        <div class="img__count">
                                            <span class="icon-icon-25"></span>
                                            <span>10</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <div class="review__section">
                                        <div class="review">
                                            <p><span class="icon-icon-43"></span> <span class="font__bold">5.0</span> <span> (30 Reviews)</span> </p>
                                        </div>
                                        <div class="catagory">
                                            <span>Residentails</span>
                                        </div>
                                    </div>
                                    <div class="properties__title">
                                        <h4> <a href="property-details.html">Fortune Condo Town</a> </h4>
                                    </div>
                                    <ul class="more__details">
                                        <li><span class="icon-icon-04"></span>03</li>
                                        <li><span class="icon-icon-05"></span>02</li>
                                        <li><span class="icon-icon-42"></span> 600 Sq Ft</li>
                                        <li><span class="icon-icon-34"></span>2</li>
                                    </ul>
                                    <div class="author-info ">
                                        <div class="author">
                                            <figure class="author-thumb"><img src="assets/images/feature/author-4.png" alt=""></figure>
                                            <span>Annette Black</span>
                                        </div>
                                        <div class="view__btn">
                                            <a href="property-details.html">View Details <span class="icon-57"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-12 pb-24">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="property-details.html">
                                            <img src="assets/images/feature/feature-16.png" alt="">
                                        </a>
                                    </figure>
                                    <div class="image__icon__box">
                                        <ul class="image__icon clearfix">
                                            <li> <a href="property.html"><span class="icon-icon-31"></span></a></li>
                                            <li><a href="property.html"> <span class="icon-icon-02"></span></a></li>
                                            <li><a href="compare-details.html"> <span class="icon-icon-24"></span></a></li>
                                            <li><a href="assets/images/feature/features-16.png" class="lightbox-image p_relative" data-fancybox="gallery"><span class="icon-icon-47"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="price__section">
                                        <div class="price">
                                            <span>$25,235.00 / <span class="year">yr</span> </span>
                                        </div>
                                        <div class="img__count">
                                            <span class="icon-icon-25"></span>
                                            <span>10</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <div class="review__section">
                                        <div class="review">
                                            <p><span class="icon-icon-43"></span> <span class="font__bold">5.0</span> <span> (30 Reviews)</span> </p>
                                        </div>
                                        <div class="catagory">
                                            <span>Family</span>
                                        </div>
                                    </div>
                                    <div class="properties__title">
                                        <h4> <a href="property-details.html">Ready Resort for Sell</a> </h4>
                                    </div>
                                    <ul class="more__details">
                                        <li><span class="icon-icon-04"></span>03</li>
                                        <li><span class="icon-icon-05"></span>02</li>
                                        <li><span class="icon-icon-42"></span> 600 Sq Ft</li>
                                        <li><span class="icon-icon-34"></span>2</li>
                                    </ul>
                                    <div class="author-info ">
                                        <div class="author">
                                            <figure class="author-thumb"><img src="assets/images/feature/author-1.png" alt=""></figure>
                                            <span>Annette Black</span>
                                        </div>
                                        <div class="view__btn">
                                            <a href="property-details.html">View Details <span class="icon-57"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-12 pb-24">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="property-details.html">
                                            <img src="assets/images/feature/feature-13.png" alt="">
                                        </a>
                                    </figure>
                                    <div class="image__icon__box">
                                        <ul class="image__icon clearfix">
                                            <li> <a href="property.html"><span class="icon-icon-31"></span></a></li>
                                            <li><a href="property.html"> <span class="icon-icon-02"></span></a></li>
                                            <li><a href="compare-details.html"> <span class="icon-icon-24"></span></a></li>
                                            <li><a href="assets/images/feature/features-13.png" class="lightbox-image p_relative" data-fancybox="gallery"><span class="icon-icon-47"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="price__section">
                                        <div class="price">
                                            <span>$25,235.00 / <span class="year">yr</span> </span>
                                        </div>
                                        <div class="img__count">
                                            <span class="icon-icon-25"></span>
                                            <span>10</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <div class="review__section">
                                        <div class="review">
                                            <p><span class="icon-icon-43"></span> <span class="font__bold">5.0</span> <span> (30 Reviews)</span> </p>
                                        </div>
                                        <div class="catagory">
                                            <span>Family</span>
                                        </div>
                                    </div>
                                    <div class="properties__title">
                                        <h4> <a href="property-details.html">Shop For Rent Eaton Centre</a> </h4>
                                    </div>
                                    <ul class="more__details">
                                        <li><span class="icon-icon-04"></span>03</li>
                                        <li><span class="icon-icon-05"></span>02</li>
                                        <li><span class="icon-icon-42"></span> 600 Sq Ft</li>
                                        <li><span class="icon-icon-34"></span>2</li>
                                    </ul>
                                    <div class="author-info ">
                                        <div class="author">
                                            <figure class="author-thumb"><img src="assets/images/feature/author-2.png" alt=""></figure>
                                            <span>Annette Black</span>
                                        </div>
                                        <div class="view__btn">
                                            <a href="property-details.html">View Details <span class="icon-57"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="pagination__wrapper centred pt-70">
                    {{$properties->links()}}
                    {{-- <ul class="pagination">
                        <li><a href="property.html" class="active">1</a></li>
                        <li><a href="property.html">2</a></li>
                        <li><a href="property.html">...</a></li>
                        <li><a href="property.html">5</a></li>
                        <li><a href="property.html"> <span class="icon-icon-39"></span> </a></li>
                    </ul> --}}
                </div>

            </div>
      </section>
        <!-- propertiest-two end -->



    {{-- <style>
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
    </div> --}}

@endsection
