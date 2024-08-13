@extends('layouts.admin')

@section('title', 'Paiements')

@section('content')

    <div class="d-flex justify-content-between align-items-center mt-5">

        <h1>@yield('title')</h1>

        <a href="{{route('admin.paiements.create')}}" class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Ajoutez un paiement</a>

    </div>

    <div class="container mt-5">

        <div class="mt-3 container">
            @include('shared.form.filtre_paiement')
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Type contrat</th>
                    <th>Montant</th>
                    <th>Date de paiement</th>
                    <th>Méthode de paiement</th>
                    <th>Notes</th>
                    <th>Statut</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($paiements as $paiement)

                <tr>
                    <td>{{ $paiement->contrat->type }}</td>
                    <td>{{ number_format($paiement->montant, thousands_separator: ' ' ) }} Frs</td>
                    <td>{{ $paiement->payment_date }}</td>
                    <td>{{ $paiement->payment_methode }}</td>
                    <td>{{ $paiement->notes }}</td>
                    <td>
                        @if ($paiement->statut == 'en attente')
                        <span class="badge rounded-pill text-bg-secondary">en attente</span>
                        @elseif ($paiement->statut == 'complet')
                        <span class="badge rounded-pill text-bg-success">complet</span>
                        @elseif ($paiement->statut == 'échoué')
                        <span class="badge rounded-pill text-bg-danger">échoué</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{route('admin.paiements.edit', $paiement->id)}}" class="btn btn" style="background-color: #639009; color: white;">Modifier</a>
                            <a href="{{route('admin.paiements.show', $paiement->id)}}" class="btn btn" style="background-color: #0f0f0e; color: #639009;">Détails</a>
                            <a href="{{route('admin.paiements.destroy', $paiement->id)}}" class="btn btn" style="background-color: #ee3c00; color: white;">Supprimer</a>
                        </div>
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="7" class="text-center text-danger">
                        Oups! aucun paiement n'a été effectué.
                    </td>
                </tr>

                @endforelse


            </tbody>

        </table>
        <div class="container">
            {{$paiements->links()}}
        </div>

    </div>

@endsection
