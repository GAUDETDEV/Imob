@extends('layouts.admin')

@section('title', 'Options de propriétés')

@section('content')

    <div class="d-flex justify-content-between align-items-center mt-5">

        <h1>@yield('title')</h1>

        <a href="{{route('admin.options.properties.create')}}" class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Ajoutez une option</a>

    </div>

    <div class="container mt-5">

        <div class="row">
            @forelse ($options as $option)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $option->option_name }}</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Valeur :</strong> {{ $option->option_value }}</p>
                            <p class="card-text"><strong>Propriété :</strong> {{ $option->property->type }}</p>
                            <a href="{{ route('admin.options.properties.edit', $option->id) }}" class="btn btn" style="background-color: #639009; color: white;">Modifier</a>
                            <form action="{{ route('admin.options.properties.destroy', $option->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn" style="background-color: #ee3c00; color: white;">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-danger">
                    Oups! la liste des options est vide!
                </p>
            @endforelse
        </div>

        <div class="container">
            {{$options->links()}}
        </div>

    </div>

@endsection
