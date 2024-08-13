<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VisitorTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teams = User::where('role','agent')->orderBy('created_at', 'desc')->paginate(10);

        return view('visites/teams/index',[
            'teams' => $teams,
        ]);

    }

}
