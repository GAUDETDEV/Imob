<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'property_id',
        'client_id',
        'agent_id',
        'type',
        'date_debut',
        'date_fin',
        'montant',
        'statut',
        'description',
    ];

    /**
     * Get the propriete that owns the contrat.
     */
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    /**
     * Get the client that owns the contrat.
     */
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    /**
     * Get the agent that owns the contrat.
     */
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }


    public function updatePaymentStatut()
    {
        $totalPaid = $this->payments()->sum('montant');
        if ($totalPaid >= $this->montant) {
            $this->payments()->update(['statut' => 'complet']);
        }
    }


    public static function boot()
    {
        parent::boot();

        static::saved(function ($contrat) {
            $contrat->property->updatePropertyStatut();
        });
    }



}
