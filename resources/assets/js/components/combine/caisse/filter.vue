<template lang="html">
  <div class="container">
    <div class="columns">
      <div class="column is-11">
        <part-panel>
          <div slot="heading">Recherche et classification</div>
          <div slot="body">
            <form v-on:submit.prevent="onSubmit" class="columns is-multiline">
                <div class="column is-1">&nbsp;</div>
                <part-forms-select-full v-model="form" :list="$root.months" name="date" label="Mois :" help=""></part-forms-select-full>
                <div class="column is-3">
                  <label class="label">Type de charges :</label>
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
        typecharge_id:'1',
      })
    }
  },

  created(){
    var date = new Date();
    this.form.date = date.getMonth()+1;
  },
  methods:{
    onSubmit(){
      this.$router.push({ path: `/combine/caisse/list/`+this.form.date+`/`+this.form.typecharge_id , force:true});
    }
  }
}
</script>

<style lang="css">
</style>
