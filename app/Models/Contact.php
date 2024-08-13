<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'visitor_name', 'visitor_email', 'visitor_phone', 'message'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
