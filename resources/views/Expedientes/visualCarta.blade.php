@extends('layouts.template')

@section('title', 'Cartas de Expedientes')
@section('admUsuariosCss')
    <link rel="stylesheet" href="{{ asset('css/tablas.css') }}">
@endsection



@section('content')

<div class="container">
   <!-- TITULO Y SUBTITULO -->
   <div class="card  mx-5 text-center border-0">
    <div class="card-body ">
        <!-- TITULO Y SUBTITULO-->
        <div class="d-flex ">
            <h1 class="titulo">Expedientes</h1>
        </div>
        <!-- linea de division -->
        <hr id="linea" class="w-100 clearfix d-md m-0" />
    </div>
</div>

<br><br>
<div class="col-9">
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
</div>

</div>
     
@endsection