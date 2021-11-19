<?php

use App\Http\Controllers\Api\AtividadesController;
use App\Http\Controllers\Api\UsersController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('atividades', AtividadesController::class);

//TODO: dentro do group da autenticação
Route::apiResource('users', UsersController::class)->except('store');
//TODO:fora da autenticação
Route::apiResource('users', UsersController::class)->only('store');