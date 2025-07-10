<?php

use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HolaController;
use App\Http\Controllers\PolizasController;
use App\Models\Clientes;
use App\Models\Polizas;

Route::get('/', function () {
    return view('welcome');
});

Route::get('UNR', [HolaController::class,'index'] );
Auth::routes();

//Usuarios
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('clientes/nuevo', [ClientesController::class, 'create'])->name('clientes.nuevo')->middleware('auth');
Route::get('clientes/editar/{id}', [ClientesController::class, 'edit'])->name('clientes.editar')->middleware('auth');
Route::delete('clientes/eliminar/{id}', [ClientesController::class, 'destroy'])->name('clientes.eliminar')->middleware('auth');
Route::get('clientes', [ClientesController::class, 'index'])->name('clientes')->middleware('auth');
Route::post('clientes/guardar', [ClientesController::class, 'store'])->name('clientes.guardar')->middleware('auth');

//Polizas
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('polizas/nuevas', [PolizasController::class, 'create'])->name('polizas.nuevas')->middleware('auth');
Route::get('polizas/editar/{id}', [PolizasController::class, 'edit'])->name('polizas.editar')->middleware('auth');
Route::delete('polizas/eliminar/{id}', [PolizasController::class, 'destroy'])->name('polizas.eliminar')->middleware('auth');
Route::get('polizas', [PolizasController::class, 'index'])->name('polizas')->middleware('auth');
Route::post('polizas/guardar', [PolizasController::class, 'store'])->name('polizas.guardar')->middleware('auth');
