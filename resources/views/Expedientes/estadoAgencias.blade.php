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


    {{-- foreach para muestra de datos en estado de agencia --}}
    @foreach ($carta->cartaTrucadesHasAgencies as $estado)
    @endforeach


    <br>
    <div class="card">
        <div class="card-header text-white" style="background-color: #E0127A">
            Gestion de agencia
        </div>
        <div class="card-body">
            {{-- UPDATE --}}
            {{-- <form
            action="{{ action([App\Http\Controllers\ExpedientesController::class, 'update'], ['expediente' => $expediente->id]) }}"
            method="POST">
            @method('PUT')
            @csrf --}}

            {{-- UPDATE --}}
            <form action="">

            {{-- CODIGO CARTA --}}
            <div class="row mb-3 ">
                <label for="" class="col-sm-2 col-form-label">Codigo: </label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="idExpediente"
                        value="{{ $carta->codi_trucada }}">
                </div>
            </div>

            {{-- AGENCIA --}}
            <div class="row mb-3 ">
                <label for="" class="col-sm-2 col-form-label">Agencia: </label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="codigoExpediente"
                        value="{{ $estado->agencies->nom }}">
                </div>
            </div>

            <div class="row mb-3 ">
                <label for="" class="col-sm-2 col-form-label">Estado de agencia: </label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="codigoExpediente"
                        value="{{ $estado->estatAgencies->estat }}">
                </div>
            </div>
            <br><br><br>

            {{-- INPUT TIPO --}}
            {{-- <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label"> Estado de Expediente </label>
                <div class="col-sm-10"> --}}
            {{-- ACTUALIZAR --}}
            {{-- <select class="form-select" aria-label="Default select example" id="estado" name="estado"
                        value="">
                        @foreach ($estados as $estado)
                            @if ($estado->id == $expediente->estat_expedients_id)
                                <option selected value="{{ $estado->id }}"> {{ $estado->estat }} </option>
                            @else
                                <option value="{{ $estado->id }}"> {{ $estado->estat }} </option>
                            @endif
                        @endforeach
                    </select>
                </div> --}}




            {{-- linea para posicionamiento de iconos --}}
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                {{-- CONFIRMACION DE EDICIÓN --}}
                <button class="btn btn-info text-white" type="submit"><i class="bi bi-check-lg"></i> Aceptar</button>

                {{-- VOLVEMOS A CARTAS DE LLAMADA --}}
                <a class="btn btn-secondary" href="javascript:history.back(-1)"><i class="bi bi-x-lg"></i>Cancelar</a>

            </div>
        </div>
        </form>
    </div>
    </div>

@endsection
