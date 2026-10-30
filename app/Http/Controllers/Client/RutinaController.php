<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use App\Models\Rutina;
use App\Models\Exercici;

class RutinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rutines = Auth::user()->client->rutines ?? [];
        $categories = Categoria::all();
        
        return view('client.dashboard', compact('rutines', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.rutines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'descripcio' => 'nullable',
            'duracio' => 'required|integer',
        ]);

        $client = auth()->user()->client;

        $client->rutines()->create([
            'nom' => $request->nom,
            'descripcio' => $request->descripcio,
            'duracio' => $request->duracio,
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rutina $rutina)
    {
        if ($rutina->client_id !== auth()->user()->client->id) {
            abort(403);
        }

        $rutina->load('exercicis');

        $exercicis = \App\Models\Exercici::all();

        return view('client.rutines.show', compact('rutina', 'exercicis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function addExercici(Request $request, Rutina $rutina)
    {
        $request->validate([
            'exercici_id' => 'required',
            'series' => 'required|integer',
            'repeticions' => 'required|integer',
        ]);

        $rutina->exercicis()->attach($request->exercici_id, [
            'series' => $request->series,
            'repeticions' => $request->repeticions,
        ]);

        return back();
    }

    public function removeExercici(Rutina $rutina, Exercici $exercici)
    {
        $rutina->exercicis()->detach($exercici->id);

        return back();
    }
}
