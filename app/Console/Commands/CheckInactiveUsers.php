<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:check-inactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vérifier et mettre à jour les utilisateurs inactifs';


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

        $inactiveUsers = User::where('last_active', '<', Carbon::now()->subMonth())
            ->where('etat', 'actif')
            ->get();

        foreach ($inactiveUsers as $user) {
            $user->etat = 'inactif';
            $user->save();
        }

        $this->info('Les utilisateurs inactifs ont été mis à jour avec succès.');


    }
}
