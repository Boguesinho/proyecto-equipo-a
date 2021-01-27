<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentaController;

Route::post('cuenta/create', [CuentaController::class, 'create']);
Route::put('cuenta/editInfo', [CuentaController::class, 'editInfo']);
Route::get('cuenta/{id}', [CuentaController::class, 'getCuenta']);