<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Agent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'email',
        'telephone',
        'adresse',
        'ville',
        'code_postal',
        'date_naissance',
        'sexe',
        'nationalite',
        'numero_identification',
        'biographie',
        'photo_profil',
        'specialite',
    ];

    /**
     * Boot function to create a random string for the numero_identification.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->numero_identification)) {
                $model->numero_identification = 'AG-' . strtoupper(Str::random(8));
            }
        });
    }



    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }


}
