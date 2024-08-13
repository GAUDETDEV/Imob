@extends('layouts.admin')

@section('title', "Envoyez un message")

@section('content')

<div class="mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.messages.index') }}">Retour</a></li>
        </ol>
    </nav>
</div>

<h1>@yield('title')</h1>

<form class="vstack gap-2 mt-5" action="{{ route('admin.messages.store') }}" method="post" style="background-color: rgb(236, 236, 236); border-radius: 5px; padding: 20px;">

    @csrf
    @method('post')

    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="receiver_id" class="form-label">Destinataire</label>
                <select name="receiver_id" id="receiver_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->nom }}</option>
                    @endforeach
                </select>
                @if ($errors)
                @error('receiver_id')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="content" class="form-label">Message</label>
                <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
                @if ($errors)
                @error('content')
                    <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                @enderror
                @endif
            </div>
        </div>
    </div>

    <div class="mt-3">
        <div class="mb-3">
            <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Envoyer</button>
        </div>
    </div>

</form>

@endsection
