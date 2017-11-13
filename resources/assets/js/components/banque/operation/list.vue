<template>
  <div>
      <part-panel>
        <div slot="heading">Liste des opérations</div>
        <div slot="body">
          <part-lists-table-add>
            <tr slot="thead">
              <th class="col-xs-2">#ID</th>
              <th class="col-xs-2">Nom</th>
              <th class="col-xs-2" style="text-align: center;">Action</th>
            </tr>
            <tr slot="tbody" v-for="operation in operations">
              <td class="col-xs-2">{{ operation.id }}</td>
              <td class="col-xs-2">{{ operation.name }}</td>
              <td class="col-xs-2" style="text-align: center;">
                  <button class="button is-primary is-outlined" @click="showOperation(operation)"  data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Liste des marchés"><i class="fa fa-eye"></i></button>
                  <button class="button is-link is-outlined" @click="editOperation(operation)" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Modifier la societe"><i class="fa fa-edit"></i></button>
                  <button  @click="destroyOperation(operation)" class="button is-danger is-outlined" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Supprimer la societe">
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
          operations:'',
        }
      },
      created(){
        this.getOperations();
      },

      methods: {
        getOperations(){
          axios.get('/operations')
            .then(response => {
              this.operations = response.data;
              Vue.nextTick(function () {
                Event.$emit('init-datatable', 'tableAdd');
              })
          });
        },

        editOperation(operation){
          this.$router.push({ path: `operation/edit/${operation.id}` })
        },

        destroyOperation(operation){
          this.$router.push({ path: `operation/delete/${operation.id}` })
        },

      }
    }



</script>
