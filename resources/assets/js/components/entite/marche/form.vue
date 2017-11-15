<template lang="html">
  <div class="columns">
    <div class="column">
      <part-panel :editing="editing">
        <div slot="heading">Formulaire de marhé</div>
        <div slot="body">
          <form v-on:submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
            <div class="columns is-multiline">
                <part-forms-input v-model="form" name="name" label="Nom" help="Spécifier un nom du marché"></part-forms-input>
                <part-forms-date-picker v-model="form" name="dateDebut" label="Date" help="Spécifier une date"></part-forms-date-picker>
                <part-forms-input v-model="form" name="delais" label="Délais" help="Spécifier un délais"></part-forms-input>
                <part-forms-input v-model="form" name="numero" label="Numéro" help="Spécifier un numéro unique"></part-forms-input>
                <part-forms-input v-model="form" name="montant" label="Montant total" help="Spécifier un montant total"></part-forms-input>
                <part-forms-select-full v-model="form" :list="$root.societes" name="societe_id" label="Société" help="Séléctionner la société corresspondante"></part-forms-select-full>
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
              name: '',
              dateDebut: '',
              delais: '',
              numero: '',
              montant: '',
              societe_id: '',
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
          marcheId: function(){
            return this.$route.params.id
          }
        },
        created(){
          if (this.marcheId) {
            axios.get('/marches/'+this.marcheId)
              .then(response => {
                this.form.load(response.data);
            });
          }
        },

        methods: {
          onSubmit(){
            if (this.form.id == '') {
              this.form.post('/marches')
                .then(data => {
                  console.log(data.message);
                  Event.$emit('publish-success-message', data.message);
                  this.$parent.getTotaleMarches();
                  this.$root.getMarches();
                  this.goback();
                })
                .catch(errors =>{
                  console.log(errors);
                });
            }else{
              this.form.put('/marches')
                .then(data => {
                  Event.$emit('publish-success-message', data.message);
                  this.$parent.getTotaleMarches();
                  this.$root.getMarches();
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
