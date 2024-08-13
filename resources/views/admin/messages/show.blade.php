@extends('layouts.admin')

@section('title', 'Message')

@section('content')

<div class="mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.messages.index') }}">Retour</a></li>
        </ol>
    </nav>
</div>

    <h1>Afficher le message</h1>

    <div class="container mt-5">
        <h1>Message de {{ $message->sender->nom }}</h1>
        <p><strong>Date:</strong> {{ $message->sent_at }}</p>
        <p>{{ $message->content }}</p>
    </div>

@endsection





















