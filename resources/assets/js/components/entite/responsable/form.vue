<template lang="html">
  <div class="columns">
    <div class="column">
      <part-panel :editing="editing">
        <div slot="heading">Formulaire de responsable</div>
        <div slot="body">
          <form v-on:submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
            <div class="columns is-multiline">
                <part-forms-input v-model="form" name="name" label="Nom" help="Spécifier un nom "></part-forms-input>
                <part-forms-input v-model="form" name="lastName" label="Prénom" help="Spécifier un prénom"></part-forms-input>
                <part-forms-input v-model="form" name="phone" label="Numéro telephone" help="Spécifier un numéro telephone"></part-forms-input>
                <part-forms-input v-model="form" name="adresse" label="Adresse" help="Spécifier une adresse"></part-forms-input>
                <part-forms-input v-model="form" name="cin" label="CIN" help="Spécifier un numéro d'identité national"></part-forms-input>
                <part-forms-input v-model="form" name="note" label="Note" help="Spécifier une note à propos du responsable"></part-forms-input>
            </div>
            <div class="columns is-centered">
              <part-forms-button :editing="editing" ></part-forms-button>
              <part-forms-button-reset :editing="editing" ></part-forms-button-reset>
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
              lastName: '',
              phone: '',
              adresse: '',
              cin: '',
              note: '',
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
          responsableId: function(){
            return this.$route.params.id
          }
        },
        created(){
          if (this.responsableId) {
            axios.get('/responsables/'+this.responsableId)
              .then(response => {
                this.form.load(response.data);
            });
          }
        },

        methods: {
          onSubmit(){
            if (this.form.id == '') {
              this.form.post('/responsables')
                .then(data => {
                  Event.$emit('publish-success-message', data.message);
                  this.$parent.getTotaleResponsables();
                  this.$root.getResponsables();
                  this.goback();
                })
                .catch(errors =>{
                  console.log(errors);
                });
            }else{
              this.form.put('/responsables')
                .then(data => {
                  Event.$emit('publish-success-message', data.message);
                  this.$parent.getTotaleResponsables();
                  this.$root.getResponsables();
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
