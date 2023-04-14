<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ComarcasResources;
use App\Models\comarques;
use Illuminate\Http\Request;

class ComarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comarcas = comarques::with('provincies')->get();
        return ComarcasResources::collection($comarcas);
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
    public function show(comarques $comarques)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comarques $comarques)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comarques $comarques)
    {
        //
    }
}
