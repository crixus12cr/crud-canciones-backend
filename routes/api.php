<?php

use App\Models\Cancion;
use App\Models\Categoria;
use App\Models\Tipo;
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
    Route::resource('tipo_cancion', Tipo::class);
    Route::resource('categorias', Categoria::class);
    Route::resource('canciones', Cancion::class);
});
