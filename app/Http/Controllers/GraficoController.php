<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cartes_trucades;
use Illuminate\Support\Facades\DB;

//Este controlador lo vamos a utilizar para poder traer el número de llamadas que tenemos creadas en la base de datos
class GraficoController extends Controller
{

    //Vamos a crear la función que nos va a permitir obtener el número de cartas de llamadas que tenemos en la base de datos
    public function numeroLlamadas()
    {

        //Gráfico general
        $llamadas = cartes_trucades::count();

        $incidentes = cartes_trucades::join('incidents', 'incidents.id', '=', 'cartes_trucades.incidents_id')
            ->join('tipus_incidents', 'tipus_incidents.id', '=', 'incidents.tipus_incidents_id')
            ->select('tipus_incidents.nom', DB::raw('count(*) as numeros'))
            ->groupBy('tipus_incidents.nom')
            ->get();

        $porcentages = [];

        foreach ($incidentes as $incident) {
            $auxiliar = 0;
            $auxiliar = $incident->numeros / $llamadas;
            $auxiliar *= 100;
            $auxiliar = round($auxiliar, 2);
            array_push($porcentages, $auxiliar);
            // $incidentes->porcentage = $auxiliar;
        }


        // GRÁFICOS BCN
        $llamadasBcn = cartes_trucades::where('provincies_id', 1)->count();

        $incidentesBcn = cartes_trucades::join('incidents', 'incidents.id', '=', 'cartes_trucades.incidents_id')
            ->join('tipus_incidents', 'tipus_incidents.id', '=', 'incidents.tipus_incidents_id')
            ->select('tipus_incidents.nom', DB::raw('count(*) as numeros'))
            ->where('provincies_id', 1)
            ->groupBy('tipus_incidents.nom')
            ->get();

        $porcentagesBcn = [];

        foreach ($incidentesBcn as $incident) {
            $auxiliar = 0;
            $auxiliar = $incident->numeros / $llamadasBcn;
            $auxiliar *= 100;
            $auxiliar = round($auxiliar, 2);
            array_push($porcentagesBcn, $auxiliar);
            // $incidentes->porcentage = $auxiliar;
        }


        // GRÁFICOS GIR
        $llamadasGir = cartes_trucades::where('provincies_id', 2)->count();

        $incidentesGir = cartes_trucades::join('incidents', 'incidents.id', '=', 'cartes_trucades.incidents_id')
            ->join('tipus_incidents', 'tipus_incidents.id', '=', 'incidents.tipus_incidents_id')
            ->select('tipus_incidents.nom', DB::raw('count(*) as numeros'))
            ->where('provincies_id', 2)
            ->groupBy('tipus_incidents.nom')
            ->get();

        $porcentagesGir = [];

        foreach ($incidentesGir as $incident) {
            $auxiliar = 0;
            $auxiliar = $incident->numeros / $llamadasGir;
            $auxiliar *= 100;
            $auxiliar = round($auxiliar, 2);
            array_push($porcentagesGir, $auxiliar);
            // $incidentes->porcentage = $auxiliar;
        }


        // GRÁFICOS LLEIDA
        $llamadasLlei = cartes_trucades::where('provincies_id', 3)->count();

        $incidentesLlei = cartes_trucades::join('incidents', 'incidents.id', '=', 'cartes_trucades.incidents_id')
            ->join('tipus_incidents', 'tipus_incidents.id', '=', 'incidents.tipus_incidents_id')
            ->select('tipus_incidents.nom', DB::raw('count(*) as numeros'))
            ->where('provincies_id', 3)
            ->groupBy('tipus_incidents.nom')
            ->get();

        $porcentagesLlei = [];

        foreach ($incidentesLlei as $incident) {
            $auxiliar = 0;
            $auxiliar = $incident->numeros / $llamadasLlei;
            $auxiliar *= 100;
            $auxiliar = round($auxiliar, 2);
            array_push($porcentagesLlei, $auxiliar);
            // $incidentes->porcentage = $auxiliar;
        }


        // GRÁFICOS TARR
        $llamadasTarr = cartes_trucades::where('provincies_id', 4)->count();

        $incidentesTarr = cartes_trucades::join('incidents', 'incidents.id', '=', 'cartes_trucades.incidents_id')
            ->join('tipus_incidents', 'tipus_incidents.id', '=', 'incidents.tipus_incidents_id')
            ->select('tipus_incidents.nom', DB::raw('count(*) as numeros'))
            ->where('provincies_id', 4)
            ->groupBy('tipus_incidents.nom')
            ->get();

        $porcentagesTarr = [];

        foreach ($incidentesTarr as $incident) {
            $auxiliar = 0;
            $auxiliar = $incident->numeros / $llamadasTarr;
            $auxiliar *= 100;
            $auxiliar = round($auxiliar, 2);
            array_push($porcentagesTarr, $auxiliar);
            // $incidentes->porcentage = $auxiliar;
        }

        //METEMOS EN EL COMPACT TODAS NUESTRAS VARIABLES
        return view('graficos.grafico', compact('llamadas', 'incidentes', 'porcentages', 'llamadasBcn', 'incidentesBcn', 'porcentagesBcn', 'llamadasGir', 'incidentesGir', 'porcentagesGir', 'llamadasLlei', 'incidentesLlei', 'porcentagesLlei', 'llamadasTarr', 'incidentesTarr', 'porcentagesTarr')); //Nos llevamos estos datos a la vista de los gráficos
    }
}
