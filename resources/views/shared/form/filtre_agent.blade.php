<form action="{{ route('admin.agents.index') }}" method="GET" class="mb-4 d-flex gap-2" style="background-color: rgb(68, 68, 68); border-radius: 10px; padding-top: 5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px;">
    @csrf
    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="{{ request('nom') }}">
    <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" value="{{ request('adresse') }}">
    <input type="texte" class="form-control" id="ville" name="ville" placeholder="Ville" value="{{ request('ville') }}">
    <input type="texte" class="form-control" id="sexe" name="sexe" placeholder="Sexe" value="{{ request('sexe') }}">
    <input type="texte" class="form-control" id="nationalite" name="nationalite" placeholder="Nationalité" value="{{ request('nationalite') }}">
    <button type="submit" class="btn btn btn-sm flex-grow-0" style="color: white; background-color: rgb(18, 233, 2);">Filter</button>
</form>
