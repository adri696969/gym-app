<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Exercici;

class ExerciciController extends Controller
{
    public function perCategoria($id)
    {
        $categoria = Categoria::findOrFail($id);

        $exercicis = Exercici::where('categoria_id', $id)->get();

        return view('client.exercicis.index', compact('exercicis', 'categoria'));
    }
}

