<form action="{{ route('admin.contrats.index') }}" method="GET" class="mb-4 d-flex gap-2" style="background-color: rgb(68, 68, 68); border-radius: 10px; padding-top: 5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px;">
    @csrf
    <input type="text" class="form-control" id="type" name="type" placeholder="Type" value="{{ request('type') }}">
    <input type="text" class="form-control" id="statut" name="statut" placeholder="Statut" value="{{ request('statut') }}">
    <input type="number" class="form-control" id="montant_min" name="montant_min" placeholder="Montant minimum" value="{{ request('montant_min') }}">
    <input type="number" class="form-control" id="montant_max" name="montant_max" placeholder="Montant maximum" value="{{ request('montant_max') }}">
    <button type="submit" class="btn btn btn-sm flex-grow-0" style="color: white; background-color: rgb(18, 233, 2);">Filter</button>
</form>
