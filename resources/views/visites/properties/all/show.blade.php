@extends('layouts.app')

@section('content')

    {{-- <style>

        form{
            background: rgb(40, 49, 40);
            padding: 20px;
            border-radius: 5px;
        }

        form .form-label{
            color:rgba(63, 252, 6, 0.648);
            font-size: 15px;
        }

        form .btn{
            padding: 10px;
            color: white;
            background: rgb(71, 179, 71);
            transition: transform 0.3s;
        }

        form .btn:hover{
            padding: 10px;
            color: rgba(21, 78, 4, 0.648);
            background: rgb(167, 211, 156);
            transform: scale(1.2);
        }


    </style>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1>{{ $property->ville }} - {{ $property->adresse }}</h1>
                <h3 class="text-success">{{ number_format($property->prix, thousands_separator: ' ' ) }} Frs </h3>
            </div>
            <div class="col">
                <p class="text-end fw-lighter fs-2">{{ $property->etat }}</p>
            </div>
        </div>
    </div>


    <div class="container mt-5" >

        <div id="photoCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($photos as $index => $photo)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $photo->file_path_photo) }}" class="d-block" alt="{{ $photo->titre_photo }}" style="width: 100%; height: 60vh; text-align: center;">
                    <div class="carousel-caption d-none d-md-block text-center">
                        <h5>{{ $photo->titre_photo }}</h5>
                        <p>{{ $photo->description_photo }}</p>
                    </div>
                </div>
                @empty
                    <h6 class="text-danger text-center">Oups! aucune image n'a été associé à se bien!</h6>
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


    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h4>Description de la propriété</h4>
                <p>
                    {!! nl2br($property->description) !!}
                </p>
                <h4>Spécificités</h4>
                <p>
                    @forelse ($options as $option)
                        {{ $option->option_name }} : {{ $option->option_value }}
                    @empty
                        <small>Aucune spécificités</small>
                    @endforelse
                </p>
            </div>
            <div class="col">

            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">

        <div class="container">

            <h4>Contactez-nous pour plus d'informations</h4>
            <form action="{{route('visitor.contacts.store', $property->id)}}" method="POST">
                @csrf
                @method('post')

                <div class="row d-none">
                    <div class="col">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="property_id" id="property_id" value="{{ $property->id }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="visitor_name" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="visitor_name" id="visitor_name">
                            @if ($errors)
                            @error('visitor_name')
                                <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                            @enderror
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="visitor_email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="visitor_email" id="visitor_email">
                            @if ($errors)
                            @error('visitor_email')
                                <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                            @enderror
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label for="visitor_phone" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" name="visitor_phone" id="visitor_phone">
                            @if ($errors)
                            @error('visitor_phone')
                                <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                            @enderror
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" name="message" id="message" cols="30" rows="5"></textarea>
                            @if ($errors)
                            @error('message')
                                <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                            @enderror
                            @endif
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn">Envoyer</button>
            </form>

        </div>

    </div> --}}

    <!-- image-gallery -->

        <!-- page-title -->
        <section class="page__title p_relative">
            <div class="bg-layer parallax-bg" data-parallax='{"y": 20}' style="background-image:url({{asset('assets/images/resource/page-title.png')}})">
            </div>
            <div class="container">
                <div class="content-box p_relative">
                    <h1 class="title">Ready Resort for Sell</h1>
                    <ul class="bread-crumb">
                        <li><a href="index.html"><span class="icon-icon-16"></span>Home</a></li>
                        <li><span class="icon-57"></span>Properties Details</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end-->



    <!-- image-gallery end-->

    <!-- image-gallery -->
        <section class="image__gallery">
            <div class="image__gallery__content">
                <div class="row">
                    <div class="col-xxl-8 col-xl-12 image__gallery__left">
                        <div class="inner__box" style="background-image:url({{asset('assets/images/gallery/gallery-image-01.png')}})">
                            <div class="image__gallery__feature_image">
                                <img class="d-block d-xxl-none" src="{{asset('assets/images/gallery/gallery-image-01.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-12 image__gallery__right">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-6 col-lg-6 col-md-12 gallery__top">
                                <div class="inner__box">
                                    <div class="image__box">
                                        <figure class="image">
                                            <img src="{{asset('assets/images/gallery/gallery-image-02.png')}}" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-12 col-xl-6 col-lg-6 col-md-12 pt-4 gallery__bottom">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="inner__box">
                                            <div class="image__box">
                                                <figure class="image">
                                                    <img src="{{asset('assets/images/gallery/gallery-image-03.png')}}" alt="">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 last__gallery">
                                        <div class="inner__box">
                                            <div class="image__box ">
                                                <figure class="image">
                                                    <a href="#gallery-1" class="btn-gallery p_relative">
                                                        <img src="{{asset('assets/images/gallery/gallery-image-04.png')}}" alt="">
                                                        <div class="number__of__img p_absolute">
                                                            <h2>14+</h2>
                                                        </div>
                                                    </a>
                                                </figure>
                                            </div>
                                        </div>
                                        <div id="gallery-1" class="hidden">
                                            <a href="{{asset('assets/images/gallery/gallery-01.jpg')}}">Image 1</a>
                                            <a href="{{asset('assets/images/gallery/gallery-02.jpg')}}">Image 2</a>
                                            <a href="{{asset('assets/images/gallery/gallery-03.jpg')}}">Image 3</a>
                                            <a href="{{asset('assets/images/gallery/gallery-04.jpg')}}">Image 4</a>
                                            <a href="{{asset('assets/images/gallery/gallery-05.jpg')}}">Image 5</a>
                                            <a href="{{asset('assets/images/gallery/gallery-06.jpg')}}">Image 6</a>
                                            <a href="{{asset('assets/images/gallery/gallery-07.jpg')}}">Image 7</a>
                                            <a href="{{asset('assets/images/gallery/gallery-08.jpg')}}">Image 8</a>
                                            <a href="{{asset('assets/images/gallery/gallery-09.jpg')}}">Image 9</a>
                                            <a href="{{asset('assets/images/gallery/gallery-10.jpg')}}">Image 10</a>
                                            <a href="{{asset('assets/images/gallery/gallery-11.jpg')}}">Image 11</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- image-gallery end-->







@endsection
