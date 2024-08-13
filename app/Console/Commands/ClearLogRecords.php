<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ClearLogRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:clear-log-records';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Effacer les fichiers journaux';

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
        DB::table('logs')->truncate();

        $this->info('Les enregistrements du journal ont été effacés avec succès.');
    }
}
