<template lang="html">
  <div>
      <div class="pageloader"><span class="title"></span></div>
      <part-panel>
        <div slot="heading">
          Informations marché
        </div>
        <div slot="body">
          <div class="columns is-multiline">
            <div class="column is-3">
              <label class="label">Nom</label>
              <h4 class="subtitle is-4">{{ marche.name }}</h4>
            </div>
            <div class="column is-3">
              <label class="label">Date début</label>
              <h4 class="subtitle is-4">{{ marche.dateDebut }}</h4>
            </div>
            <div class="column is-3">
              <label class="label">Délais</label>
              <h4 class="subtitle is-4">{{ marche.delais }}</h4>
            </div>
            <div class="column is-3">
              <label class="label">Numéro</label>
              <h4 class="subtitle is-4">{{ marche.numero }}</h4>
            </div>
            <div class="column is-3">
              <label class="label">Montant</label>
              <h4 class="subtitle is-4">{{ marche.montant }}</h4>
            </div>
            <div class="column is-3">
              <label class="label">Société</label>
              <h4 class="subtitle is-4"><router-link :to="'/entite/societe/show/'+marche.societe_id">{{ marche.societe.name }}</router-link></h4>
            </div>
            <div class="column">
              <label class="label">Date de création</label>
              <h4 class="subtitle is-4">{{ marche.created_at}}</h4>
            </div>
            <div class="column">
              <label class="label">Date dernière modification</label>
              <h4 class="subtitle is-4">{{ marche.updated_at}}</h4>
            </div>
          </div>
          <br><br>
          <div class="columns is-centered">
            <div class="column is-narrow">
              <button class="button is-primary" @click="$router.go(-1)"> <i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Retour </button>
              <button class="button is-primary is-outlined" @click="editMarche(marche)"> <i class="fa fa-edit"></i>&nbsp;&nbsp;Modifier </button>
              <button class="button is-primary is-outlined" @click="destroyMarche(marche)"> <i class="fa fa-trash"></i>&nbsp;&nbsp;Supprimer </button>
            </div>
          </div>
        </div>
      </part-panel>
  </div>

</template>

<script>
export default {
  data(){
    return {
      marche:{
        name: '',
        dateDebut: '',
        numero:'',
        montant:'',
        delais:'',
        societe:{
          name:''
        },
        societe_id:''
      },
    }
  },
  computed:{
    marcheId: function(){
      return this.$route.params.id
    }
  },
  created(){
    if (this.marcheId) {
      axios.get('/marches/'+this.marcheId)
        .then(response => {
          this.marche = response.data;
      });
    }
  },
  methods:{
    editMarche(marche){
      this.$router.push({ path: `/entite/marche/edit/${marche.id}` })
    },

    destroyMarche(marche){
      this.$router.push({ path: `/entite/marche/delete/${marche.id}` })
    },
  }
}
</script>

<style lang="css">
</style>
