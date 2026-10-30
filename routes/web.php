<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Client\RutinaController;
use App\Http\Controllers\Client\ExerciciController;
use App\Http\Controllers\Admin\AdminExerciciController;
use App\Http\Controllers\Admin\CategoriaController;



Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', [RutinaController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('categories', CategoriaController::class);
        Route::resource('exercicis', AdminExerciciController::class);


    });


Route::get('/categories/{categoria}/exercicis', [ExerciciController::class, 'perCategoria'])
    ->middleware('auth')
    ->name('categories.exercicis');


Route::middleware('auth')->group(function () {

    Route::get('/rutines/create', [RutinaController::class, 'create'])
        ->name('rutines.create');

    Route::post('/rutines', [RutinaController::class, 'store'])
        ->name('rutines.store');

    Route::get('/rutines/{rutina}', [RutinaController::class, 'show'])
        ->name('rutines.show');

    Route::post('/rutines/{rutina}/exercicis', [RutinaController::class, 'addExercici'])
        ->name('rutines.exercicis.add');

    Route::delete('/rutines/{rutina}/exercicis/{exercici}', [RutinaController::class, 'removeExercici'])
        ->name('rutines.exercicis.remove');

});

require __DIR__.'/auth.php';