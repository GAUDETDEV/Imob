@extends('layouts.admin')

@section('title', 'Activités')

@section('content')

    <div class="d-flex justify-content-between align-items-center mt-5">

        <h1>@yield('title')</h1>

    </div>

    <div class="container mt-5">

        <div class="mt-3 container">
            @include('shared.form.filtre_log')
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Description</th>
                    <th>Utilisateur</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($logs as $log)

                <tr>
                    <td>{{ $log->action }}</td>
                    <td>{{ Str::limit($log->description, 50) }}</td>
                    <td>{{ $log->user->name }}</td>
                    <td>{{ $log->logged_at }}</td>
                </tr>

                @empty

                <tr>
                    <td colspan="6" class="text-center text-danger">
                        Oups! aucune activité n'a été enregistré.
                    </td>
                </tr>

                @endforelse


            </tbody>

        </table>
        <div class="container">
            {{$logs->links()}}
        </div>

    </div>

@endsection
