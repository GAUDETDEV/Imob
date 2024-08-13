<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['contrat_id', 'property_id', 'user_id', 'type', 'amount', 'transaction_date'];

    public function contrat()
    {
        return $this->belongsTo(Contrat::class, 'contrat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }



}
