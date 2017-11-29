
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import Vuex from 'vuex'

Vue.use(Vuex)
Vue.use(VueRouter);

const store = new Vuex.Store({
  state: {
    pagetitle: 'Blank',
    banqueCustom:[],
  },
  getters: {
    pagetitle: state => {
      return state.pagetitle
    },
    banqueCustom: state => {
      return state.banqueCustom
    }
  },
  mutations: {
    pagetitle (state,title) {
      state.pagetitle = title;
    },
    banqueCustom (state,banque) {
      state.banqueCustom = banque;
    }
  }
})

require('./global');
require('./parts');
require('./plugins');
require('./charts');
require('./widgets');

window.Event = new Vue();

import { routes } from './router.js';
const router = new VueRouter({ routes });

const app = new Vue({
  store,
  router,
  data(){
    return {
      color:'primary',

      /** Shared objects **/
      months:[{ id:"1", text:"01"},{ id:"2", text:"02"},{ id:"3", text:"03"},{ id:"4", text:"04"},{ id:"5", text:"05"},{ id:"6", text:"06"},{ id:"7", text:"07"},{ id:"8", text:"08"},{ id:"9", text:"09"},{ id:"10", text:"10"},{ id:"11", text:"11"},{ id:"12", text:"12"}],
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

      //** Toastr Messages trigger functions with message
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
