<template lang="html">
  <div class="container">
    <div class="columns">
      <div class="column is-12">
        <part-panel>
          <div slot="heading">Recherche et classification</div>
          <div slot="body">
            <form v-on:submit.prevent="onSubmit" class="columns is-multiline">
                <part-forms-select-full v-model="form" :list="$root.months" name="date" label="Mois" help=""></part-forms-select-full>
                <part-forms-select-full v-model="form" :list="$root.societes" name="societe_id" label="Société"></part-forms-select-full>
                <!-- <part-forms-select-full v-model="form" :list="$root.typecharges" name="typecharge_id" label="Type" help=""></part-forms-select-full> -->
                <div class="column">
                  <label class="label">Combiner :</label>
                  <div class="select is-primary">
                    <select disabled>
                      <option>Encaissements</option>
                    </select>
                  </div>
                </div>
                <div class="column">
                  <label class="label">Avec :</label>
                  <div class="select is-primary">
                    <select disabled>
                      <option selected >Decaissements</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="column is-2 is-offset-4">
                    <button type="submit" class="button is-primary is-fullwidth"><i class="fa fa-compress"></i>&nbsp;&nbsp;Combiner</button>
                </div>
            </form>
          </div>
        </part-panel>
      </div>
    </div>
  </div>
</template>

<script>
import { Form } from './../../../api/formNoReset.js';
export default {
  data(){
    return {
      form: new Form ({
        date:'',
        societe_id:'',
      })
    }
  },

  created(){
    var date = new Date();
    this.form.date = date.getMonth()+1;
  },
  methods:{
    onSubmit(){
      this.$router.push({ path: `/combine/banque/list/`+this.form.date+`/`+this.form.societe_id , force:true});
    }
  }
}
</script>

<style lang="css">
</style>
