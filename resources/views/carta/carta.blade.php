@extends('layouts.template')

@section('title', 'Carta de llamada')

@section('content')
<div class="row">
    <div class="col-8">
        {{-- Contenido de la carta --}}
        <div class="card border border-0 mb-3" >
            <div class="card-header border-0 bg-light border-success text-center">
                {{-- Contenido del header  --}}
                <div class="row fs-6 fw-light">
                    <div class="col">Tiempo</div>
                    <div class="col">ID Expediente</div>
                    <div class="col">ID llamada</div>
                </div>
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-4">
                        <h5 class="card-title fs-6"><strong>Identificación</strong></h5>
                        <div class="row">
                            <label for="save" class="col-9 text-secondary">Guardar interlocutor?</label>
                            <div class="col-3">
                                <input type="checkbox" name="save" id="save">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control w-100" id="telefono">
                        </div>
                        <div class="mb-2">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control w-100" id="nombre">
                        </div>
                        <div class="mb-2">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control w-100" id="apellido">
                        </div>
                        <div class="mb-2">
                            <label for="municipio" class="form-label">Municipio</label>
                            <input type="text" class="form-control w-100" id="municipio">
                        </div>
                        <div class="mb-2">
                            <label for="provincia" class="form-label">Provincia</label>
                            <input type="text" class="form-control w-100" id="provincia">
                        </div>
                        <div class="mb-2">
                            <label for="direccion" class="form-label">Direción</label>
                            <input type="text" class="form-control w-100" id="direccion">
                        </div>
                        <div class="mb-2">
                            <label for="antecedentes" class="form-label">Antecedentes del Telefóno</label>
                            <textarea class="form-control" id="antecedentes" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-8">
                        <h5 class="card-title fs-6"><strong>Nota Comuna</strong></h5>
                        <textarea class="form-control" id="antecedentes" rows="3"></textarea>
                        <div class="mb-2">
                            <label for="incidente" class="form-label">Incidente</label>
                            <select class="form-select w-100 mb-2" aria-label="Default select example">
                                <option selected>Tipo de Incidente</option>
                                <option value="1">One</option>
                            </select>
                            <select class="form-select w-100 mb-2" aria-label="Default select example">
                                <option selected> Tipo en Concreto..</option>
                                <option value="1">One</option>
                            </select>
                            <textarea class="form-control" id="antecedentes" rows="3" placeholder="Explicación del incidente.."></textarea>
                        </div>
                        <h5 fs-6>Localización</h5>
                        <div class="row">
                            <div class="col">

                                <div class="row">
                                    <label for="cataluna" class="col-9 text-secondary">Esta en cataluña?</label>
                                    <div class="col-3">
                                        <input type="checkbox" name="cataluna" id="cataluna">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label for="comarca" class="form-label">Comarca</label>
                                    <input type="text" class="form-control w-100" id="comarca">
                                </div>
                                <div class="mb-2">
                                    <label for="provincia" class="form-label">Provincia</label>
                                    <input type="text" class="form-control w-100" id="provincia">
                                </div>
                                <div class="mb-2">
                                    <label for="municipio" class="form-label">Municipio</label>
                                    <input type="text" class="form-control w-100" id="municipio">
                                </div>
                                {{-- <div class="mb-2">
                                    <textarea class="form-control" id="antecedentes" rows="1"></textarea>
                                </div> --}}
                            </div>
                            <div class="col">
                                <select class="form-select w-100 mb-2" aria-label="Default select example">
                                    <option selected>Tipo de localización</option>
                                    <option value="1">Carretera</option>
                                </select>
                                <div class="mb-2">
                                    <label for="comarca" class="form-label">Nom Carretera</label>
                                    <input type="text" class="form-control w-100" id="comarca">
                                </div>
                                <div class="mb-2">
                                    <label for="provincia" class="form-label">Punto Kilometrico</label>
                                    <input type="text" class="form-control w-100" id="provincia">
                                </div>
                                <div class="mb-2">
                                    <label for="municipio" class="form-label">Sentido</label>
                                    <input type="text" class="form-control w-100" id="municipio">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="card-footer border-0 bg-transparent border-success">Footer</div> --}}
        </div>
    </div>

    <div class="col-4 d-flex flex-column" style="background-color: green">
        <div>
            {{-- Contenido de los expedientes --}}
            <p>a</p>
        </div>
        <div>
            {{-- Contenido del mapa --}}
            <p>b</p>
        </div>
    </div>
</div>
@endsection
