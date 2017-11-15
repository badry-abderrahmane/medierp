<template>
  <div>
      <part-panel>
        <div slot="heading">Liste des décaissements</div>
        <div slot="body">
          <part-lists-table-add>
            <tr slot="thead">
              <!-- <th>#ID</th> -->
              <th width="12%">Date</th>
              <th width="30%">Désignation</th>
              <th>Type d'opération</th>
              <th>Code</th>
              <th>Montant</th>
              <th width="">Marché</th>
              <th width="15%" style="text-align: center;">Action</th>
            </tr>
            <tr slot="tbody" v-for="decaissement in decaissements">
              <!-- <td>{{ decaissement.id }}</td> -->
              <td>{{ decaissement.date }}</td>
              <td>{{ decaissement.designation }}</td>
              <td>{{ decaissement.operation.name }}</td>
              <td>{{ decaissement.code }}</td>
              <td>{{ decaissement.montant }}</td>
              <td>{{ decaissement.marche.name }}</td>
              <td style="text-align: center;">
                  <!-- <button class="button is-primary is-outlined" @click="showDecaissement(decaissement)"  data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Liste des marchés"><i class="fa fa-eye"></i></button> -->
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
