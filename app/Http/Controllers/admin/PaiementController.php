<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaiementRequest;
use App\Models\Contrat;
use App\Models\Payment;
use App\Models\Property;
use App\Models\Transaction;
use App\Models\User;
use App\Notifications\admin\PaiementNotification;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = $request->input('query');

        $paiements = Payment::with(['contrat'])
                     ->where('montant', 'like', "%$query%")
                     ->orWhere('statut', 'like', "%$query%")
                     ->orWhere('payment_date', 'like', "%$query%")
                     ->orWhere('payment_methode', 'like', "%$query%")
                     ->orWhere('notes', 'like', "%$query%")
                     ->paginate(10);

        return view('admin.paiements.index',[
            'paiements' => $paiements,
            'query' => $query,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $paiement = new Payment();

        $paiement->fill([

            'montant' => '100000',
            'payment_date' => 'Carte bancaire',
            'payment_methode' => 'Carte bancaire',
            'notes' => 'Premier versement',

        ]);

        $contrats = Contrat::all();

        return view('admin.paiements.form',[

            'paiement' => $paiement,
            'contrats' => $contrats,

        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaiementRequest $request)
    {

        $property_id = Contrat::where('id',$request->contrat_id)->value('property_id');
        $user_id = Contrat::where('id',$request->contrat_id)->value('client_id');

        $typeTransaction = Contrat::where('id',$request->contrat_id)->first();

        // Créer la transaction automatiquement
        $transaction = Transaction::create([
            'contrat_id' => $request->contrat_id,
            'property_id' => $property_id,
            'user_id' => $user_id,
            'type' => $typeTransaction->type,
            'amount' => $request->montant,
            'transaction_date' => $request->payment_date,
        ]);

        $payment = Payment::create([
            'contrat_id' => $request->contrat_id,
            'transaction_id' => $transaction->id,
            'montant' => $request->montant,
            'statut' => $request->statut,
            'payment_date' => $request->payment_date,
            'payment_methode' => $request->payment_methode,
            'notes' => $request->notes,
        ]);

        $contrat = $payment->contrat;
        $contrat->updatePaymentStatut();

        $users = User::all();
        $message = "Une nouveau paiement vient d'être effectué.";

        foreach ($users as $user) {
            $user->notify(new PaiementNotification($message));
        }

        return redirect()->route('admin.paiements.create')->with('success', 'Paiement enregistré avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $paiement)
    {
        //

        return view('admin.paiements.show',[

            "paiement" => $paiement,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $paiement)
    {
        //
        $contrats = Contrat::all();

        return view('admin.paiements.form',[

            'paiement' => $paiement,
            'contrats' => $contrats,

        ]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePaiementRequest $request, Payment $paiement)
    {
        //
        $paiement->update($request->all());

        return redirect()->route('admin.paiements.edit',['paiement'=>$paiement->id])->with('success', 'Paiement mis à jour avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $paiement)
    {





        $paiement->delete();
        return redirect()->route('admin.paiements.index',['paiement'=>$paiement->id])->with('success', "Un paiement vient d'être supprimé!");

    }
}
