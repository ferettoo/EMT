<template>
    <div>
        <div class="row">
    <div class="col-8 p-1">
        <!-- {{-- Contenido de la carta --}} -->
        <div class="card border border-0 mb-3">
            <div class="card-header border-0  border-success text-center" style="background-color: #0F9DB2">
                <!-- {{-- Contenido del header  --}} -->
                <div class="row fs-6 fw-light text-light fw-bold">
                    <div class="col">Tiempo</div>
                    <div class="col">ID Expediente</div>
                    <div class="col">ID llamada</div>
                </div>
            </div>
            <div class="card-body rounded-bottom" style="background-color: #f9f9f9">
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
                            <textarea class="form-control" id="antecedentes" style="height: 161px;"></textarea>
                        </div>
                    </div>
                    <div class="col-8">
                        <h5 class="card-title fs-6"><strong>Nota Comuna</strong></h5>
                        <textarea class="form-control mb-2" id="antecedentes" rows="3" style="height: 94px;"></textarea>
                        <div class="mb-2">
                            <p class="fs-6 mb-2"><strong>Incidente</strong>
                                <button id="open_incidente"
                                    class="helpbox_boton" type="button"> <img class="helpbox_boton"
                                        src="{{ asset('images/helpbox_boton.png') }}" height="18px" width="18px"
                                        alt="helpbox">
                                </button>
                            </p>
                            <select class="form-select w-100 mb-3" aria-label="Default select example">
                                <option selected>Tipo de Incidente</option>
                                <option value="1">One</option>
                            </select>
                            <select class="form-select w-100 mb-3" aria-label="Default select example">
                                <option selected> Tipo en Concreto..</option>
                                <option value="1">One</option>
                            </select>
                            <textarea class="form-control" id="antecedentes" rows="3"
                                placeholder="Explicación del incidente.."></textarea>
                        </div>
                        <p class="fs-6 mb-1"><strong>Localización</strong><button id="open_localizacion"
                                class="helpbox_boton" type="button">
                                <img class="helpbox_boton" src="{{ asset('images/helpbox_boton.png') }}" height="18px"
                                    width="18px" alt="helpbox"></button></p>
                        <div class="row">
                            <div class="col">
                                <div class="row mt-2">
                                    <label for="cataluna" class="col-9 text-secondary">Esta en cataluña?</label>
                                    <div class="col-3">
                                        <input type="checkbox" name="cataluna" id="cataluna">
                                    </div>
                                </div>
                                <div class="mb-2" style="margin-top: 18px">
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
                                <div class="mb-2">
                                    <textarea class="form-control" id="antecedentes" rows="1"
                                        placeholder="Explicación breve.."></textarea>
                                </div>
                            </div>
                            <div class="col">
                                <select class="form-select w-100 mb-2" aria-label="Default select example">
                                    <option selected>Tipo de localización</option>
                                    <option value="1">Carretera</option>
                                </select>
                                <div class="mb-2">
                                    <label for="comarca" class="form-label" style="margin-top: 4px">Nom
                                        Carretera</label>
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
                                <div class="mb-2">
                                    <textarea class="form-control" id="antecedentes" rows="1"
                                        placeholder="Explicación breve.."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-4 d-flex flex-column p-1">
        <div class="h-50 tableContainer" style="background-color: #f9f9f9">
            <!-- {{-- Contenido de los expedientes --}} -->
            <table class="table table-borderless">
                <thead class='text-center text-light fw-bold' style="background-color: #0F9DB2">
                    <tr>
                        <th scope="col">Incidente</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Asociar</th>
                        <th scope="col">Creación</th>
                    </tr>
                </thead>
                <tbody class="text-center" style="background-color: #f9f9f9">
                    <tr>
                        <th scope="row">1</th>
                        <td>Inmobilizado</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>

                        <th>1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>

                </tbody>
                <tfoot style="background-color: #f9f9f9" class="mb-1">
                    <tr class="float-end">
                        <td><button class="btn btn-warning btn-sm"><strong>Nuevo Expediente</strong></button></td>
                    </tr>
                </tfoot>

            </table>
        </div>
        <div class="h-50 position-relative">
            <!-- {{-- Contenido del mapa --}} -->
            <img :src="img" alt="mapa" class="img-fluid rounded mapa" style="height: 96%">
            <button class="btn btn-warning position-absolute top-50 start-50 translate-middle"><strong><i class="bi bi-geo-alt-fill"></i> LOCALIZACIÓN</strong></button>
        </div>
    </div>
</div>

    </div>
</template>
<script>
import * as boostrap from 'bootstrap';
export default {
    data() {
        return {
            img: '/public/images/mapa.jpg',
        }

    }
}
</script>
<style>

</style>
