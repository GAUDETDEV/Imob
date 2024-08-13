<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        .container {
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            display: flex;
            align-items: center;
        }
        .card-header {
            background-color: #f4f4f4;
            border-bottom: 1px solid #ddd;
            padding: 10px;
            font-size: 1.25rem;
            font-weight: bold;
            width: 100%;
        }
        .card-body {
            padding: 10px;
            display: flex;
        }
        .profile-img {
            flex: 0 0 100px;
            height: 100px;
            margin-right: 20px;
        }
        .profile-img img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }
        .user-info {
            flex: 1;
        }
        .user-info p {
            margin: 0;
            padding: 5px 0;
        }
        .user-info p span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Liste des Utilisateurs</h1>
        @foreach($users as $user)
            <div class="card">
                <div class="card-header">
                    Utilisateur ID: {{ $user->id }}
                </div>
                <div class="card-body">
                    <div class="profile-img">
                        @if ($user->photo_profil)
                        <img src="{{ public_path('storage/' . $user->photo_profil) }}" alt="Photo de {{ $user->prenom }}">
                        @else
                            <img src="{{ asset('https://ehealth-freelancer.at/wp-content/uploads/2023/04/icon_laravel.png') }}" alt="image">
                        @endif
                    </div>
                    <div class="user-info">
                        <p><span>Prénom:</span> {{ $user->prenom }}</p>
                        <p><span>Nom:</span> {{ $user->nom }}</p>
                        <p><span>Email:</span> {{ $user->email }}</p>
                        <p><span>Téléphone:</span> {{ $user->telephone }}</p>
                        <p><span>Adresse:</span> {{ $user->adresse }}</p>
                        <p><span>Ville:</span> {{ $user->ville }}</p>
                        <p><span>État:</span> {{ $user->etat }}</p>
                        <p><span>Code Postal:</span> {{ $user->code_postal }}</p>
                        <p><span>Pays:</span> {{ $user->pays }}</p>
                        <p><span>Rôle:</span> {{ $user->role }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
