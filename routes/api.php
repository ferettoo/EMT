<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\MapController;
use App\Http\Controllers\Api\CartaController;
use App\Http\Controllers\Api\tipoIncidenteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Hacer las rutas de API para la carta de llamada, expedientes, graficos.

Route::apiResource('cartes_trucades', CartaController::class );
Route::apiResource('tipus_incidents', tipoIncidenteController::class);

//El nombre de esta ruta tendrá que coincidir con la que abra la vista donde queremos manipular o mostrar los datos
Route::get('mapVista', [MapController::class, 'datos']);
