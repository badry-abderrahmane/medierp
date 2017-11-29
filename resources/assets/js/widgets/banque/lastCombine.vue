<template lang="html">
  <div>
    <div class="pageloader is-active" v-show="isLoading"></div>
    <div class="card">
      <div class="card-content">
        <p class="title">
          Dérnières opérations
        </p>
        <p class="subtitle">
          &nbsp;<i>Encaissements</i>-<i>Décaissements</i>
        </p>
        <part-lists-table-add>
          <tr slot="thead">
            <!-- <th width="12%">Date</th> -->
            <th>Désignation</th>
            <th width="15%">Montant</th>
            <th width="15%">Solde à l'instant</th>
          </tr>
          <tr slot="tbody" v-for="item in banque">
            <!-- <td>{{ item.date }}</td> -->
            <td>{{ item.designation }}</td>
            <td v-if="!item.operation_id" class="has-text-success"><i class="fa fa-arrow-up"></i>&nbsp;&nbsp;{{ item.montant }}</td><td v-else class="has-text-danger"><i class="fa fa-arrow-down"></i>&nbsp;&nbsp;{{ item.montant }}</td>
            <td class="has-text-info"><i class="fa fa-pause-circle-o"></i>&nbsp;&nbsp;{{ item.solde }}</td>
          </tr>
        </part-lists-table-add>
      </div>
      <footer class="card-footer">
        <p class="card-footer-item" style="margin-bottom: 0 !important;">
          <span>
            <i class="fa fa-eye"></i>&nbsp;&nbsp;Voir toutes les <a @click="$router.push({ path: `/banque/encaissement` })">Encaissements</a>
          </span>
        </p>
        <p class="card-footer-item">
          <span>
            <i class="fa fa-eye"></i>&nbsp;&nbsp;Voir toutes les <a @click="$router.push({ path: `/banque/decaissement` })">Décaissements</a>
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
      banque: [],
      form: new Form ({
        date:'',
        societe_id:'',
      })
    }
  },
  created(){
    var date = new Date();
    this.form.date = date.getMonth()+1;
    this.form.societe_id = 1;
    this.isLoading = true;
    this.form.post('/combine/banque')
        .then(data => {
          this.banque = data.slice(0, 10);
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
