<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'option_name',
        'option_value',
    ];

    // Relation avec le modèle Property
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

}
