<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentaController;

Route::post('cuenta/create', [CuentaController::class, 'create']);
Route::put('cuenta/editInfo', [CuentaController::class, 'editInfo']);
Route::get('getCuenta/{idUsuario}', [CuentaController::class, 'getCuenta']);
Route::get('getFotoPerfil', [CuentaController::class, 'getFotoPerfil']);
Route::post('subirFotoPerfil/{ruta]', [CuentaController::class, 'subirFotoPerfil']);
