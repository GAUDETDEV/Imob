@extends('layouts.admin')

@section('title', 'Contrats')

@section('content')

    <div class="d-flex justify-content-between align-items-center mt-5">

        <h1>@yield('title')</h1>

        <a href="{{route('admin.contrats.create')}}" class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Ajoutez un contrat</a>

    </div>

    <div class="container mt-5">

        <div class="mt-3 container">
            @include('shared.form.filtre_contrat')
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Debut</th>
                    <th>Fin</th>
                    <th>Montant</th>
                    <th>Statut</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($contrats as $contrat)

                <tr>
                    <td>{{ $contrat->type }}</td>
                    <td>{{ $contrat->date_debut }}</td>
                    <td>{{ $contrat->date_fin }}</td>
                    <td>{{ number_format($contrat->montant, thousands_separator: ' ' )}} Frs</td>
                    <td>
                        @if ($contrat->statut == 'actif')
                        <span class="badge rounded-pill text-bg-primary">acfif</span>
                        @elseif ($contrat->statut == 'terminé')
                        <span class="badge rounded-pill text-bg-success">terminé</span>
                        @elseif ($contrat->statut == 'annulé')
                        <span class="badge rounded-pill text-bg-secondary">annulé</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{route('admin.contrats.edit', $contrat->id)}}" class="btn btn" style="background-color: #639009; color: white;">Modifier</a>
                            <a href="{{route('admin.contrats.show', $contrat->id)}}" class="btn btn" style="background-color: #0f0f0e; color: #639009;">Détails</a>
                            @if ($contrat->statut == 'annulé' OR $contrat->statut == 'terminé')
                            <a href="{{route('admin.contrats.destroy', $contrat->id)}}" class="btn btn" style="background-color: #ee3c00; color: white;">Résilier</a>
                            @endif
                        </div>
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="6" class="text-center text-danger">
                        Oups! aucun contrat n'a été ajouté à la liste.
                    </td>
                </tr>

                @endforelse


            </tbody>

        </table>
        <div class="container">
            {{$contrats->links()}}
        </div>

    </div>

@endsection
