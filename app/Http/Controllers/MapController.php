<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MapController extends Controller
{
    public function mapa()
    {
        $datos = DB::table('agencies')
            ->select('nom', 'carrer', 'codi_postal')
            ->get();

        return view('Mapa.mapa', compact('datos'));
    }
}
