<template lang="html">
  <div>
    <global-pagetitle :color="this.$root.color" title="Inventaire des alimentations" subtitle="Alimentations et alimentations" icon="shield"></global-pagetitle>
    <div class="container">
      <div class="columns">
        <div class="column is-3"><br><br>
          <part-panel>
            <div slot="heading">Recherche et classification</div>
            <div slot="body">
              <form v-on:submit.prevent="onSubmit">
                  <part-forms-select-full v-model="form" :list="$root.months" name="date" label="Mois" help=""></part-forms-select-full>
                  <part-forms-select-full v-model="form" :list="$root.responsables" name="responsable_id" label="Responsable" help=""></part-forms-select-full>
                  <br>
                  <div class="column is-11">
                      <button type="submit" class="button is-primary is-fullwidth"><i class="fa fa-search"></i>&nbsp;&nbsp;Recherche</button>
                  </div>
              </form>
              <hr>
              <center>
                <p class="title is-6">Nombre totale des alimentations :</p>
                <span class="tag is-primary is-medium">{{ totalAlimentations }}</span>
              </center>
            </div>
          </part-panel>
        </div>
        <div class="column is-11"><br><br>
          <router-view></router-view>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Form } from './../../../api/formNoReset.js';
export default {
  data(){
    return{
      totalAlimentations: 10,
      alimentations: '',
      form : new Form({
        date:'',
        responsable_id: '',
      }),
    }
  },
  created(){
    this.getAlimentations();
  },
  methods:{
    onSubmit(){
      this.alimentations = '';
      this.form.post('/inventaire/alimentations')
        .then(data => {
          console.log(data);
          this.alimentations = data;
          this.$router.push({ path: `/inventaire/alimentations/list` })
        })
        .catch(errors =>{
          console.log(errors);
        });
    },
    getAlimentations(){
      axios.get('/alimentations')
        .then(response => {
          this.alimentations = response.data;
          this.$router.push({ path: `/inventaire/alimentations/list` })
      });
    },
  }
}
</script>

<style lang="css">
</style>
