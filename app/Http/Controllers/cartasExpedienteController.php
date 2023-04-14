<?php

namespace App\Http\Controllers;

use App\Models\expedients;
use Illuminate\Http\Request;
use App\Models\cartes_trucades;

class cartasExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(expedients $expediente)
    {
    

        return view('Expedientes.cartasDeExpediente');

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
    public function show(cartes_trucades $cartes_trucades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cartes_trucades $cartes_trucades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cartes_trucades $cartes_trucades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cartes_trucades $cartes_trucades)
    {
        //
    }
}
