<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinciasResources;
use App\Models\provincies;
use Illuminate\Http\Request;

class ProvinciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provincias = provincies::all();
        return ProvinciasResources::collection($provincias);
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
    public function show(provincies $provincies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, provincies $provincies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(provincies $provincies)
    {
        //
    }
}
