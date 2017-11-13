<template>
  <div>
      <part-panel>
        <div slot="heading">Liste des alimentations</div>
        <div slot="body">
          <part-lists-table-add>
            <tr slot="thead">
              <th class="col-xs-2">#ID</th>
              <th class="col-xs-2">Désignation</th>
              <th class="col-xs-2">Date</th>
              <th class="col-xs-2">Montant</th>
              <th class="col-xs-2">Responsable</th>
              <th class="col-xs-2" style="text-align: center;">Action</th>
            </tr>
            <tr slot="tbody" v-for="alimentation in alimentations">
              <td class="col-xs-2">{{ alimentation.id }}</td>
              <td class="col-xs-2">{{ alimentation.designation }}</td>
              <td class="col-xs-2">{{ alimentation.date }}</td>
              <td class="col-xs-2">{{ alimentation.montant }}</td>
              <td class="col-xs-2">{{ alimentation.responsable_id }}</td>
              <td class="col-xs-2" style="text-align: center;">
                  <button class="button is-primary is-outlined" @click="showAlimentation(alimentation)"  data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Liste des marchés"><i class="fa fa-eye"></i></button>
                  <button class="button is-link is-outlined" @click="editAlimentation(alimentation)" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Modifier la societe"><i class="fa fa-edit"></i></button>
                  <button  @click="destroyAlimentation(alimentation)" class="button is-danger is-outlined" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Supprimer la societe">
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
          alimentations:'',
        }
      },
      created(){
        this.getAlimentations();
      },

      methods: {
        getAlimentations(){
          axios.get('/alimentations')
            .then(response => {
              this.alimentations = response.data;
              Vue.nextTick(function () {
                Event.$emit('init-datatable', 'tableAdd');
              })
          });
        },

        editAlimentation(alimentation){
          this.$router.push({ path: `alimentation/edit/${alimentation.id}` })
        },

        destroyAlimentation(alimentation){
          this.$router.push({ path: `alimentation/delete/${alimentation.id}` })
        },

      }
    }



</script>
