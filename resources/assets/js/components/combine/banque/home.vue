<template lang="html">
  <div>
    <global-pagetitle :color="this.$root.color" title="Combiné banques" subtitle="Rapports et exportations" icon="sliders"></global-pagetitle>
    <div class="container">
      <div class="columns">
        <div class="column is-one-quarter"><br><br>
          <part-panel>
            <div slot="heading">Liens utiles</div>
            <div slot="body">
              <center>
                <a v-if="$route.path != '/combine/banque/filter'" class="button is-text" @click="$router.push({ path: `/combine/banque/filter` })"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Revenir au filter</a>
                <a class="button is-text" @click="$router.push({ path: `/combine/caisse/filter` })"><i class="fa fa-sliders"></i>&nbsp;&nbsp;Combiné caisse</a>
              </center>
              <hr>
              <div v-if="societe">
                <center>
                  <p class="title is-6">Société :</p>
                  <span class="tag is-primary is-medium">{{ societe.name }}</span>
                  <br><br>
                  <p class="title is-6">Solde de départ :</p>
                  <span class="tag is-primary is-medium">{{ societe.solde }}</span>
                </center>
              </div>
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
    return {
      societe: '',
    }
  },
  watch:{
    $route:function(newVal){
      if (this.$route.params.societe) {
        this.getSociete(this.$route.params.societe);
      }else{
        this.societe = '';
      }
    }
  },
  methods:{
    getSociete(societe_id){
      axios.get('/societes/'+societe_id)
        .then(response => {
          this.societe = response.data;
      });
    }
  }
}
</script>

<style lang="css">
</style>
