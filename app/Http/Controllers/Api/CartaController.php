<?php

namespace App\Http\Controllers\Api;


use App\Models\cartes_trucades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartaResources;

class CartaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartaLlamada = cartes_trucades::all();
        return CartaResources::collection($cartaLlamada);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cartaLlamada = new cartes_trucades();
    }

    /**
     * Display the specified resource.
     */
    public function show(cartes_trucades $cartes_trucades)
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
