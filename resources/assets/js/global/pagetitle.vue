<template lang="html">
  <section :class="'hero is-'+color">
    <div class="hero-body">
      <div class="container">
        <div class="columns is-gapless">
          <div class="column is-1 is-offset-1">
            <center>
              <span class="icon is-large" style="padding-top: 10px;">
                <i :class="'fa fa-4x fa-'+icon"></i>
              </span>
            </center>
          </div>
          <div class="column is-6 is-offset-1">
            <p class="title">
              <!-- <i class="fa fa-bank"></i> -->
              {{ title }}
            </p>
            <p class="subtitle">
              {{ subtitle }}
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>
</template>

<script>
export default {
  props:['title','subtitle','icon','color']
}
</script>

<style lang="css">
</style>
