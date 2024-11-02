<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use App\Models\PropertyOption;
use App\Models\User;
use App\Notifications\admin\PropertyNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Property::query();

        if ($request->filled('ville')) {
            $query->where('ville', 'like', '%' . $request->ville . '%');
        }

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

        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        $properties = $query->paginate(10);

        return view('admin.properties.index',[
            'properties' => $properties,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $property = new Property();

        $property->fill([

            'adresse' => 'Cocody angré',
            'ville' => 'Abidjan',
            'code_postal' => 5232,
            'type' => 'Maison',
            'surface' => 50,
            'prix' => 10000,
            'description' => "Ma première description de bien...",

        ]);

        return view('admin.properties.form',[

            'property' => $property,

        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {
        //
        Property::create([

            'adresse' => ucfirst($request->adresse) ,
            'ville' => ucfirst($request->ville),
            'code_postal' => $request->code_postal,
            'type' => ucfirst($request->type),
            'etat' => ucfirst($request->etat),
            'surface' => $request->surface,
            'prix' => $request->prix,
            'description' => ucfirst($request->description),
            'statut' => $request->statut,

        ]);

        $users = User::all();
        $message = "Une nouvelle propriété a été ajoutée.";

        foreach ($users as $user) {
            $user->notify(new PropertyNotification($message));
        }

        return redirect()->route('admin.properties.create')->with('success',"Bien ajouté avec succès!");


    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
        $property_photos = DB::table('property_photos')->where('property_id','=',$property->id)->get();
        $property_videos = DB::table('property_videos')->where('propriete_id','=',$property->id)->limit(1)->get();
        $options = PropertyOption::where('property_id',$property->id)->get();

        return view('admin.properties.show',[
            "property" => $property,
            "property_photos" => $property_photos,
            "property_videos" => $property_videos,
            "options" => $options,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //

        return view('admin.properties.form',[

            'property' => $property,

        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, Property $property)
    {
        //
        $property->adresse = ucfirst($request->adresse);
        $property->ville = ucfirst($request->ville);
        $property->code_postal = $request->code_postal;
        $property->type = ucfirst($request->type);
        $property->surface = $request->surface;
        $property->prix = $request->prix;
        $property->etat = ucfirst($request->etat);
        $property->description = ucfirst($request->description);
        $property->statut = $request->statut;



        $property->save();

        return redirect()->route('admin.properties.edit',['property'=>$property->id])->with('success', "Mise à jour réussit!");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {

        // Trouver l'propriete par ID
        $propriete = Property::findOrFail($property);

        // Vérifier les relations
        $isRelated = DB::table('photos')->where('property_id', $property)->exists() ||
                    DB::table('videos')->where('propriete_id', $property)->exists() ||
                    DB::table('appointments')->where('property_id', $property)->exists() ||
                    DB::table('contrats')->where('property_id', $property)->exists() ||
                    DB::table('transactions')->where('property_id', $property)->exists() ||
                    DB::table('documents')->where('property_id', $property)->exists() ||
                    DB::table('options')->where('property_id', $property)->exists() ;
        if ($isRelated) {
            // Si l'propriete a des relations, retournez une réponse d'erreur
            return response()->json(['error' => 'La propriete ne peut pas être supprimé car il a des enregistrements associés.'], 400);
        }

        // Si l'propriete n'a pas de relations, le supprimer
        $propriete->delete();

        // Retourner une réponse de succès
        return response()->json(['success' => 'La propriete a été supprimé avec succès.']);

    }
}
