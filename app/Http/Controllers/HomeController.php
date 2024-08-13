<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

        $properties_achats = Property::with('photos','options')->where('etat','Achat')->where('statut','disponible')->orderBy('created_at', 'desc')->limit(4)->get();
        $properties_locations = Property::with('photos','options')->where('etat','Location')->where('statut','disponible')->orderBy('created_at', 'desc')->limit(4)->get();
        $reviews = Review::orderBy('created_at', 'desc')->limit(10)->get();

        return view('home',[
            'properties_achats' => $properties_achats,
            'properties_locations' => $properties_locations,
            'reviews' => $reviews
        ]);

    }
}
