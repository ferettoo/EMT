<?php

namespace App\Http\Controllers\Api;

use App\Models\usuaris;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsuariosResources;
use Illuminate\Support\Facades\Auth;

class ApiUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return new UsuariosResources($user);
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
    public function show(usuaris $usuaris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, usuaris $usuaris)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuaris $usuaris)
    {
        //
    }
}
