<?php

namespace App\Http\Controllers;

use App\Clases\Utilitat;
use App\Models\agencies;
use App\Models\expedients;
use Illuminate\Http\Request;
use App\Models\estat_agencies;
use App\Models\cartes_trucades;
use App\Models\estat_expedients;
use Illuminate\Database\QueryException;
use App\Models\cartes_trucades_has_agencies;

class ExpedientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // impresion de los expedientes
        $expedientes = expedients::all();
        // para filtracion de expedientes
        $estadoExpedientes = estat_expedients::all();
        // carta de llamada 
        $carta = cartes_trucades::all();

        // variable para condicion de busqueda
        $estado = $request->input('selecEstado');


        // mostramos todos los expedientes

        if ($estado == 'todos') {
            $expedientes = expedients::orderBy('codi')
                ->paginate(5)
                ->withQueryString();
        } elseif (!$estado) {
            $expedientes = expedients::orderBy('id')
                ->paginate(5)
                ->withQueryString();
        } else {
            $consulta = expedients::where('estat_expedients_id', $estado)
                ->orderBy('codi');
            $expedientes = $consulta
                ->paginate(5)
                ->withQueryString();
        }

        $request->flash();
        return view('Expedientes.expedientes', compact('expedientes', 'estadoExpedientes'));
    }


    // El expediente solo se creará en la carta de llamada
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(expedients $expedients)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */

    // pagina de edicion de estado de expediente (FUNCIONA - APARTADO FINALIZADO)
    public function edit(expedients $expediente)
    {
        $estados = estat_expedients::all();
        return view('Expedientes.modEstadoExpe', compact('expediente', 'estados'));
    }



    //pagina de carta de llamadas (FINALIZADO)
    public function editCartasExpediente(expedients $expediente)
    {
        $cartasLlamada = cartes_trucades::where('expedients_id', $expediente->id)->paginate(4);
        return view('Expedientes.cartasDeExpediente', compact('expediente', 'cartasLlamada'));
    }



    //metodo para mostrar info de la carta de llamada
    public function editMostrarCarta(cartes_trucades $carta)
    {
        return view('Expedientes.mostrarCarta', compact('carta'));
    }


    //PÁGINA DE ESTADO AGENCIAS
    public function editEstadoAgencia(cartes_trucades $carta, expedients $expediente)
    {
        //CONTENIDO DE LA TABLA DE ESTADOS DE AGENCIA
        $estados = estat_agencies::all();
        return view('Expedientes.estadoAgencias', compact('carta', 'expediente', 'estados'));
    }


    // falta aplicar actualizacion para modificar estado de agencia
    public function updateEstadoAgencia(Request $request, cartes_trucades $carta, agencies $agencia)
    {
        
        try {
            cartes_trucades_has_agencies::where('cartes_trucades_id', $carta->id)
            ->where('agencies_id', $agencia->id)
            ->update(['estat_agencies_id'=>$request->input('estadoAgencia')]);
            $response = redirect()->action([ExpedientesController::class, 'editEstadoAgencia'], ['carta' => $carta->id]);
            $request->session()->flash('mensaje', 'Estado de agencia actualizado correctamente');

        } catch (QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
            $response = redirect()->action([ExpedientesController::class, 'editEstadoAgencia'], ['carta' => $carta->id]);
        }

        return $response;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, expedients $expediente)
    {
        // solo se introduce el estado, es lo unico que se puede modificar
        $expediente->estat_expedients_id = $request->input('estado');

        try {
            $expediente->save();
            $response = redirect()->action([ExpedientesController::class, 'index']);
            $request->session()->flash('mensaje', 'Expediente actualizado correctamente');

        } catch (QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
            $response = redirect()->action([ExpedientesController::class, 'edit'], ['expediente' => $expediente->id]);
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(expedients $expedients)
    {
        //
    }
}
