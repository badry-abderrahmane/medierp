  <template lang="html">
    <div class="m-widget24">
      <div class="m-widget24__item">
        <h4 class="m-widget24__title">
          <slot name="text"></slot>
        </h4>
        <br>
        <span class="m-widget24__desc">
          All Customs Value
        </span>
        <span v-bind:class="'m-widget24__stats m--font-'+classy">
          {{ totalRecords }}
        </span>
        <div class="m--space-10"></div>
        <div class="progress m-progress--sm">
          <div v-bind:class="'progress-bar m--bg-'+classy" role="progressbar" :style="{'width': number}" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <span class="m-widget24__change">
          Change
        </span>
        <span class="m-widget24__number">
          {{ number }}
        </span>
      </div>
    </div>

  </template>

  <script>
  export default {
    props:['classy','instance','number'],
    data(){
      return {
        totalRecords:''
      }
    },
    created(){
      this.getTotalRecords();
    },
    methods:{
      getTotalRecords(){
        axios.get('/count/'+this.instance)
            .then(response => {
                this.totalRecords = response.data;
            });
      }
    }
  }
  </script>

  <style lang="css">
  </style>
