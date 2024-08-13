@extends('layouts.admin')

@section('title', 'Messages reçus')

@section('content')

    <div class="d-flex justify-content-between align-items-center mt-5">

        <h1>@yield('title')</h1>

        <a href="{{route('admin.messages.create')}}" class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Envoyer un message</a>

    </div>

    <div class="container mt-5">

        <ul class="list-group">
            @forelse($messages as $message)
                <li class="list-group-item">
                    <a href="{{ route('admin.messages.show', $message->id) }}">
                        {{ $message->sender->nom }}: {{ Str::limit($message->content, 50) }}
                        <span class="badge bg-{{ $message->read_at ? 'success' : 'secondary' }}">
                            {{ $message->read_at ? 'Lu' : 'Non lu' }}
                        </span>
                    </a>
                </li>
            @empty
                <li class="list-group-item text-center">
                    <span class="text-danger">Auncun messages reçus</span>
                </li>
            @endforelse
        </ul>

    </div>

    <div class="container">
        {{$messages->links()}}
    </div>

@endsection
