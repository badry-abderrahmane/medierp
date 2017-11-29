<template lang="html">
  <div>
    <div class="pageloader is-active" v-show="isLoading"></div>
    <div class="card">
      <div class="card-content">
        <p class="title">
          Dernièrs échanges
        </p>
        <p class="subtitle">
          &nbsp;<i>Caisse Principale</i>-<i>Alimentations</i>
        </p>
        <part-lists-table-add>
          <tr slot="thead">
            <!-- <th width="12%">Date</th> -->
            <th>Désignation</th>
            <th width="15%">Montant</th>
            <th width="15%">Solde à l'instant</th>
          </tr>
          <tr slot="tbody" v-for="item in caisse">
            <!-- <td>{{ item.date }}</td> -->
            <td>{{ item.designation }}</td>
            <td v-if="!item.typecharge_id" class="has-text-success"><i class="fa fa-arrow-up"></i>&nbsp;&nbsp;{{ item.montant }}</td><td v-else class="has-text-danger"><i class="fa fa-arrow-down"></i>&nbsp;&nbsp;{{ item.montant }}</td>
            <td class="has-text-info"><i class="fa fa-pause-circle-o"></i>&nbsp;&nbsp;{{ item.solde }}</td>
          </tr>
        </part-lists-table-add>
      </div>
      <footer class="card-footer">
        <p class="card-footer-item" style="margin-bottom: 0 !important;">
          <span>
            <i class="fa fa-eye"></i>&nbsp;&nbsp;Voir toutes les <a @click="$router.push({ path: `/caisse/charge` })">Charges</a>
          </span>
        </p>
        <p class="card-footer-item">
          <span>
            <i class="fa fa-eye"></i>&nbsp;&nbsp;Voir toutes les <a @click="$router.push({ path: `/caisse/alimentation` })">Alimentations</a>
          </span>
        </p>
      </footer>
    </div>
  </div>
</template>

<script>
import { Form } from './../../api/formNoReset.js';
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
    var date = new Date();
    this.form.date = date.getMonth()+1;
    this.form.typecharge_id = 1;

    this.isLoading          = true;
    this.form.post('/combine/caisse')
        .then(data => {
          this.caisse = data.slice(0, 10);
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
