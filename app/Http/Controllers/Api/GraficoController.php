<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\cartes_trucades;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GraficoController extends Controller
{
    //Esta función nos va a servir para poder traer los datos que necesitamos de los gráficos
    public function incidentes()
    {
        $incidentes = cartes_trucades::join('incidents', 'incidents.id', '=', 'cartes_trucades.incidents_id')
            ->join('tipus_incidents', 'tipus_incidents.id', '=', 'incidents.tipus_incidents_id')
            ->select('tipus_incidents.nom', DB::raw('count(*) as numeros'))
            ->groupBy('tipus_incidents.nom')
            ->get();

        return $incidentes;
    }
}
