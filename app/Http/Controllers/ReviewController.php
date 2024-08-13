<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate(
            [
                'visitor_name' => 'required|string|max:255',
                'visitor_last_name' => 'required|string|max:255',
                'content' => 'required|string',
                'rating' => 'required|integer|between:1,5',
            ],
            [
                'visitor_name.required' => 'Le prénom du visiteur est requis.',
                'visitor_name.string' => 'Le prénom du visiteur doit être une chaîne de caractères.',
                'visitor_name.max' => 'Le prénom du visiteur ne peut pas dépasser 255 caractères.',
                'visitor_last_name.required' => 'Le nom de famille du visiteur est requis.',
                'visitor_last_name.string' => 'Le nom de famille du visiteur doit être une chaîne de caractères.',
                'visitor_last_name.max' => 'Le nom de famille du visiteur ne peut pas dépasser 255 caractères.',
                'content.required' => 'Votre avis compte.',
                'content.string' => 'Le message doit être une chaîne de caractères.',
                'rating.required' => 'La note est requise.',
                'rating.integer' => 'La note doit être un nombre entier.',
                'rating.between' => 'La note doit être comprise entre 1 et 5.',
            ]

        );

        // Créer la revue après validation réussie
        Review::create($request->all());

        return redirect()->route('visitor.contacts.index')->with('success', 'Avis ajouté avec succès.');
    }
}
