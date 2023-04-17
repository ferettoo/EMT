@extends('layouts.template')

@section('title', 'Carta de Llamada')
@section('cartaLlamada')
    <link rel="stylesheet" href="{{ asset('css/tablas.css') }}">
@endsection

@section('carta')
<a class="rounded-5 btn btn-warning text-white" style=" font-weight: 700;" type="submit" href="{{ url('/carta') }}">
<i class="bi bi-plus-lg"></i>
    Call card
</a>
@endsection
@section('content')


    <br>
    <div class="row">
        <div class="col-12 p-1">
            {{-- Contenido de la carta --}}
            <div class="card border border-0 mb-3">
                <div class="card-header border-0  border-success text-center" style="background-color: #E0127A">
                    {{-- Contenido del header  --}}
                    <div class="row fs-6 fw-light text-light fw-bold">
                        <div class="col-2">Identificación</div>
                        <div class="col-2">Incidente</div>
                        <div class="col-4">Localización</div>
                        <div class="col-3">Agencias</div>
                    </div>
                </div>
                <div class="card-body rounded-bottom" style="background-color: #f9f9f9">
                    <div class="row">


                        {{-- <div class="col-1"></div> --}}

                        {{-- IDENTIFICACION --}}
                        <div class="col-2">

                            <div class="row">
                            </div>
                            <div class="mb-2">
                                <label for="telefono" class="form-label"> <strong>🟡Código de carta</strong></label>
                                <input type="text" readonly class="form-control-plaintext text-info" id="telefono"
                                    value="{{ $carta->codi_trucada }}">
                            </div>
                            <div class="mb-2">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" readonly class="form-control-plaintext text-info" id="telefono"
                                    value="{{ $carta->telefon }}">
                            </div>
                            <div class="mb-2">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" readonly class="form-control-plaintext text-info" id="nombre"
                                    value="{{ $carta->nom }}">
                            </div>
                            <div class="mb-2">
                                <label for="apellido" class="form-label">Apellidos</label>
                                <input type="text" readonly class="form-control-plaintext text-info" id="apellido"
                                    value="{{ $carta->cognoms }}">
                            </div>
                            <div class="mb-2">
                                <label for="municipio" class="form-label">Municipio</label>
                                <input type="text" readonly class="form-control-plaintext text-info" id="apellido"
                                    value="{{ $carta->municipis->nom }}">
                            </div>
                            <div class="mb-2">
                                <label for="provincia" class="form-label">Provincia</label>
                                <input type="text" readonly class="form-control-plaintext text-info" id="apellido"
                                    value="{{ $carta->provincies->nom }}">
                            </div>

                            {{-- <div class="mb-2">
                            <label for="direccion" class="form-label">Tipo localización</label>
                            <input type="text" readonly class="form-control-plaintext text-info" id="apellido"
                            value="{{ $carta->tipusLocalitzacions->nom }}">
                        </div>

                        <div class="mb-2">
                            <label for="direccion" class="form-label">Descripción de localización</label>
                            <input type="text" readonly class="form-control-plaintext text-info" id="apellido"
                            value="{{ $carta->decripcio_localitzacio}}">
                        </div>

                        <div class="mb-2">
                            <label for="direccion" class="form-label">Detalles de localización</label>
                            <input type="text" readonly class="form-control-plaintext text-info" id="apellido"
                            value="{{ $carta->detall_localitzacio}}">
                        </div> --}}
                            {{-- <div class="mb-2">
                            <label for="antecedentes" class="form-label">Antecedentes del Telefóno</label>
                            <textarea class="form-control" id="antecedentes" style="height: 161px;"></textarea>
                        </div> --}}
                        </div>


                        {{-- INCIDENTE --}}
                        <div class="col-3">

                            {{-- NOTA COMUNA --}}
                            <h5 class="card-title fs-6"><strong>🟡Nota Comuna</strong></h5>
                            {{-- <textarea class="form-control-plaintext mb-2"  readonly id="antecedentes" rows="3" style="height: 94px;" value="{{ $carta->nota_comuna}}"></textarea> --}}
                            <input type="text" readonly class="form-control-plaintext text-info" id="apellido"
                                value="{{ $carta->nota_comuna }}">

                            <div class="mb-2">
                                <p class="fs-6 mb-2">tipo de incidente
                                </p>
                                <input type="text" readonly class="form-control-plaintext text-info" id="apellido"
                                    value="{{ $carta->incidents->nom }}">

                            </div>
                        </div>


                        <div class="col-3">
                            <div class="mb-2">
                                <label for="direccion" class="form-label"><strong>🟡Tipo localización</strong></label>
                                <input type="text" readonly class="form-control-plaintext text-info" id="apellido"
                                    value="{{ $carta->tipusLocalitzacions->nom }}">
                            </div>

                            <div class="mb-2">
                                <label for="direccion" class="form-label">Descripción de localización</label>
                                <input type="text" readonly class="form-control-plaintext text-info" id="apellido"
                                    value="{{ $carta->decripcio_localitzacio }}">
                            </div>

                            <div class="mb-2">
                                <label for="direccion" class="form-label">Detalles de localización</label>
                                <input type="text" readonly class="form-control-plaintext text-info" id="apellido"
                                    value="{{ $carta->detall_localitzacio }}">
                            </div>

                            <div class="mb-2">
                                <label for="direccion" class="form-label">Otras referencias de localización</label>
                                <input type="text" readonly class="form-control-plaintext text-info" id="apellido"
                                    value="{{ $carta->altres_ref_localitzacio }}">
                            </div>

                        </div>

                        {{-- AGENCIA --}}
                        <div class="col-4">
                            <div class="mb-2">
                                <p class="fs-6 mb-1"><strong>🟡Agencias</strong>
                                </p>
                                {{-- esto es para imprimir si hay mas de una agencia --}}
                                @foreach ($carta->cartaTrucadesHasAgencies as $agencias)
                                    <input type="text" readonly class="form-control-plaintext text-info"
                                        id="apellido" value="{{ $agencias->agencies->nom }}">
                                @endforeach
                            </div>

                            <div class="mb-2">
                                <p class="fs-6 mb-1"><strong>🟡Estado de agencias</strong>
                                </p>

                                <input type="text" readonly class="form-control-plaintext text-info" id="apellido"
                                    value="{{ $agencias->estatAgencies->estat }}">

                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">

                <a href="javascript:history.back(-1)"
                    class="shadow border border-0 btn btn-info text-white rounded-3 mx-1">
                    Volver
                </a>



            </div>
        </div>

        {{-- <div class="col-4 d-flex flex-column p-1">
        <div class="h-50 tableContainer" style="background-color: #f9f9f9">
            
            <table class="table table-borderless">
                <thead class='text-center text-light fw-bold' style="background-color: #0F9DB2">
                    <tr>
                        <th scope="col">Incidente</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Asociar</th>
                        <th scope="col">Creación</th>
                    </tr>
                </thead>
                <tbody class="text-center" style="background-color: #f9f9f9">
                    <tr>
                        <th scope="row">1</th>
                        <td>Inmobilizado</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>

                        <th>1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>

                </tbody>
                <tfoot style="background-color: #f9f9f9" class="mb-1">
                    <tr class="float-end">
                        <td><button class="btn btn-warning btn-sm"><strong>Nuevo Expediente</strong></button></td>
                    </tr>
                </tfoot>

            </table>
        </div>
        <div class="h-50 position-relative">
           
            <img src="{{ asset('images/mapa.jpg') }}" alt="mapa" class="img-fluid rounded mapa" style="height: 96%">
            <button class="btn btn-warning position-absolute top-50 start-50 translate-middle"><strong><i class="bi bi-geo-alt-fill"></i> LOCALIZACIÓN</strong></button>
        </div>
    </div> --}}


    </div>

    {{-- 
<dialog id="popup_incidente">
    <button id="close_incidente" type="button"> <img src="{{ asset('images/cerrar_boton.png') }}" height="30px"
            width="30px" alt="boton_cerrar"></button></p>
    <h4>INCIDENTES</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ESPAÑOL</th>
                <th scope="col">INGLES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Apuñalamiento</td>
                <td>Stabbing</td>
            </tr>
            <tr>
                <td>Arbol caido</td>
                <td>Fallen tree</td>
            </tr>
            <tr>
                <td>Derrumbe</td>
                <td>Collapse</td>
            </tr>
            <tr>
                <td>Ahogamiento</td>
                <td>Drowing</td>
            </tr>
            <tr>
                <td>Arbol Caido</td>
                <td>Fallen Tree</td>
            </tr>
            <tr>
                <td>Incendio</td>
                <td>Fire</td>
            <tr>
                <td>Explosion</td>
                <td>Burst</td>
            </tr>
            <tr>
                <td>Rescate</td>
                <td>Rescue</td>
            </tr>
            <tr>
                <td>Enfermedad</td>
                <td>Collapse</td>
            </tr>
            <tr>
                <td>Fallecimiento</td>
                <td>Death</td>
            </tr>
            <tr>
                <td>Desaparicion</td>
                <td>Disappearance</td>
            </tr>
            <tr>
                <td>Inundación</td>
                <td>Flood</td>
            </tr>
        </tbody>
    </table>
</dialog>


<dialog id="popup_localizacion">
    <button id="close_localizacion" type="button"> <img src="{{ asset('images/cerrar_boton.png') }}" height="30px"
            width="30px" alt="boton_cerrar"></button></p>
    <h4>LOCALIZACIONES</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ESPAÑOL</th>
                <th scope="col">INGLES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Provincia</td>
                <td>Province</td>
            </tr>
            <tr>
                <td>Municipio</td>
                <td>Municipality</td>
            </tr>
            <tr>
                <td>Carretera</td>
                <td>Road</td>
            </tr>
            <tr>
                <td>Entidad Población</td>
                <td>Entity Population</td>
            </tr>
        </tbody>
    </table>
</dialog> --}}

@endsection
