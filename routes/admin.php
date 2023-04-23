<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\PlantillasController;
use App\Http\Controllers\Admin\DiaController;
use App\Http\Controllers\Admin\generateTrabajos;
use App\Http\Controllers\Admin\verTrabajosController;
use App\Http\Controllers\Admin\MensajeController;
use App\Http\Controllers\Admin\TrabajosCentroController;
use App\Http\Controllers\Admin\TareasTrabajoController;
use App\Http\Controllers\Admin\TrabajadoresController;
use App\Http\Controllers\Admin\MasterTrabajosController;
use App\Http\Controllers\Admin\MasterPartesController;


Route::get('/admin', [HomeController::class,'index'])->name('admin.home')->middleware(['auth','can:Admin: Ver panel Administración']);
Route::get('/admin/categorias',CategoriaController::class)->name('admin.categorias');
Route::get('/admin/users', TrabajadoresController::class)->name('admin.users');
Route::get('/admin/roles', RoleController::class)->name('admin.roles');
Route::get('/admin/trabajos', MasterTrabajosController::class)->name('admin.master');
Route::get('/admin/partes/{trabajo}', MasterPartesController::class)->name('admin.partes');
/* Route::resource('/admin/genera', generateTrabajos::class)->names('admin.generate')->middleware(['auth']);; */
/* Route::resource('/admin/roles', RoleController::class)->names('admin.roles'); */
/* Route::resource('/admin/users', UsersController::class)->names('admin.users');
Route::resource('/admin/users', UsersController::class)->names('admin.users'); */
/* Route::resource('/admin/categorias', CategoriaController::class)->names('admin.categorias'); */
/* Route::resource('/admin/plantillas', PlantillasController::class)->names('admin.plantillas'); */
/* Route::resource('/admin/trabajos', TrabajosCentroController::class)->names('admin.trabajos'); */
/* Route::resource('/admin/taras/{trabajo}', TareasTrabajoController::class)->names('admin.tareas');
 */
/* Route::get('admin/trabajadores', [RoleController::class,'index'])->name('trabajores.index')->middleware(['auth','isAdmin']); */
/* Route::resource('/admin/dias', DiaController::class)->names('admin.dias');
 */
/* Route::resource('/admin/vertrabajos', verTrabajosController::class)->names('admin.ver')->middleware(['auth']);; */
Route::resource('/admin/mensajes', MensajeController::class)->names('admin.mensajes');
