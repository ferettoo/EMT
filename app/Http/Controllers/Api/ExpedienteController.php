<?php

namespace App\Http\Controllers\Api;

use App\Models\expedients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExpedientesResources;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expedientes = expedients::all();
        return ExpedientesResources::collection($expedientes);
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
