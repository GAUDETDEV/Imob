@extends('layouts.admin')

@section('title', 'Propriétés')

@section('content')

    <div class="d-flex justify-content-between align-items-center mt-5">

        <h1>@yield('title')</h1>

        <a href="{{route('admin.properties.create')}}" class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Ajoutez un bien</a>

    </div>

    <div class="container mt-5">

        <div class="mt-3 container">
            @include('shared.form.filtre_property')
        </div>

        <div class="mb-3">
            <a href="{{ route('admin.properties.export.pdf') }}" class="btn btn" style="background-color: #cc2306; color: rgb(251, 251, 251);">Télécharger en PDF</a>
            <a href="{{ route('admin.properties.export.excel') }}" class="btn btn" style="background-color: rgb(41, 109, 45); color: #ffffff;">Télécharger en Excel</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Surface</th>
                    <th>Prix</th>
                    <th>Ville</th>
                    <th>Statut</th>
                    <th>Etat</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($properties as $property)

                <tr>
                    <td>{{ $property->type }}</td>
                    <td>{{ $property->surface }}m²</td>
                    <td>{{ number_format($property->prix, thousands_separator: ' ' ) }} Frs</td>
                    <td>{{ $property->ville }}</td>
                    <td>
                        @if ($property->statut == 'disponible')
                        <span class="badge rounded-pill text-bg-primary">Disponible</span>
                        @elseif ($property->statut == 'vendu')
                        <span class="badge rounded-pill text-bg-success">Vendu</span>
                        @elseif ($property->statut == 'acheté')
                        <span class="badge rounded-pill text-bg-success">Acheté</span>
                        @elseif ($property->statut == 'loué')
                        <span class="badge rounded-pill text-bg-success">Loué</span>
                        @endif
                    </td>
                    <td>
                        @if ($property->etat == 'Achat')
                        <span class="badge retatounded-pill text-bg-danger">Achat</span>
                        @elseif ($property->etat == 'Vente')
                        <span class="badge rounded-pill text-bg-danger">Vente</span>
                        @elseif ($property->etat == 'Location')
                        <span class="badge rounded-pill text-bg-danger">Location</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{route('admin.properties.edit', $property->id)}}" class="btn btn" style="background-color: #639009; color: white;">Modifier</a>
                            <a href="{{route('admin.properties.show', $property->id)}}" class="btn btn" style="background-color: #0f0f0e; color: #639009;">Détails</a>
                            @if ($property->statut == 'vendu' or $property->statut == 'acheté' or $property->statut == 'loué' )
                            <a href="{{route('admin.properties.destroy', $property->id)}}" class="btn btn" style="background-color: #ee3c00; color: white;">Supprimer</a>
                            @endif
                        </div>
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="7" class="text-center text-danger">
                        Oups! aucun biens n'a été ajouté à la liste.
                    </td>
                </tr>

                @endforelse


            </tbody>

        </table>
        <div class="container">
            {{$properties->links()}}
        </div>

    </div>

@endsection
