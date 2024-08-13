<!-- Modal -->
<div class="modal fade" id="addPhotoModal" tabindex="-1" aria-labelledby="addPhotoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(18, 18, 18); color:rgb(3, 216, 17);">
            <h1 class="modal-title fs-5" id="addPhotoModalLabel">Ajouter une photo à la galerie</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{route('admin.properties.galerie.add.photo',['property' => $property->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="photo" class="form-label">Importer une photo:</label>
                        <input type="file" class="form-control-file" id="photo" name="photo">
                        @if ($errors)
                        @error('photo')
                            <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                        @enderror
                        @endif
                    </div>
                    <div class="form-group mt-3">
                        <label for="titre_photo" class="form-label">Donnez un titre à la photo:</label>
                        <input type="text" class="form-control" id="titre_photo" name="titre_photo">
                        @if ($errors)
                        @error('titre_photo')
                            <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                        @enderror
                        @endif
                    </div>
                    <div class="form-group mt-3">
                        <label for="description_photo" class="form-label">Faite une petite description de la photo:</label>
                        <textarea class="form-control" id="description_photo" name="description_photo"></textarea>
                        @if ($errors)
                        @error('description_photo')
                            <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                        @enderror
                        @endif
                    </div>
                    <button type="submit" class="btn btn mt-3" style="background-color: rgb(3, 216, 17); color: #212221;">Ajouter</button>
                </form>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn" data-bs-dismiss="modal" style="background-color: #212221; color: rgb(3, 216, 17);">Fermer</button>
            </div>
        </div>
    </div>
</div>
