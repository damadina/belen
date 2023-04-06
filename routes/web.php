<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProximosDias;
use App\Http\Controllers\GestorController;

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

Route::get('/', [InicioController::class,'index'])->name('inicio')->middleware('Inicializa');

Route::get('/trabajos/{trabajo}', [InicioController::class,'trabajos'])->name('trabajo')->middleware(['auth','verified']);



Route::get('/incidencias', function () {
    return 'Hola Incidencias';
})->name('incidencias');

Route::get('/proximosdias',[ProximosDias::class,'index'])->name('proximosDias')->middleware(['auth','verified']);
Route::get('/proximosdias/{dia}',[InicioController::class,'index'])->name('verdia')->middleware(['auth','verified']);















/* Route::get('/', function () {
    return view('welcome');
}); */



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
