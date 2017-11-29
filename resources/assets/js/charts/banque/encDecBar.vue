<template lang="html">
  <div class="card">
    <div class="card-content">
      <p class="title">
        Statistiques Banques
      </p>
      <p class="subtitle">
        &nbsp;<i>1<sup>er</sup> Janvier - Jour courant</i>
      </p>
      <chart :type="'bar'" :data="data" :options="options"></chart>
    </div>
    <footer class="card-footer">
      <p class="card-footer-item">
        <span>
          <i class="fa fa-eye"></i>&nbsp;&nbsp;Voir tous les <a @click="$router.push({ path: `/banque/encaissement` })">Encaissements</a>
        </span>
      </p>
      <p class="card-footer-item">
        <span>
          <i class="fa fa-eye"></i>&nbsp;&nbsp;Voir tous les <a @click="$router.push({ path: `/banque/decaissement` })">Decaissements</a>
        </span>
      </p>
    </footer>
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
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            type: 'bar',
            label: 'Dataset 2',
            backgroundColor: '#23d160',
            data: [
                33,
                33,
                33,
                33,
                33,
                33,
                33
            ],
            borderColor: 'white',
            borderWidth: 2
        }, {
            type: 'bar',
            label: 'Dataset 3',
            backgroundColor: '#ff3860',
            data: [
                -33,
                -33,
                -33,
                -33,
                -33,
                -33,
                -33
            ]
        }]
      },
      options: {
          responsive: true,
          title: {
              display: true,
              text: 'Chart.js Combo Bar Line Chart'
          },
          tooltips: {
              mode: 'index',
              intersect: true
          }
      }
    }
  }
}
</script>
<style lang="css">
</style>
