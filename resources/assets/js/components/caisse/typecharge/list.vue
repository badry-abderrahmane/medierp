<template>
  <div>
      <div class="pageloader is-active" v-show="isLoading"></div>
      <part-panel>
        <div slot="heading">Liste des type de charges</div>
        <div slot="body">
          <part-lists-table-add>
            <tr slot="thead">
              <!-- <th>#ID</th> -->
              <th>Nom</th>
              <th width="20%" style="text-align: center;">Action</th>
            </tr>
            <tr slot="tbody" v-for="typecharge in typecharges">
              <!-- <td>{{ typecharge.id }}</td> -->
              <td>{{ typecharge.name }}</td>
              <td style="text-align: center;">
                  <!-- <button class="button is-primary is-outlined" @click="showTypecharge(typecharge)"  data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Liste des marchés"><i class="fa fa-eye"></i></button> -->
                  <button class="button is-link is-outlined" @click="editTypecharge(typecharge)" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Modifier la societe"><i class="fa fa-edit"></i></button>
                  <button  @click="destroyTypecharge(typecharge)" class="button is-danger is-outlined" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Supprimer la societe">
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
          typecharges:'',
        }
      },
      created(){
        this.getTypecharges();
      },

      methods: {
        getTypecharges(){
          this.isLoading = true;
          axios.get('/typecharges')
            .then(response => {
              this.typecharges = response.data;
              Vue.nextTick(function () {
                Event.$emit('init-datatable', 'tableAdd');
              })
              this.isLoading = false;
          });
        },

        editTypecharge(typecharge){
          this.$router.push({ path: `typecharge/edit/${typecharge.id}` })
        },

        destroyTypecharge(typecharge){
          this.$router.push({ path: `typecharge/delete/${typecharge.id}` })
        },

      }
    }



</script>
