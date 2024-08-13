@extends('layouts.app')

@section('content')

    <style>

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

    </div>


@endsection
