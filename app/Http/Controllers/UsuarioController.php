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

        // $usuario->username = 'facu';
        // $usuario->contrasenya = bcrypt('123');
        // $usuario->nom = 'prueba';
        // $usuario->cognoms = 'admin2Apellido';
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
            $response = redirect('/carta');
        } else {
            $request->session()->flash('error', 'Usuario o contraseña incorrectos');
            // si queremos crear un usuario, hay que poner /login para que obtenga los datos
            // del nuevo usuario y los introduzca a la bd
            // dejar solo "/" para que solo utilice el indice en lugar del "login"
            $response = redirect('/login')->withInput();
        }

        return $response;
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
