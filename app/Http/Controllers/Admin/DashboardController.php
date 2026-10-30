<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Exercici;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'categories' => Categoria::all(),
            'exercicis' => Exercici::all(),
        ]);
    }
}
