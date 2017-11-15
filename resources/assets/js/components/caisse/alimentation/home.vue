<template lang="html">
  <div>
    <global-pagetitle :color="this.$root.color" title="Gestion des alimentations" subtitle="Ajout, modification et suppression."></global-pagetitle>
    <div class="container">
      <div class="columns">
        <div class="column is-one-quarter"><br><br>
          <part-panel>
            <div slot="heading">Infos et liens</div>
            <div slot="body">
              <center>
                <a class="button is-text" @click="$router.push({ path: `/caisse/alimentation/add` })"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter alimentation</a>
                <a class="button is-text" @click="$router.push({ path: `/caisse/alimentation` })"><i class="fa fa-list"></i>&nbsp;&nbsp;Liste des alimentations</a>
                <a class="button is-text" @click="$router.push({ path: `/caisse/` })"><i class="fa fa-building"></i>&nbsp;&nbsp;Caisse manager</a>
              </center>
              <hr>
              <center>
                <p class="title is-6">Nombre totale des alimentations :</p>
                <span class="tag is-primary is-medium">{{ totalAlimentations }}</span>
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
      totalAlimentations:'',
    }
  },
  created(){
    this.getTotaleAlimentations();
  },
  methods:{
    getTotaleAlimentations(){
      axios.get('/totale/alimentations')
        .then(response => {
          this.totalAlimentations = response.data;
      });
    }
  }
}
</script>

<style lang="css">
</style>
