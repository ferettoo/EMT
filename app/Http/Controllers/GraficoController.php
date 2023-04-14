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
            array_push($porcentages, $auxiliar);
            // $incidentes->porcentage = $auxiliar;
        }

        return view('graficos.grafico', compact('llamadas', 'incidentes', 'porcentages')); //Nos llevamos estos datos a la vista de los gráficos
    }
}
