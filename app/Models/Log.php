<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'action',
        'description',
        'user_id',
        'logged_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
