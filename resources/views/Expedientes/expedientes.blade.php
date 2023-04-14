@extends('layouts.template')

@section('title', 'Gestión de Expedientes')
@section('admUsuariosCss')
    <link rel="stylesheet" href="{{ asset('css/tablas.css') }}">
@endsection

@section('content')
    <br>
    <div class="container">
        <!-- TITULO Y SUBTITULO -->
        <div class="card  mx-5 text-center border-0">
            <div class="card-body ">
                <!-- TITULO Y SUBTITULO-->
                <div class="d-flex ">
                    <h1 class="titulo"> Gestión de expedientes</h1>
                </div>
                <!-- linea de division -->
                <hr id="linea" class="w-100 clearfix d-md m-0" />

                <div class="d-flex p-3">
                    <h3 class="subtitulo">Estado de expedientes</h3>
                </div>
            </div>
        </div>


        <!-- SELECCION USUARIOS  -->

        <!-- DOS TABLAS -->
        {{-- <div class="row"> --}}
            <!-- OPCIONES DE BUSQUEDA-->
            <div class="col-12">
                <div class="card mt-5 mx-5 text-center border-0">

                    <!-- NUEVO EXPEDIENTE Y ORDENAR -->
                    <form action="{{ action([App\Http\Controllers\ExpedientesController::class, 'index']) }}">
                        <div class="container text-center">
                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <!-- boton de añadir usuario -->
                                    {{-- <a class="shadow btn btn-warning text-white rounded-3" href="#">
                                    <!-- <i class=" bi bi-plus-circle "></i> -->
                                    Nuevo Expediente
                                </a> --}}
                                </div>

                                <!-- COLUMNA VACIA -->
                                <div class="col-4">
                                    Columna vacia 
                                </div>

                                <!-- DESPLEGABLE DE BUSQUEDA -->
                                <div class="col-3">
                                    <div class="form-floating">
                                        <select class="form-select rounded-4" id="selecEstado" name="selecEstado"
                                            aria-label="Floating label select example">
                                            <option value="todos">Todos</option>
                                            @foreach ($estadoExpedientes as $estado)
                                                @if (old('selecEstado') == $estado->id)
                                                    <option value="{{ $estado->id }}" selected>{{ $estado->estat }}
                                                    </option>
                                                @else
                                                    <option value="{{ $estado->id }}">{{ $estado->estat }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">Mostrar:</label>
                                    </div>
                                </div>
                                {{-- BOTÓN DE BUSQUEDA --}}
                                <div class="col-1">
                                    <button type="submit" id="coltablas"
                                        class="shadow border border-0 rounded-3 btn btn-primary mb-3 "> Buscar</button>
                                </div>
                            </div>
                        </div>
                    </form>




                    <!-- TABLA PRINCIPAL -->
                    <div class="card-body ">
                        <table class="table table-striped border-2">
                            {{-- <thead  id="coltablas" class="shadow bg-primary "> --}}
                                <thead id="coltablas" class="shadow rounded text-white">
                                    <tr>
                                    <th class="text-center" >ID</th>
                                    <th class="text-center" >Codigo</th>
                                    <th class="text-center" >Estado expediente</th>
                                    {{-- <th class="text-center" scope="col">Fecha creación</th> --}}
                                    <th class="text-center"></th>
                                    {{-- <th class="text-center">Cartas / Editar</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    {{-- IMPRESIÓN DE LOS EXPEDIENTES --}}
                                    @foreach ($expedientes as $expediente)
                                        <td>{{ $expediente->id }}</td>
                                        <td>{{ $expediente->codi }}</td>
                                        <td>{{ $expediente->estatExpedients->estat }}</td>                                     
                                        {{-- <td>{{ $expediente->cartaTrucades->data_hora_trucada }}</td> --}}
                                        
                                        <td> 
                                            {{-- EDITAR --}}
                                            <form
                                            action="{{ action([App\Http\Controllers\ExpedientesController::class, 'edit'], ['expediente' => $expediente->id]) }}" method="POST">
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="btn btn-secondary float-end mx-1 "><i
                                                    class="bi bi-pen"></i>
                                            </button>
                                            </form>

                                        {{-- VISUALIZAR --}}
                                            <form
                                                action="{{ action([App\Http\Controllers\ExpedientesController::class, 'editCartasExpediente'], ['expediente' => $expediente->id]) }}" method="POST"> 
                                                @csrf
                                                @method('GET')
                                                <button type="submit" id="botonCarta" class=" shadow btn btn-primary text-white rounded-3 float-end mx-1">
                                                    <i class="bi bi-envelope"></i>
                                                </button>                   
                                            </form>
                                        </td>
                                </tr>
                            </tbody>
                            @endforeach
                            
                        </table>

                        <!-- paginación -->
                        <div class="col-1">
                            {{ $expedientes->links() }}
                        </div>
                    </div>
                </div>
            </div>





            <!-- SEGUNDA TABLA -->
{{-- 
            <div class="col-5">
                <div class="  ">
                    <div class="container text-md-start ">
                        <div class="col-12">
                            <h5>
                                Cartas de llamada
                            </h5>
                            <p>
                                Pequeña descripción, Pequeña descripción, <br>
                                Pequeña descripción, Pequeña descripción.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card mt-5 mx-0 text-center border-0">

                    <div class="card-body ">
                        <table class="table table-striped border-2">
                            <thead class="shadow bg-primary ">
                                <tr style="background-color: #E0127A;">
                                    <th class="text-light">
                                        Expediente: <br>
                                        1233
                                    </th>
                                    <th class="text-light ">
                                        Estado:
                                        <select class="form-select text-center form-select-sm rounded-3"
                                            aria-label=".form-select-sm example">
                                            <option selected aria-label="Buscar">Inmovilizado</option>
                                            <option value="1">Uno</option>
                                            <option value="2">Dos</option>
                                            <option value="3">Tres</option>
                                        </select>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th> Cod. de llamada: </th>
                                    <td>12322</td>
                                </tr>
                                <tr>
                                    <th> Cod. de llamada: </th>
                                    <td>23422</td>
                                </tr>
                                <tr>
                                    <th>Cod. de llamada: </th>
                                    <td>12321</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}

        {{-- </div> --}}





    @endsection
