@extends('layouts.admin')

@section('title', 'Notifications')

@section('content')

    <div class="d-flex justify-content-between align-items-center mt-5">

        <h1>@yield('title')</h1>

    </div>

    <div class="container mt-5">

        <ul class="list-group">
            @foreach($notifications as $notification)
            <li class="list-group-item">
                {{ $notification->data['message'] }}
                <span class="text-muted float-right">{{ $notification->created_at->diffForHumans() }}</span>
            </li>
            @endforeach
        </ul>
        {{ $notifications->links() }}

    </div>

@endsection
