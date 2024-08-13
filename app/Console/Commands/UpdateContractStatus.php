<?php

namespace App\Console\Commands;

use App\Models\Contrat;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateContractStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contrats:update-statut';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Met à jour le statut des contrats en "terminé" si la date de fin est passée';


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

        $now = Carbon::now();

        Contrat::where('date_fin', '<', $now)
                ->where('statut', '!=', 'terminé')
                ->update(['statut' => 'terminé']);

        $this->info('Le statut des contrats a été mis à jour.');


    }
}
