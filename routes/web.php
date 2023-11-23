<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SugerenciaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('sugerencia', function () {
return view ('crearSugerencia');
})->name('sugerencia');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/insertSugerencia', [SugerenciaController ::class, 'store']);
    Route::get('/verSugerencias', [SugerenciaController ::class, 'index'])->name('verSugerencias');
    Route::delete('/borrarSugerencia/{sugerencia}', [SugerenciaController ::class, 'destroy'])->name('borrarSugerencia');
    Route::post('editarSugerencia/{sugerencia}', [SugerenciaController ::class, 'update'])->name('editarSugerencia');
});

require __DIR__.'/auth.php';

