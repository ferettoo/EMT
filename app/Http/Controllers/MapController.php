<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\agencies;
use Illuminate\Http\Request;


class MapController extends Controller
{
    function mapa()
    {

        $datos = DB::table('broggi.agencies')
            ->select('nom', 'carrer', 'codi_postal')
            ->get();

        return view('Mapa.mapa', compact('datos'));
    }
}
