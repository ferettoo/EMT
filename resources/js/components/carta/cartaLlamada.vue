<template>
    <div class="mt-5">
        <div class="row">
    <div class="col-8 p-1">
        <!-- {{-- Contenido de la carta --}} -->
        <div>{{ mensajeError }}</div>
        <div class="card border border-0 mb-3">
            <div class="card-header border-0  border-success text-center" style="background-color: #0F9DB2">
                <!-- {{-- Contenido del header  --}} -->
                <div class="row fs-6 fw-light text-light fw-bold">
                    <div class="col" id="tiempo">{{ carta.tiempo }}</div>
                    <div class="col">{{ carta.idLlamada }}</div>
                    <div class="col">{{ carta.idExpediente }}</div>
                    <input type="datetime-local" v-model="carta.dataHoraTrucada" hidden>
                    <input type="text" v-model="carta.idUsuario" hidden>
                </div>
            </div>
            <div class="card-body rounded-bottom" style="background-color: #f9f9f9">
                <div class="row">
                    <div class="col-4">
                        <h5 class="card-title fs-6"><strong>Identificación</strong></h5>
                        <div class="row">
                            <label for="save" class="col-9 text-secondary">Guardar interlocutor?</label>
                            <div class="col-3">
                                <input type="checkbox" name="save" id="save" v-model="carta.guardarInterlocutor">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control w-100" id="telefono" v-model="carta.telefono">
                        </div>
                        <div class="mb-2">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control w-100" id="nombre" v-model="carta.nombre">
                        </div>
                        <div class="mb-2">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control w-100" id="apellido" v-model="carta.apellido">
                        </div>
                        <div class="custom-height">
                            <label for="antecedentes" class="form-label">Antecedentes del Telefóno</label>
                            <textarea class="form-control h-100" id="antecedentes" v-model="carta.antecedentesInterlocutor"></textarea>

                        </div>
                    </div>
                    <div class="col-8">
                        <h5 class="card-title fs-6"><strong>Nota Comuna</strong></h5>
                        <textarea class="form-control mb-2" id="antecedentes" rows="3" style="height: 94px;" v-model="carta.notaComuna"></textarea>


                        <!-- Incidente -->


                        <div class="mb-2">
                            <p class="fs-6 mb-2"><strong>Incidente</strong>
                                <button id="open_incidente"
                                    class="helpbox_boton" type="button"> <img class="helpbox_boton"
                                        src="../../../../public/images/helpbox_boton.png" height="18px" width="18px"
                                        alt="helpbox"></button>
                            </p>

                            <select class="form-select w-100 mb-3" aria-label="Default select example"
                            v-model="tipoIncidente_id"
                            @change="incidentesVisibles()">
                                <option disabled :value=null>Tipo de Incidente..</option>
                                <option v-for="tipoIncidente in tipoIncidentes" :key="tipoIncidente.id" :value="tipoIncidente.id">{{ tipoIncidente.nom }}</option>
                            </select>
                            <select class="form-select w-100 mb-3" aria-label="Default select example"
                            v-model="carta.incidente"
                            @change="mostrarDefinicion()">
                                <option disabled value=""> Incidente en Concreto..</option>
                                <option v-for="incidente in incidentesFiltrados" :key="incidente.id" :value="incidente.id" >{{ incidente.nom }}</option>

                            </select>
                            <textarea class="form-control" id="antecedentes" rows="3"
                            placeholder="Explicación del incidente.." v-model="definicioIncidente" disabled></textarea>
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
                                        <div class="mb-2">
                                        <label for="provincia" class="form-label">Provincia <span style="color: #E0127A;">*</span></label>
                                        <select class="form-select w-100 mb-2" v-model="carta.idProvincia"
                                        @change="comarcasVisibles()">
                                            <option disabled value="">Seleccione una Provincia..</option>
                                            <option v-for="provincia in provincias" :key="provincia.id" :value="provincia.id">{{ provincia.nom }}</option>
                                        </select>
                                    </div>
                                        <label for="comarca" class="form-label">Comarca <span style="color: #E0127A;">*</span></label>
                                        <select class="form-select w-100 mb-2" v-model="comarca_id"
                                        @change="mucipiosVisibles()">
                                            <option disabled value="">Seleccione una Comarca..</option>
                                            <option v-for="comarca in comarcasFiltradas" :key="comarca.id" :value="comarca.id">{{ comarca.nom }}</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label for="municipio" class="form-label">Municipio <span style="color: #E0127A;">*</span></label>
                                        <select class="form-select w-100 mb-2" v-model="carta.idMunicipio">
                                            <option disabled value="">Seleccione un Municipio</option>
                                            <option v-for="municipio in municipioFiltrados" :key="municipio.id" :value="municipio.id">{{ municipio.nom }}</option>
                                        </select>
                                    </div>

                                    <div class="mb-2">
                                        <textarea class="form-control" id="antecedentes" rows="1"
                                            placeholder="Explicación breve.." v-model="carta.otrasRefLocalizacion"></textarea>
                                    </div>
                                </div>

                                <!-- Diseño si no esta en Cataluña -->

                                <div v-else>
                                    <div class="mb-2">
                                        <label for="provincia" class="form-label" style="margin-top: 18px">Provincia <span style="color: #E0127A;">*</span></label>
                                        <select class="form-select w-100 mb-2" v-model="carta.idProvincia">
                                            <option disabled value="">Tipo de localización..</option>
                                            <option v-for="provincia in provincias" :key="provincia.id" :value="provincia.id">{{ provincia.nom }}</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label for="municipio" class="form-label">Municipio</label>
                                        <select class="form-select w-100 mb-2" v-model="carta.idMunicipio">
                                            <option disabled value="">Opcional..</option>
                                            <option v-for="municipio in municipios" :key="municipio.id" :value="municipio.id">{{ municipio.nom }}</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <textarea class="form-control" id="antecedentes" style="height: 116px;"
                                            placeholder="Explicación breve.." v-model="carta.otrasRefLocalizacion"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Los tipos de localización -->

                            <div class="col">
                                <select class="form-select w-100 mb-2" v-model="carta.tipoLocalizacion">

                                    <option disabled>Tipo de localización..</option>
                                    <option v-if="!estaEnCataluna" :value="'5'" selected>Provincia</option>
                                    <option value="1">Carretera</option>
                                    <option value="2">Punto Singular</option>
                                    <option value="3">Calle</option>
                                    <option value="4">Entidad Población</option>
                                </select>

                                <div v-if="carta.tipoLocalizacion == 1">
                                    <div class="mb-2">
                                        <label for="nomCarretera" class="form-label" style="margin-top: 4px">Nom
                                            Carretera</label>
                                        <input type="text" class="form-control w-100" id="nomCarretera" v-model="descripcionLocalizacion.nomCarretera">
                                    </div>
                                    <div class="mb-2">
                                        <label for="puntoKilometrico" class="form-label">Punto Kilometrico</label>
                                        <input type="text" class="form-control w-100" id="puntoKilometrico" v-model="descripcionLocalizacion.puntoKilometrico">
                                    </div>
                                    <div class="mb-2">
                                        <label for="sentido" class="form-label">Sentido</label>
                                        <input type="text" class="form-control w-100" id="sentido" v-model="descripcionLocalizacion.sentido">
                                    </div>
                                    <div class="mb-2">
                                        <textarea class="form-control" id="antecedentes" rows="1"
                                            placeholder="Explicación breve.." v-model="carta.detallesLocalizacion"></textarea>
                                    </div>
                                </div>
                                <div v-else-if="carta.tipoLocalizacion == 2">
                                    <div class="mb-2">
                                        <label for="nombrePuntoSingular" class="form-label" style="margin-top: 4px">Nombre</label>
                                        <input type="text" class="form-control w-100" id="nombrePuntoSingular" v-model="descripcionLocalizacion.nombrePuntoSingular">
                                    </div>
                                    <div class="mb-2">
                                        <label for="puntoSingular" class="form-label">Punto Singular</label>
                                        <input type="text" class="form-control w-100" id="puntoSingular" v-model="descripcionLocalizacion.puntoSigular">
                                    </div>
                                    <div class="mb-2">
                                        <textarea class="form-control" id="antecedentes" style="height: 116px;"
                                            placeholder="Explicación breve.." v-model="carta.detallesLocalizacion"></textarea>
                                    </div>
                                </div>
                                <div v-else-if="carta.tipoLocalizacion == 3">
                                    <div class="mb-2">
                                        <label for="tipoVia" class="form-label" style="margin-top: 4px">Tipo de Via</label>
                                        <input type="text" class="form-control w-100" id="tipoVia" v-model="descripcionLocalizacion.tipoVia">
                                    </div>
                                    <div class="mb-2">
                                        <label for="nombreCalle" class="form-label">Nombre</label>
                                        <input type="text" class="form-control w-100" id="nombreCalle" v-model="descripcionLocalizacion.nombre">
                                    </div>
                                    <div class="mb-2 d-flex justify-content-evenly text-center">
                                        <label for="numeroCasa" class="col">Num</label>
                                        <label for="escalera" class="col">Escalera</label>
                                        <label for="puerta" class="col">Puerta</label>
                                        <label for="piso" class="col">Piso</label>
                                    </div>
                                    <div class="mb-2 d-flex justify-content-between">
                                        <input type="number" class="form-control mx-1" v-model="descripcionLocalizacion.numero">
                                        <input type="number" class="form-control mx-1" v-model="descripcionLocalizacion.escalera">
                                        <input type="number" class="form-control mx-1" v-model="descripcionLocalizacion.puerta">
                                        <input type="number" class="form-control mx-1" v-model="descripcionLocalizacion.piso">
                                    </div>
                                    <div class="mb-2">
                                        <textarea class="form-control" id="antecedentes" rows="1"
                                            placeholder="Explicación breve.." v-model="carta.detallesLocalizacion"></textarea>
                                    </div>
                                </div>
                                <div v-else-if="carta.tipoLocalizacion == 4">
                                    <div class="mb-2">
                                        <textarea class="form-control" id="antecedentes" style="height: 275px;"
                                            placeholder="Explicación breve.." v-model="carta.detallesLocalizacion"></textarea>
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
            <table class="table table-borderless ">
                <thead class='text-center text-light w-bold' style="background-color: #0F9DB2">
                    <tr>
                        <th scope="col">Expediente</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Asociar</th>
                        <th scope="col">Creación</th>
                    </tr>
                </thead>
                <tbody class="text-center" style="background-color: #f9f9f9" >
                    <tr v-for="expediente in expedienteFiltrado" :key="expediente.id"  >
                        <th scope="col" class="align-middle">{{ expediente.expedients.codi }}</th>
                        <!-- <td scope="col">{{ expediente.estat_expedients_id }}</td> -->
                        <td v-if="expediente.expedients.estat_expedients_id == 1" class="d-grid">
                            <button type="button" class="btn btn-sm  disabled rounded-2 text-white" style="background-color:#39DF09" @click="asociarExpediente(expediente)">EnProcés</button>
                        </td>
                        <td v-else-if="expediente.expedients.estat_expedients_id == 2" class="d-grid">
                            <button type="button" class="btn btn-sm btn-warning disabled rounded-2 text-white" >Sol·licitat</button>
                        </td>
                        <td v-else-if="expediente.expedients.estat_expedients_id == 3" class="d-grid">
                            <button type="button" class="btn btn-sm btn-success disabled rounded-2 text-white">Acceptat</button>
                        </td>
                        <td v-else-if="expediente.expedients.estat_expedients_id == 4" class="d-grid">
                            <button type="button" class="btn btn-sm disabled rounded-2 text-white" style="background-color:#2587E8">Tancat</button>
                        </td>
                        <td v-else-if="expediente.expedients.estat_expedients_id == 5" class="d-grid">
                            <button type="button" class="btn btn-sm btn-info disabled rounded-2 text-white" >Immobil</button>
                        </td>

                        <td scope="col"><button class="btn btn-primary btn-sm " @click="asociarExpediente(expediente)">Asociar</button></td>
                        <td scope="col" class="align-middle" style="font-size: 13px;">12/10/2023</td>
                        <!-- Poner la ultima fecha de creación de la carta asociada al expediente -->
                        <!-- Si la carta de llamada tiene el mismo id que el expediente, que recoja
                            la primera carta de llamada y muestre la fecha. -->
                    </tr>
                </tbody>
                <tfoot style="background-color: #f9f9f9" class="mb-1">
                    <!-- footer -->
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
// import { log } from 'console';

