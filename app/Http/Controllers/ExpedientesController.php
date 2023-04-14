<?php

namespace App\Http\Controllers;

use App\Clases\Utilitat;
use App\Models\expedients;
use Illuminate\Http\Request;
use App\Models\cartes_trucades;
use App\Models\cartes_trucades_has_agencies;
use App\Models\estat_agencies;
use App\Models\estat_expedients;
use Illuminate\Database\QueryException;

class ExpedientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // impresion de los expedientes
        $expedientes=expedients::all();
        // para filtracion de expedientes
        $estadoExpedientes=estat_expedients::all();
        // carta de llamada 
        $carta=cartes_trucades::all();

        // variable para condicion de busqueda
        $estado=$request->input('selecEstado');

        
        // mostramos todos los expedientes

        if($estado == 'todos')
        {
            $expedientes = expedients::orderBy('codi')
            ->paginate(5)
            ->withQueryString();
        }
        elseif(!$estado)
        {
            $expedientes = expedients::orderBy('id')
            ->paginate(5)
            ->withQueryString();
        }
        else
        {
            $consulta=expedients::where('estat_expedients_id', $estado)
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
        // esta linea es para paginar las cartas de llamadas de los expedientes.
        $cartasLlamada=cartes_trucades::where('expedients_id',$expediente->id)->paginate(4);
        return view('Expedientes.cartasDeExpediente', compact('expediente','cartasLlamada'));
    }


    //página de estado de agencia
    public function editEstadoAgencia(cartes_trucades $carta, expedients $expediente)
    {       
        // $estado=cartaTrucadesHasAgencies::where()
        return view('Expedientes.estadoAgencias', compact('carta', 'expediente'));
    }


    // falta aplicar actualizacion para modificar estado de agencia
    public function updateEstadoAgencia(Request $request, cartes_trucades_has_agencies $estado)
    {
        // solo se introduce el estado, es lo unico que se puede modificar
        $estado->estat_agencies_id = $request->input('estadoAgencia');

        try {
            $estado->save();
            $response = redirect()->action([ExpedientesController::class, 'editCartasExpediente']);
        } catch (QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
            $response = redirect()->action([ExpedientesController::class, 'editEstadoAgencia'], ['expediente' => $estado->cartes_trucades_id]);
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
