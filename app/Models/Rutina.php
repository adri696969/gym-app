<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    protected $fillable = [
        'client_id',
        'nom',
        'descripcio',
        'duracio',
    ];

    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class, 'client_id');
    }

    public function exercicis()
    {
        return $this->belongsToMany(\App\Models\Exercici::class, 'exercici_rutina')
                    ->withPivot('series', 'repeticions')
                    ->withTimestamps();
    }
}