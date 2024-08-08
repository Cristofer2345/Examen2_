<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtraccionController;
use App\Models\Atraccion;

Route::get('/', function () {
return view('welcome');
})->name('index');
//Route::redirect('/','/atracciones')->name('index');
// Route::get('/',[AtraccionController::class,'index'])->middleware(['auth', 'verified'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::middleware('auth')->group(function () {
    Route::get('/atracciones', [AtraccionController::class, 'index']);
    Route::get('/atracciones/comentarios/cantidad/{id}', [AtraccionController::class, 'cantidadComentarios']);
    Route::get('/atracciones/especie/{idEspecie}', [AtraccionController::class, 'atraccionesPorEspecie']);
});