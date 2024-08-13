<?php

namespace App\Http\Controllers;

use App\Mail\PropertyContactMail;
use App\Models\Contact;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VisitorContactController extends Controller
{

    public function index(){

        return view('visites.contacts.index');

    }


    public function store(Property $property, Request $request)
    {
        $data = $request->validate(
            [
                'property_id' => 'required|exists:properties,id',
                'visitor_name' => 'required|string|max:255',
                'visitor_email' => 'required|email|max:255',
                'visitor_phone' => 'nullable|string|max:10',
                'message' => 'required|string',
            ],
            [
                'property_id.required' => 'La propriété est requise.',
                'property_id.exists' => 'La propriété sélectionnée n\'existe pas.',
                'visitor_name.required' => 'Le nom est requis.',
                'visitor_name.string' => 'Le nom doit être une chaîne de caractères.',
                'visitor_name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
                'visitor_email.required' => 'L\'email est requis.',
                'visitor_email.email' => 'L\'email doit être une adresse email valide.',
                'visitor_email.max' => 'L\'email ne peut pas dépasser 255 caractères.',
                'visitor_phone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
                'visitor_phone.max' => 'Le numéro de téléphone ne peut pas dépasser 10 caractères.',
                'message.required' => 'Le message est requis.',
                'message.string' => 'Le message doit être une chaîne de caractères.',
            ]
        );

        // Enregistrer les données dans la base de données
        Contact::create($data);

        /* Envoi de l'e-mail
        Mail::to($request->visitor_email)->send(new PropertyContactMail($property, $data));
        */

        return redirect()->route('home')->with('success', 'Votre message a été envoyé avec succès.');
    }
}
