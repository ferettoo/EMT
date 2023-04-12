import "./bootstrap";
import * as bootstrap from "bootstrap";
import { createApp } from "vue";
import cartaLlamada from './components/carta/cartaLlamada.vue';

createApp(cartaLlamada).mount('#cartaLlamada');

// JS para cosas generales

// window.addEventListener("load", (event) => {

//     // BOTONES PARA ABRIR Y CERRAR POPUP INCIDENTES
//     let open_incidente = document.getElementById("open_incidente");
//     let close_incidente = document.getElementById("close_incidente");

//     // BOTONES PARA ABRIR Y CERRAR POPUP LOCALIZACIONES
//     let open_localizacion = document.getElementById("open_localizacion");
//     let close_localizacion = document.getElementById("close_localizacion");

//     // POPUPS
//     let popup_incidente = document.getElementById("popup_incidente");
//     let popup_localizacion = document.getElementById("popup_localizacion");

//     //FUNCION POPUP INCIDENTES
//     open_close_popup(open_incidente,close_incidente,popup_incidente);

//     //FUNCION POPUP LOCALIZACIONES
//     open_close_popup(open_localizacion,close_localizacion,popup_localizacion);
// });

// function open_close_popup(open, close, popup) {
//     open.addEventListener("click", () => {
//         popup.showModal();
//     })

//     close.addEventListener("click", () => {
//         popup.close();
//     })
// }
