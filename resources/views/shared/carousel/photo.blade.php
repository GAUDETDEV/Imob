<h2>Le bien en image</h2>

<div class="container mt-5">

    @if ($property_photos->count() > 0)

    <div id="photoCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($property_photos as $index => $property_photo)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ Storage::url($property_photo->file_path_photo) }}" class="d-block" alt="{{ $property_photo->titre_photo }}" style="width: 100%; height: 60vh; text-align: center;">
                <div class="carousel-caption d-none d-md-block text-center">
                    <h5>{{ $property_photo->titre_photo }}</h5>
                    <p>{{ $property_photo->description_photo }}</p>
                </div>
            </div>
        @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#photoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#photoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    @else
        <div class="container" style="color:rgb(144, 144, 144); text-align: center; font-size: 3em;">
            <p>Aucune photo</p>
            <i class="fa-regular fa-image fa-5x"></i>
        </div>
    @endif


<script>
    $('.carousel').carousel();
</script>

</div>

<div class="container mt-3">
    <a class="btn btn" href="{{ route('admin.properties.galerie.photo',['property' => $property->id]) }}" style="background-color: #212221; color: rgb(3, 216, 17);">Afficher la galerie</a>
</div>



