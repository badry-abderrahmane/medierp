<template>
  <div>
      <part-panel>
        <div slot="heading">Liste des décaissements</div>
        <div slot="body">
          <part-lists-table-add>
            <tr slot="thead">
              <th class="col-xs-2">#ID</th>
              <th class="col-xs-2">Désignation</th>
              <th class="col-xs-2">Date</th>
              <th class="col-xs-2">Type d'opération</th>
              <th class="col-xs-2">Code</th>
              <th class="col-xs-2">Montant</th>
              <th class="col-xs-2">Marché</th>
              <th class="col-xs-2" style="text-align: center;">Action</th>
            </tr>
            <tr slot="tbody" v-for="decaissement in decaissements">
              <td class="col-xs-2">{{ decaissement.id }}</td>
              <td class="col-xs-2">{{ decaissement.designation }}</td>
              <td class="col-xs-2">{{ decaissement.date }}</td>
              <td class="col-xs-2">{{ decaissement.operation.name }}</td>
              <td class="col-xs-2">{{ decaissement.code }}</td>
              <td class="col-xs-2">{{ decaissement.montant }}</td>
              <td class="col-xs-2">{{ decaissement.marche.name }}</td>
              <td class="col-xs-2" style="text-align: center;">
                  <button class="button is-primary is-outlined" @click="showDecaissement(decaissement)"  data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Liste des marchés"><i class="fa fa-eye"></i></button>
                  <button class="button is-link is-outlined" @click="editDecaissement(decaissement)" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Modifier la societe"><i class="fa fa-edit"></i></button>
                  <button  @click="destroyDecaissement(decaissement)" class="button is-danger is-outlined" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Supprimer la societe">
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

    export default {
      data(){
        return{
          decaissements:'',
        }
      },
      created(){
        this.getDecaissements();
      },

      methods: {
        getDecaissements(){
          axios.get('/decaissements')
            .then(response => {
              this.decaissements = response.data;
              Vue.nextTick(function () {
                Event.$emit('init-datatable', 'tableAdd');
              })
          });
        },

        editDecaissement(decaissement){
          this.$router.push({ path: `decaissement/edit/${decaissement.id}` })
        },

        destroyDecaissement(decaissement){
          this.$router.push({ path: `decaissement/delete/${decaissement.id}` })
        },

      }
    }



</script>
