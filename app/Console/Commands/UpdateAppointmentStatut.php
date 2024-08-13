<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Console\Command;

class UpdateAppointmentStatut extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'appointments:update-statut';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Met à jour le statut des rendez-vous passés à "réalisé';


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
        $appointments = Appointment::where('date_fin', '<', $now)
                                   ->where('statut', '!=', 'réalisé')
                                   ->get();

        foreach ($appointments as $appointment) {
            $appointment->statut = 'réalisé';
            $appointment->save();
        }

        $this->info('Les statuts des rendez-vous ont été mis à jour.');

    }
}
