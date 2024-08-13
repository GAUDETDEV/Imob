<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $query = $request->input('query');

        $users = User::where('nom', 'like', "%$query%")
                     ->orWhere('prenom', 'like', "%$query%")
                     ->orWhere('email', 'like', "%$query%")
                     ->orWhere('telephone', 'like', "%$query%")
                     ->orWhere('etat', 'like', "%$query%")
                     ->orWhere('adresse', 'like', "%$query%")
                     ->orWhere('ville', 'like', "%$query%")
                     ->orWhere('pays', 'like', "%$query%")
                     ->orWhere('code_postal', 'like', "%$query%")
                     ->paginate(10);

        return view('admin.users.index',[
            'users' => $users,
            'query' => $query,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = new User();

        $user->fill([

            'nom' => 'Jonh',
            'prenom' => 'Doe',
            'email' => 'jonhDoe@gmail.com',
            'telephone' => '0103286759',
            'adresse' => 'Cocody angré',
            'ville' => 'Abidjan',
            'pays' => 'Côte d\'ivoire',
            'code_postal' => 5232,

        ]);

        return view('admin.users.form',[

            'user' => $user,

        ]);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //

        if($request->hasFile("photo")){

            $path = $request->file('photo')->store('photos', 'public');

            User::create([

                'nom' => ucfirst($request->nom),
                'prenom' => ucfirst($request->prenom),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'telephone' => $request->telephone,
                'adresse' => ucfirst($request->adresse),
                'ville' => ucfirst($request->ville),
                'etat' => $request->etat,
                'code_postal' => $request->code_postal,
                'pays' => ucfirst($request->pays),
                'role' => $request->role,
                'photo_profil' => $path,

            ]);

            return redirect()->route('admin.users.create')->with('success',"Utilisateur créée avce succès!");

        }else{

            User::create([

                'nom' => ucfirst($request->nom),
                'prenom' => ucfirst($request->prenom),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'telephone' => $request->telephone,
                'adresse' => ucfirst($request->adresse),
                'ville' => ucfirst($request->ville),
                'etat' => $request->etat,
                'code_postal' => $request->code_postal,
                'pays' => ucfirst($request->pays),
                'role' => $request->role,

            ]);

            return redirect()->route('admin.users.create')->with('success',"Utilisateur créée avce succès!");

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //

        return view('admin.users.show',[

            'user' => $user,

        ]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return view('admin.users.form',[

            'user' => $user,

        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //

        if($request->hasFile("photo")){

            $path = $request->file('photo')->store('photos', 'public');

            $user->nom = ucfirst($request->nom);
            $user->prenom = ucfirst($request->prenom);
            $user->telephone = $request->telephone;
            $user->adresse = ucfirst($request->adresse);
            $user->ville = ucfirst($request->ville);
            $user->etat = $request->etat;
            $user->code_postal = $request->code_postal;
            $user->pays = ucfirst($request->pays);
            $user->role = $request->role;
            $user->photo_profil = $path;

            $user->save();

            return redirect()->route('admin.users.edit',['user' => $user->id])->with('success',"Mise à jour effectuée avec succès!");

        }else{

            $user->nom = ucfirst($request->nom);
            $user->prenom = ucfirst($request->prenom);
            $user->telephone = $request->telephone;
            $user->adresse = ucfirst($request->adresse);
            $user->ville = ucfirst($request->ville);
            $user->etat = $request->etat;
            $user->code_postal = $request->code_postal;
            $user->pays = ucfirst($request->pays);
            $user->role = $request->role;

            $user->save();

            return redirect()->route('admin.users.edit',['user' => $user->id])->with('success',"Mise à jour effectuée avec succès!");

        }


    }


    public function changePassword(Request $request, User $user)
    {

        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        $user->password = Hash::make($request->new_password);

        $user->save();

        return back()->with('success', 'Votre mot de passe a été modifié avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        // Trouver l'utilisateur par ID
        $utilisateur = User::findOrFail($user);

        // Vérifier les relations
        $isRelated = DB::table('appointments')->where('user_id', $user)->exists() ||
                    DB::table('contracts')->where('user_id', $user)->exists() ||
                    DB::table('messages')->where('user_id', $user)->exists() ||
                    DB::table('logs')->where('user_id', $user)->exists() ||
                    DB::table('user_activities')->where('user_id', $user)->exists() ||
                    DB::table('transactions')->where('user_id', $user)->exists();

        if ($isRelated) {
            // Si l'utilisateur a des relations, retournez une réponse d'erreur
            return response()->json(['error' => 'L\'utilisateur ne peut pas être supprimé car il a des enregistrements associés.'], 400);
        }

        // Si l'utilisateur n'a pas de relations, le supprimer
        $utilisateur->delete();

        // Retourner une réponse de succès
        return response()->json(['success' => 'L\'utilisateur a été supprimé avec succès.']);

        /*
        return redirect()->route('admin.users.index',['user'=>$user->id])->with('success', "Un utilistaeur vient d'être supprimé!");
        */

    }


}
