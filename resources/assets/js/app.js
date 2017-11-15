
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
      this.getResponsables();
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
        getResponsables(){
          axios.get('list/responsables')
            .then(response => {
              this.responsables =  this.toObjectSelect(response.data);
          });
        },
        getSocietes(){
          axios.get('list/societes')
            .then(response => {
              this.societes =  this.toObjectSelect(response.data);
          });
        },
        getMarches(){
          axios.get('list/marches')
            .then(response => {
              this.marches =  this.toObjectSelect(response.data);
          });
        },
        getTypecharges(){
          axios.get('list/typecharges')
            .then(response => {
              this.typecharges =  this.toObjectSelect(response.data);
          });
        },
        getOperations(){
          axios.get('list/operations')
            .then(response => {
              this.operations =  this.toObjectSelect(response.data);
          });
        },

        //** In need functions
        toObjectSelect(jsonObject){
          let array = [];
          var empty = {};
          empty['text'] = '';
          empty['id'] = '';
          array.push(empty);

          for (var prop in jsonObject) {
                let item = {};
                item['text'] = jsonObject[prop];
                item['id'] = prop;
                array.push(item);
          }
        return array;
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
        * Select2 Functions
        *
        **/
        loadSelect2(){
          $('.select2').select2();
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
