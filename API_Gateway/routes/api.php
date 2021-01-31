<?php

//use App\Http\Procedures\TennisProcedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CuentaController;

//Route::rpc('/v1/endpoint', [TennisProcedure::class]);

Route::post('registerUser', [UserController::class, 'register']);
Route::get('login', [UserController::class, 'authenticate']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('logout',[UserController::class, 'logout']); //Cerrar sesión
    //Servicio Cuenta
    Route::get('getCuenta', [CuentaController::class, 'getCuenta']);
    Route::post('cuenta/create', [CuentaController::class, 'register']);
    Route::put('cuenta/editInfo', [CuentaController::class, 'editInfo']);
    Route::get('getFotoPerfil', [CuentaController::class, 'getFotoPerfil']);
    Route::post('subirFotoPerfil', [CuentaController::class, 'subirFotoPerfil']);

    //Servicio Post





});
