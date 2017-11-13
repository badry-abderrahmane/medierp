<template lang="html">
  <div>
    <global-pagetitle color="primary" title="Entités Manager" subtitle="Sociétés, Marchés et Responsables." icon="shield"></global-pagetitle>
    <br><br>
    <div class="columns is-centered">
      <div class="column is-narrow">
        <part-tile>
          <div slot="body">
            <div class="columns is-centered">
              <div class="column is-narrow">
                <center>
                  <span class="icon is-large">
                    <i class="fa fa-3x fa-building"></i>
                  </span>
                </center><br>
                <p class="title is-4">Gestion des sociétés</p>
              </div>
            </div>
            <a class="button is-primary is-inverted is-outlined" @click="$router.push({ path: `/entite/societe/add` })"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter société</a>
            <a class="button is-primary is-inverted is-outlined" @click="$router.push({ path: `/entite/societe` })"><i class="fa fa-list"></i>&nbsp;&nbsp;Liste des sociétés</a>
          </div>
        </part-tile>
      </div>
      <div class="column is-narrow">
        <part-tile>
          <div slot="body">
            <div class="columns is-centered">
              <div class="column is-narrow">
                <center>
                  <span class="icon is-large">
                    <i class="fa fa-3x fa-suitcase"></i>
                  </span>
                </center><br>
                <p class="title is-4">Gestion des marchés</p>
              </div>
            </div>
            <a class="button is-primary is-inverted is-outlined" @click="$router.push({ path: `/entite/marche/add` })"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter marché</a>
            <a class="button is-primary is-inverted is-outlined" @click="$router.push({ path: `/entite/marche` })"><i class="fa fa-list"></i>&nbsp;&nbsp;Liste des marchés</a>
          </div>
        </part-tile>
      </div>
      <div class="column is-narrow">
        <part-tile>
          <div slot="body">
            <div class="columns is-centered">
              <div class="column is-narrow">
                <center>
                  <span class="icon is-large">
                    <i class="fa fa-3x fa-users"></i>
                  </span>
                </center><br>
                <p class="title is-4">Gestion des responsables</p>
              </div>
            </div>
            <a class="button is-primary is-inverted is-outlined" @click="$router.push({ path: `/entite/responsable/add` })"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter responsable</a>
            <a class="button is-primary is-inverted is-outlined" @click="$router.push({ path: `/entite/responsable` })"><i class="fa fa-list"></i>&nbsp;&nbsp;Liste des responsables</a>
          </div>
        </part-tile>
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
