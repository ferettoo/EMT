<?php

namespace App\Http\Controllers\Api;

use App\Models\interlocutors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\InterlocutorResources;

class InterlocutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $interlocutors = interlocutors::all();
        return InterlocutorResources::collection($interlocutors);
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
    public function show(interlocutors $expedients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, interlocutors $expedients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(interlocutors $expedients)
    {
        //
    }
}
