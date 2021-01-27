<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('registerUser', [UserController::class, 'register']);
Route::get('login', [UserController::class, 'authenticate']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('logout',[UserController::class, 'logout']); //Cerrar sesión

});
