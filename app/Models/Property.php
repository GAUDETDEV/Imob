<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'adresse',
            'ville',
            'code_postal',
            'type',
            'etat',
            'surface',
            'prix',
            'description',
            'statut',
        ];


        public function photos()
        {
            return $this->hasMany(PropertyPhoto::class);
        }

        public function videos()
        {
            return $this->hasMany(PropertyVideo::class);
        }

        public function appointments()
        {
            return $this->hasMany(Appointment::class);
        }

        public function contrats()
        {
            return $this->hasMany(contrat::class);
        }

        public function transactions()
        {
            return $this->hasMany(Transaction::class);
        }

        public function documents()
        {
            return $this->hasMany(PropertyDocument::class);
        }

        public function options()
        {
            return $this->hasMany(PropertyOption::class);
        }

        public function contacts()
        {
            return $this->hasMany(Contact::class);
        }


        public function updatePropertyStatut()
        {
            /*contrats actifs*/
            $AchatContratActif = $this->contrats()->where('statut', 'actif')->first();
            $TypeAchatActif = $this->contrats()->where('type', 'achat')->first();

            $VenteContratActif = $this->contrats()->where('statut', 'actif')->first();
            $TypeVenteActif = $this->contrats()->where('type', 'vente')->first();

            $LoueContratActif = $this->contrats()->where('statut', 'actif')->first();
            $TypeLoueActif = $this->contrats()->where('type', 'location')->first();

            if ($AchatContratActif) {
                if($TypeAchatActif){
                    $this->statut = 'acheté'; // ou 'rented' ou 'bought' selon la logique de votre application
                    $this->save();
                }
            }

            if ($VenteContratActif) {
                if($TypeVenteActif){
                    $this->statut = 'vendu'; // ou 'rented' ou 'bought' selon la logique de votre application
                    $this->save();
                }
            }

            if ($LoueContratActif) {
                if($TypeLoueActif){
                    $this->statut = 'loué'; // ou 'rented' ou 'bought' selon la logique de votre application
                    $this->save();
                }
            }



            /*contrats annulés*/
            $AchatContratAnnulé = $this->contrats()->where('statut', 'annulé')->first();
            $TypeAchatAnnulé = $this->contrats()->where('type', 'achat')->first();

            $VenteContratAnnulé = $this->contrats()->where('statut', 'annulé')->first();
            $TypeVenteAnnulé = $this->contrats()->where('type', 'vente')->first();

            $LoueContratAnnulé = $this->contrats()->where('statut', 'annulé')->first();
            $TypeLoueAnnulé = $this->contrats()->where('type', 'location')->first();

            if ($AchatContratAnnulé) {
                if($TypeAchatAnnulé){
                    $this->statut = 'disponible'; // ou 'rented' ou 'bought' selon la logique de votre application
                    $this->save();
                }
            }

            if ($VenteContratAnnulé) {
                if($TypeVenteAnnulé){
                    $this->statut = 'disponible'; // ou 'rented' ou 'bought' selon la logique de votre application
                    $this->save();
                }
            }

            if ($LoueContratAnnulé) {
                if($TypeLoueAnnulé){
                    $this->statut = 'disponible'; // ou 'rented' ou 'bought' selon la logique de votre application
                    $this->save();
                }
            }


            /*contrats terminé*/
            $AchatContratTerminé = $this->contrats()->where('statut', 'terminé')->first();
            $TypeAchatTerminé = $this->contrats()->where('type', 'achat')->first();

            $VenteContratTerminé = $this->contrats()->where('statut', 'terminé')->first();
            $TypeVenteTerminé = $this->contrats()->where('type', 'vente')->first();

            $LoueContratTerminé = $this->contrats()->where('statut', 'terminé')->first();
            $TypeLoueTerminé = $this->contrats()->where('type', 'location')->first();

            if ($AchatContratTerminé) {
                if($TypeAchatTerminé){
                    $this->statut = 'disponible'; // ou 'rented' ou 'bought' selon la logique de votre application
                    $this->save();
                }
            }

            if ($VenteContratTerminé) {
                if($TypeVenteTerminé){
                    $this->statut = 'disponible'; // ou 'rented' ou 'bought' selon la logique de votre application
                    $this->save();
                }
            }

            if ($LoueContratTerminé) {
                if($TypeLoueTerminé){
                    $this->statut = 'disponible'; // ou 'rented' ou 'bought' selon la logique de votre application
                    $this->save();
                }
            }


        }


        // Obtenir une seule photo
        public function mainPhoto()
        {
            return $this->photos()->first();
        }




}
