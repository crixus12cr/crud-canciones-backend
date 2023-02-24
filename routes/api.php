<?php

use App\Http\Controllers\CancionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TipoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
], function ($router) {
    Route::resource('tipo_cancion', TipoController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('canciones', CancionController::class);
});
