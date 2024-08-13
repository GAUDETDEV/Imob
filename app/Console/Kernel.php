<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('contrats:update-statut')->daily();
        $schedule->command('payments:update-statut')->daily();
        $schedule->command('properties:update-statut')->daily();
        // Planifiez la commande pour s'exécuter toutes les heures
        $schedule->command('appointments:update-statut')->hourly();
        // Planifiez la commande pour la génération de rapports
        $schedule->command('reports:generate')->daily();
        $schedule->command('users:check-inactive')->daily();
        // Planifie la suppression des enregistrements de logs tous les jours à minuit
        $schedule->command('logs:clear-records')->daily();
        // Planifie la suppression des enregistrements de user_activities chaque semaine
        $schedule->command('user_activities:clear')->weekly();

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
