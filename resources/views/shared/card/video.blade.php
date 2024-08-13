<h2>Le bien en video</h2>

<div style="border:rgb(3, 216, 17) solid 4px; border-radius: 5px;">

    @if ($property_videos->count() > 0)
        @foreach($property_videos as $property_video)
            <div class="card" style="border: none; background-color:rgb(29, 29, 29);">
                <div class="card-body d-flex justify-content-center align-items-center">

                    <video width="580" height="380" controls>
                        <source src="{{ Storage::url($property_video->file_path_video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                </div>
            </div>
        @endforeach
    @else
        <div class="container" style="color:rgb(144, 144, 144); text-align: center; font-size: 3em;">
            <p>Aucune vidéo</p>
            <i class="fa-solid fa-video fa-5x"></i>
        </div>
    @endif

</div>

<div class="container mt-3">
    <a class="btn btn" href="{{ route('admin.properties.playliste.video',['property' => $property->id]) }}" style="background-color: #212221; color: rgb(3, 216, 17);">Afficher la playlist</a>
</div>
