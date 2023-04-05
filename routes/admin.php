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



Route::get('/admin', [HomeController::class,'index'])->name('admin.home')->middleware(['auth','can:Admin: Ver panel Administración']);
Route::resource('/admin/roles', RoleController::class)->names('admin.roles');
Route::resource('/admin/users', UsersController::class)->names('admin.users');
Route::resource('/admin/users', UsersController::class)->names('admin.users');
Route::resource('/admin/categorias', CategoriaController::class)->names('admin.categorias');
Route::resource('/admin/plantillas', PlantillasController::class)->names('admin.plantillas');
Route::get('admin/trabajadores', [RoleController::class,'index'])->name('trabajores.index')->middleware(['auth','isAdmin']);
Route::resource('/admin/dias', DiaController::class)->names('admin.dias');
Route::resource('/admin/genera', generateTrabajos::class)->names('admin.generate')->middleware(['auth']);;
Route::resource('/admin/vertrabajos', verTrabajosController::class)->names('admin.ver')->middleware(['auth']);;
Route::resource('/admin/mensajes', MensajeController::class)->names('admin.mensajes');
