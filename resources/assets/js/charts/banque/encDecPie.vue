<template lang="html">
  <div class="card">
    <div class="card-content">
      <p class="title">
        Statistiques Banque
      </p>
      <p class="subtitle">
        &nbsp;<i>1<sup>er</sup> Janvier - Jour courant</i>
      </p>
      <chart :type="'pie'" :data="data" :options="options"></chart>
    </div>
  </div>

</template>

<script>
import Chart from 'vue-bulma-chartjs'

export default {
  components: {
    Chart
  },

  data () {
    return {
      data: {
        labels: ['Encaissements', 'Decaissements'],
          datasets: [{
          data: [20, 40],
          backgroundColor: [
            '#1fc8db',
            '#fce473',
          ]
        }]
      },
      options: {
        segmentShowStroke: false
      }
    }
  }
}
</script>

<style lang="css">
</style>
