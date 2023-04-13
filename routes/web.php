<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdmUsuariosController;
use App\Http\Controllers\ExpedientesController;

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


// AUTENTIFICACION USUARIOS

Route::get('/', function () {
    return view('carta.carta');
});

Route::get('/mapa', function () {
    return view('mapa');
});



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
