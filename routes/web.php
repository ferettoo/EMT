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


// TODOS LOS USUARIOS REGISTRADOS
Route::middleware(['auth'])->group(function () {
    Route::get('/menu', function () {
        $user = Auth::user();
        return view('menu.menu', compact('user'));
    });
  
    //Ruta para el mapa
    Route::get('mapa', [App\Http\Controllers\MapController::class, 'mapa']);
    Route::get('carta', function () {
        return view('carta.cartaVue');
    });
    Route::get('helpbox', function () {
        return view('helpbox.helpbox');
    });
      //Ruta para los gráficos
      Route::get('graficos', [App\Http\Controllers\GraficoController::class, 'numeroLlamadas']);
});


// ADMINISTRADOR
Route::middleware(['auth', 'authAdmin'] )->group(function () {

    // GESTION DE USUARIOS
    Route::resource('admUsuarios', AdmUsuariosController::class);

    // GESTION DE USUARIOS CONTRASEÑA ACTUALIZACION
    Route::get('editContrasenya/{admUsuario}',  [AdmUsuariosController::class, 'editContrasenya']);
    Route::put('updateContrasenya/{admUsuario}',  [AdmUsuariosController::class, 'updateContrasenya']);

    // GESTION DE EXPEDIENTES
    Route::resource('expedientes', ExpedientesController::class);
    // Route::resource('cartasExpediente', cartasDeExpedienteController::class);

    // MOSTRAR CARTAS DE EXPEDIENTE
    Route::get('editCartasExpediente/{expediente}',  [ExpedientesController::class, 'editCartasExpediente']);

    // MOSTRAR - ESTADO DE AGENCIA
    Route::get('editEstadoAgencia/{carta}',  [ExpedientesController::class, 'editEstadoAgencia']);
    // Route::resource('cartasExpediente', CartasAgenciasController::class);

    // ACTUALIZAR ESTADO AGENCIA
    Route::put('updateEstadoAgencia/{carta}/{agencia}',  [ExpedientesController::class, 'updateEstadoAgencia']);

    // MOSTRAR LAS CARTAS DEL EXPEDIENTE
    Route::get('editMostrarCarta/{carta}',  [ExpedientesController::class, 'editMostrarCarta']);

    Route::get('admExpedientes', function () {
        return view('admExpedientes.admExpedientes');
    });


});



Route::fallback(function () {
    return redirect('menu');
});




// Route::get('carta', function () {
//     return view('carta.cartaVue');
// });
// Route::get('helpbox', function () {
//     return view('helpbox.helpbox');
// });

// Route::resource('admExpedients', admExpedientsController::class);
// Route::get('/mapa', function () {
//     return view('Mapa.mapa');
// });
