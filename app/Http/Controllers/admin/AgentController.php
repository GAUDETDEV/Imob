<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgentModifyRequest;
use App\Http\Requests\AgentPostRequest;
use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $query = Agent::query();

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

        $agents = $query->paginate(10);

        return view('admin.agents.index',[
            'agents' => $agents,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $agent = new Agent();

        $agent->fill([

            'nom' => 'Jonh Doe',
            'email' => 'johnDoe@gmail.com',
            'telephone' => '0102030250',
            'adresse' => 'Cocody angré',
            'ville' => 'Abidjan',
            'code_postal' => 5232,
            'nationalite' => 'Ivoirienne',

        ]);

        return view('admin.agents.form',[

            'agent' => $agent,

        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentPostRequest $request)
    {
        //

        if($request->hasFile("photo")){

            $path = $request->file('photo')->store('photos', 'public');

            Agent::create([

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
                'specialite' => ucfirst($request->specialite),
                'photo_profil' => $path,

            ]);

            return redirect()->route('admin.agents.create')->with('success',"Agent ajouté avec succès!");

        }else{

            Agent::create([

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
                'specialite' => ucfirst($request->specialite),

            ]);

            return redirect()->route('admin.agents.create')->with('success',"Agent ajouté avec succès!");

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Agent $agent)
    {
        //
        return view('admin.agents.show',[

            'agent' => $agent,

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agent $agent)
    {
        //
        return view('admin.agents.form',[

            'agent' => $agent,

        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgentModifyRequest $request, Agent $agent)
    {
        //

        if($request->hasFile("photo")){

            $path = $request->file('photo')->store('photos', 'public');

            $agent->nom = ucfirst($request->nom);
            $agent->telephone = $request->telephone;
            $agent->adresse = ucfirst($request->adresse);
            $agent->ville = ucfirst($request->ville);
            $agent->code_postal = $request->code_postal;
            $agent->date_naissance = $request->date_naissance;
            $agent->sexe = $request->sexe;
            $agent->nationalite = ucfirst($request->nationalite);
            $agent->biographie = ucfirst($request->biographie);
            $agent->specialite = ucfirst($request->specialite);
            $agent->photo_profil = $path;

            $agent -> save();

            return redirect()->route('admin.agents.edit',['agent' => $agent->id])->with('success',"Agent modifié avec succès!");

        }else{

            $agent->nom = ucfirst($request->nom);
            $agent->telephone = $request->telephone;
            $agent->adresse = ucfirst($request->adresse);
            $agent->ville = ucfirst($request->ville);
            $agent->code_postal = $request->code_postal;
            $agent->date_naissance = $request->date_naissance;
            $agent->sexe = $request->sexe;
            $agent->nationalite = ucfirst($request->nationalite);
            $agent->biographie = ucfirst($request->biographie);
            $agent->specialite = ucfirst($request->specialite);

            $agent -> save();

            return redirect()->route('admin.agents.edit',['agent' => $agent->id])->with('success',"Agent modifié avec succès!");

        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent)
    {
        //
        $agent->delete();

        return redirect()->route('admin.agents.index',['agent'=>$agent->id])->with('success', "Un agent vient d'être supprimé!");
    }
}
