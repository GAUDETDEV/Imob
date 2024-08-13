@extends('layouts.admin')

@section('title', 'Connectivités')

@section('content')

    <div class="d-flex justify-content-between align-items-center  mt-5">

        <h1>Connectivités</h1>

    </div>

    <div class="container mt-5">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Utilisateur</th>
                    <th>Type</th>
                    <th>IP Adresse</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>

                @forelse($userActivities as $activity)
                <tr>
                    <td>{{ $activity->user->nom }}</td>
                    <td>{{ ucfirst($activity->type) }}</td>
                    <td>{{ $activity->ip_address }}</td>
                    <td>{{ $activity->occurred_at }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-danger">Aucnue activité enregistré!</td>
                </tr>
                @endforelse

            </tbody>

        </table>
        <div class="container">
            {{$userActivities->links()}}
        </div>

    </div>

@endsection
