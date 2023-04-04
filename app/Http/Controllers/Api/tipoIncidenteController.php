<?php

namespace App\Http\Controllers\Api;

use App\Models\tipus_incidents;
use App\Http\Controllers\Controller;
use App\Http\Resources\tipoIncidenteResources;
use Illuminate\Http\Request;

class tipoIncidenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoIncidentes = tipus_incidents::all();
        return tipoIncidenteResources::collection($tipoIncidentes);
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
    public function show(tipus_incidents $tipus_incidents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tipus_incidents $tipus_incidents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tipus_incidents $tipus_incidents)
    {
        //
    }
}
