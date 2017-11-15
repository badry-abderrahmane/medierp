<template lang="html">
  <div>
    <global-pagetitle :color="this.$root.color" title="Gestion des sociétés" subtitle="Ajout, modification et suppression."></global-pagetitle>
    <div class="container">
      <div class="columns">
        <div class="column is-one-quarter"><br><br>
          <part-panel>
            <div slot="heading">Infos et liens</div>
            <div slot="body">
              <center>
                <a class="button is-text" @click="$router.push({ path: `/entite/societe/add` })"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter société</a>
                <a class="button is-text" @click="$router.push({ path: `/entite/societe` })"><i class="fa fa-list"></i>&nbsp;&nbsp;Liste des sociétés</a>
                <a class="button is-text" @click="$router.push({ path: `/entite/` })"><i class="fa fa-building"></i>&nbsp;&nbsp;Entités manager</a>
              </center>
              <hr>
              <center>
                <p class="title is-6">Nombre totale des sociétés :</p>
                <span class="tag is-primary is-medium">{{ totalSociete }}</span>
              </center>
            </div>
          </part-panel>
        </div>
        <div class="column is-11"><br><br>
          <router-view></router-view>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      totalSociete:'',
    }
  },
  created(){
    this.getTotaleSocietes();
  },
  methods:{
    getTotaleSocietes(){
      axios.get('/totale/societes')
        .then(response => {
          this.totalSociete = response.data;
      });
    }
  }
}
</script>

<style lang="css">
</style>
