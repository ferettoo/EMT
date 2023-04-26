@extends('layouts.template')
@section('title', 'Menú')
@section('modEstadoExpeCss')
    <link rel="stylesheet" href="{{ asset('css/tablas.css') }}">
@endsection

@section('content')

    @if (Auth::check() && Auth::user()->tipus_usuaris_id == '3')
        <div class="container d-flex justify-content-center ">
            <div class="row  ">
                {{-- espaciado --}}
                <div class="col-12">
                    <div class="p-5"></div>
                    <div class="p-4"></div>
                </div>

                {{-- PRIMERA FILA --}}
                <div class="col-3">
                </div>
                {{-- ADMINISTRACION DE USUARIOS --}}
                <div class="col-3  d-flex justify-content-center">
                    <div class="card border border-0">
                        {{-- enlazar aquí --}}
                        <a href="{{ url('/admUsuarios') }}">
                            <img class="" src="{{ asset('images/personal.png') }}"
                                style="  width:150px;
                                height:150px;" class="card-img-top"
                                alt="...">
                        </a>
                        <div class="card-body ">
                            <h5 class="card-title text-center text-primary">Gestión de usuarios</h5>
                        </div>
                    </div>
                </div>

                {{-- CARTA DE LLAMADA --}}
                <div class="col-3  d-flex justify-content-center">
                    <div class="card border border-0">
                        {{-- hay que revisar la ruta --}}
                        <a href="{{ url('/carta') }}">
                            <img class="d-flex justify-content-center" src="{{ asset('images/carta2.png') }}"
                                style="  width:150px;
                                height:150px;" class="card-img-top"
                                alt="...">
                        </a>

                        <div class="card-body ">
                            <h5 class="card-title text-center text-primary">Carta de llamada</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                </div>
                <br><br>

                {{-- SEGUNDA FILA --}}
                <div class="col-3">
                </div>
                {{-- EXPEDIENTES --}}
                <div class="col-3  d-flex justify-content-center">
                    <div class="card border border-0">
                        <a href="{{ url('/expedientes') }}">
                            <img class="d-flex justify-content-center" src="{{ asset('images/folder.png') }}"
                                style="  width:150px;
                            height:150px;" class="card-img-top"
                                alt="...">
                        </a>

                        <div class="card-body ">
                            <h5 class="card-title text-center text-primary">Gestión Expedientes</h5>
                        </div>
                    </div>
                </div>

                {{-- GRAFICOS --}}
                <div class="col-3 d-flex justify-content-center">
                    <div class="card border border-0">
                        <a href="{{ url('/graficos') }}">
                            <img class="d-flex justify-content-center" src="{{ asset('images/graficos.png') }}"
                                style="  width:150px;
                            height:150px;" class="card-img-top"
                                alt="...">
                        </a>

                        <div class="card-body ">
                            <h5 class="card-title text-center text-primary">Graficos</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>
        </div>

    @elseif (Auth::check() && Auth::user()->tipus_usuaris_id == '2')
        <div class="container d-flex justify-content-center ">
            <div class="row  ">
                {{-- espaciado --}}
                <div class="col-12">
                    <div class="p-5"></div>
                </div>

                {{-- PRIMERA FILA --}}
                <div class="col-3">
                </div>
                {{-- CARTA DE LLAMADA --}}
                <div class="col-6  d-flex justify-content-center">
                    <div class="card border border-0">
                        {{-- hay que revisar la ruta --}}
                        <a href="{{ url('/carta') }}">
                            <img class="d-flex justify-content-center" src="{{ asset('images/carta2.png') }}"
                                style="  width:150px;
                                height:150px;" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body ">
                            <h5 class="card-title text-center text-primary">Carta de llamada</h5>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                </div>
                <br><br>

                {{-- SEGUNDA FILA --}}
                <div class="col-3">
                </div>
                {{-- EXPEDIENTES --}}
                <div class="col-3  d-flex justify-content-center">
                    <div class="card border border-0">
                        <a href="{{ url('/expedientes') }}">
                            <img class="d-flex justify-content-center" src="{{ asset('images/folder.png') }}"
                                style="  width:150px;
                            height:150px;" class="card-img-top"
                                alt="...">
                        </a>

                        <div class="card-body ">
                            <h5 class="card-title text-center text-primary">Gestión Expedientes</h5>
                        </div>
                    </div>
                </div>

                {{-- GRAFICOS --}}
                <div class="col-3 d-flex justify-content-center">
                    <div class="card border border-0">
                        <a href="{{ url('/graficos') }}">
                            <img class="d-flex justify-content-center" src="{{ asset('images/graficos.png') }}"
                                style="  width:150px;
                            height:150px;" class="card-img-top"
                                alt="...">
                        </a>

                        <div class="card-body ">
                            <h5 class="card-title text-center text-primary">Graficos</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>
        </div>
    @else
        <div class="container d-flex justify-content-center ">
            <div class="row  ">
                {{-- espaciado --}}
                <div class="col-12">
                    <div class="p-5"></div>
                    <div class="p-5"></div>
                </div>

                {{-- PRIMERA FILA --}}
                <div class="col-2">
                </div>

                {{-- CARTA DE LLAMADA --}}
                <div class="col-4  d-flex justify-content-center">
                    <div class="card border border-0">
                        {{-- hay que revisar la ruta --}}
                        <a href="{{ url('/carta') }}">
                            <img class="d-flex justify-content-center" src="{{ asset('images/carta2.png') }}"
                                style="  width:150px;
                height:150px;" class="card-img-top" alt="...">
                        </a>

                        <div class="card-body ">
                            <h5 class="card-title text-center text-primary">Carta de llamada</h5>
                        </div>
                    </div>
                </div>

                {{-- GRAFICOS --}}
                <div class="col-4 d-flex justify-content-center">
                    <div class="card border border-0">
                        <a href="{{ url('/graficos') }}">
                            <img class="d-flex justify-content-center" src="{{ asset('images/graficos.png') }}"
                                style="  width:150px;
                                    height:150px;"
                                class="card-img-top" alt="...">
                        </a>

                        <div class="card-body ">
                            <h5 class="card-title text-center text-primary">Graficos</h5>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                </div>
                <br><br>
            </div>
        </div>
    @endif
@endsection
