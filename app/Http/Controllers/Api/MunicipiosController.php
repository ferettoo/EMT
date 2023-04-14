<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MunicipiosResources;
use App\Models\municipis;
use Illuminate\Http\Request;

class MunicipiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipios = municipis::with('comarques')->get();
        return MunicipiosResources::collection($municipios);
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
    public function show(municipis $municipis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, municipis $municipis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(municipis $municipis)
    {
        //
    }
}
