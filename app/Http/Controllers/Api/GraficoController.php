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

    //Recogemos los incidentes de Girona
    public function incidentesGirona()
    {
        $incidentes = cartes_trucades::join('incidents', 'incidents.id', '=', 'cartes_trucades.incidents_id')
            ->join('tipus_incidents', 'tipus_incidents.id', '=', 'incidents.tipus_incidents_id')
            ->select('tipus_incidents.nom', DB::raw('count(*) as numeros'))
            ->where('provincies_id', 2)
            ->groupBy('tipus_incidents.nom')
            ->get();

        return $incidentes;
    }

    //Recogemos los incidentes de Barcelona
    public function incidentesBcn()
    {
        $incidentes = cartes_trucades::join('incidents', 'incidents.id', '=', 'cartes_trucades.incidents_id')
            ->join('tipus_incidents', 'tipus_incidents.id', '=', 'incidents.tipus_incidents_id')
            ->select('tipus_incidents.nom', DB::raw('count(*) as numeros'))
            ->where('provincies_id', 1)
            ->groupBy('tipus_incidents.nom')
            ->get();

        return $incidentes;
    }

    // Recogemos los incidentes de Lleida
    public function incidentesLleida()
    {
        $incidentes = cartes_trucades::join('incidents', 'incidents.id', '=', 'cartes_trucades.incidents_id')
            ->join('tipus_incidents', 'tipus_incidents.id', '=', 'incidents.tipus_incidents_id')
            ->select('tipus_incidents.nom', DB::raw('count(*) as numeros'))
            ->where('provincies_id', 3)
            ->groupBy('tipus_incidents.nom')
            ->get();

        return $incidentes;
    }

    // Recogemos los incidentes de Tarragona
    public function incidentesTarragona()
    {
        $incidentes = cartes_trucades::join('incidents', 'incidents.id', '=', 'cartes_trucades.incidents_id')
            ->join('tipus_incidents', 'tipus_incidents.id', '=', 'incidents.tipus_incidents_id')
            ->select('tipus_incidents.nom', DB::raw('count(*) as numeros'))
            ->where('provincies_id', 4)
            ->groupBy('tipus_incidents.nom')
            ->get();

        return $incidentes;
    }

    //Recoger todos los incidentes / cartas de llamada por mes
    public function incidentesPorMes()
    {

        $meses = range(1, 12);
        $resultados = DB::table(DB::raw('(' . implode(',', $meses) . ') meses'))
            ->leftJoin(DB::raw('(SELECT MONTH(data_hora_trucada) AS mes, COUNT(*) AS total FROM cartes_trucades GROUP BY mes) registros'), 'meses.mes', '=', 'registros.mes')
            ->select('meses.mes', DB::raw('IFNULL(total, 0) AS total'))
            ->orderBy('meses.mes')
            ->get();

        return $resultados;
    }
}
