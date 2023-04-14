<?php

namespace App\Http\Controllers;


use App\Models\usuaris;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
use App\Models\tipus_usuaris;
use Illuminate\Database\QueryException;

class AdmUsuariosController extends Controller
{


    public function index(Request $request)
    {
        $tipoUsuarios = tipus_usuaris::all();
        $usuaris = usuaris::all();
        $selTipo = $request->input('selecTipo');

        // mostramos todos los usuarios
        if ($selTipo == 'todos') {
            $usuaris = usuaris::orderBy('tipus_usuaris_id')
                ->paginate(4)
                ->withQueryString();

        // mostramos todos por orden de id
        } elseif (!$selTipo) {
            $usuaris = usuaris::orderBy('id')
            ->paginate(4)
            ->withQueryString();

        // mostramos un tipo de usuario concreto
        } else {
            $consulta = usuaris::where('tipus_usuaris_id', $selTipo)
                ->orderBy('nom');
            $usuaris = $consulta
                ->paginate(4)
                ->withQueryString();
        }

        $request->flash();
        // devolvemos vista y arrays
        return view('admUsuarios.admUsuarios', compact('usuaris', 'tipoUsuarios'));
    }

    public function create()
    {
        // definimos la variable 'insert' para saber si es actualizacion o creacion
        $tipoUsuarios = tipus_usuaris::all();
        $insert = true;
        return view('admUsuarios.gestUsuarios', compact('tipoUsuarios', 'insert'));
    }

    public function edit(usuaris $admUsuario)
    {
        $tipoUsuarios = tipus_usuaris::all();
        $insert = false;
        return view('admUsuarios.gestUsuarios', compact('admUsuario', 'tipoUsuarios', 'insert'));
    }


    public function store(Request $request)
    {
        $nuevoUsuario = new usuaris();

        $nuevoUsuario->username = $request->input('username');
        $nuevoUsuario->contrasenya = bcrypt($request->input('contrasenya'));
        $nuevoUsuario->nom = $request->input('nom');
        $nuevoUsuario->cognoms = $request->input('cognoms');
        $nuevoUsuario->tipus_usuaris_id = $request->input('tipo');
        try {
            $nuevoUsuario->save();
            $response = redirect()->action([AdmUsuariosController::class, 'index']);
        } catch (QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
            $response = redirect()->action([AdmUsuariosController::class, 'create']);
        }
        return $response;
    }



    public function update(Request $request, usuaris $admUsuario)
    {
        $admUsuario->username = $request->input('username');
        $admUsuario->contrasenya = bcrypt($request->input('contrasenya'));
        $admUsuario->nom = $request->input('nom');
        $admUsuario->cognoms = $request->input('cognoms');
        $admUsuario->tipus_usuaris_id = $request->input('tipo');

        try {
            $admUsuario->save();
            $response = redirect()->action([AdmUsuariosController::class, 'index']);
        } catch (QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
            $response = redirect()->action([AdmUsuariosController::class, 'edit'], ['admUsuario' => $admUsuario->id]);
        }
        return $response;
    }


    public function destroy(usuaris $admUsuario, Request $request)
    {
        try {   //si no hay request no se utiliza el session
            $admUsuario->delete();
            $request->session()->flash('mensaje', 'Registre esborrat correctament');
        } catch (QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
        }
        return redirect()->action([AdmUsuariosController::class, 'index']);
    }
}
