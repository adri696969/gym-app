<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercici extends Model
{
    protected $fillable = [
        'categoria_id',
        'nom',
        'descripcio',
        'imatge',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function rutines()
    {
        return $this->belongsToMany(Rutina::class, 'exercici_rutina')
            ->withPivot('series', 'repeticions')
            ->withTimestamps();
    }
}
