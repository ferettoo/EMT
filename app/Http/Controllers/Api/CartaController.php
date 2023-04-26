<?php

namespace App\Http\Controllers\Api;


use DateTime;
use App\Models\expedients;
use Illuminate\Http\Request;
use App\Models\interlocutors;
use App\Models\cartes_trucades;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartaResources;
use Illuminate\Database\QueryException;

class CartaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartaLlamada = cartes_trucades::with('expedients')->with('interlocutors')->get();
        return CartaResources::collection($cartaLlamada);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $carta = new cartes_trucades();
            $interlocutor = new interlocutors();
            $expediente = expedients::where('codi','=',$request->input('idExpediente'))->first();

            // Interlocutor de la carta
            if ($request->input('guardarInterlocutor') == true) {
                $interlocutor->telefon = $request->input('telefono');
                $interlocutor->antecedents = $request->input('antecedentesInterlocutor');
                $interlocutor->nom = $request->input('nombre');
                $interlocutor->cognoms = $request->input('apellido');
                $interlocutor->save();
            }

            // Expediente de la carta
            if ($expediente == null) {
                $expediente = new expedients();
                $expediente->codi = $request->input('idExpediente');
                $expediente->estat_expedients_id = $request->input('estadoExpediente');
                $expediente->save();
            }


            // En los $request->input hemos de añadir los nombres del objeto que añadimos. un ejemplo seria: idLlamada

            $carta->codi_trucada = $request->input('idLlamada');
            $carta->data_hora_trucada = new \DateTime($request->input('dataHoraTrucada'));
            $carta->durada = $request->input('tiempo');
            $carta->interlocutors_id = $interlocutor->id;
            $carta->telefon = $request->input('telefono');
            $carta->nom = $request->input('nombre');
            $carta->cognoms = $request->input('apellido');
            $carta->nota_comuna = $request->input('notaComuna');
            $carta->tipus_localitzacions_id = $request->input('tipoLocalizacion');
            $carta->decripcio_localitzacio = $request->input('descripcionLocalizacion');
            $carta->detall_localitzacio = $request->input('detallesLocalizacion');
            $carta->altres_ref_localitzacio = $request->input('otrasRefLocalizacion');
            $carta->municipis_id = $request->input('idMunicipio');
            $carta->provincies_id = $request->input('idProvincia');
            $carta->incidents_id = $request->input('incidente');
            $carta->expedients_id = $expediente->id;
            $carta->usuaris_id = $request->input('idUsuario');

            $carta->save();

            DB::commit();

            $response = (new CartaResources($carta))->response()->setStatusCode(201);
        } catch (QueryException $ex) {

            DB::rollback();
            $mensaje = 'Error a la hora de añadir la carta de llamada';
            $response = \response()->json(['error' => $mensaje], 400);
        }

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(cartes_trucades $cartes_trucades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cartes_trucades $cartes_trucades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cartes_trucades $cartes_trucades)
    {
        //
    }
}
