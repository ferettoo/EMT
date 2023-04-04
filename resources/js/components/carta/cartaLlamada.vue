<template>
    <div>
        <div class="row">
    <div class="col-8 p-1">
        <!-- {{-- Contenido de la carta --}} -->
        <div class="card border border-0 mb-3">
            <div class="card-header border-0  border-success text-center" style="background-color: #0F9DB2">
                <!-- {{-- Contenido del header  --}} -->
                <div class="row fs-6 fw-light text-light fw-bold">
                    <div class="col" id="tiempo">{{ tiempo }}</div>
                    <div class="col">ID-CL-0000</div>
                    <div class="col">ID Expediente</div>
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
                            <label for="direccion" class="form-label">Direción</label>
                            <input type="text" class="form-control w-100" id="direccion">
                        </div>
                        <div class="custom-height">
                            <label for="antecedentes" class="form-label">Antecedentes del Telefóno</label>
                            <textarea class="form-control h-100" id="antecedentes"></textarea>
                        </div>
                    </div>
                    <div class="col-8">
                        <h5 class="card-title fs-6"><strong>Nota Comuna</strong></h5>
                        <textarea class="form-control mb-2" id="antecedentes" rows="3" style="height: 94px;"></textarea>
                        <div class="mb-2">
                            <p class="fs-6 mb-2"><strong>Incidente</strong>
                                <button id="open_incidente"
                                    class="helpbox_boton" type="button"> <img class="helpbox_boton"
                                        src="../../../../public/images/helpbox_boton.png" height="18px" width="18px"
                                        alt="helpbox"></button>
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
                        <p class="fs-6 mb-1"><strong>Localización</strong>
                            <button id="open_localizacion" class="helpbox_boton" type="button">

                                <img class="helpbox_boton" src="../../../../public/images/helpbox_boton.png" height="18px"
                                    width="18px" alt="helpbox"></button>
                        </p>
                        <div class="row">
                            <div class="col">
                                <div class="row mt-2">
                                    <label for="cataluna" class="col-9 text-secondary">Esta en cataluña?</label>
                                    <div class="col-3">
                                        <input type="checkbox" name="cataluna" id="cataluna" v-model="estaEnCataluna"
                                        @change="cambiarLocalizacion()">
                                    </div>
                                </div>

                                <!-- Diseño si esta en Cataluña -->
                                <div v-if="estaEnCataluna">
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

                                <!-- Diseño si no esta en Cataluña -->
                                <div v-else>
                                    <div class="mb-2">
                                        <label for="provincia" class="form-label" style="margin-top: 18px">Provincia <span style="color: #E0127A;">*</span></label>
                                        <input type="text" class="form-control w-100" id="provincia">
                                    </div>
                                    <div class="mb-2">
                                        <label for="municipio" class="form-label">Municipio</label>
                                        <input type="text" class="form-control w-100" id="municipio">
                                    </div>
                                    <div class="mb-2">
                                        <textarea class="form-control" id="antecedentes" style="height: 116px;"
                                            placeholder="Explicación breve.."></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Los tipos de localización -->
                            <div class="col">
                                <select class="form-select w-100 mb-2" v-model="tipoLocalizacion">

                                    <option disabled>Tipo de localización..</option>
                                    <option v-if="!estaEnCataluna" value="5" selected>Provincia</option>
                                    <option value="1">Carretera</option>
                                    <option value="2">Punto Singular</option>
                                    <option value="3">Calle</option>
                                    <option value="4">Entidad Población</option>
                                </select>

                                <div v-if="tipoLocalizacion == 1">
                                    <div class="mb-2">
                                        <label for="nomCarretera" class="form-label" style="margin-top: 4px">Nom
                                            Carretera</label>
                                        <input type="text" class="form-control w-100" id="nomCarretera">
                                    </div>
                                    <div class="mb-2">
                                        <label for="puntoKilometrico" class="form-label">Punto Kilometrico</label>
                                        <input type="text" class="form-control w-100" id="puntoKilometrico">
                                    </div>
                                    <div class="mb-2">
                                        <label for="sentido" class="form-label">Sentido</label>
                                        <input type="text" class="form-control w-100" id="sentido">
                                    </div>
                                    <div class="mb-2">
                                        <textarea class="form-control" id="antecedentes" rows="1"
                                            placeholder="Explicación breve..">
                                        </textarea>
                                    </div>
                                </div>
                                <div v-else-if="tipoLocalizacion == 2">
                                    <div class="mb-2">
                                        <label for="nombrePuntoSingular" class="form-label" style="margin-top: 4px">Nombre</label>
                                        <input type="text" class="form-control w-100" id="nombrePuntoSingular">
                                    </div>
                                    <div class="mb-2">
                                        <label for="puntoSingular" class="form-label">Punto Singular</label>
                                        <input type="text" class="form-control w-100" id="puntoSingular">
                                    </div>
                                    <div class="mb-2">
                                        <textarea class="form-control" id="antecedentes" style="height: 116px;"
                                            placeholder="Explicación breve.."></textarea>
                                    </div>
                                </div>
                                <div v-else-if="tipoLocalizacion == 3">
                                    <div class="mb-2">
                                        <label for="tipoVia" class="form-label" style="margin-top: 4px">Tipo de Via</label>
                                        <input type="text" class="form-control w-100" id="tipoVia">
                                    </div>
                                    <div class="mb-2">
                                        <label for="nombreCalle" class="form-label">Nombre</label>
                                        <input type="text" class="form-control w-100" id="nombreCalle">
                                    </div>
                                    <div class="mb-2 d-flex justify-content-evenly text-center">
                                        <label for="numeroCasa" class="col">Numero</label>
                                        <label for="escalera" class="col">Escalera</label>
                                        <label for="puerta" class="col">Puerta</label>
                                        <label for="piso" class="col">Piso</label>
                                    </div>
                                    <div class="mb-2 d-flex justify-content-between">
                                        <input type="number" class="form-control mx-1">
                                        <input type="number" class="form-control mx-1">
                                        <input type="number" class="form-control mx-1">
                                        <input type="number" class="form-control mx-1">
                                    </div>
                                    <div class="mb-2">
                                        <textarea class="form-control" id="antecedentes" rows="1"
                                            placeholder="Explicación breve.."></textarea>
                                    </div>
                                </div>
                                <div v-else-if="tipoLocalizacion == 4">
                                    <div class="mb-2">
                                        <textarea class="form-control" id="antecedentes" style="height: 275px;"
                                            placeholder="Explicación breve.."></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 d-flex justify-content-center">
                <button class="w-50 btn btn-warning" @click="finalizarLlamada"><strong>Finalizar Carta de Llamada</strong></button>
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
            <img src="../../../../public/images/mapa.jpg" alt="mapa" class="img-fluid rounded mapa" style="height: 96%">

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
            // Tiempo LLamada
            tiempo: '00:00:00',
            intervalId: null,
            horas: 0,
            minutos: 0,
            segundos: 0,

            idLlamada: '', // ID de la llamada (Pensar como hacerlo)
            idExpediente: '', // ID del expediente
            interlocutor:{}, // Crear un interlocutor en caso si no existe
            estaEnCataluna: false, // Saber si la localizacion esta en cataluña
            guardarInterlocutor: {}, // Guardar interlocutor
            tipoLocalizacion: '',
            // Recoger Datos
            expedientes: [],

        }
    },
    mounted() {

        this.intervalId = setInterval(() => {
            var hAux, mAux, sAux;

            this.segundos++;
            if (this.minutos>59){this.horash++;this.minutos=0;}
            if (this.segundos>59){this.minutos++;this.segundos=0;}
            if (this.horas>24){this.horas=0;}

            if (this.segundos<10){sAux="0"+this.segundos;}else{sAux=this.segundos;}
            if (this.minutos<10){mAux="0"+this.minutos;}else{mAux=this.minutos;}
            if (this.horas<10){hAux="0"+this.horas;}else{hAux=this.horas;}
            this.tiempo = hAux + ':' + mAux + ':' + sAux
        }, 1000);

        this.tipoLocalizacion = 5;
    },
    methods: {
        finalizarLlamada(){
            clearInterval(this.intervalId);
            this.intervalId = null;

            // He de enviar exacatamente esto 1970-01-01 00:00:01
            // getDate() para el dia,
            // getFullYear() para el año
            // getMonth() para el mes
        },
        cambiarLocalizacion() {
            if (this.tipoLocalizacion) {
                this.tipoLocalizacion = 5;
            } else {
                this.tipoLocalizacion = '';
            }
        },
    },
}
</script>
<style>

</style>
