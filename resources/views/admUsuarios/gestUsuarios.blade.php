@extends('layouts.template')
@section('title', 'Gestión Usuarios')
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

    <div class="container">
        <br>
        @include('partials.mensajes')
        <br>
        <div class="card">
            <div class="card-header shadow rounded text-white" id="coltablas"  >
                Gestión de usuarios
            </div>
            <div class="card-body">

                {{-- SI EL FORMULARIO ES CREAR O ACTUALIZAR --}}
                @if ($insert == true)
                    {{-- CREATE --}}
                    <form action="{{ action([App\Http\Controllers\AdmUsuariosController::class, 'store']) }}" method="POST">
                    @else
                        {{-- UPDATE --}}
                        <form
                            action="{{ action([App\Http\Controllers\AdmUsuariosController::class, 'update'], ['admUsuario' => $admUsuario->id]) }}"
                            method="POST">
                            @method('PUT')
                @endif
                {{-- CSRF --}}
                @csrf


                {{-- INPUT USERNAME --}}
                <div class="row mb-3 ">
                    <label for="" class="col-sm-2 col-form-label">Nombre de usuario </label>
                    <div class="col-sm-10">
                        @if ($insert == true)
                            <input type="text" class="form-control" name="username" id="username" value=""
                                placeholder="Luis21">
                        @else
                            <input type="text" class="form-control" name="username" id="username"
                                value="{{ $admUsuario->username }} ">
                        @endif
                    </div>
                </div>


                {{-- INPUT CONTRASEÑA --}}
                <div class="row mb-3 ">

                    <label for="" class="col-sm-2 col-form-label">Contraseña </label>
                    <div class="col-sm-10">
                        @if ($insert == true)
                            <input type="password" class="form-control" name="contrasenya" id="contrasenya" value=""
                                placeholder="123..">
                        @else
                            <input type="password" class="form-control" name="contrasenya" id="contrasenya"
                                value="{{ $admUsuario->contrasenya }} ">
                        @endif
                    </div>
                </div>




                {{-- INPUT NOMBRE --}}
                <div class="row mb-3">
                    <!--cambio label a 2 columnas -->
                    <label for="" class="col-sm-2 col-form-label"> Nombre </label>
                    <div class="col-sm-10">
                        @if ($insert == true)
                            <input type="text" class="form-control" name="nom" id="nom" value=""
                                placeholder="Luis" autofocus>
                        @else
                            <input type="text" class="form-control" name="nom" id="nom"
                                value="{{ $admUsuario->nom }} " placeholder="" autofocus>
                        @endif
                    </div>
                </div>



                {{-- INPUT APELLIDOS --}}
                <div class="row mb-3">
                    <!--cambio label a 2 columnas -->
                    <label for="" class="col-sm-2 col-form-label"> Apellidos </label>
                    <div class="col-sm-10">
                        @if ($insert == true)
                            <input type="text" class="form-control" name="cognoms" id="cognoms" value=""
                                placeholder="Gomez Ruiz" autofocus>
                        @else
                            <input type="text" class="form-control" name="cognoms" id="cognoms"
                                value="{{ $admUsuario->cognoms }} " placeholder="" autofocus>
                        @endif
                    </div>
                </div>


                {{-- INPUT TIPO --}}
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"> Tipo de usuario </label>
                    <div class="col-sm-10">

                        {{-- CREAR --}}
                        @if ($insert == true)
                            <select class="form-select" aria-label="Default select example" id="tipo" name="tipo"
                                value="">
                                <option selected>Tipos de usuarios</option>
                                @foreach ($tipoUsuarios as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->nom }}</option>
                                @endforeach
                            </select>

                            {{-- ACTUALIZAR --}}
                        @else
                            <select class="form-select" aria-label="Default select example" id="tipo" name="tipo"
                                value="">
                                @foreach ($tipoUsuarios as $tipo)
                                    {{-- para modficacion seleccionando el mismo tipo --}}
                                    @if ($tipo->id == $admUsuario->tipus_usuaris_id)
                                        {{-- seleccion del mismo tipo  --}}
                                        <option selected value="{{ $tipo->id }}"> {{ $tipo->nom }} </option>
                                    @else
                                        {{-- seleccion de tipo del listado --}}
                                        <option value="{{ $tipo->id }}">{{ $tipo->nom }}</option>
                                    @endif
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <br><br>
                    {{-- linea para posicionamiento de iconos --}}
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                        {{-- EDITAR --}}
                        <button class="btn btn-primary text-white" type="submit"><i class="bi bi-check-lg"></i> Aceptar</button>
                        <a class="btn btn-secondary" href="{{ route('admUsuarios.index') }}"><i
                                class="bi bi-x-lg"></i>Cancelar</a>

                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection
