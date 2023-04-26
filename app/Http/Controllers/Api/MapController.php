<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MapController extends Controller
{
    // Recupera los datos de la base de datos y los devuelve como JSON
    public function mapa()
    {
        $datos = DB::table('broggi.agencies')
            ->select('nom', 'carrer', 'codi_postal')
            ->get();

        return response()->json($datos);
    }
}
