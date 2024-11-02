<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyOption;
use App\Models\PropertyPhoto;
use Illuminate\Http\Request;

class VisitorAllPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Property::query()->with('photos','options')->where('statut','disponible')->orderBy('created_at', 'desc');

        if ($request->filled('prix_min')) {
            $query->where('prix', '>=', $request->prix_min);
        }

        if ($request->filled('prix_max')) {
            $query->where('prix', '<=', $request->prix_max);
        }

        if ($request->filled('surface_min')) {
            $query->where('surface', '>=', $request->surface_min);
        }

        if ($request->filled('surface_max')) {
            $query->where('surface', '<=', $request->surface_max);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('etat')) {
            $query->where('etat', $request->etat);
        }

        $properties = $query->paginate(6);

        $title = "Tous les biens";

        return view('visites/properties/all/index',[
            'properties' => $properties,
            'title' => $title
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
        $title = "details Propriété";

        return view('visites.properties.all.show', [
            "property" => $property,
            "photos" => $photos,
            "options" => $options,
            "title" => $title

        ]);


    }

}
