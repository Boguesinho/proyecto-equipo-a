<?php

use App\Http\Controllers\MultimediaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('getImagen', [MultimediaController::class, 'getImagen']);
Route::post('guardarImagenPerfil', [MultimediaController::class, 'guardarImagenPerfil']);
Route::post('guardarImagenPost', [MultimediaController::class, 'guardarImagenPost']);
