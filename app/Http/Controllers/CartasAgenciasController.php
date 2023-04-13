<?php

namespace App\Http\Controllers;

use App\Models\cartes_trucades_has_agencies;
use Illuminate\Http\Request;

class CartasAgenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Expedientes.visualCarta');
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
    public function show(cartes_trucades_has_agencies $cartes_trucades_has_agencies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cartes_trucades_has_agencies $cartes_trucades_has_agencies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cartes_trucades_has_agencies $cartes_trucades_has_agencies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cartes_trucades_has_agencies $cartes_trucades_has_agencies)
    {
        //
    }
}
