<?php

namespace App\Http\Controllers\Api;

use App\Models\agencies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MapController extends Controller
{
    //Con eta función recogemos los datos de la base de datos
    public function datos(){

        $datos = agencies::table('broggi.agencies')
        ->select('nom', 'carrer', 'codi_postal')
        ->get();

        return $datos;
    }
}
