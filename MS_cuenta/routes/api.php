<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentaController;

Route::post('cuenta/create/{idUsuario}', [CuentaController::class, 'create']);
Route::put('cuenta/editInfo/{idUsuario}', [CuentaController::class, 'editInfo']);
Route::get('getCuenta/{idUsuario}', [CuentaController::class, 'getCuenta']);
Route::get('getFotoPerfil/{idUsuario}', [CuentaController::class, 'getFotoPerfil']);
Route::post('subirFotoPerfil/{idUsuario}', [CuentaController::class, 'subirFotoPerfil']);
