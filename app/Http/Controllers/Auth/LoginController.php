<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    //

    public function showLoginForm()
    {
        $title = "Authentification";
        return view('auth.login',[
            "title" => $title,
        ]);
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('admin.dashboard'))->with('success', "Connexion réussit!");
        }

        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas.',
        ]);

    }


    public function dashboard()
    {

        $usersCount = User::count();
        $propertiesCount = Property::count();
        $transactionsCount = Transaction::count();
        $recentTransactions = Transaction::orderBy('created_at', 'desc')->limit(5)->get();

        $monthlyTransactions = Transaction::selectRaw('MONTH(transaction_date) as month, SUM(amount) as total')
            ->groupBy('month')
            ->orderBy('month','desc')
            ->get();

        return view('dashboard',[

            "usersCount" => $usersCount,
            "propertiesCount" => $propertiesCount,
            "transactionsCount" => $transactionsCount,
            "recentTransactions" => $recentTransactions,
            "monthlyTransactions" => $monthlyTransactions,

        ]);

    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', "Vous êtes maintenant déconnecté!");
    }



}
