<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'titre_photo',
        'description_photo',
        'file_path_photo',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
