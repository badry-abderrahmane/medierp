<template>
  <div>
      <part-panel>
        <div slot="heading">Liste des charges</div>
        <div slot="body">
          <part-lists-table-add>
            <tr slot="thead">
              <th class="col-xs-2">#ID</th>
              <th class="col-xs-2">Désignation</th>
              <th class="col-xs-2">Date</th>
              <th class="col-xs-2">Montant</th>
              <th class="col-xs-2">Type charge</th>
              <th class="col-xs-2">Responsable</th>
              <th class="col-xs-2">Marché</th>
              <th class="col-xs-2">Société</th>
              <th class="col-xs-2" style="text-align: center;">Action</th>
            </tr>
            <tr slot="tbody" v-for="charge in charges">
              <td class="col-xs-2">{{ charge.id }}</td>
              <td class="col-xs-2">{{ charge.designation }}</td>
              <td class="col-xs-2">{{ charge.date }}</td>
              <td class="col-xs-2">{{ charge.montant }}</td>
              <td class="col-xs-2">{{ charge.typecharge_id }}</td>
              <td class="col-xs-2">{{ charge.responsable_id }}</td>
              <td class="col-xs-2">{{ charge.marche_id }}</td>
              <td class="col-xs-2">{{ charge.societe_id }}</td>
              <td class="col-xs-2" style="text-align: center;">
                  <button class="button is-primary is-outlined" @click="showCharge(charge)"  data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Liste des marchés"><i class="fa fa-eye"></i></button>
                  <button class="button is-link is-outlined" @click="editCharge(charge)" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Modifier la societe"><i class="fa fa-edit"></i></button>
                  <button  @click="destroyCharge(charge)" class="button is-danger is-outlined" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Supprimer la societe">
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
          charges:'',
        }
      },
      created(){
        this.getCharges();
      },

      methods: {
        getCharges(){
          axios.get('/charges')
            .then(response => {
              this.charges = response.data;
              Vue.nextTick(function () {
                Event.$emit('init-datatable', 'tableAdd');
              })
          });
        },

        editCharge(charge){
          this.$router.push({ path: `charge/edit/${charge.id}` })
        },

        destroyCharge(charge){
          this.$router.push({ path: `charge/delete/${charge.id}` })
        },

      }
    }



</script>