export default {
    data() {
        return {
            // Tiempo LLamada
            intervalId: null,
            horas: 0,
            minutos: 0,
            segundos: 0,
            estaEnCataluna: false, // Saber si la localizacion esta en cataluña
            mensajeError: '',
            descripcionLocalizacion: {},

            carta:{
                tiempo:'00:00:00',
                idLlamada: '',
                dataHoraTrucada: '',
                descripcionLocalizacion: '',
                idUsuario: '',
                tipoLocalizacion:'',
                incidente: '',
                estadoExpediente: '1',

            },

            // Recoger Datos
            cartasDeLlamada: [],
            interlocutor: [],
            expedientes: [],
            tipoIncidentes: [],
            incidentes:[],
            incidentesFiltrados: [],
            provincias: [],
            comarcas:[],
            comarcasFiltradas: [],
            municipios: [],
            municipioFiltrados: [],
            usuari: {},
            expedienteFiltrado: [],
            definicioIncidente: '',
            comarca_id: '',
            tipoIncidente_id: '',
            cartaDeLlamadaFiltrado: '',
        }
    },
    mounted() {
        this.recogerCartaDeLlamada();
        this.recogerExpedientes();
        this.contador();
        this.carta.tipoLocalizacion = '5';
    },
    methods: {
        finalizarLlamada(){
            clearInterval(this.intervalId);
            this.intervalId = null;
            this.concatenarDetallesLocalizacion();
            this.carta.idUsuario = this.usuari.id;
            this.carta.dataHoraTrucada = new Date().toISOString();

            // AGREGAR ESTO CUANDO TENGAMOS QUE VISUALIZAR LA CARTA DE LLAMADA
            // const separar = descLoc.split(';')
            // console.log(separar.length);

            // Enviar la carta
            const me = this;
            axios
                .post("cartes_trucades", me.carta)
                .then((response) => {
                    window.location.href = "/EMT/public/menu";
                })
                .catch((error) => {
                    // this.isError = true;
                    me.mensajeError = error.response.data.error;
                });

        },
        recogerUsuarios(){
            const me = this;
            axios
                .get("usuari")
                .then((response) => {
                    me.usuari = response.data;
                    console.log(me.usuari.id);
                })
                .catch((error) => {});
        },
        cambiarLocalizacion() {
            if (this.carta.tipoLocalizacion) {
                this.carta.tipoLocalizacion = '5';
                this.carta.idMunicipio = '';
            } else {
                this.carta.tipoLocalizacion = '';
            }
        },
        recogerCartaDeLlamada(){
            const me = this;
            axios
                .get("cartes_trucades")
                .then((response) => {
                    me.cartasDeLlamada = response.data;
                    me.carta.idLlamada = 'ID-CT-' + (me.cartasDeLlamada.length + 1);
                    console.log(response.data);
                })
                .catch((error) => {});
        },
        recogerExpedientes(){
            const me = this;
            axios
                .get("expediente")
                .then((response) => {
                    me.expedientes = response.data;
                    me.carta.idExpediente = 'ID-EX-' + (me.expedientes.length + 1);

                    // console.log(response.data);
                })
                .catch((error) => {});
        },
        recogerInterlocutor(){
            const me = this;
            axios
                .get("interlocutor")
                .then((response) => {
                    me.interlocutor = response.data;
                    // console.log(response.data);
                })
                .catch((error) => {});
        },
        recogerMunicipios() {
            const me = this;
            axios
                .get("municipis")
                .then((response) => {
                    me.municipios = response.data;
                    // console.log('Municipios');
                    // console.log(response.data);
                })
                .catch((error) => {});
        },
        recogerProvincias() {
            const me = this;
            axios
                .get("provincies")
                .then((response) => {
                    me.provincias = response.data;
                    // console.log('Provincias');
                    // console.log(response.data);
                })
                .catch((error) => {});
        },
        recogerComarcas(){
            const me = this;
            axios
                .get("comarques")
                .then((response) => {
                    me.comarcas = response.data;
                    // console.log('Comarcas');
                    // console.log(response.data);
                })
                .catch((error) => {});
        },
        recogerTipoIncidentes() {
            const me = this;
            axios
                .get("tipus_incidents")
                .then((response) => {
                    me.tipoIncidentes = response.data;
                })
                .catch((error) => {});
        },
        recogerIncidentes(){
            const me = this;
            axios
                .get("incidents")
                .then((response) => {
                    me.incidentes = response.data;
                })
                .catch((error) => {});
        },
        incidentesVisibles(){
            // console.log('tipoIncidente: ',this.tipoIncidente);
            this.incidentesFiltrados = this.incidentes.filter(opcion => opcion.tipus_incidents_id == this.tipoIncidente_id);
            this.definicioIncidente = '';

            // console.log('incidentes:', this.incidentesFiltrados);
        },
        mostrarDefinicion() {
            const opcionSeleccionada = this.incidentesFiltrados.find(opcion => opcion.id === this.carta.incidente);
            const dIncidente = opcionSeleccionada ? opcionSeleccionada.definicio : '';
            this.definicioIncidente = dIncidente;
        },
        comarcasVisibles() {

            this.comarcasFiltradas = this.comarcas.filter(opcion => opcion.provincies_id == this.carta.idProvincia);
        },
        mucipiosVisibles() {
            this.municipioFiltrados = this.municipios.filter(opcion => opcion.comarques_id == this.comarca_id);
        },
        contador(){
            this.intervalId = setInterval(() => {
            var hAux, mAux, sAux;

            this.segundos++;
            if (this.minutos>59){this.horash++;this.minutos=0;}
            if (this.segundos>59){this.minutos++;this.segundos=0;}
            if (this.horas>24){this.horas=0;}

            if (this.segundos<10){sAux="0"+this.segundos;}else{sAux=this.segundos;}
            if (this.minutos<10){mAux="0"+this.minutos;}else{mAux=this.minutos;}
            if (this.horas<10){hAux="0"+this.horas;}else{hAux=this.horas;}
            this.carta.tiempo = hAux + ':' + mAux + ':' + sAux
        }, 1000);
        },
        concatenarDetallesLocalizacion(){
            this.carta.descripcionLocalizacion =  Object.values(this.descripcionLocalizacion).join(';');
        },
        asociarExpediente(expediente){
            this.carta.idExpediente = expediente.expedients.codi;

            if (expediente.interlocutors != null) {
                this.carta.nombre = expediente.interlocutors.nom;
                this.carta.apellido = expediente.interlocutors.cognoms;
                this.carta.antecedentesInterlocutor = expediente.interlocutors.antecedents;
            } else {
                this.carta.nombre = '';
                this.carta.apellido = '';
                this.carta.antecedentesInterlocutor = '';
            }
        }
    },
    created() {
        this.recogerTipoIncidentes();
        this.recogerIncidentes();
        this.recogerMunicipios();
        this.recogerProvincias();
        this.recogerComarcas();
        this.recogerUsuarios();
        this.recogerInterlocutor();
        // this.mostrarExpedientes();

    },
    watch: {
    'carta.tipoLocalizacion': {
      handler() {
        this.descripcionLocalizacion = {};
        this.carta.detallesLocalizacion = '';
      }
    },
    'carta.telefono': {
        handler() {
            this.expedienteFiltrado = this.cartasDeLlamada.filter(carta => carta.telefon === this.carta.telefono);
        }
    },
    'carta.idProvincia': {
        handler() {
            this.expedienteFiltrado = this.cartasDeLlamada.filter(carta => carta.provincies_id === this.carta.idProvincia);
            console.log(this.expedienteFiltrado);
        }
    },
    'carta.incidente': {
        handler() {
            this.expedienteFiltrado = this.cartasDeLlamada.filter(carta => carta.incidents_id === this.carta.incidente);
            console.log(this.expedienteFiltrado);
        }
    }

  }
}
</script>
<style>

</style>
