<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ClearUserActivities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:clear-user-activities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Effacer les enregistrements de la table user_activities';

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
        DB::table('user_activities')->truncate();

        $this->info("Les enregistrements d’activités des utilisateurs ont été effacés avec succès.");
    }
}
