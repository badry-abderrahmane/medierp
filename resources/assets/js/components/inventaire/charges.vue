<template lang="html">
  <div>
    <global-pagetitle :color="this.$root.color" title="Inventaire des charges" subtitle="Charges et alimentations" icon="shield"></global-pagetitle>
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
          <part-lists-table-add>
            <tr slot="thead">
              <!-- <th>#ID</th> -->
              <th width="12%">Date</th>
              <th width="30%">Désignation</th>
              <th>Montant</th>
              <th>Type charge</th>
              <th>Responsable</th>
              <th>Marché</th>
              <th>Société</th>
              <th width="10%" style="text-align: center;">Action</th>
            </tr>
            <tr slot="tbody" v-for="charge in charges">
              <!-- <td>{{ charge.id }}</td> -->
              <td>{{ charge.date }}</td>
              <td>{{ charge.designation }}</td>
              <td>{{ charge.montant }}</td>
              <td>{{ charge.typecharge.name }}</td>
              <td>{{ charge.responsable.name }}</td>
              <td>{{ charge.marche.name }}</td>
              <td>{{ charge.societe.name }}</td>
              <td style="text-align: center;">
                  <!-- <button class="button is-primary is-outlined" @click="showCharge(charge)"  data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Liste des marchés"><i class="fa fa-eye"></i></button> -->
                  <button class="button is-link is-outlined" @click="editCharge(charge)" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Modifier la societe"><i class="fa fa-edit"></i></button>
                  <button  @click="destroyCharge(charge)" class="button is-danger is-outlined" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Supprimer la societe">
                    <i class="fa fa-trash"></i>
                  </button>
              </td>
            </tr>
          </part-lists-table-add>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Form } from './../../api/formNoReset.js';
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
      this.form.post('/invo')
        .then(data => {
          console.log(data);
          this.charges = data;
          Vue.nextTick(function () {
            Event.$emit('init-datatable', 'tableAdd');
          })
        })
        .catch(errors =>{
          console.log(errors);
        });
    },
    getCharges(){
      axios.get('/charges')
        .then(response => {
          this.charges = response.data;
          // Vue.nextTick(function () {
          //   Event.$emit('init-datatable', 'tableAdd');
          // })
      });
    },
  }
}
</script>

<style lang="css">
</style>
