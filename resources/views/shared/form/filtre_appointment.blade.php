<form action="{{ route('admin.appointments.index') }}" method="GET" class="mb-4 d-flex gap-2" style="background-color: rgb(68, 68, 68); border-radius: 10px; padding-top: 5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px;">
    @csrf

    <input type="text" name="query" class="form-control" placeholder="Rechercher..." value="{{ request()->input('query') }}">
    <button type="submit" class="btn btn btn-sm flex-grow-0" style="color: white; background-color: rgb(18, 233, 2);">Rechercher</button>

</form>
-
