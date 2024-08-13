@extends('layouts.admin')

@section('title', 'Documents de propriétés')

@section('content')

    <div class="d-flex justify-content-between align-items-center mt-5">

        <h1>@yield('title')</h1>

        <a href="{{route('admin.documents.properties.create')}}" class="btn btn" style="background-color: #212221; color: rgb(3, 216, 17);">Ajoutez un document</a>

    </div>

    <div class="container mt-5">

        <div class="mt-3 container">
            @include('shared.form.filtre_document_property')
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Propriété</th>
                    <th>Nom du document</th>
                    <th>Type</th>
                    <th>Télécharger le</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($documents as $document)

                <tr>
                    <td>{{ $document->property->type }}</td>
                    <td>{{ $document->document_name }}</td>
                    <td>{{ $document->document_type }}</td>
                    <td>{{ $document->upload_date }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.documents.properties.show', $document->id) }}" class="btn btn" style="background-color: #639009; color: white;">Voir</a>
                            <form action="{{ route('admin.documents.properties.destroy', $document->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn" style="background-color: #ee3c00; color: white;">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="6" class="text-center text-danger">
                        Oups! aucun document redigé!
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>
        <div class="container">
            {{$documents->links()}}
        </div>

    </div>

@endsection
