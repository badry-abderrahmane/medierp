
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);

require('./global');
require('./parts');
require('./plugins');

window.Event = new Vue();

import { routes } from './router.js';
const router = new VueRouter({ routes });

const app = new Vue({
  router,
  data(){
    return {
      color:'primary',

      /** Shared objects **/
      responsables:'',
      societes:'',
      marches:'',
      typecharges:'',
      operations:'',
    }
  },
  created(){
      /** Init Functions Shared objects **/
      this.getResposables();
      this.getSocietes();
      this.getMarches();
      this.getTypecharges();
      this.getOperations();


      Event.$on('publish-success-message', (message) => {
        this.toastrSuccess(message);
      });
      Event.$on('publish-error-message', (message) => {
        this.toastrError(message);
      });
      Event.$on('publish-warning-message', (message) => {
        this.toastrWarning(message);
      });
      Event.$on('init-datatable', (tableid) => {
        this.datatableThis(tableid);
      });
    },
    mounted(){
      this.$nextTick(function () {
        // entire view has been rendered
        this.loadTooltips();
      })

    },
    methods:{
        /** Function get shared objects **/
        getResposables(){
          axios.get('/responsables')
            .then(response => {
              this.responsables = response.data;
          });
        },
        getSocietes(){
          axios.get('/societes')
            .then(response => {
              this.societes = response.data;
          });
        },
        getMarches(){
          axios.get('/marches')
            .then(response => {
              this.marches = response.data;
          });
        },
        getTypecharges(){
          axios.get('/typecharges')
            .then(response => {
              this.typecharges = response.data;
          });
        },
        getOperations(){
          axios.get('/operations')
            .then(response => {
              this.operations = response.data;
          });
        },

        /**
        * Tooltips Functions
        *
        **/
        loadTooltips(){
          $('[data-toggle="m-tooltip"]').each(function() {
              var el = $(this);
              console.log(el);
              var skin = el.data('skin') ? 'm-tooltip--skin-' + el.data('skin') : '';
              el.tooltip({
                  template: '<div class="m-tooltip ' + skin + ' tooltip" role="tooltip">\
                      <div class="arrow"></div>\
                      <div class="tooltip-inner"></div>\
                  </div>'
              });
          });
        },
        /**
        * DataTables Functions
        *
        **/
        datatableThis(tableid){
          $('#'+tableid).DataTable({
            "bDestroy": true,
            dom: 'Bfrtip',
            buttons: [
               'excel', 'pdf',
               { extend: 'pageLength', text:'Nombre de lignes'},
               { extend: 'print', text:'<i class="fa fa-print"></i>'}
            ],
            "language": {
                  "lengthMenu": "Afficher _MENU_ lignes par page",
                  "sSearch":         "Recherche&nbsp;:",
                  "zeroRecords": "Aucun enregistrement pour le moment. ",
                  "info": "Page _PAGE_ de _PAGES_",
                  "infoEmpty": "Pas d'enregistrement.",
                  "infoFiltered": "( _MAX_ enregistrements filtrés)",
                  "oPaginate": {
                      "sFirst":      "Premier",
                      "sPrevious":   "Pr&eacute;c&eacute;dent",
                      "sNext":       "Suivant",
                      "sLast":       "Dernier"
                  },
              }
          });
          //this.loadTooltips();
        },

        /**
        * Tostr Functions
        *
        **/
        toastrSuccess(message){
          toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.success(message);
        },
        toastrError(message){
          toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error(message);
        },
        toastrWarning(message){
          toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.warning(message);
        },
    }
}).$mount('#app');
