<?php

namespace App\Console\Commands;

use App\Models\Property;
use Illuminate\Console\Command;

class UpdatePropertyStatut extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'properties:update-statut';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mettre à jour le statut de la propriété lorsque le contrat relatif est actif';

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

        $properties = Property::with('contrats')->get();
        foreach ($properties as $property) {
            $property->updatePropertyStatut();
        }
        $this->info('Le statut de la propriété a été modifié avec succès!');

    }
}
