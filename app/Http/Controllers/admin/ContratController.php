<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContratRequest;
use App\Models\Agent;
use App\Models\Client;
use App\Models\Contrat;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Contrat::query();

        if ($request->filled('type')) {
            $query->where('type', 'like', '%' . $request->type . '%');
        }

        if ($request->filled('montant_min')) {
            $query->where('montant', '>=', $request->montant_min);
        }

        if ($request->filled('montant_max')) {
            $query->where('montant', '<=', $request->montant_max);
        }

        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        $contrats = $query->paginate(10);

        return view('admin.contrats.index',[
            'contrats' => $contrats,
        ]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //

        $contrat = new Contrat();
        $contrat->fill([

            'montant' => 100000,
            'description' => 'Contrat d\'achat de terrain ...',

        ]);

        $properties = Property::all();
        $clients = User::where('role','client')->get();
        $agents = User::where('role','agent')->get();

        return view('admin.contrats.form',[

            'contrat' => $contrat,
            'properties' => $properties,
            'clients' => $clients,
            'agents' => $agents,

        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContratRequest $request)
    {
        //

        Contrat::create([

            'type' => $request->type,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'montant' => $request->montant,
            'statut' => $request->statut,
            'description' => ucfirst($request->description),
            'property_id' => $request->property_id ,
            'client_id' => $request->client_id,
            'agent_id' => $request->agent_id,

        ]);

        return redirect()->route('admin.contrats.create')->with('success',"Contrat ajouté avec succès!");

    }

    /**
     * Display the specified resource.
     */
    public function show(Contrat $contrat)
    {
        //

        $property = DB::table('properties')->where('id','=',$contrat->property_id)->first();
        $agent = DB::table('users')->where('id','=',$contrat->agent_id)->first();
        $client = DB::table('users')->where('id','=',$contrat->client_id)->first();

        return view('admin.contrats.show',[

            'contrat' => $contrat,
            'property' => $property,
            'agent' => $agent,
            'client' => $client,

        ]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contrat $contrat)
    {
        //
        $properties = Property::all();
        $clients = User::where('role','client')->get();
        $agents = User::where('role','agent')->get();

        return view('admin.contrats.form',[

            'contrat' => $contrat,
            'properties' => $properties,
            'clients' => $clients,
            'agents' => $agents,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreContratRequest $request, Contrat $contrat)
    {
        //
        $contrat->type = $request->type;
        $contrat->date_debut = $request->date_debut;
        $contrat->date_fin = $request->date_fin;
        $contrat->montant = $request->montant;
        $contrat->statut = $request->statut;
        $contrat->description = ucfirst($request->description);

        $contrat -> save();

        return redirect()->route('admin.contrats.edit',['contrat' => $contrat->id])->with('success',"Contrat modifié avec succès!");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contrat $contrat)
    {
        //
        $contrat->delete();

        return redirect()->route('admin.contrats.index',['contrat'=>$contrat->id])->with('success', "Un contrat vient d'être résilié!");

    }
}
