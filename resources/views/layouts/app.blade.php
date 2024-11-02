{{-- <!DOCTYPE html>
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

</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>@yield('title', 'IMOB | '.$title)</title>

<!-- Fav Icon -->
<link rel="icon" href="{{asset('assets/images/icons/map-marker-2.png')}}" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="{{asset('assets/css/font-awesome-all.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/flaticon.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/owl.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/jquery.fancybox.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/color.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/nice-select.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/global.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/swiper.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/timePicker.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/jquery-ui.css')}}" rel="stylesheet">

</head>

<!-- page wrapper -->
<body>
    <div class="boxed_wrapper">

        <!-- preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close">x</div>
                <div id="handle-preloader" class="handle-preloader home-1">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="h" class="letters-loading">
                                h
                            </span>
                            <span data-text-preloader="o" class="letters-loading">
                                o
                            </span>
                            <span data-text-preloader="u" class="letters-loading">
                                u
                            </span>
                            <span data-text-preloader="l" class="letters-loading">
                                l
                            </span>
                            <span data-text-preloader="i" class="letters-loading">
                                i
                            </span>
                            <span data-text-preloader="s" class="letters-loading">
                                s
                            </span>
                            <span data-text-preloader="t" class="letters-loading">
                                t
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- preloader end -->
        <!-- main header -->
        <header class="main-header style-three">
            <!-- header-lower -->
            <div class="header-lower">
                <div class="outer-box">
                    <div class="logo-box">
                        <figure class="logo"><a href="index.html"><img src="{{asset('assets/images/logo-two.png')}}" alt=""></a></figure>
                    </div>
                    <div class="menu-area">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="dropdown"><a href="{{ route('home')}}">Home</a>
                                        <ul>
                                            <li><a href="index.html">Home One</a></li>
                                            <li><a href="index-2.html">Home Two</a></li>
                                            <li><a href="index-3.html">Home Three</a></li>
                                            <li><a href="index-4.html">Home Four</a></li>
                                            <li class="dropdown"><a href="index.html">Header Style</a>
                                                <ul>
                                                    <li><a href="index.html">Header Style 01</a></li>
                                                    <li><a href="index-2.html">Header Style 02</a></li>
                                                    <li><a href="index-3.html">Header Style 03</a></li>
                                                    <li><a href="index-4.html">Header Style 04</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li class="dropdown"><a href="#">Propriétés</a>
                                        <ul>
                                            <li><a href="{{route('visitor.all.properties.index')}}">Toutes</a></li>
                                            <li><a href="{{route('visitor.achats.properties.index')}}">Achats</a></li>
                                            <li><a href="{{route('visitor.locations.properties.index')}}">Locations</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Pages</a>
                                        <ul>
                                            <li><a href="gallery.html">Gallery</a>
                                            <li class="dropdown"><a href="#">Services</a>
                                                <ul>
                                                    <li><a href="services.html">Services</a></li>
                                                    <li><a href="services-details.html">Services Details</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">Our Team</a>
                                                <ul>
                                                    <li><a href="{{route('visitor.teams.index')}}">Our Team</a></li>
                                                    <li><a href="team-details.html">Our Team Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="faq.html">FAQ</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Blog</a>
                                        <ul>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html"> Contact Us </a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    {{-- <div class="header__right">
                        <div class="header__right__button">
                            <div class="search-form">
                                <form method="post" action="index.html">
                                    <div class="form-group">
                                        <fieldset>
                                            <span class="icon-icon-26"></span>
                                            <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here " required="">
                                        </fieldset>
                                    </div>
                                </form>
                            </div>
                            <div class="header__submit__btn">
                                <a href="contact.html" class="btn-1">
                                    Quick Contact
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="container">
                    <div class="outer-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="index.html"><img src="{{asset('assets/images/logo.png')}}" alt=""></a></figure>
                        </div>
                        <div class="menu-area">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>

            <nav class="menu-box">
                <div class="nav-logo"><a href="index.html"><img src="{{asset('assets/images/logo.png')}}" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>Chicago 12, Melborne City, USA</li>
                        <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                        <li><a href="mailto:info@example.com">info@example.com</a></li>
                    </ul>
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End Mobile Menu -->

        <!-- propertiest-two -->

        @yield('content')

            {{-- <div class="propertiest__contents see__pad">
                <div class="anim-icon">
                    <div class="icon icon-01 float-bob-y" style="background-image:url(assets/images/icons/icon-18.svg)"></div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-12 pb-24">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="property-details.html">
                                            <img src="assets/images/feature/feature-1.png" alt="">
                                        </a>
                                    </figure>
                                    <div class="image__icon__box">
                                        <ul class="image__icon clearfix">
                                            <li> <a href="propertypropertyproperty.html"><span class="icon-icon-31"></span></a></li>
                                            <li><a href="propertypropertyproperty.html"> <span class="icon-icon-02"></span></a></li>
                                            <li><a href="compare-details.html"> <span class="icon-icon-24"></span></a></li>
                                            <li><a href="assets/images/feature/features-1.png" class="lightbox-image p_relative" data-fancybox="gallery"><span class="icon-icon-47"></span></a></li>
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
                        </div>
                    </div>
                </div>
                <div class="pagination__wrapper centred pt-70">
                    <ul class="pagination">
                        <li><a href="property.html" class="active">1</a></li>
                        <li><a href="property.html">2</a></li>
                        <li><a href="property.html">...</a></li>
                        <li><a href="property.html">5</a></li>
                        <li><a href="property.html"> <span class="icon-icon-39"></span> </a></li>
                    </ul>
                </div>
            </div> --}}
        <!-- propertiest-two end -->

        <!-- main-footer -->
        <footer class="main-footer p_relative">
            <div class="footer-top p_relative d_block">
                <div class="icon-layer" style="background-image:url(assets/images/shape/shape-03.png)"></div>
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget left">
                                <div class="logo-widget">
                                    <figure class="footer-logo"><a href="index.html"><img src="assets/images/logo.png" alt=""></a></figure>
                                </div>
                                <div class="widget-content">
                                    <ul class="info-list clearfix">
                                        <li><span class="icon-icon-31"></span> 4371 Koontz Lane, Palm Springs, <br>
                                            California, USA</li>
                                        <li><span class="icon-icon-35"></span> <a href="tel:+01234567890123">+01 2345 67890 123</a></li>
                                        <li><span class="icon-60"></span> <a href="mailto:info@gmail.com">info@gmail.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget ml_100">
                                <div class="widget-title">
                                    <h4>Search</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="index.html">Homes for sale</a></li>
                                        <li><a href="index.html">Homes for rent</a></li>
                                        <li><a href="index.html">Apartment for sale</a></li>
                                        <li><a href="index.html">Apartment for rent</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h4>Locations</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="index.html">Castro</a></li>
                                        <li><a href="index.html">Haight Ashbury</a></li>
                                        <li><a href="index.html">Hayes Valley</a></li>
                                        <li><a href="index.html">North Beach</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h4>Company</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="index.html">About us</a></li>
                                        <li><a href="index.html">Services</a></li>
                                        <li><a href="index.html">Press</a></li>
                                        <li><a href="index.html">Ress</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column p-lg-0">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h4>Our Gallery</h4>
                                </div>
                                <div class="widget-content">
                                    <div class="footer__image">
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <img src="assets/images/resource/footer-01.png" alt="">
                                            </figure>
                                            <div class="lower-content">
                                                <div class="view-btn"><a href="assets/images/resource/footer-07.png" class="lightbox-image" data-fancybox="gallery"><span class="icon-icon-38"></span></a></div>
                                            </div>
                                        </div>
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <img src="assets/images/resource/footer-02.png" alt="">
                                            </figure>
                                            <div class="lower-content">
                                                <div class="view-btn"><a href="assets/images/resource/footer-08.png" class="lightbox-image" data-fancybox="gallery"><span class="icon-icon-38"></span></a></div>
                                            </div>
                                        </div>
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <img src="assets/images/resource/footer-03.png" alt="">
                                            </figure>
                                            <div class="lower-content">
                                                <div class="view-btn"><a href="assets/images/resource/footer-09.png" class="lightbox-image" data-fancybox="gallery"><span class="icon-icon-38"></span></a></div>
                                            </div>
                                        </div>
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <img src="assets/images/resource/footer-04.png" alt="">
                                            </figure>
                                            <div class="lower-content">
                                                <div class="view-btn"><a href="assets/images/resource/footer-10.png" class="lightbox-image" data-fancybox="gallery"><span class="icon-icon-38"></span></a></div>
                                            </div>
                                        </div>
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <img src="assets/images/resource/footer-05.png" alt="">
                                            </figure>
                                            <div class="lower-content">
                                                <div class="view-btn"><a href="assets/images/resource/footer-11.png" class="lightbox-image" data-fancybox="gallery"><span class="icon-icon-38"></span></a></div>
                                            </div>
                                        </div>
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <img src="assets/images/resource/footer-06.png" alt="">
                                            </figure>
                                            <div class="lower-content">
                                                <div class="view-btn"><a href="assets/images/resource/footer-12.png" class="lightbox-image" data-fancybox="gallery"><span class="icon-icon-38"></span></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom p_relative">
                <div class="container">
                    <div class="bottom-inner p_relative">
                        <div class="copyright"><p> Copyright © 2022 by <a href="index.html">Houlist</a>. All Rights Reserved.</p></div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->


        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="icon-icon-49"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.js')}}"></script>
    <script src="{{asset('assets/js/timePicker.js')}}"></script>
    <script src="{{asset('assets/js/wow.js')}}"></script>
    <script src="{{asset('assets/js/validation.js')}}"></script>
    <script src="{{asset('assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('assets/js/appear.js')}}"></script>
    <script src="{{asset('assets/js/jquery.countTo.js')}}"></script>
    <script src="{{asset('assets/js/scrollbar.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/nav-tool.js')}}"></script>
    <script src="{{asset('assets/js/parallax.min.js')}}"></script>
    <script src="{{asset('assets/js/parallax-scroll.js')}}"></script>
    <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>

    <!-- main-js -->
    <script src="{{asset('assets/js/script.js')}}"></script>

</body><!-- End of .page_wrapper -->
</html>
