<template>
  <div>
      <part-panel>
        <div slot="heading">Liste des sociétés</div>
        <div slot="body">
          <part-lists-table-add>
            <tr slot="thead">
              <th class="col-xs-2">#ID</th>
              <th class="col-xs-2">Nom</th>
              <th class="col-xs-2">Solde</th>
              <th class="col-xs-2">Date de création</th>
              <th class="col-xs-2" style="text-align: center;">Action</th>
            </tr>
            <tr slot="tbody" v-for="societe in societes">
              <td class="col-xs-2">{{ societe.id }}</td>
              <td class="col-xs-2">{{ societe.name }}</td>
              <td class="col-xs-2">{{ societe.solde }}</td>
              <td class="col-xs-2">{{ societe.created_at }}</td>
              <td class="col-xs-2" style="text-align: center;">
                  <button class="button is-primary is-outlined" @click="showMarches(societe)"  data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Liste des marchés"><i class="fa fa-eye"></i></button>
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
          societes:'',
        }
      },
      created(){
        this.getSocietes();
      },
      methods: {
        getSocietes(){
          axios.get('/societes')
            .then(response => {
              this.societes = response.data;
          });
        },

        showMarches(societe){

        },

        editSociete(societe){
          this.$router.push({ path: `societe/edit/${societe.id}` })
        },

        destroySociete(societe){
          Event.$emit('show-modal-delete', 'Meqsage luissssssssssssssssssssssssssssssssss');
        }
      }
    }



</script>
