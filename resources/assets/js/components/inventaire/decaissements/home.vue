<template lang="html">
  <div>
    <global-pagetitle :color="this.$root.color" title="Inventaire des decaissements" subtitle="Recherche et classification" icon="shield"></global-pagetitle>
    <div class="container">
      <div class="columns">
        <div class="column is-3"><br><br>
          <part-panel>
            <div slot="heading">Recherche et classification</div>
            <div slot="body">
              <form v-on:submit.prevent="onSubmit">
                  <part-forms-select-full v-model="form" :list="$root.months" name="date" label="Mois" help=""></part-forms-select-full>
                  <part-forms-select-full v-model="form" :list="$root.operations" name="operation_id" label="Type" help=""></part-forms-select-full>
                  <part-forms-select-full v-model="form" :list="$root.marches" name="marche_id" label="Marché" help=""></part-forms-select-full>
                  <br>
                  <div class="column is-11">
                      <button type="submit" class="button is-primary is-fullwidth"><i class="fa fa-search"></i>&nbsp;&nbsp;Recherche</button>
                  </div>
              </form>
              <hr>
              <center>
                <p class="title is-6">Nombre totale des decaissements :</p>
                <span class="tag is-primary is-medium">{{ totalDecaissements }}</span>
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
      totalDecaissements: 10,
      decaissements: '',
      form : new Form({
        date:'',
        operation_id: '',
        marche_id: '',
      }),
    }
  },
  created(){
    this.getDecaissements();
  },
  methods:{
    onSubmit(){
      this.decaissements = '';
      this.form.post('/inventaire/decaissements')
        .then(data => {
          console.log(data);
          this.decaissements = data;
          this.$router.push({ path: `/inventaire/decaissements/list` })
        })
        .catch(errors =>{
          console.log(errors);
        });
    },
    getDecaissements(){
      axios.get('/decaissements')
        .then(response => {
          this.decaissements = response.data;
          this.$router.push({ path: `/inventaire/decaissements/list` })
      });
    },
  }
}
</script>

<style lang="css">
</style>
