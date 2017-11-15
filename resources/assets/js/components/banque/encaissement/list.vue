<template>
  <div>
      <part-panel>
        <div slot="heading">Liste des encaissements</div>
        <div slot="body">
          <part-lists-table-add>
            <tr slot="thead">
              <!-- <th>#ID</th> -->
              <th width="12%">Date</th>
              <th width="30%">Désignation</th>
              <th>Montant</th>
              <th>Marché</th>
              <th width="15%" style="text-align: center;">Action</th>
            </tr>
            <tr slot="tbody" v-for="encaissement in encaissements">
              <!-- <td>{{ encaissement.id }}</td> -->
              <td>{{ encaissement.date }}</td>
              <td>{{ encaissement.designation }}</td>
              <td>{{ encaissement.montant }}</td>
              <td>{{ encaissement.marche.name }}</td>
              <td style="text-align: center;">
                  <!-- <button class="button is-primary is-outlined" @click="showEncaissement(encaissement)"  data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Liste des marchés"><i class="fa fa-eye"></i></button> -->
                  <button class="button is-link is-outlined" @click="editEncaissement(encaissement)" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Modifier la societe"><i class="fa fa-edit"></i></button>
                  <button  @click="destroyEncaissement(encaissement)" class="button is-danger is-outlined" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Supprimer la societe">
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
          encaissements:'',
        }
      },
      created(){
        this.getEncaissements();
      },

      methods: {
        getEncaissements(){
          axios.get('/encaissements')
            .then(response => {
              this.encaissements = response.data;
              Vue.nextTick(function () {
                Event.$emit('init-datatable', 'tableAdd');
              })
          });
        },

        editEncaissement(encaissement){
          this.$router.push({ path: `encaissement/edit/${encaissement.id}` })
        },

        destroyEncaissement(encaissement){
          this.$router.push({ path: `encaissement/delete/${encaissement.id}` })
        },

      }
    }



</script>
