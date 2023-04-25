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
   
    <div class="container mt-0">
        <!-- TITULO Y SUBTITULO -->
            <div class="card-body mx-5 text-center border-0">
                <!-- TITULO Y SUBTITULO-->
                <div class="d-flex ">
                    <h1 class="titulo"> Gestión de expedientes <i class="bi bi-archive-fill"></i></h1>
                </div>
                <!-- linea de division -->
                <hr id="linea" class="w-100 clearfix d-md m-0" />

                <div class="d-flex p-3">
                    <h3 class="subtitulo">Estado de expedientes</h3>
                </div>
            </div>
       


        <!-- SELECCION USUARIOS  -->

        <!-- DOS TABLAS -->
        {{-- <div class="row"> --}}
            <!-- OPCIONES DE BUSQUEDA-->
            <div class="col-12">
                <div class="card mt-0 mx-5 mt-0 text-center border-0">

                    <!-- NUEVO EXPEDIENTE Y ORDENAR -->
                    <form action="{{ action([App\Http\Controllers\ExpedientesController::class, 'index']) }}">
                        <div class="container text-center">
                            <br>
                            <div class="row">
                                <div class="col-4">
         
                                </div>

                                <!-- DESPLEGABLE DE BUSQUEDA -->
                                <div class="col-4 ">
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
                                        class="shadow border border-0 rounded-3 btn btn-primary text-white mb-3 "> Buscar</button>
                                </div>


                                {{-- COLUMNA VACIA --}}
                                <div class="col-3">

                                </div>

                            </div>
                        </div>
                    </form>




                    <!-- TABLA PRINCIPAL -->
                    <div class="card-body mt-4 ">
                        <table class="table table-striped border-2">
                            {{-- <thead  id="coltablas" class="shadow bg-primary "> --}}
                                <thead id="coltablas" class="shadow rounded text-white">
                                    <tr>
                                    <th class="text-center" >ID</th>
                                    <th class="text-center" >Código</th>
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
                                        @if( $expediente->estatExpedients->estat  == 'Acceptat' )

                                            <td > 
                                                <button type="button" class="btn btn-success rounded-5 disabled text-white">{{ $expediente->estatExpedients->estat }}</button>
                                                
                                             </td>   
                                        @elseif($expediente->estatExpedients->estat  == 'En procés')
                                            <td><button type="button" class="btn disabled rounded-5 text-white" style="background-color:#39DF09">{{ $expediente->estatExpedients->estat }}</button> </td>
                                        @elseif($expediente->estatExpedients->estat  == 'Immobilitzat')
                                            <td> <button type="button" class="btn btn-info disabled rounded-5 text-white">{{ $expediente->estatExpedients->estat }}</button></td> 
                                        @elseif($expediente->estatExpedients->estat  == 'Sol·licitat')
                                            <td> <button type="button" class="btn btn-warning disabled rounded-5 text-white">{{ $expediente->estatExpedients->estat }}</button></td> 
                                        @else
                                            <td> <button type="button" class="btn disabled rounded-5 text-white" style="background-color:#2587E8">{{ $expediente->estatExpedients->estat }}</button></td>  
                                        @endif
                                        {{-- <td>{{ $expediente->estatExpedients->estat }}</td>                                      --}}
                                        {{-- <td>{{ $expediente->cartaTrucades->data_hora_trucada }}</td> --}}
                                        <td> 
                                            {{-- EDITAR --}}
                                            <form
                                            action="{{ action([App\Http\Controllers\ExpedientesController::class, 'edit'], ['expediente' => $expediente->id]) }}" method="POST">
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="btn btn-secondary border border-0 rounded-3 float-end mx-1 "><i
                                                    class="bi bi-pen"></i>
                                            </button>
                                            </form>

                                        {{-- VISUALIZAR --}}
                                            <form
                                                action="{{ action([App\Http\Controllers\ExpedientesController::class, 'editCartasExpediente'], ['expediente' => $expediente->id]) }}" method="POST"> 
                                                @csrf
                                                @method('GET')
                                                <button type="submit" id="botonCarta" class=" shadow border border-0 btn btn-primary text-white rounded-3 float-end mx-1">
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

    @endsection
