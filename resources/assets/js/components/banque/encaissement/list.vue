<template>
  <div>
      <div class="pageloader is-active" v-show="isLoading"></div>
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
              <td><router-link :to="'/entite/marche/show/'+encaissement.marche.id">{{ encaissement.marche.name }}</router-link></td>
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
          isLoading: false,
          encaissements:'',
        }
      },
      created(){
        this.getEncaissements();
      },

      methods: {
        getEncaissements(){
          this.isLoading = true;
          axios.get('/encaissements')
            .then(response => {
              this.encaissements = response.data;
              Vue.nextTick(function () {
                Event.$emit('init-datatable', 'tableAdd');
              })
              this.isLoading = false;
          });
        },

        editEncaissement(encaissement){
          this.$router.push({ path: `/banque/encaissement/edit/${encaissement.id}` })
        },

        destroyEncaissement(encaissement){
          this.$router.push({ path: `/banque/encaissement/delete/${encaissement.id}` })
        },

      }
    }



</script>
