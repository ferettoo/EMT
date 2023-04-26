<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\MapController;
use App\Http\Controllers\Api\CartaController;
use App\Http\Controllers\Api\GraficoController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\ComarcasController;
use App\Http\Controllers\Api\ExpedienteController;
use App\Http\Controllers\Api\IncidenteController;
use App\Http\Controllers\Api\InterlocutorController;
use App\Http\Controllers\Api\MunicipiosController;
use App\Http\Controllers\Api\ProvinciasController;
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

Route::apiResource('cartes_trucades', CartaController::class);
Route::apiResource('tipus_incidents', tipoIncidenteController::class);
Route::get('graficos', [GraficoController::class, 'incidentes']);
Route::apiResource('incidents', IncidenteController::class);
Route::apiResource('municipis', MunicipiosController::class);
Route::apiResource('provincies', ProvinciasController::class);
Route::apiResource('comarques', ComarcasController::class);
Route::get('mapa', [MapController::class, 'mapa']);
Route::apiResource('expediente', ExpedienteController::class);
Route::apiResource('interlocutor', InterlocutorController::class);
Route::get('graficosGirona', [GraficoController::class, 'incidentesGirona']);
Route::get('graficosBcn', [GraficoController::class, 'incidentesBcn']);
Route::get('graficosLleida', [GraficoController::class, 'incidentesLleida']);
Route::get('graficosTarragona', [GraficoController::class, 'incidentesTarragona']);
Route::get('graficosIncidentesMes', [GraficoController::class, 'incidentesPorMes']);
