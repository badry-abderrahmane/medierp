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
                <a v-if="$route.path != '/combine/caisse/filter'" class="button is-text" @click="$router.push({ path: `/combine/caisse/filter` })"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Revenir au filter</a>
                <a class="button is-text" @click="$router.push({ path: `/combine/caisse/filter` })"><i class="fa fa-sliders"></i>&nbsp;&nbsp;Combiné banque</a>
              </center>
              <hr>
              <center>
                <!-- <p class="title is-6">Nombre totale des alimentations :</p>
                <span class="tag is-primary is-medium">{{ totalAlimentations }}</span> -->
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
}
</script>

<style lang="css">
</style>
