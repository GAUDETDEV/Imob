<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Propriétés</title>
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
        .property-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;
        }
        .property-card-header {
            background-color: #f4f4f4;
            border-bottom: 1px solid #ddd;
            padding: 10px;
            font-size: 1.25rem;
            font-weight: bold;
        }
        .property-card-body {
            padding: 10px;
        }
        .property-card-body p {
            margin: 0;
            padding: 5px 0;
        }
        .property-card-body p span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Liste des Propriétés</h1>
        @foreach($properties as $property)
            <div class="property-card">
                <div class="property-card-header">
                    Propriété ID: {{ $property->id }}
                </div>
                <div class="property-card-body">
                    <p><span>Nom:</span> {{ $property->type }}</p>
                    <p><span>Adresse:</span> {{ $property->adresse }}</p>
                    <p><span>Ville:</span> {{ $property->ville }}</p>
                    <p><span>État:</span> {{ $property->statut }}</p>
                    <p><span>Code Postal:</span> {{ $property->code_postal }}</p>
                    <p><span>Prix:</span> {{ number_format($property->prix, thousands_separator: ' ' )}} frs</p>
                    <p><span>Description:</span> {{ $property->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
