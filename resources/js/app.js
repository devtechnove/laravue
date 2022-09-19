import Vue from "vue";
import VueRouter from "vue-router";
import routes from "./routes/routes";
import store from "./store/store";
import swa from './lib/sweetalert/sweetalert';
window.$ = window.jQuery = require('jquery');
import moment from 'moment';

import LaravelPermissionToVueJS from 'laravel-permission-to-vuejs'
Vue.use(LaravelPermissionToVueJS)

import Gate from "./store/gates/index";
Vue.prototype.$gate = new Gate(window.user);

Vue.prototype.can = function(value){
  return window.Laravel.jsPermissions.permissions.includes(value);
}
Vue.prototype.is = function(value){
  return window.Laravel.jsPermissions.roles.includes(value);
}

import animate  from "animate.css";
// If you don't need the styles, do not connect
import '~/assets/libs/sweetalert2/sweetalert2.min.css';
import '~/assets/libs/select2/css/select2.min.css';

require('./bootstrap');

require('./assets/libs/jquery/jquery.min.js');
require('./assets/libs/bootstrap/js/bootstrap.bundle.min.js');
require('./assets/libs/metismenu/metisMenu.min.js');
require('./assets/libs/simplebar/simplebar.min.js');
require('./assets/libs/node-waves/waves.min.js');
require('./assets/libs/jquery-sparkline/jquery.sparkline.min.js');
require('./assets/libs/peity/jquery.peity.min.js');
require('./assets/libs/morris.js/morris.min.js');
require('./assets/libs/raphael/raphael.min.js');
require('./assets/libs/select2/js/select2.min.js');



import datatable from 'datatables.net-bs4'
require( 'datatables.net-buttons/js/dataTables.buttons' )
require( 'datatables.net-buttons/js/buttons.html5')
import print from 'datatables.net-buttons/js/buttons.print'
import jszip from 'jszip/dist/jszip.js'
import pdfMake from "pdfmake/build/pdfmake"
import pdfFonts from "pdfmake/build/vfs_fonts"

pdfMake.vfs = pdfFonts.pdfMake.vfs;
window.JSZip = jszip

Vue.prototype.$fecha = function(fecha_origen) {
    return moment(fecha_origen).locale('es').format('LL')
}
Vue.prototype.$tablaGlobal = function(nombreTabla) {
    this.$nextTick(() => {      
    $(nombreTabla).DataTable({
        language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
            }
        },
      "order": [[ 0, 'asc' ]],
      dom: "<'row'<'col-sm-12 mb-3 text-center'B>><'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      buttons: [
        /*{
          "extend": "copyHtml5",
          "text": "<i class='fas fa-copy'></i> Copiar",
          "titleAttr": "Copiar",
          "className": "btn btn-secondary"
        },*/
        {
          "extend": "excelHtml5",
          "text": "<i class='fas fa-file-excel'></i> Excel",
          "titleAttr": "Esportar a Excel",
          "className": "btn btn-success"
        },
        {
          "extend": "pdfHtml5",
          "text": "<i class='fas fa-file-pdf'></i> PDF",
          "titleAttr": "Esportar a PDF",
          "className": "btn btn-danger"
        },
       /* {
          "extend": "csvHtml5",
          "text": "<i class='fas fa-file-csv'></i> CSV",
          "titleAttr": "Esportar a CSV",
          "className": "btn btn-info"
        },*/
        {
          "extend": "print",
          "text": "<i class='fas fa-file-csv'></i> Imprimir",
          "titleAttr": "Imprimir archivo",
          "className": "btn btn-secondary"
        }
      ]
    });
  });
}

/** Minxins Autoload **/
import AppMessage from './mixins/AppMessage'
Vue.mixin(AppMessage)


Vue.use(VueRouter);

require('feather-icons')

/** Componente Ppal   **/
import App from './App.vue'
Vue.component('app', App)
 
//Helpers
Vue.prototype.pluralize = (word, count) => {
    return parseInt(count) > 1 ? word + "s" : word;
};

Vue.prototype.setDocumentTitle = function (title = "SPA Blog") {
      document.title = title;
};




const app = new Vue({
    el: '#app',
    router: new VueRouter({ routes, mode: "history" }),
    mixins:[ AppMessage ],
    store,
    animate,
    swa
});
