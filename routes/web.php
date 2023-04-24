<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdmUsuarios;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdmUsuariosController;
use App\Http\Controllers\CartasAgenciasController;
use App\Http\Controllers\ExpedientesController;
use App\Http\Controllers\Api\ApiUsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('carta.carta');
// });


// AUTENTIFICACION USUARIOS (siempre /index)

Route::get('/', function () {
    return view('index');
});

Route::apiResource('api/usuari', ApiUsuarioController::class);

Route::get('/login', [UsuarioController::class, 'showLogin'])->name('login');
Route::post('/login', [UsuarioController::class, 'login']);
Route::get('/logout', [UsuarioController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/carta', function () {
        $user = Auth::user();

        return view('carta.cartaVue', compact('user'));
    });
});


Route::resource('admUsuarios', AdmUsuariosController::class);
Route::resource('expedientes', ExpedientesController::class);
// Route::resource('cartasExpediente', cartasDeExpedienteController::class);

// MOSTRAR EXPEDIENTES
// pirula(es necesario crear un nueva ruta con el nuevo metodo añadido el controlador)
Route::get('editCartasExpediente/{expediente}',  [ExpedientesController::class, 'editCartasExpediente']);

// MOSTRAR - ESTADO DE AGENCIA
Route::get('editEstadoAgencia/{carta}',  [ExpedientesController::class, 'editEstadoAgencia']);
// Route::resource('cartasExpediente', CartasAgenciasController::class);
//Route::resource('admUsuarios', AdmUsuarios::class);

// ACTUALIZAR ESTADO AGENCIA
Route::put('updateEstadoAgencia/{carta}/{agencia}',  [ExpedientesController::class, 'updateEstadoAgencia']);

// MOSTRAR LAS CARTAS DEL EXPEDIENTE
Route::get('editMostrarCarta/{carta}',  [ExpedientesController::class, 'editMostrarCarta']);

//Ruta para los gráficos
Route::get('graficos', [App\Http\Controllers\GraficoController::class, 'numeroLlamadas']);

Route::get('admExpedientes', function () {
    return view('admExpedientes.admExpedientes');
});

// Route::resource('admExpedients', admExpedientsController::class);

