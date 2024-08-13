<form action="{{ route('admin.properties.index') }}" method="GET" class="mb-4 d-flex gap-2" style="background-color: rgb(68, 68, 68); border-radius: 10px; padding-top: 5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px;">
    @csrf
    <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville" value="{{ request('ville') }}">
    <input type="text" class="form-control" id="statut" name="statut" placeholder="Statut" value="{{ request('statut') }}">
    <input type="number" class="form-control" id="prix_min" name="prix_min" placeholder="Prix minimum" value="{{ request('prix_min') }}">
    <input type="number" class="form-control" id="prix_max" name="prix_max" placeholder="Prix maximum" value="{{ request('prix_max') }}">
    <input type="number" class="form-control" id="surface_min" name="surface_min" placeholder="surface minimale" value="{{ request('surface_min') }}">
    <input type="number" class="form-control" id="surface_max" name="surface_max" placeholder="surface maximale" value="{{ request('surface_max') }}">
    <input type="text" class="form-control" id="type" name="type" placeholder="Mot clé" value="{{ request('type') }}">
    <button type="submit" class="btn btn btn-sm flex-grow-0" style="color: white; background-color: rgb(18, 233, 2);">Filter</button>
</form>
