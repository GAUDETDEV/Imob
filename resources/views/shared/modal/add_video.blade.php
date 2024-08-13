<!-- Modal -->
<div class="modal fade" id="addVideoModal" tabindex="-1" aria-labelledby="addVideoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(18, 18, 18); color:rgb(3, 216, 17);">
            <h1 class="modal-title fs-5" id="addVideoModalLabel">Ajouter une vidéo à la playliste</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{route('admin.properties.playliste.add.video',['property' => $property->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="video" class="form-label">Importer une vidéo:</label>
                        <input type="file" class="form-control-file" id="video" name="video">
                        @if ($errors)
                        @error('video')
                            <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                        @enderror
                        @endif
                    </div>
                    <div class="form-group mt-3">
                        <label for="titre_video" class="form-label">Donnez un titre à la vidéo:</label>
                        <input type="text" class="form-control" id="titre_video" name="titre_video">
                        @if ($errors)
                        @error('titre_video')
                            <p style="color:rgb(217, 17, 17);">{{ $message }}</p>
                        @enderror
                        @endif
                    </div>
                    <div class="form-group mt-3">
                        <label for="description_video" class="form-label">Faite une petite description de la vidéo:</label>
                        <textarea class="form-control" id="description_video" name="description_video"></textarea>
                        @if ($errors)
                        @error('description_video')
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
