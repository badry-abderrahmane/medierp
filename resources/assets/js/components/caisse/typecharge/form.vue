<template lang="html">
  <div class="columns">
    <div class="column">
      <part-panel :editing="editing">
        <div slot="heading">Formulaire de type charge</div>
        <div slot="body">
          <form v-on:submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
            <div class="columns is-centered">
                <part-forms-input v-model="form" name="name" label="Nom" help="Donner un nom"></part-forms-input>
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
          typechargeId: function(){
            return this.$route.params.id
          }
        },
        created(){
          if (this.typechargeId) {
            axios.get('/typecharges/'+this.typechargeId)
              .then(response => {
                this.form.load(response.data);
            });
          }
        },

        methods: {
          onSubmit(){
            if (this.form.id == '') {
              this.form.post('/typecharges')
                .then(data => {
                  console.log(data.message);
                  Event.$emit('publish-success-message', data.message);
                  this.$parent.getTotaleTypecharges();
                  this.$root.getTypecharges();
                  this.goback();
                })
                .catch(errors =>{
                  console.log(errors);
                });
            }else{
              this.form.put('/typecharges')
                .then(data => {
                  Event.$emit('publish-success-message', data.message);
                  this.$parent.getTotaleTypecharges();
                  this.$root.getTypecharges();
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
