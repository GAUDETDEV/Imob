<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'document_name',
        'file_path',
        'document_type',
        'description',
        'upload_date',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

}
