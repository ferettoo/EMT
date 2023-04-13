<?php

namespace App\Http\Controllers;

use App\Models\cartes_trucades;
use App\Models\estat_expedients;
use App\Models\expedients;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(expedients $expedients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, expedients $expedients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(expedients $expedients)
    {
        //
    }
}
