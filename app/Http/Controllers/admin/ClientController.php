<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientModifyRequest;
use App\Http\Requests\ClientPostRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $query = Client::query();

        if ($request->filled('nom')) {
            $query->where('nom', 'like', '%' . $request->nom . '%');
        }

        if ($request->filled('adresse')) {
            $query->where('adresse', 'like', '%' . $request->adresse . '%');
        }

        if ($request->filled('ville')) {
            $query->where('ville', 'like', '%' . $request->ville . '%');
        }

        if ($request->filled('sexe')) {
            $query->where('sexe', 'like', '%' . $request->sexe . '%');
        }

        if ($request->filled('nationalite')) {
            $query->where('nationalite', 'like', '%' . $request->nationalite . '%');
        }

        $clients = $query->paginate(10);

        return view('admin.clients.index',[
            'clients' => $clients,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $client = new Client();

        $client->fill([

            'nom' => 'Jonh Doe',
            'email' => 'johnDoe@gmail.com',
            'telephone' => '0102030250',
            'adresse' => 'Cocody angré',
            'ville' => 'Abidjan',
            'code_postal' => 5232,
            'nationalite' => 'Ivoirienne',

        ]);

        return view('admin.clients.form',[

            'client' => $client,

        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientPostRequest $request)
    {
        //

        Client::create([

            'nom' => ucfirst($request->nom),
            'email' => $request->email,
            'telephone' => $request->telephone,
            'adresse' => ucfirst($request->adresse),
            'ville' => ucfirst($request->ville),
            'code_postal' => $request->code_postal,
            'date_naissance' => $request->date_naissance,
            'sexe' => $request->sexe,
            'nationalite' => ucfirst($request->nationalite),
            'biographie' => ucfirst($request->biographie),

        ]);

        return redirect()->route('admin.clients.create')->with('success',"Client ajouté avec succès!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
        return view('admin.clients.show',[

            'client' => $client,

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
        return view('admin.clients.form',[

            'client' => $client,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientModifyRequest $request, Client $client)
    {
        //

        $client->nom = ucfirst($request->nom);
        $client->telephone = $request->telephone;
        $client->adresse = ucfirst($request->adresse);
        $client->ville = ucfirst($request->ville);
        $client->code_postal = $request->code_postal;
        $client->date_naissance = $request->date_naissance;
        $client->sexe = $request->sexe;
        $client->nationalite = ucfirst($request->nationalite);
        $client->biographie = ucfirst($request->biographie);

        $client->save();

        return redirect()->route('admin.clients.edit',['client'=>$client->id])->with('success', "Mise à jour réussit!");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();

        return redirect()->route('admin.clients.index',['client'=>$client->id])->with('success', "Un client vient d'être supprimé!");
    }
}
