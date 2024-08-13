<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administration | @yield("title")</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

        <!-- styles CSS -->
        <link rel="stylesheet" href="{{ asset('css/styles1.css')}}">


        <!-- Select2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


    </head>
    <body>


        <div class="sidebar" id="sidebar">
            <div class="toggle-btn" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </div>

            <div class="container">
                <a class="navbar-brand" href="#" style="color:rgb(211, 211, 211);"><img src="{{ asset('images/imobi_2.png') }}" class="card-img-top" alt="logo"></a>
            </div>

            <ul class="menu">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa-solid fa-gauge"></i> Tableau de bord</a></li>
                <li><a href="{{ route('admin.users.index') }}"><i class="fa-solid fa-user"></i> Gestion des utilisateurs</a></li>
                <li><a href="{{ route('admin.properties.index') }}"><i class="fa-solid fa-sign-hanging"></i> Gestion des propriétés</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"><i class="fa-solid fa-list"></i> Gestion des options</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.options.properties.index') }}"><i class="fa-solid fa-sign-hanging"></i> options de propriétés</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('admin.clients.index') }}"><i class="fa-solid fa-users"></i> Gestion de clients</a></li>
                <li><a href="{{ route('admin.agents.index') }}"><i class="fa-solid fa-user-secret"></i> Gestion des agents</a></li>
                <li><a href="{{ route('admin.contrats.index') }}"><i class="fa-solid fa-file-contract"></i> Supervision de contrats</a></li>
                <li><a href="{{ route('admin.paiements.index') }}"><i class="fa-solid fa-money-check-dollar"></i> Gestion des paiements</a></li>
                <li><a href="{{ route('admin.appointments.index') }}"><i class="fa-solid fa-calendar-check"></i> Gestion de rendez-vous</a></li>
                <li><a href="{{ route('admin.messages.index') }}"><i class="fa-solid fa-message"></i> Messages</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"><i class="fa-solid fa-chart-line"></i> Gestion des activités</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.logs.index') }}"><i class="fa-solid fa-blog"></i> Logs</a></li>
                        <li><a href="{{ route('admin.user.activities') }}"><i class="fa-solid fa-cloud-arrow-up"></i> Connectivité</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"><i class="fa-solid fa-file-invoice"></i> Rapports</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admin.reports.ventes')}}"><i class="fa-solid fa-scale-unbalanced-flip"></i> Ventes</a></li>
                        <li><a href="{{route('admin.reports.achats')}}"><i class="fa-solid fa-cart-shopping"></i> Achats</a></li>
                        <li><a href="{{route('admin.reports.locations')}}"><i class="fa-solid fa-truck-ramp-box"></i> Locations</a></li>
                        <li><a href="{{route('admin.reports.paiements')}}"><i class="fa-solid fa-money-check-dollar"></i> Paiements</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"><i class="fa-solid fa-folder"></i> Documents</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admin.documents.properties.index')}}"><i class="fa-solid fa-sign-hanging"></i> De propriétés</a></li>
                    </ul>
                </li>
            </ul>

        </div>


        <div class="content">

            <div class="container-fluid">

                <div class="d-flex justify-content-between" style="background-color: rgb(82, 82, 82); padding: 10px; box-shadow: 2px 2px 4px #b0b0b0;">

                    <nav class="navbar navbar-expand-md navbar-light">
                        <div class="container">
                                <!-- Autres éléments de navigation -->
                            <ul class="navbar-nav ml-auto">
                                    <!-- Authentification Links -->
                                        <!-- Liens de connexion et d'inscription -->
                                <li class="nav-item dropdown">

                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa-solid fa-bell fa-2x text-white"></i> <span class="badge badge-pill badge-success">{{ auth()->user()->unreadNotifications->count() }}</span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="navbarDropdown">
                                        @forelse(auth()->user()->unreadNotifications as $notification)
                                            <a class="dropdown-item" href="{{ route('admin.notifications.index') }}">
                                                {{ $notification->data['message'] }}
                                            </a>
                                        @empty
                                            <span class="text-center">Aucune notification</span>
                                        @endforelse
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <div id="clock">
                        <div id="time"></div>
                        <div id="date"></div>
                    </div>

                    <ul class="menu-1">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle">
                                @if (Auth::user()->photo_profil)
                                    <img src="{{ Storage::url(Auth::user()->photo_profil) }}" alt="{{ Auth::user()->photo_profil }}" style="width: 3rem; height: 3rem;">
                                @else
                                    <img src="{{ asset('https://ehealth-freelancer.at/wp-content/uploads/2023/04/icon_laravel.png') }}" alt="image" style="width: 4rem; height: 4rem; border-radius: 10rem;">
                                @endif
                                {{ Auth::user()->nom }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Se déconnecter') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>

                @if (session('success'))
                <div class="container">
                    <div class="alert alert alert-dismissible fade show mt-4" role="alert" style="color: white; background-color: rgb(8, 144, 49); font-size: 20px;">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif


                <div class="container">
                    @yield('content')
                </div>
            </div>

        </div>


        <script>
                function toggleSidebar() {
                    var sidebar = document.getElementById("sidebar");
                    sidebar.classList.toggle("active");
                }


                function updateClock() {
                    const now = new Date();
                    const time = now.toLocaleTimeString();
                    const date = now.toLocaleDateString();

                    document.getElementById('time').textContent = time;
                    document.getElementById('date').textContent = date;
                }

                // Met à jour l'horloge immédiatement
                updateClock();

                // Met à jour l'horloge toutes les secondes
                setInterval(updateClock, 1000);
        </script>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

        <!-- jQuery, Popper.js, Bootstrap JS, and Select2 JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        @yield('scripts')


    </body>
</html>


