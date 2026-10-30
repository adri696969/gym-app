<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'user_id',
        'dni',
        'data_naixement',
        'telefon',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function rutines()
    {
        return $this->hasMany(\App\Models\Rutina::class, 'client_id');
    }
}