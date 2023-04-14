<?php

namespace App\Http\Controllers\Api;


use App\Models\cartes_trucades;
use Illuminate\Http\Request;
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
        $cartaLlamada = cartes_trucades::all();
        return CartaResources::collection($cartaLlamada);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carta = new cartes_trucades();

        // En los $request->input hemos de añadir los nombres del objeto que añadimos. un ejemplo seria: idLlamada

        $carta->codi_trucada = $request->input('idLlamada');
        $carta->data_hora_trucada = $request->input('dataHoraTrucada');
        $carta->durada = $request->input('tiempo');
        $carta->interlocutor_id = $request->input('interlocutor');
        $carta->telefon = $request->input('telefono');
        $carta->nom = $request->input('nombre');
        $carta->cognoms = $request->input('apellido');
        $carta->nota_comuna = $request->input('notaComuna');
        $carta->tipus_localitzacions_id = $request->input('tipoLocalizacion');
        $carta->descripcio_localitzacio = $request->input('descripcionLocalizacion');
        $carta->detall_localitzacio = $request->input('detallesLocalizacion');
        $carta->altres_ref_localitzacio = $request->input('detallesLocalizacion');
        $carta->municipis_id = $request->input('idMunicipio');
        $carta->provincies_id = $request->input('idProvincia');
        $carta->incidents_id = $request->input('incidente');
        $carta->expedients_id = $request->input('idExpediente');
        $carta->usuaris_id = $request->input('idUsuario');

        // Añadir interlocutor

        // $expediente = new expediente
        try {
            $carta->save();
            $response = (new CartaResources($carta))->response()->setStatusCode(201);
        } catch (QueryException $ex) {
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
