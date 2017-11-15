<template>
  <div>
      <part-panel>
        <div slot="heading">Liste des responsables</div>
        <div slot="body">
          <part-lists-table-add>
            <tr slot="thead">
              <!-- <th>#ID</th> -->
              <th width="50">Nom</th>
              <th>Note</th>
              <th style="text-align: center;">Action</th>
            </tr>
            <tr slot="tbody" v-for="responsable in responsables">
              <!-- <td>{{ responsable.id }}</td> -->
              <td>{{ responsable.name }}</td>
              <td>{{ responsable.note }}</td>
              <td style="text-align: center;">
                  <!-- <button class="button is-primary is-outlined" @click="showResponsable(responsable)"  data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Liste des marchés"><i class="fa fa-eye"></i></button> -->
                  <button class="button is-link is-outlined" @click="editResponsable(responsable)" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Modifier la societe"><i class="fa fa-edit"></i></button>
                  <button  @click="destroyResponsable(responsable)" class="button is-danger is-outlined" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Supprimer la societe">
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
          responsables:'',
        }
      },
      created(){
        this.getResponsables();
      },

      methods: {
        getResponsables(){
          axios.get('/responsables')
            .then(response => {
              this.responsables = response.data;
              Vue.nextTick(function () {
                Event.$emit('init-datatable', 'tableAdd');
              })
          });
        },

        editResponsable(responsable){
          this.$router.push({ path: `responsable/edit/${responsable.id}` })
        },

        destroyResponsable(responsable){
          this.$router.push({ path: `responsable/delete/${responsable.id}` })
        },

      }
    }



</script>
