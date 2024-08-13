@extends('layouts.admin')

@section('title', $appointment->exists ? "Editez un rendez-vous" : "Planifier un rendez-vous")

@section('content')

<div class="mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.appointments.index') }}">Retour</a></li>
        </ol>
    </nav>
</div>

<h1>@yield("title")</h1>

<form class="vstack gap-2 mt-5" action="{{ route($appointment->exists ? 'admin.appointments.update' : 'admin.appointments.store', $appointment) }}" method="post" style="background-color: rgb(236, 236, 236); border-radius: 5px; padding: 20px;">

    @csrf
    @method($appointment->exists ? 'put' : 'post')

    <div class="container">

        <div class="row">

            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="mb-3">
                    <label for="agent_id">Agent</label>
                    <select id="agent_id" name="agent_id" class="form-control">
                        @foreach ($agents as $agent)
                            <option value="{{ $agent->id }}">{{ $agent->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="mb-3">
                    <label for="client_id">Client</label>
                    <select id="client_id" name="client_id" class="form-control">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="mb-3">
                    <label for="date_debut">Date et heure de début</label>
                    <input type="datetime-local" id="date_debut" name="date_debut" class="form-control" value="{{$appointment->date_debut}}">
                    @if ($errors)
                    @error('date_debut')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="mb-3">
                    <label for="date_fin">Date et heure de fin</label>
                    <input type="datetime-local" id="date_fin" name="date_fin" class="form-control" value="{{$appointment->date_fin}}">
                    @if ($errors)
                    @error('date_fin')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col">
                <div class="mb-3">
                    <label for="property_id">Propriété</label>
                    <select id="property_id" name="property_id" class="form-control">
                        @foreach ($properties as $property)
                            <option value="{{ $property->id }}">{{ $property->type }} d'une surperfie de {{ $property->surface }} m², située à {{ $property->ville }} ({{ $property->adresse }}) {{ $property->statut }} au prix de : {{ $property->prix }} frs</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label for="statut">Statut</label>
                    <select id="statut" name="statut" class="form-control">
                        <option value="prévu">Prévu</option>
                        <option value="réalisé">Réalisé</option>
                        <option value="annulé">Annulé</option>
                    </select>
                    @if ($errors)
                    @error('statut')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                    <label for="notes">Notes</label>
                    <textarea id="notes" name="notes" class="form-control">{{$appointment->notes}}</textarea>
                    @if ($errors)
                    @error('notes')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>

        </div>

    </div>


    <div class="container">

        @if ($appointment->exists)
            <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Mettre à jour</button>
        @else
            <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Planifier</button>
        @endif

    </div>

</form>

@endsection
