<template lang="html">
  <div>
    <global-pagetitle color="primary" title="Caisses Manager" subtitle="Alimentations et Charges." icon="archive"></global-pagetitle>
    <br><br>
    <div class="columns is-centered">
      <div class="column is-narrow">
        <part-tile>
          <div slot="body">
            <div class="columns is-centered">
              <div class="column is-narrow">
                <center>
                  <span class="icon is-large">
                    <i class="fa fa-3x fa-hdd-o"></i>
                  </span>
                </center><br>
                <p class="title is-4">Gestion des alimentations</p>
              </div>
            </div>
            <a class="button is-primary is-inverted is-outlined" @click="$router.push({ path: `/caisse/alimentation/add` })"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter alimentation</a>
            <a class="button is-primary is-inverted is-outlined" @click="$router.push({ path: `/caisse/alimentation` })"><i class="fa fa-list"></i>&nbsp;&nbsp;Liste des alimentations</a>
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
                    <i class="fa fa-3x fa-list-alt"></i>
                  </span>
                </center><br>
                <p class="title is-4">Gestion des charges</p>
              </div>
            </div>
            <a class="button is-primary is-inverted is-outlined" @click="$router.push({ path: `/caisse/charge/add` })"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter charge</a>
            <a class="button is-primary is-inverted is-outlined" @click="$router.push({ path: `/caisse/charge` })"><i class="fa fa-list"></i>&nbsp;&nbsp;Liste des charges</a>
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
                    <i class="fa fa-3x fa-dot-circle-o"></i>
                  </span>
                </center><br>
                <p class="title is-4">Gestion des types de charges</p>
              </div>
            </div>
            <a class="button is-primary is-inverted is-outlined" @click="$router.push({ path: `/caisse/typecharge/add` })"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter type de charge</a>
            <a class="button is-primary is-inverted is-outlined" @click="$router.push({ path: `/caisse/typecharge` })"><i class="fa fa-list"></i>&nbsp;&nbsp;Liste des types de charges</a>
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
