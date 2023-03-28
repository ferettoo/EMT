<?php

namespace App\Http\Controllers;

use App\Models\usuaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function showLogin()
    {
        // $usuario = new usuaris();

        // $usuario->username = 'prueba1';
        // $usuario->contrasenya = bcrypt('prueba1');
        // $usuario->nom = 'Francisco';
        // $usuario->cognoms = 'Fernández Fernández';
        // $usuario->tipus_usuaris_id = 1;

        // $usuario->save();

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $contrasenya = $request->input('contrasenya');

        $user = usuaris::where('username', $username)->first();

        if ($user != null && Hash::check($contrasenya, $user->contrasenya)) {
            Auth::login($user);
            $response = redirect('/index');
        } else {
            $request->session()->flash('error', 'Usuari o contrasenya incorrectes');
            $response = redirect('/')->withInput();
        }

        return $response;
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
