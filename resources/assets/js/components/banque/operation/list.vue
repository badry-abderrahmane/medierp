<template>
  <div>
      <div class="pageloader is-active" v-show="isLoading"></div>
      <part-panel>
        <div slot="heading">Liste des opérations</div>
        <div slot="body">
          <part-lists-table-add>
            <tr slot="thead">
              <!-- <th>#ID</th> -->
              <th>Nom</th>
              <th width="15%" style="text-align: center;">Action</th>
            </tr>
            <tr slot="tbody" v-for="operation in operations">
              <!-- <td>{{ operation.id }}</td> -->
              <td>{{ operation.name }}</td>
              <td style="text-align: center;">
                  <!-- <button class="button is-primary is-outlined" @click="showOperation(operation)"  data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Liste des marchés"><i class="fa fa-eye"></i></button> -->
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
          isLoading: false,
          operations:'',
        }
      },
      created(){
        this.getOperations();
      },

      methods: {
        getOperations(){
          this.isLoading = true;
          axios.get('/operations')
            .then(response => {
              this.operations = response.data;
              Vue.nextTick(function () {
                Event.$emit('init-datatable', 'tableAdd');
              })
              this.isLoading = false;
          });
        },

        editOperation(operation){
          this.$router.push({ path: `/banque/operation/edit/${operation.id}` })
        },

        destroyOperation(operation){
          this.$router.push({ path: `/banque/operation/delete/${operation.id}` })
        },

      }
    }



</script>
