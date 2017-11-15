<template lang="html">
  <div>
    <global-pagetitle :color="this.$root.color" title="Gestion des operations" subtitle="Ajout, modification et suppression."></global-pagetitle>
    <div class="container">
      <div class="columns">
        <div class="column is-one-quarter"><br><br>
          <part-panel>
            <div slot="heading">Infos et liens</div>
            <div slot="body">
              <center>
                <a class="button is-text" @click="$router.push({ path: `/banque/operation/add` })"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter operation</a>
                <a class="button is-text" @click="$router.push({ path: `/banque/operation` })"><i class="fa fa-list"></i>&nbsp;&nbsp;Liste des operations</a>
                <a class="button is-text" @click="$router.push({ path: `/banque/` })"><i class="fa fa-building"></i>&nbsp;&nbsp;Banque manager</a>
              </center>
              <hr>
              <center>
                <p class="title is-6">Nombre totale des operations :</p>
                <span class="tag is-primary is-medium">{{ totalOperations }}</span>
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
      totalOperations:'',
    }
  },
  created(){
    this.getTotaleOperations();
  },
  methods:{
    getTotaleOperations(){
      axios.get('/totale/operations')
        .then(response => {
          this.totalOperations = response.data;
      });
    }
  }
}
</script>

<style lang="css">
</style>
