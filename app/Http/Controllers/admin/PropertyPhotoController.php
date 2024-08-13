<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyPhotoModifyRequest;
use App\Http\Requests\PropertyPhotoRequest;
use App\Models\Property;
use App\Models\PropertyPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyPhotoController extends Controller
{
    //

    public function store(PropertyPhotoRequest $request, Property $property)
    {

        $path = $request->file('photo')->store('photos', 'public');

        $photo = new PropertyPhoto();

        $photo->property_id = $property->id;
        $photo->titre_photo = $request->titre_photo;
        $photo->description_photo = $request->description_photo;
        $photo->file_path_photo = $path;

        $photo->save();

        return redirect()->route('admin.properties.show',['property' => $property->id])->with('success', 'Photo ajouté avec succès!');
    }


    public function galeriePhotoProperty(Property $property){

        $photo_galeries = DB::table('property_photos')->where('property_id','=',$property->id)->paginate(20);

        return view('admin.photos_properties.galerie',[

            "property" => $property,
            "photo_galeries" => $photo_galeries,

        ]);

    }


    public function addPhotoGalerie(PropertyPhotoRequest $request, Property $property){

        $path = $request->file('photo')->store('photos', 'public');

        $photo = new PropertyPhoto();

        $photo->property_id = $property->id;
        $photo->titre_photo = $request->titre_photo;
        $photo->description_photo = $request->description_photo;
        $photo->file_path_photo = $path;

        $photo->save();

        return redirect()->route('admin.properties.galerie.photo',['property' => $property->id])->with('success', 'Photo ajouté à la galerie avec succès!');


    }


    public function edit(PropertyPhoto $photo){

        return view('admin.photos_properties.edit',[

            'photo' => $photo,

        ]);


    }

    public function update(PropertyPhotoModifyRequest $request, PropertyPhoto $photo){

        if($request->hasFile("photo")){

            $path = $request->file('photo')->store('photos', 'public');

            $photo->titre_photo = $request->titre_photo;
            $photo->description_photo = $request->description_photo;
            $photo->file_path_photo = $path;

            $photo->save();

            return redirect()->route('admin.properties.photo.edit',['photo' => $photo->id])->with('success', 'Photo modifié avec succès!');

        }else{

            $photo->titre_photo = $request->titre_photo;
            $photo->description_photo = $request->description_photo;

            $photo->save();

            return redirect()->route('admin.properties.photo.edit',['photo' => $photo->id])->with('success', 'Photo modifié avec succès!');

        }

    }

    public function destroy(PropertyPhoto $photo){

        $photo->delete();

        return redirect()->route('admin.properties.galerie.photo',['property' => $photo->property_id])->with('success', 'Suppression réussit!');

    }


}
