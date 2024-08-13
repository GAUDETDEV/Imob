<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'client_id',
        'property_id',
        'date_debut',
        'date_fin',
        'statut',
        'notes',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
