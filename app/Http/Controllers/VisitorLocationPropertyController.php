<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyOption;
use App\Models\PropertyPhoto;
use Illuminate\Http\Request;

class VisitorLocationPropertyController extends Controller
{
    //
        //
        /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $properties = Property::with('photos','options')->where('statut','disponible')->where('etat','Location')->orderBy('created_at', 'desc')->paginate(10);

        return view('visites/properties/locations/index',[
            'properties' => $properties,
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
        $photos = PropertyPhoto::where('property_id',$property->id)->get();
        $options = PropertyOption::where('property_id',$property->id)->get();

        return view('visites.properties.locations.show', [
            "property" => $property,
            "photos" => $photos,
            "options" => $options,
        ]);


    }
}
