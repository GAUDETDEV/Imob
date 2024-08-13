<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\admin\ReportController;

class GenerateReports extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reports:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Générez des rapports quotidiens sur les ventes, les achats, les locations et les paiements';


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
        $reportController = new ReportController();
        $reportController->salesReport();
        $reportController->purchasesReport();
        $reportController->rentalsReport();
        $reportController->paymentsReport();
        $this->info('Rapports générés avec succès.');
    }
}
