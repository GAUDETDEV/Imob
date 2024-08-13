<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('css/styles2.css')}}">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header>
        <div class="nav" id="navbar">
            <div class="container">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/imobi.png') }}" class="card-img-top" alt="logo">
                    </a>
                </div>
                <nav>
                    @guest
                        <ul class="nav-links">
                            <li><a href="{{ route('home')}} "><i class="fa-solid fa-house"></i> Accueil</a></li>
                            <li><a href="{{route('visitor.teams.index')}}"><i class="fa-solid fa-users"></i> Equipe</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle"><i class="fa-solid fa-sign-hanging"></i> Propriétés</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('visitor.all.properties.index')}}"><i class="fa-solid fa-border-all"></i> Toutes</a></li>
                                    <li><a href="{{route('visitor.achats.properties.index')}}"><i class="fa-solid fa-cart-shopping"></i> Achats</a></li>
                                    <li><a href="{{route('visitor.locations.properties.index')}}"><i class="fa-solid fa-truck-ramp-box"></i> Locations</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('visitor.contacts.index')}}"><i class="fa-solid fa-phone"></i> Contacts</a></li>
                            <li>
                                <a href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> {{ __('Se connecter') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}"><i class="fa-solid fa-download"></i> {{ __('S\'inscrire') }}</a>
                            </li>
                        </ul>
                    @endguest
                </nav>
                <div class="menu-toggle" id="mobile-menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>
        </div>
    </header>

    @if (session('success'))
    <div class="container">
        <div class="alert alert alert-dismissible fade show mt-4" role="alert" style="color: white; background-color: rgb(8, 144, 49); font-size: 20px;">
            <strong>{{session('success')}}</strong>
            <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif


    <div class="content mb-5">

        @yield('content')

    </div>

    <footer>
        <div class="container">
            <div class="footer-section">
                <h3>Contactez-nous</h3>
                <p>Adresse: Abidjan, Côte d'Ivoire</p>
                <p>Téléphone: +225 07 67 52 33 46 / 01 03 28 67 59</p>
                <p>Email: gotek225@gmail.com</p>
            </div>
            <div class="footer-section">
                <h3>Suivez-nous</h3>
                <ul class="social-links">
                    <li><a href="https://www.facebook.com" target="_blank" title="Facebook"><i class="fa-brands fa-facebook fa-2x"></i></a></li>
                    <li><a href="https://www.twitter.com" target="_blank" title="Twitter"> <i class="fa-brands fa-twitter fa-2x"></i></a></li>
                    <li><a href="https://www.linkedin.com" target="_blank" title="Linkedin"> <i class="fa-brands fa-linkedin fa-2x"></i></a></li>
                    <li><a href="https://www.instagram.com" target="_blank" title="Instagram"> <i class="fa-brands fa-instagram fa-2x"></i></a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Liens importants</h3>
                <ul class="important-links">
                    <li><a href="#about">Accueil</a></li>
                    <li><a href="#services">Equipe</a></li>
                    <li><a href="#portfolio">Propriétés</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#privacy-policy">Politique de confidentialité</a></li>
                    <li><a href="#legal-notice">Mentions légales</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Gotek-Solution. Tous droits réservés.</p>
        </div>
    </footer>


    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{asset('js/animation2.js')}}"></script>
    <script src="{{asset('js/animation3.js')}}"></script>

    <!-- jQuery, Popper.js, Bootstrap JS, and Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>
