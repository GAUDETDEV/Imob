<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function salesReport()
    {
        $ventes = Transaction::where('type', 'vente')->with('property', 'user')->paginate(10);
        return view('admin.reports.ventes.vente', compact('ventes'));
    }

    public function purchasesReport()
    {
        $achats = Transaction::where('type', 'achat')->with('property', 'user')->paginate(10);
        return view('admin.reports.achats.achat', compact('achats'));
    }

    public function rentalsReport()
    {
        $locations = Transaction::where('type', 'location')->with('property', 'user')->paginate(10);
        return view('admin.reports.locations.location', compact('locations'));
    }

    public function paymentsReport()
    {
        $paiements = Payment::with('transaction.property', 'transaction.user')->paginate(10);
        return view('admin.reports.paiements.paiement', compact('paiements'));
    }


//methodes d'affichage des details sur les transactions

    public function detailVente(Transaction $vente){

        $payment_methode = Payment::where('transaction_id',$vente->id)->value('payment_methode');
        $notes = Payment::where('transaction_id',$vente->id)->value('notes');

        return view('admin.reports.ventes.show',[

            "vente" => $vente,
            "payment_methode" => $payment_methode,
            "notes" => $notes,

        ]);

    }

    public function detailAchat(Transaction $achat){

        $payment_methode = Payment::where('transaction_id',$achat->id)->value('payment_methode');
        $notes = Payment::where('transaction_id',$achat->id)->value('notes');

        return view('admin.reports.achats.show',[

            "achat" => $achat,
            "payment_methode" => $payment_methode,
            "notes" => $notes,

        ]);


    }

    public function detailLocation(Transaction $location){

        $payment_methode = Payment::where('transaction_id',$location->id)->value('payment_methode');
        $notes = Payment::where('transaction_id',$location->id)->value('notes');

        return view('admin.reports.locations.show',[

            "location" => $location,
            "payment_methode" => $payment_methode,
            "notes" => $notes,

        ]);

    }

    public function detailPaiement(Payment $paiement){

        return view('admin.reports.paiements.show',[

            "paiement" => $paiement,

        ]);


    }

//methodes de suppression de transactions




}
