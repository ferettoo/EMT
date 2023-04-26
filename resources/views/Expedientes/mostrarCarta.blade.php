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

{{-- contenido de la página --}}
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
                        <div class="col-2">Incidente / Localización</div>
                        <div class="col-8">Agencias / Estado de agencias</div>
                        {{-- <div class="col-3">Agencias</div> --}}
                    </div>
                </div>
                <div class="card-body rounded-bottom" style="background-color: #f9f9f9">
                    <div class="row">

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

                        </div>


                        {{-- INCIDENTE Y LOCALIZACIÓN --}}
                        <div class="col-3">
                            {{-- NOTA COMUNA --}}
                            <h5 class="card-title fs-6"><strong>🟡Nota Comuna</strong></h5>
                            <input type="text" readonly class="form-control-plaintext text-info" id="apellido"
                                value="{{ $carta->nota_comuna }}">

                            <div class="mb-2">
                                <p class="fs-6 mb-2">tipo de incidente
                                </p>
                                <input type="text" readonly class="form-control-plaintext text-info" id="apellido"
                                    value="{{ $carta->incidents->nom }}">
                            </div>
                            <br>
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

                        {{-- AGENCIAS Y ESTADO DE AGENCIAS --}}
                        <div class="col-7">
                            <div class="mb-2">
                                <p class="fs-6 mb-1"><strong>🟡Agencias</strong>
                                </p>
                                {{-- esto es para imprimir si hay mas de una agencia --}}
                                @foreach ($carta->cartaTrucadesHasAgencies as $agencias)
                                    <input type="text" readonly class="form-control-plaintext text-info"
                                        id="apellido" value="{{ $agencias->agencies->nom }}">
                                @endforeach
                            </div>
                            <br>
                            <div class="mb-2">
                                <p class="fs-6 mb-1"><strong>🟡Estado de agencias</strong>
                                </p>
                                {{-- esto es para imprimir si hay mas de un estado --}}
                                @foreach ($carta->cartaTrucadesHasAgencies as $agencias)
                                    <input type="text" readonly class="form-control-plaintext text-info"
                                        id="apellido" value=" {{ $agencias->estatAgencies->estat }}">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- BOTÓN DE SALIR DE CARTA --}}
            <div class="col-2">
                <a href="{{ url('editCartasExpediente/' . $carta->expedients->id) }}"
                    class="shadow border border-0 btn btn-info text-white rounded-3 mx-1">
                    <i class="bi bi-arrow-left"></i> Volver a cartas
                </a>
            </div>
        </div>
    </div>
@endsection
