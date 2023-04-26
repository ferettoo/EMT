@extends('layouts.template')

@section('title', 'Gestión de Expedientes')
@section('admUsuariosCss')
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
    @include('partials.mensajes')
    <br>
    <div class="card">
        <div class="card-header text-white" style="background-color: #E0127A">
            Gestión de agencia
        </div>
        <div class="card-body">
            {{-- UPDATE --}}

            {{-- CODIGO CARTA --}}
            <div class="row mb-3 ">
                <label for="" class="col-sm-2 col-form-label"><strong>🟡 Codigo de expediente:</strong>
                </label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="idExpediente"
                        value="{{ $carta->expedients->codi }}">
                </div>
            </div>
            {{-- CODIGO CARTA --}}
            <div class="row mb-3 ">
                <label for="" class="col-sm-2 col-form-label"><strong>🟡 Código de carta:</strong> </label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="idExpediente"
                        value="{{ $carta->codi_trucada }}">
                </div>
            </div>



            {{-- foreach para muestra de datos en estado de agencia --}}
            @foreach ($carta->cartaTrucadesHasAgencies as $estadoAgencia)
                <form
                    action="{{ action([App\Http\Controllers\ExpedientesController::class, 'updateEstadoAgencia'], ['carta' => $estadoAgencia->cartes_trucades_id, 'agencia' => $estadoAgencia->agencies_id]) }}"
                    method="POST">
                    @method('PUT')
                    @csrf
                    {{-- NOMBRE DE LA AGENCIA --}}
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label"> <strong> 🟡Agencia:</strong> </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="codigoExpediente"
                                value="{{ $estadoAgencia->agencies->nom }}">
                        </div>
                    </div>

                    {{-- ESTADO DE LA AGENCIA --}}
                    <div class="row mb-3 ">
                        <label for="" class="col-sm-2 col-form-label">Estado de agencia: </label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="estadoAgencia"
                                name="estadoAgencia" value="estadoAgencia">
                                {{-- ESTADOS DE LAS AGENCIAS (TABLA ESTADO AGENCIAS) --}}
                                @foreach ($estados as $estado)
                                    @if ($estado->id == $estadoAgencia->estat_agencies_id)
                                        <option selected value="{{ $estado->id }}"> {{ $estado->estat }} </option>
                                    @else
                                        <option value="{{ $estado->id }}"> {{ $estado->estat }} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- linea para posicionamiento de iconos --}}
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        {{-- CONFIRMACION DE EDICIÓN --}}
                        <button class="btn btn-info text-white" type="submit"><i class="bi bi-check-lg"></i>
                            Confirmación de cambio</button>

                        {{-- VOLVEMOS A CARTAS DE LLAMADA --}}
                        {{-- <a class="btn btn-secondary" href="javascript:history.back(-1)"><i
                                class="bi bi-x-lg"></i>Cancelar</a> --}}
                    </div>

                </form>
            @endforeach

            {{-- linea para posicionamiento de iconos --}}
            <br>
            <div>
                {{-- <hr id="linea" class="w-100 clearfix d-md m-0" />
                <br> --}}
                <div class="col-12">
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        {{-- VOLVER A LAS CARTAS --}}
                        <a class="btn btn-info text-white"
                            href="{{ url('editCartasExpediente/' . $carta->expedients_id) }}">
                            <i class="bi bi-arrow-left"></i> Volver a cartas
                        </a>
                        {{-- MIRAR MODIFICACIONES EN CARTA --}}
                        <a class="btn btn-warning text-white" href="{{ url('editMostrarCarta/' . $carta->id) }}">
                             Mostrar cambios <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>


                </div>
            </div>
        </div>

    @endsection
