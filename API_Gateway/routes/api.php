<?php

//use App\Http\Procedures\TennisProcedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\PostController;

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
    //Posts
    Route::post('createPost', [PostController::class, 'createPost']);

    Route::get('misPosts', [PostController::class, 'misPosts']);
    Route::put('editPost/{ruta}', [PostController::class, 'editPost']);
    Route::delete('deletePost/{idPost}', [PostController::class, 'deletePost']);
    Route::get('getImagenPost/{ruta}', [PostController::class, 'getImagenPost']);

    //Likes
    Route::post('{idPost}/addLike', [PostController::class, 'addLike']);
    Route::delete('{idLike}/deleteLike', [PostController::class, 'deleteLike']);
    Route::get('{idPost}/getNumLikes', [PostController::class, 'getNumLikes']);

    //Comentarios
    Route::post('{idPost}/addComentario', [PostController::class, 'addComentario']);
    Route::put('{idPost}/{idComentario}/editComentario', [PostController::class, 'editComentario']);
    Route::delete('{idComentario}/deleteComentario', [PostController::class, 'deleteComentario']);
    Route::get('{idPost}/getComentarios', [PostController::class, 'getComentarios']);

    //Servicio Historias


    //Servicio Chats




});
