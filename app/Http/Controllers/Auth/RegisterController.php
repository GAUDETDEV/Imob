<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(StoreUserRequest $request)
    {
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

            return redirect()->route('login')->with('success',"Inscription réussit. Vous pouvez vous connecter!");

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

            return redirect()->route('login')->with('success',"Inscription réussit. Vous pouvez vous connecter!");

        }

    }

}
