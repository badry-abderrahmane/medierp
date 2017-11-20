<template>
  <div>
      <div class="pageloader is-active" v-show="isLoading"></div>
      <part-panel>
        <div slot="heading">Liste des sociétés</div>
        <div slot="body">
          <part-lists-table-add>
            <tr slot="thead">
              <!-- <th>#ID</th> -->
              <th width="50">Nom</th>
              <th>Solde</th>
              <th>Date de création</th>
              <th style="text-align: center;">Action</th>
            </tr>
            <tr slot="tbody" v-for="societe in societes">
              <!-- <td>{{ societe.id }}</td> -->
              <td>{{ societe.name }}</td>
              <td>{{ societe.solde }}</td>
              <td>{{ societe.created_at }}</td>
              <td style="text-align: center;">
                  <button class="button is-primary is-outlined" @click="showSociete(societe)"  data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Liste des marchés"><i class="fa fa-eye"></i></button>
                  <button class="button is-link is-outlined" @click="editSociete(societe)" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Modifier la societe"><i class="fa fa-edit"></i></button>
                  <button  @click="destroySociete(societe)" class="button is-danger is-outlined" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Supprimer la societe">
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
          societes:'',
        }
      },
      created(){
        this.getSocietes();
        Event.$on('modal-confirmed', (societe) => {
          this.destroySociete(societe);
        });
      },

      methods: {
        getSocietes(){
          this.isLoading = true;
          axios.get('/societes')
            .then(response => {
              this.societes = response.data;
              Vue.nextTick(function () {
                Event.$emit('init-datatable', 'tableAdd');
              })
              this.isLoading = false;
          });
        },

        showSociete(societe){
          this.$router.push({ path: `/entite/societe/show/${societe.id}` })
        },

        editSociete(societe){
          this.$router.push({ path: `/entite/societe/edit/${societe.id}` })
        },

        destroySociete(societe){
          this.$router.push({ path: `/entite/societe/delete/${societe.id}` })
        },

      }
    }



</script>
