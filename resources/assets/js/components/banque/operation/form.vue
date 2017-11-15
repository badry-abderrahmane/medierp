<template lang="html">
  <div class="columns">
    <div class="column">
      <part-panel :editing="editing">
        <div slot="heading">Formulaire de type d'opération</div>
        <div slot="body">
          <form v-on:submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
            <div class="columns is-centered">
                <part-forms-input v-model="form" name="name" label="Nom d'opération" help="Taper un nom"></part-forms-input>
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
          operationId: function(){
            return this.$route.params.id
          }
        },
        created(){
          if (this.operationId) {
            axios.get('/operations/'+this.operationId)
              .then(response => {
                this.form.load(response.data);
            });
          }
        },

        methods: {
          onSubmit(){
            if (this.form.id == '') {
              this.form.post('/operations')
                .then(data => {
                  Event.$emit('publish-success-message', data.message);
                  this.$root.getOperations();
                  this.$parent.getTotaleOperations();
                  this.goback();
                })
                .catch(errors =>{
                  console.log(errors);
                });
            }else{
              this.form.put('/operations')
                .then(data => {
                  Event.$emit('publish-success-message', data.message);
                  this.$root.getOperations();
                  this.$parent.getTotaleOperations();
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
