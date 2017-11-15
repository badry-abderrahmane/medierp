<template>
  <div>
      <part-panel>
        <div slot="heading">Liste des marchés</div>
        <div slot="body">
          <part-lists-table-add>
            <tr slot="thead">
              <th class="col-xs-2">#ID</th>
              <th class="col-xs-2">Nom</th>
              <th class="col-xs-2">Date début</th>
              <th class="col-xs-2">Délais</th>
              <th class="col-xs-2">Numéro</th>
              <th class="col-xs-2">Montant total</th>
              <th class="col-xs-2">Société</th>
              <th class="col-xs-2" style="text-align: center;">Action</th>
            </tr>
            <tr slot="tbody" v-for="marche in marches">
              <td class="col-xs-2">{{ marche.id }}</td>
              <td class="col-xs-2">{{ marche.name }}</td>
              <td class="col-xs-2">{{ marche.dateDebut }}</td>
              <td class="col-xs-2">{{ marche.delais }}</td>
              <td class="col-xs-2">{{ marche.numero }}</td>
              <td class="col-xs-2">{{ marche.montant }}</td>
              <td class="col-xs-2">{{ marche.societe.name }}</td>
              <td class="col-xs-2" style="text-align: center;">
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
          marches:'',
        }
      },
      created(){
        this.getMarches();
      },

      methods: {
        getMarches(){
          axios.get('/marches')
            .then(response => {
              this.marches = response.data;
              Vue.nextTick(function () {
                Event.$emit('init-datatable', 'tableAdd');
              })
          });
        },

        editMarche(marche){
          this.$router.push({ path: `marche/edit/${marche.id}` })
        },

        destroyMarche(marche){
          this.$router.push({ path: `marche/delete/${marche.id}` })
        },

      }
    }



</script>
