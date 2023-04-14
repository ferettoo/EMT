@extends('layouts.template')

@section('title', 'Modificación expediente')
@section('modEstadoExpeCss')
    <link rel="stylesheet" href="{{ asset('css/tablas.css') }}">
@endsection

@section('content')
    <div class="container">
        <br>
        @include('partials.mensajes')
        <br>
        <div class="card">
            <div class="card-header">
                Gestion de expedientes
            </div>
            <div class="card-body">
                {{-- UPDATE --}}
                <form
                    action="{{ action([App\Http\Controllers\ExpedientesController::class, 'update'], ['expediente' => $expediente->id]) }}"
                    method="POST">
                    @method('PUT')
                    @csrf


                    {{-- INPUT USERNAME --}}
                    <div class="row mb-3 ">
                        <label for="" class="col-sm-2 col-form-label">ID: </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="idExpediente"
                                value="{{ $expediente->id }}">
                        </div>
                    </div>

                    {{-- INPUT CONTRASEÑA --}}
                    <div class="row mb-3 ">
                        <label for="" class="col-sm-2 col-form-label">Codigo de Expediente: </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="codigoExpediente"
                                value="{{ $expediente->codi }}">
                        </div>
                    </div>

                    {{-- INPUT TIPO --}}
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label"> Estado de Expediente </label>
                        <div class="col-sm-10">
                            {{-- ACTUALIZAR --}}
                            <select class="form-select" aria-label="Default select example" id="estado" name="estado"
                                value="">
                                @foreach ($estados as $estado)
                                    @if ($estado->id == $expediente->estat_expedients_id)
                                        <option selected value="{{ $estado->id }}"> {{ $estado->estat }} </option>
                                    @else
                                        <option value="{{ $estado->id }}"> {{ $estado->estat }} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <br><br><br>

                        {{-- linea para posicionamiento de iconos --}}
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            {{-- CONFIRMACION DE EDICIÓN --}}
                            <button class="btn btn-primary" type="submit"><i class="bi bi-check-lg"></i> Aceptar</button>

                            {{-- VOLVEMOS A EXPEDIENTES --}}
                            <a class="btn btn-secondary" href="{{ route('expedientes.index') }}"><i
                                    class="bi bi-x-lg"></i>Cancelar</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
