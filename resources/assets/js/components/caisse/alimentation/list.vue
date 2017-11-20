<template>
  <div>
      <div class="pageloader is-active" v-show="isLoading"></div>
      <part-panel>
        <div slot="heading">Liste des alimentations</div>
        <div slot="body">
          <part-lists-table-add>
            <tr slot="thead">
              <!-- <th>#ID</th> -->
              <th width="12%">Date</th>
              <th width="30%">Désignation</th>
              <th>Montant</th>
              <th>Responsable</th>
              <th width="10%" style="text-align: center;">Action</th>
            </tr>
            <tr slot="tbody" v-for="alimentation in alimentations">
              <!-- <td>{{ alimentation.id }}</td> -->
              <td>{{ alimentation.date }}</td>
              <td>{{ alimentation.designation }}</td>
              <td>{{ alimentation.montant }}</td>
              <td><router-link :to="'/entite/responsable/show/'+alimentation.responsable.id">{{ alimentation.responsable.name }}</router-link></td>
              <td style="text-align: center;">
                  <!-- <button class="button is-primary is-outlined" @click="showAlimentation(alimentation)"  data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Liste des marchés"><i class="fa fa-eye"></i></button> -->
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
          isLoading: false,
          alimentations:'',
        }
      },
      created(){
        this.getAlimentations();
      },

      methods: {
        getAlimentations(){
          this.isLoading = true;
          axios.get('/alimentations')
            .then(response => {
              this.alimentations = response.data;
              Vue.nextTick(function () {
                Event.$emit('init-datatable', 'tableAdd');
              })
              this.isLoading = false;
          });
        },

        editAlimentation(alimentation){
          this.$router.push({ path: `/caisse/alimentation/edit/${alimentation.id}` })
        },

        destroyAlimentation(alimentation){
          this.$router.push({ path: `/caisse/alimentation/delete/${alimentation.id}` })
        },

      }
    }



</script>
