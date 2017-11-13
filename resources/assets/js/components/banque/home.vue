<template lang="html">
  <div>
    <global-pagetitle color="primary" title="Banque Manager" subtitle="Encaissements, Décaissements et opérations." icon="bank"></global-pagetitle>
    <br><br>
    <div class="columns is-centered">
      <div class="column is-narrow">
        <part-tile>
          <div slot="body">
            <div class="columns is-centered">
              <div class="column is-narrow">
                <center>
                  <span class="icon is-large">
                    <i class="fa fa-3x fa-caret-square-o-up"></i>
                  </span>
                </center><br>
                <p class="title is-4">Gestion des encaissemnts</p>
              </div>
            </div>
            <a class="button is-primary is-inverted is-outlined" @click="$router.push({ path: `/banque/encaissment/add` })"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter encaissment</a>
            <a class="button is-primary is-inverted is-outlined" @click="$router.push({ path: `/banque/encaissment` })"><i class="fa fa-list"></i>&nbsp;&nbsp;Liste des encaissments</a>
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
                    <i class="fa fa-3x fa-caret-square-o-down"></i>
                  </span>
                </center><br>
                <p class="title is-4">Gestion des décaissments</p>
              </div>
            </div>
            <a class="button is-primary is-inverted is-outlined" @click="$router.push({ path: `/banque/decaissment/add` })"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter décaissment</a>
            <a class="button is-primary is-inverted is-outlined" @click="$router.push({ path: `/banque/decaissment` })"><i class="fa fa-list"></i>&nbsp;&nbsp;Liste des décaissments</a>
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
                    <i class="fa fa-3x fa-credit-card"></i>
                  </span>
                </center><br>
                <p class="title is-4">Gestion des opérations</p>
              </div>
            </div>
            <a class="button is-primary is-inverted is-outlined" @click="$router.push({ path: `/banque/operation/add` })"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter opération</a>
            <a class="button is-primary is-inverted is-outlined" @click="$router.push({ path: `/banque/operation` })"><i class="fa fa-list"></i>&nbsp;&nbsp;Liste des opérations</a>
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
