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

    {{-- <br> --}}
    <div class="container">
        <!-- TITULO Y SUBTITULO -->

        <div class="card-body mx-5 text-center border-0">
            <!-- TITULO Y SUBTITULO-->
            <div class="d-flex ">
                <h1 class="titulo">Cartas de llamadas <i class="bi bi-envelope-fill info"></i></h3>
            </div>
            <!-- linea de division -->
            <hr id="linea" class="w-100 clearfix d-md m-0" />

            <div class="d-flex p-3">
                <h3 class="subtitulo"> Expediente - {{ $expediente->codi }} </h1>

            </div>
        </div>
            <div class="card-body mx-5 text-center border-0">
            <div class="container text-center">
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <a href="{{ url('/expedientes') }}"
                                class=" shadow btn btn-info text-white rounded-3  mx-5 text-center start-0 border-0">
                                <i class="bi bi-arrow-left"></i> Volver a expedientes
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>






    <!-- TABLA PRINCIPAL -->

    <div class="col-12">
        <div class="card mt-3 mx-5 text-center border-0">
            <div class="card-body ">
                <table class="table table-striped border-2">
                    {{-- <thead  id="coltablas" class="shadow bg-primary "> --}}
                    <thead class="shadow rounded text-white" style="background-color: #E0127A">
                        <tr>
                            {{-- <th class="text-center">ID</th> --}}
                            <th class="text-center">Código llamada</th>
                            <th class="text-center">Fecha y Hora</th>
                            <th class="text-center">Teléfono</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Apellidos</th>
                            <th class="text-center">Incidente</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            {{-- IMPRESIÓN DE LOS EXPEDIENTES --}}
                            @foreach ($cartasLlamada as $carta)
                                <td class="text-center">{{ $carta->codi_trucada }}</td>
                                <td class="text-center">{{ $carta->data_hora_trucada }}</td>
                                <td class="text-center">{{ $carta->telefon }}</td>
                                <td class="text-center">{{ $carta->nom }}</td>
                                <td class="text-center">{{ $carta->cognoms }}</td>
                                <td class="text-center">{{ $carta->incidents->nom }}</td>
                                {{-- <td class="text-ceJnter">{{ $carta->agencies->nom }}</td> --}}
                                <td>
                                    {{-- EDITAR --}}
                                    <form
                                        action="{{ action([App\Http\Controllers\ExpedientesController::class, 'editEstadoAgencia'], ['carta' => $carta->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('GET')
                                        <button type="submit"
                                            class="btn btn-secondary border border-0 rounded-3 float-end mx-1 ">
                                            <i class="bi bi-pen"></i>
                                        </button>
                                    </form>


                                    {{-- VISUALIZAR --}}

                                    <form
                                        action="{{ action([App\Http\Controllers\ExpedientesController::class, 'editMostrarCarta'], ['carta' => $carta->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('GET')
                                        <button type="submit"
                                            class=" shadow btn btn-info text-white border border-0 rounded-3 float-end mx-1">
                                            <i class="bi bi-eye"></i>
                                        </button>

                                    </form>
                                </td>
                        </tr>
                    </tbody>
                    @endforeach

                </table>

                <!-- paginación -->
                <div class="col-1">
                    {{ $cartasLlamada->links() }}
                </div>

            </div>
        </div>
    </div>


    {{-- @foreach ($expediente->cartaTrucades as $carta)
    {{ $carta->id }}
@endforeach --}}



    </div>
@endsection
