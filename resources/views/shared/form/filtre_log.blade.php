<form action="{{ route('admin.logs.index') }}" method="GET" class="mb-4 d-flex gap-2" style="background-color: rgb(68, 68, 68); border-radius: 10px; padding-top: 5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px;">
    @csrf
    <input type="text" class="form-control" name="query" placeholder="Rechercher..." value="{{ request('query') }}">
    <button type="submit" class="btn btn btn-sm flex-grow-0" style="color: white; background-color: rgb(18, 233, 2);">Rechercher</button>
</form>
