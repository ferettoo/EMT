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
            <div class="card-header shadow rounded text-white" id="coltablas">
                Actualizar contraseña
            </div>
            <div class="card-body">

                <form
                    action="{{ action([App\Http\Controllers\AdmUsuariosController::class, 'updateContrasenya'], ['admUsuario' => $admUsuario->id]) }}"
                    method="POST">
                    @method('PUT')
                    {{-- CSRF --}}
                    @csrf


                    {{-- INPUT USERNAME --}}
                    <div class="row mb-3 ">
                        <label for="" class="col-sm-2 col-form-label">Nombre de usuario </label>

                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="idExpediente"
                                value="{{ $admUsuario->username }}">
                        </div>
                    </div>

                                    {{-- INPUT NOMBRE --}}
                <div class="row mb-3">
                    <!--cambio label a 2 columnas -->
                    <label for="" class="col-sm-2 col-form-label"> Nombre </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="idExpediente"
                            value="{{ $admUsuario->nom }}">
                    </div>
                </div>



                {{-- INPUT APELLIDOS --}}
                <div class="row mb-3">
                    <!--cambio label a 2 columnas -->
                    <label for="" class="col-sm-2 col-form-label"> Apellidos </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="idExpediente"
                            value="{{ $admUsuario->cognoms }}">
                    </div>
                </div>


                    {{-- INPUT CONTRASEÑA --}}
                    <div class="row mb-3 ">

                        <label for="" class="col-sm-2 col-form-label">Actualizar contraseña </label>
                        <div class="col-sm-10">
                                <input type="password" class="form-control" name="contrasenya" id="contrasenya"
                                placeholder="Nueva contraseña">
                        </div>
                    </div>

                    {{-- BOTONES --}}
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        {{-- CONFIRMACION DE EDICIÓN --}}
                        <button class="btn btn-primary text-white" type="submit"><i class="bi bi-check-lg"></i> Aceptar</button>

                        {{-- VOLVEMOS A EXPEDIENTES --}}
                        <a class="btn btn-secondary" href="{{ route('admUsuarios.index') }}"><i
                                class="bi bi-x-lg"></i>Cancelar</a>

                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
