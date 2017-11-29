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
            <th>Marché</th>
            <th width="15%">Montant</th>
            <th width="15%">Solde à l'instant</th>
            <!-- <th width="10%" style="text-align: center;">Action</th> -->
          </tr>
          <tr slot="tbody" v-for="item in banque">
            <td>{{ item.date }}</td>
            <td>{{ item.designation }}</td>
            <td v-if="item.marche_id"><router-link :to="'/entite/marche/show/'+item.marche.id">{{ item.marche.name }}</router-link></td><td v-else>-</td>
            <td v-if="!item.operation_id" class="has-text-success"><i class="fa fa-arrow-up"></i>&nbsp;&nbsp;{{ item.montant }}</td><td v-else class="has-text-danger"><i class="fa fa-arrow-down"></i>&nbsp;&nbsp;{{ item.montant }}</td>
            <td class="has-text-info"><i class="fa fa-pause-circle-o"></i>&nbsp;&nbsp;{{ item.solde }}</td>
            <!-- <td style="text-align: center;">
                <button class="button is-link is-outlined" @click="editCharge(charge)" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Modifier la societe"><i class="fa fa-edit"></i></button>
                <button  @click="destroyCharge(charge)" class="button is-danger is-outlined" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Supprimer la societe">
                  <i class="fa fa-trash"></i>
                </button>
            </td> -->
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
      banque: [],
      form: new Form ({
        date:'',
        societe_id:'',
      })
    }
  },
  created(){
    this.form.date = this.$route.params.date;
    this.form.societe_id = this.$route.params.societe;
    this.isLoading = true;
    this.form.post('/combine/banque')
        .then(data => {
          this.banque = data;
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
