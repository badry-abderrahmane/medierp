<template lang="html">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <part-panel :editing="editing">
        <div slot="heading">Formulaire charge</div>
        <div slot="body">
          <form v-on:submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
            <div class="row">
                <part-forms-input v-model="form" name="date" label="Date" help="Spécifier la date de l'opération"></part-forms-input>
                <part-forms-input v-model="form" name="responsable" label="Responsable" help="Le bénéficiaire de l'opération"></part-forms-input>
                <part-forms-input v-model="form" name="designation" label="Désignation" help="Donner un nom à cet opération"></part-forms-input>
                <part-forms-select v-model="form" name="societe_id" label="Société" :list="societes" help="Choisir la société liée à l'opération"></part-forms-select>
                <part-forms-select v-model="form" name="marche_id" label="Marché" :list="marches" help="Choisir le marché lié à l'opération"></part-forms-select>
                <part-forms-input v-model="form" name="montant" label="Montant" help="Spécifier le montant de l'opération (ex: 15000.80)"></part-forms-input>
            </div>
            <part-forms-button :editing="editing" ></part-forms-button>
          </form>
        </div>
      </part-panel>
    </div>
  </div>

</template>

<script>
    import { Form } from './../../../api/form.js';
    export default {
        data(){
          return{
            societes:'',
            marches:'',
            form : new Form({
              id: '',
              name: '',
              code:'',
            }),
          }
        },
        computed:{
          editing: function(){
            if (this.$route.params.id) {
              return true
            }else{
              return false
            }
          }
        },
        created(){

        },

        methods: {

        }
    }
</script>

<style lang="css">
</style>
