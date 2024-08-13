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

        /*Mise en style du formulaire d'avis*/

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background: rgb(36, 48, 36);
        }

        form label{
            color: rgb(112, 247, 107);
        }

        form h2{
            color: rgb(202, 234, 201);
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s, color 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border-color: #1e5b3f;
            color: #1e5b3f;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: rgba(21, 78, 4, 0.648);
            color: white;
            cursor: pointer;
            transition: transform 0.3s;
        }

        form button:hover{
            padding: 10px 20px;
            color: rgba(21, 78, 4, 0.648);
            background: rgb(167, 211, 156);
            transform: scale(1.2);
        }

    </style>

    <div class="hero" id="home">
        <div class="container">
            <h1 class="typing-effect">CONTACTEZ-NOUS</h1>
            <p>Contact</p>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">

            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                <form id="contactForm" action="{{route('visitor.reviews.store')}}" method="POST">
                    @csrf
                    @method('post')
                    <h2>Donnez votre avis</h2>
                    <label for="visitor_last_name">Nom</label>
                    <input type="text" id="visitor_last_name" name="visitor_last_name">
                    @if ($errors)
                    @error('visitor_last_name')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif

                    <label for="visitor_name">Prenoms</label>
                    <input type="text" id="visitor_name" name="visitor_name">
                    @if ($errors)
                    @error('visitor_name')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif

                    <label for="content">Message</label>
                    <textarea id="content" name="content" rows="5" ></textarea>
                    @if ($errors)
                    @error('content')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif

                    <label for="rating">Note / 20</label>
                    <input type="number" id="rating" name="rating">
                    @if ($errors)
                    @error('rating')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif

                    <button type="submit">Envoyer</button>
                </form>
            </div>
        </div>


    </div>




@endsection
