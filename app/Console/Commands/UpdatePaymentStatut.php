<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Contrat;

class UpdatePaymentStatut extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payments:update-statut';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mettre à jour le statut du paiement pour terminer si le montant total payé correspond au montant du contrat';


    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $contrats = Contrat::with('payments')->get();
        foreach ($contrats as $contrat) {
            $contrat->updatePaymentStatut();
        }
        return 0;
    }
}
