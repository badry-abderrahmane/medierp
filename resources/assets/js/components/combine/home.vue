<template lang="html">
  <div>
    <global-pagetitle color="primary" title="Combiné Manager" subtitle="Caisses et banques." icon="random"></global-pagetitle>
    <br><br>
    <div class="columns is-centered">
      <div class="column is-narrow">
        <part-tile>
          <div slot="body">
            <div class="columns is-centered">
              <div class="column is-narrow">
                <center>
                  <span class="icon is-large">
                    <i class="fa fa-3x fa-sliders"></i>
                  </span>
                </center><br>
                <p class="title is-4">Combiné générale</p>
              </div>
            </div>
            <a class="button is-primary is-inverted is-outlined is-fullwidth" @click="$router.push({ path: `/combine/general` })"><i class="fa fa-list"></i>&nbsp;&nbsp;Liste</a>
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
                    <i class="fa fa-3x fa-sliders"></i>
                  </span>
                </center><br>
                <p class="title is-4">Combiné caisses</p>
              </div>
            </div>
            <a class="button is-primary is-inverted is-outlined is-fullwidth" @click="$router.push({ path: `/combine/caisse` })"><i class="fa fa-list"></i>&nbsp;&nbsp;Liste</a>
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
                    <i class="fa fa-3x fa-sliders"></i>
                  </span>
                </center><br>
                <p class="title is-4">Combiné banques</p>
              </div>
            </div>
            <a class="button is-primary is-inverted is-outlined is-fullwidth" @click="$router.push({ path: `/combine/banque` })"><i class="fa fa-list"></i>&nbsp;&nbsp;Liste</a>
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
