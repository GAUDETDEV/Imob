<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'propriete_id',
        'titre_video',
        'description_video',
        'file_path_video',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'propriete_id');
    }
}
