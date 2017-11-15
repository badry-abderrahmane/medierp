<template lang="html">
  <div class="columns">
    <div class="column">
      <part-panel :editing="editing">
        <div slot="heading">Formulaire de décaissement</div>
        <div slot="body">
          <form v-on:submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
            <div class="columns is-multiline">
                <part-forms-input v-model="form" name="designation" label="Désignation" help="Taper une désignation"></part-forms-input>
                <part-forms-date-picker v-model="form" name="date" label="Date" help="Spécifier une date"></part-forms-date-picker>
                <part-forms-select-full v-model="form" :list="$root.operations" name="operation_id" label="Type d'opération" help="Spécifier un type d'opération"></part-forms-select-full>
                <part-forms-input v-model="form" name="code" label="Code" help="Spécifier un code"></part-forms-input>
                <part-forms-input v-model="form" name="montant" label="Montant" help="Spécifier un montant"></part-forms-input>
                <part-forms-select-full v-model="form" :list="$root.marches" name="marche_id" label="Marché" help="Séléctionner le marché correspondant"></part-forms-select-full>
            </div>
            <div class="columns is-centered">
              <part-forms-button :editing="editing" ></part-forms-button>
              <part-forms-button-reset></part-forms-button-reset>
            </div>
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
            form : new Form({
              id:'',
              designation: '',
              date: '',
              operation_id: '',
              code: '',
              montant: '',
              marche_id: '',
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
          },
          decaissementId: function(){
            return this.$route.params.id
          }
        },
        created(){
          if (this.decaissementId) {
            axios.get('/decaissements/'+this.decaissementId)
              .then(response => {
                this.form.load(response.data);
            });
          }
        },

        methods: {
          onSubmit(){
            if (this.form.id == '') {
              this.form.post('/decaissements')
                .then(data => {
                  console.log(data.message);
                  Event.$emit('publish-success-message', data.message);
                  this.$parent.getTotaleDecaissements();
                  this.goback();
                })
                .catch(errors =>{
                  console.log(errors);
                });
            }else{
              this.form.put('/decaissements')
                .then(data => {
                  Event.$emit('publish-success-message', data.message);
                  this.$parent.getTotaleDecaissements();
                  this.goback();
                })
                .catch(errors => {
                  console.log(errors);
                });
            }
          },

          goback(){
              this.$router.go(-1);
          }

        }
    }
</script>

<style lang="css">
</style>
