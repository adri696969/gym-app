<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exercici;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class AdminExerciciController extends Controller
{
    private function checkAdmin()
    {
        if (Auth::user()->email !== 'admin@admin.cat') {
            abort(403);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkAdmin();

        $exercicis = Exercici::with('categoria')->get();

        return view('admin.dashboard', compact('exercicis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkAdmin();

        $categories = Categoria::all();

        return view('admin.exercicis.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->checkAdmin();

        $request->validate([
            'nom' => 'required|string|max:255',
            'descripcio' => 'nullable|string',
            'imatge' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Exercici::create([
            'nom' => $request->nom,
            'descripcio' => $request->descripcio,
            'imatge' => $request->imatge,
            'categoria_id' => $request->categoria_id,
        ]);

        return redirect()->route('admin.dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercici $exercici)
    {
        $this->checkAdmin();

        $categories = Categoria::all();

        return view('admin.exercicis.edit', compact('exercici', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exercici $exercici)
    {
        $this->checkAdmin();

        $request->validate([
            'nom' => 'required|string|max:255',
            'descripcio' => 'nullable|string',
            'imatge' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $exercici->update([
            'nom' => $request->nom,
            'descripcio' => $request->descripcio,
            'imatge' => $request->imatge,
            'categoria_id' => $request->categoria_id,
        ]);

        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercici $exercici)
    {
        $this->checkAdmin();

        $exercici->delete();

        return redirect()->route('admin.dashboard');
    }

    public function perCategoria($categoriaId)
    {
        $exercicis = Exercici::where('categoria_id', $categoriaId)
            ->with('categoria')
            ->get();

        $categoria = Categoria::findOrFail($categoriaId);

        return view('client.dashboard', compact('exercicis', 'categoria'));
    }
}