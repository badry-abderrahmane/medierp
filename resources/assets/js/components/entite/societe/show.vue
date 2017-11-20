<template lang="html">
  <div>
      <div class="pageloader"><span class="title"></span></div>
      <part-panel>
        <div slot="heading">
          Informations société
        </div>
        <div slot="body">
          <div class="columns is-centered">
            <div class="column is-3">
              <label class="label">Nom</label>
              <h4 class="subtitle is-4">{{ societe.name }}</h4>
            </div>
            <div class="column is-3">
              <label class="label">Solde de départ</label>
              <h4 class="subtitle is-4">{{ societe.solde }}</h4>
            </div>
            <div class="column is-3">
              <label class="label">Date création</label>
              <h4 class="subtitle is-4">{{ societe.created_at }}</h4>
            </div>
          </div>
          <br><br>
          <div class="columns is-centered">
            <div class="column is-narrow">
              <button class="button is-primary" @click="$router.go(-1)"> <i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Retour </button>
              <button class="button is-primary is-outlined" @click="editResponsable(societe)"> <i class="fa fa-edit"></i>&nbsp;&nbsp;Modifier </button>
              <button class="button is-primary is-outlined" @click="destroyResponsable(societe)"> <i class="fa fa-trash"></i>&nbsp;&nbsp;Supprimer </button>
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
      societe:{
        name: '',
        solde: '',
        created_at:''
      },
    }
  },
  computed:{
    societeId: function(){
      return this.$route.params.id
    }
  },
  created(){
    if (this.societeId) {
      axios.get('/societes/'+this.societeId)
        .then(response => {
          this.societe = response.data;
      });
    }
  },
  methods:{
    editResponsable(societe){
      this.$router.push({ path: `/entite/societe/edit/${societe.id}` })
    },

    destroyResponsable(societe){
      this.$router.push({ path: `/entite/societe/delete/${societe.id}` })
    },
  }
}
</script>

<style lang="css">
</style>
