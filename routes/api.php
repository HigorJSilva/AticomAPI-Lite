<?php

use App\Http\Controllers\Api\AtividadesController;
use App\Http\Controllers\Api\CertificadosController;
use App\Http\Controllers\Api\ModalidadesController;
use App\Http\Controllers\Api\ReferenciasController;
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
Route::apiResource('referencias', ReferenciasController::class);
Route::apiResource('certificados', CertificadosController::class);

Route::name('modalidades.')->prefix('modalidades/')->group(function () {
    Route::get('get-progresso', [ModalidadesController::class, 'getProgresso']);
});

Route::apiResource('modalidades', ModalidadesController::class)->except(['store', 'delete']);

Route::apiResource('users', UsersController::class)->except(['store', 'delete']);