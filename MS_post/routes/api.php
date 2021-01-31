<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LikeController;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Posts
Route::post('createPost/{idUsuario}', [PostController::class, 'createPost']);

Route::get('misPosts/{idUsuario}', [PostController::class, 'misPosts']);
Route::put('editPost/{idPost}', [PostController::class, 'editPost']);
Route::delete('deletePost/{idPost}', [PostController::class, 'deletePost']);
Route::get('getPost/{idPost}', [PostController::class, 'getImagenPost']);

//Likes
Route::post('{idPost}/{idUsuario}/addLike', [LikeController::class, 'addLike']);
Route::delete('{idLike}/{idUsuario}/deleteLike', [LikeController::class, 'deleteLike']);
Route::get('{idPost}/getNumLikes', [LikeController::class, 'getNumLikes']);

//Comentarios
Route::post('{idPost}/{idUsuario}/addComentario', [ComentarioController::class, 'addComentario']);
Route::put('{idPost}/{idUsuario}/editComentario', [ComentarioController::class, 'editComentario']);
Route::delete('{idComentario}/deleteComentario', [ComentarioController::class, 'deleteComentario']);
Route::get('{idPost}/getComentarios', [ComentarioController::class, 'getComentarios']);
