<template lang="html">
  <div>
    <global-pagetitle :color="this.$root.color" title="Inventaire des charges" subtitle="Recherche et Classification" icon="shield"></global-pagetitle>
    <div class="container">
      <div class="columns">
        <div class="column is-3"><br><br>
          <part-panel>
            <div slot="heading">Recherche et classification</div>
            <div slot="body">
              <form v-on:submit.prevent="onSubmit">
                  <part-forms-select-full v-model="form" :list="$root.months" name="date" label="Mois" help=""></part-forms-select-full>
                  <part-forms-select-full v-model="form" :list="$root.typecharges" name="typecharge_id" label="Type" help=""></part-forms-select-full>
                  <part-forms-select-full v-model="form" :list="$root.responsables" name="responsable_id" label="Responsable" help=""></part-forms-select-full>
                  <part-forms-select-full v-model="form" :list="$root.marches" name="marche_id" label="Marché" help=""></part-forms-select-full>
                  <part-forms-select-full v-model="form" :list="$root.societes" name="societe_id" label="Société" help=""></part-forms-select-full>
                  <br>
                  <div class="column is-11">
                      <button type="submit" class="button is-primary is-fullwidth"><i class="fa fa-search"></i>&nbsp;&nbsp;Recherche</button>
                  </div>
              </form>
              <hr>
              <center>
                <p class="title is-6">Nombre totale des charges :</p>
                <span class="tag is-primary is-medium">{{ totalCharges }}</span>
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
      totalCharges: 10,
      charges: '',
      form : new Form({
        date:'',
        typecharge_id: '',
        marche_id: '',
        responsable_id: '',
        societe_id: '',
      }),
    }
  },
  created(){
    this.getCharges();
  },
  methods:{
    onSubmit(){
      this.charges = '';
      this.form.post('/inventaire/charges')
        .then(data => {
          console.log(data);
          this.charges = data;
          this.$router.push({ path: `/inventaire/charges/list` })
        })
        .catch(errors =>{
          console.log(errors);
        });
    },
    getCharges(){
      axios.get('/charges')
        .then(response => {
          this.charges = response.data;
          this.$router.push({ path: `/inventaire/charges/list` })
      });
    },
  }
}
</script>

<style lang="css">
</style>
