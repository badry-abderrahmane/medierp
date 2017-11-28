<template lang="html">
  <div>
    <div class="pageloader is-active" v-show="isLoading"></div>
    <global-pagetitle :color="this.$root.color" title="Combiné caisses" subtitle="Rapports et exportations" icon="sliders"></global-pagetitle>
    <div class="container">
      <div class="columns">
        <div class="column is-3"><br><br>
          <part-panel>
            <div slot="heading">Recherche et classification</div>
            <div slot="body">
              <form v-on:submit.prevent="onSubmit">
                  <part-forms-select-full v-model="form" :list="$root.months" name="date" label="Mois" help=""></part-forms-select-full>
                  <!-- <part-forms-select-full v-model="form" :list="$root.typecharges" name="typecharge_id" label="Type" help=""></part-forms-select-full> -->
                  <div class="column">
                    <label class="label">Type :</label>
                    <div class="select is-primary">
                      <select disabled v-model="form.typecharge_id">
                        <option value="1">Principale</option>
                      </select>
                    </div>
                  </div>
                  <div class="column">
                    <label class="label">Combiner avec :</label>
                    <div class="select is-primary">
                      <select disabled>
                        <option selected >Alimentations</option>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="column is-11">
                      <button type="submit" class="button is-primary is-fullwidth"><i class="fa fa-compress"></i>&nbsp;&nbsp;Combiner</button>
                  </div>
              </form>
              <hr>
              <center>
                <!-- <p class="title is-6">Nombre totale des alimentations :</p>
                <span class="tag is-primary is-medium">{{ totalAlimentations }}</span> -->
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
      caisse:'',
      isLoading:false,
      form: new Form ({
        date:'',
        typecharge_id:'1',
      })
    }
  },
  created(){
    var date = new Date();
    this.form.date = date.getMonth()+1;
    this.onSubmit();
  },
  methods:{
    onSubmit(){
      this.isLoading = true;
      this.charges = '';
      this.form.post('/combine/caisse')
        .then(data => {
          console.log(data);
          this.caisse = data;
          this.$router.push({ path: `/combine/caisse/list` });
          this.isLoading = false;
        })
        .catch(errors =>{
          console.log(errors);
        });
    },
  }
}
</script>

<style lang="css">
</style>
