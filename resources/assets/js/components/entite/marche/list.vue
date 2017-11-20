<template>
  <div>
      <div class="pageloader is-active" v-show="isLoading"></div>
      <part-panel>
        <div slot="heading">Liste des marchés</div>
        <div slot="body">
          <part-lists-table-add>
            <tr slot="thead">
              <!-- <th>#ID</th> -->
              <th width="50">Nom</th>
              <th>Date début</th>
              <th>Délais</th>
              <th>Numéro</th>
              <th>Montant total</th>
              <th>Société</th>
              <th style="text-align: center;">Action</th>
            </tr>
            <tr slot="tbody" v-for="marche in marches">
              <!-- <td>{{ marche.id }}</td> -->
              <td>{{ marche.name }}</td>
              <td>{{ marche.dateDebut }}</td>
              <td>{{ marche.delais }}</td>
              <td>{{ marche.numero }}</td>
              <td>{{ marche.montant }}</td>
              <td>{{ marche.societe.name }}</td>
              <td style="text-align: center;">
                  <button class="button is-primary is-outlined" @click="showMarche(marche)"  data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Liste des marchés"><i class="fa fa-eye"></i></button>
                  <button class="button is-link is-outlined" @click="editMarche(marche)" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Modifier la societe"><i class="fa fa-edit"></i></button>
                  <button  @click="destroyMarche(marche)" class="button is-danger is-outlined" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Supprimer la societe">
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
          marches:'',
        }
      },
      created(){
        this.getMarches();
      },

      methods: {
        getMarches(){
          this.isLoading = true;
          axios.get('/marches')
            .then(response => {
              this.marches = response.data;
              Vue.nextTick(function () {
                Event.$emit('init-datatable', 'tableAdd');
              })
              this.isLoading = false;
          });
        },

        showMarche(marche){
          this.$router.push({ path: `/entite/marche/show/${marche.id}` })
        },

        editMarche(marche){
          this.$router.push({ path: `/entite/marche/edit/${marche.id}` })
        },

        destroyMarche(marche){
          this.$router.push({ path: `/entite/marche/delete/${marche.id}` })
        },

      }
    }



</script>
