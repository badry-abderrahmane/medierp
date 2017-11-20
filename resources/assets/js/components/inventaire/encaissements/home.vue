<template lang="html">
  <div>
    <global-pagetitle :color="this.$root.color" title="Inventaire des encaissements" subtitle="Recherche et Classification" icon="shield"></global-pagetitle>
    <div class="container">
      <div class="columns">
        <div class="column is-3"><br><br>
          <part-panel>
            <div slot="heading">Recherche et classification</div>
            <div slot="body">
              <form v-on:submit.prevent="onSubmit">
                  <part-forms-select-full v-model="form" :list="$root.months" name="date" label="Mois" help=""></part-forms-select-full>
                  <part-forms-select-full v-model="form" :list="$root.marches" name="marche_id" label="Marché" help=""></part-forms-select-full>
                  <br>
                  <div class="column is-11">
                      <button type="submit" class="button is-primary is-fullwidth"><i class="fa fa-search"></i>&nbsp;&nbsp;Recherche</button>
                  </div>
              </form>
              <hr>
              <center>
                <p class="title is-6">Nombre totale des encaissements :</p>
                <span class="tag is-primary is-medium">{{ totalEncaissements }}</span>
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
      totalEncaissements: 10,
      encaissements: '',
      form : new Form({
        date:'',
        marche_id: '',
      }),
    }
  },
  created(){
    this.getEncaissements();
  },
  methods:{
    onSubmit(){
      this.encaissements = '';
      this.form.post('/inventaire/encaissements')
        .then(data => {
          console.log(data);
          this.encaissements = data;
          this.$router.push({ path: `/inventaire/encaissements/list` })
        })
        .catch(errors =>{
          console.log(errors);
        });
    },
    getEncaissements(){
      axios.get('/encaissements')
        .then(response => {
          this.encaissements = response.data;
          this.$router.push({ path: `/inventaire/encaissements/list` })
      });
    },
  }
}
</script>

<style lang="css">
</style>
