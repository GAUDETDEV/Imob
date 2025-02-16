<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prenom', 'nom', 'email', 'password', 'telephone', 'adresse', 'ville', 'etat', 'code_postal', 'pays', 'role', 'photo_profil',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function transactions()
    {
        return $this->hasMany(transaction::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function user_activities()
    {
        return $this->hasMany(UserActivity::class);
    }

}
