<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contrat_id',
        'transaction_id',
        'montant',
        'statut',
        'payment_date',
        'payment_methode',
        'notes',
    ];

    /**
     * Get the contrat that is associated with the payment.
     */
    public function contrat()
    {
        return $this->belongsTo(Contrat::class, 'contrat_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

}
