<template lang="html">
  <div>
    <div class="pageloader is-active" v-show="isLoading"></div>
    <part-panel>
      <div slot="heading">Inventaire des charges</div>
      <div slot="body">
        <part-lists-table-add>
          <tr slot="thead">
            <!-- <th>#ID</th> -->
            <th width="12%">Date</th>
            <th width="30%">Désignation</th>
            <!-- <th>Type charge</th> -->
            <th>Responsable</th>
            <th>Marché</th>
            <th width="15%">Montant</th>
            <th width="15%">Solde à l'instant</th>
            <!-- <th>Société</th> -->
            <th width="10%" style="text-align: center;">Action</th>
          </tr>
          <tr slot="tbody" v-for="item in caisse">
            <!-- <td>{{ charge.id }}</td> -->
            <td>{{ item.date }}</td>
            <td>{{ item.designation }}</td>
            <td><router-link :to="'/entite/responsable/show/'+item.responsable.id">{{ item.responsable.name }}</router-link></td>
            <td v-if="item.marche_id"><router-link :to="'/entite/marche/show/'+item.marche.id">{{ item.marche.name }}</router-link></td><td v-else>-</td>
            <td v-if="!item.typecharge_id" class="has-text-success"><i class="fa fa-arrow-up"></i>&nbsp;&nbsp;{{ item.montant }}</td><td v-else class="has-text-danger"><i class="fa fa-arrow-down"></i>&nbsp;&nbsp;{{ item.montant }}</td>
            <td class="has-text-info"><i class="fa fa-pause-circle-o"></i>&nbsp;&nbsp;{{ item.solde }}</td>
            <!-- <td v-if="item.societe_id">{{ item.societe.name }}</td><td v-else>-</td> -->
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
    </part-panel>
  </div>
</template>

<script>
import { Form } from './../../../api/formNoReset.js';
export default {
  data(){
    return {
      isLoading: false,
      caisse: [],
      form: new Form ({
        date:'',
        typecharge_id:'',
      })
    }
  },
  created(){
    this.form.date          = this.$route.params.date;
    this.form.typecharge_id = this.$route.params.typecharge;
    this.isLoading          = true;
    this.form.post('/combine/caisse')
        .then(data => {
          this.caisse = data;
          Vue.nextTick(function () {
            Event.$emit('init-datatable', 'tableAdd');
          })
          this.isLoading = false;
        })
        .catch(errors =>{
          console.log(errors);
          this.isLoading = false;
        });
  },
}
</script>

<style lang="css">
</style>
