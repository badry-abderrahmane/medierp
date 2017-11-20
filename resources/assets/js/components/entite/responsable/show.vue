<template lang="html">
  <div>
      <div class="pageloader"><span class="title"></span></div>
      <part-panel>
        <div slot="heading">
          Informations responsable
        </div>
        <div slot="body">
          <div class="columns is-multiline">
            <div class="column is-3">
              <label class="label">Nom</label>
              <h4 class="subtitle is-4">{{ responsable.name }}</h4>
            </div>
            <div class="column is-3">
              <label class="label">Prénom</label>
              <h4 class="subtitle is-4">{{ responsable.lastName }}</h4>
            </div>
            <div class="column is-3">
              <label class="label">Numéro telephone</label>
              <h4 class="subtitle is-4">{{ responsable.phone }}</h4>
            </div>
            <div class="column is-3">
              <label class="label">Adresse</label>
              <h4 class="subtitle is-4">{{ responsable.adresse}}</h4>
            </div>
            <div class="column is-3">
              <label class="label">CIN</label>
              <h4 class="subtitle is-4">{{ responsable.cin }}</h4>
            </div>
            <div class="column is-3">
              <label class="label">Note</label>
              <h4 class="subtitle is-4">{{ responsable.note }}</h4>
            </div>
          </div>
          <br><br>
          <div class="columns is-centered">
            <div class="column is-narrow">
              <button class="button is-primary" @click="$router.go(-1)"> <i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Retour </button>
              <button class="button is-primary is-outlined" @click="editResponsable(responsable)"> <i class="fa fa-edit"></i>&nbsp;&nbsp;Modifier </button>
              <button class="button is-primary is-outlined" @click="destroyResponsable(responsable)"> <i class="fa fa-trash"></i>&nbsp;&nbsp;Supprimer </button>
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
      responsable:{
        name: '',
        lastName: '',
        phone:'',
        adresse:'',
        cin:'',
        note:'',
      },
    }
  },
  computed:{
    responsableId: function(){
      return this.$route.params.id
    }
  },
  created(){
    if (this.responsableId) {
      axios.get('/responsables/'+this.responsableId)
        .then(response => {
          this.responsable = response.data;
      });
    }
  },
  methods:{
    editResponsable(responsable){
      this.$router.push({ path: `/entite/responsable/edit/${responsable.id}` })
    },

    destroyResponsable(responsable){
      this.$router.push({ path: `/entite/responsable/delete/${responsable.id}` })
    },
  }
}
</script>

<style lang="css">
</style>
