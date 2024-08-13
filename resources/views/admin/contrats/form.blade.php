@extends('layouts.admin')

@section('title', $contrat->exists ? "Editez un contrat" : "Creez un contrat")

@section('content')

<div class="mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.contrats.index') }}">Retour</a></li>
        </ol>
    </nav>
</div>

<h1>@yield("title")</h1>

<form class="vstack gap-2 mt-5" action="{{ route($contrat->exists ? 'admin.contrats.update' : 'admin.contrats.store', $contrat) }}" method="post" style="background-color: rgb(236, 236, 236); border-radius: 5px; padding: 20px;">

    @csrf
    @method($contrat->exists ? 'put' : 'post')

    @if ($contrat->exists)

    <div class="container">

        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label class="form-label" for="type" class="form-label">Type</label>
                    <select class="form-select" name="type">
                        <option value="achat" selected>Achat</option>
                        <option value="vente">Vente</option>
                        <option value="location">Location</option>
                    </select>
                    @if ($errors)
                    @error('type')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="date_debut" class="form-label">Debut</label>
                    <input type="date" class="form-control" name="date_debut" id="date_debut" value="{{ $contrat->date_debut }}">
                    @if ($errors)
                    @error('date_debut')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="date_fin" class="form-label">Fin</label>
                    <input type="date" class="form-control" name="date_fin" id="date_fin" value="{{ $contrat->date_fin }}">
                    @if ($errors)
                    @error('date_fin')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="montant" class="form-label">Montant</label>
                    <input type="number" class="form-control" name="montant" id="montant" value="{{ $contrat->montant }}">
                    @if ($errors)
                    @error('montant')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label class="form-label" for="statut" class="form-label">Statut</label>
                    <select class="form-select" name="statut">
                        <option value="actif" selected>Actif</option>
                        <option value="terminé">Terminé</option>
                        <option value="annulé">Annulé</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col">
                <div class="mb-3">
                    <label class="form-label" for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="" cols="10" rows="5">{!! $contrat->description !!}</textarea>
                    @if ($errors)
                    @error('description')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>

        </div>


        <div class="container">

            @if ($contrat->exists)
                <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Mettre à jour</button>
            @else
                <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Creér</button>
            @endif

        </div>

    </div>

    @else

    <div class="container">

        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label class="form-label" for="type" class="form-label">Type</label>
                    <select class="form-select" name="type">
                        <option value="achat" selected>Achat</option>
                        <option value="vente">Vente</option>
                        <option value="location">Location</option>
                    </select>
                    @if ($errors)
                    @error('type')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="date_debut" class="form-label">Debut</label>
                    <input type="date" class="form-control" name="date_debut" id="date_debut" value="{{ $contrat->date_debut }}">
                    @if ($errors)
                    @error('date_debut')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="date_fin" class="form-label">Fin</label>
                    <input type="date" class="form-control" name="date_fin" id="date_fin" value="{{ $contrat->date_fin }}">
                    @if ($errors)
                    @error('date_fin')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="montant" class="form-label">Montant</label>
                    <input type="number" class="form-control" name="montant" id="montant" value="{{ $contrat->montant }}">
                    @if ($errors)
                    @error('montant')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label class="form-label" for="statut" class="form-label">Statut</label>
                    <select class="form-select" name="statut">
                        <option value="actif" selected>Actif</option>
                        <option value="terminé">Terminé</option>
                        <option value="annulé">Annulé</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col">
                <div class="mb-3">
                    <label class="form-label" for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="" cols="10" rows="5">{!! $contrat->description !!}</textarea>
                    @if ($errors)
                    @error('description')
                        <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                    @enderror
                    @endif
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="client-dropdown">Sélectionner un client</label>
                        <select id="client-dropdown" class="form-control" name="client_id">
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->nom }} - {{ $client->email }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="client-dropdown">Sélectionner un agent</label>
                        <select id="client-dropdown" class="form-control" name="agent_id">
                            @foreach($agents as $agent)
                                <option value="{{ $agent->id }}">{{ $agent->nom }} - {{ $agent->email }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="client-dropdown">Sélectionner une propriété</label>
                        <select id="client-dropdown" class="form-control" name="property_id">
                            @foreach($properties as $property)
                                <option value="{{ $property->id }}">{{ $property->type }} - {{ $property->surface }} m²- {{ number_format($property->prix, thousands_separator: ' ' ) }} frs - {{ $property->etat }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3">

            @if ($contrat->exists)
                <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Mettre à jour</button>
            @else
                <button class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Creér</button>
            @endif

        </div>

    </div>

    @endif


</form>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#client-dropdown').select2({
            placeholder: 'Sélectionner un client',
            allowClear: true
        });
    });
</script>
@endsection
