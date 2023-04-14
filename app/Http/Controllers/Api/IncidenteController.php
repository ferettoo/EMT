<?php

namespace App\Http\Controllers\Api;

use App\Models\incidents;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\IncidenteResources;

class IncidenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidentes = incidents::with('tipusIncidents')->get();
        return IncidenteResources::collection($incidentes);
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
    public function show(incidents $incidents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, incidents $incidents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(incidents $incidents)
    {
        //
    }
}
