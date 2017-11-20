<template>
  <div>
      <div class="pageloader is-active" v-show="isLoading"></div>
      <part-panel>
        <div slot="heading">Liste des charges</div>
        <div slot="body">
          <part-lists-table-add>
            <tr slot="thead">
              <!-- <th>#ID</th> -->
              <th width="12%">Date</th>
              <th width="30%">Désignation</th>
              <th>Montant</th>
              <th>Type charge</th>
              <th>Responsable</th>
              <th>Marché</th>
              <th>Société</th>
              <th width="10%" style="text-align: center;">Action</th>
            </tr>
            <tr slot="tbody" v-for="charge in charges">
              <!-- <td>{{ charge.id }}</td> -->
              <td>{{ charge.date }}</td>
              <td>{{ charge.designation }}</td>
              <td>{{ charge.montant }}</td>
              <td>{{ charge.typecharge.name }}</td>
              <td><router-link :to="'/entite/responsable/show/'+charge.responsable.id">{{ charge.responsable.name }}</router-link></td>
              <td><router-link :to="'/entite/marche/show/'+charge.marche.id">{{ charge.marche.name }}</router-link></td>
              <td><router-link :to="'/entite/societe/show/'+charge.societe.id">{{ charge.societe.name }}</router-link></td>
              <td style="text-align: center;">
                  <!-- <button class="button is-primary is-outlined" @click="showCharge(charge)"  data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Liste des marchés"><i class="fa fa-eye"></i></button> -->
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
          isLoading: false,
          charges:'',
        }
      },
      created(){
        this.getCharges();
      },

      methods: {
        getCharges(){
          this.isLoading = true;
          axios.get('/charges')
            .then(response => {
              this.charges = response.data;
              Vue.nextTick(function () {
                Event.$emit('init-datatable', 'tableAdd');
              })
              this.isLoading = false;
          });
        },

        editCharge(charge){
          this.$router.push({ path: `/caisse/charge/edit/${charge.id}` })
        },

        destroyCharge(charge){
          this.$router.push({ path: `/caisse/charge/delete/${charge.id}` })
        },

      }
    }



</script>
