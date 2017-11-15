<template lang="html">
  <div class="columns">
    <div class="column is-three-fifths is-offset-one-fifth"><br><br>
      <article class="message is-danger is-medium">
        <div class="message-header">
          <p>Confirmation de suppression</p>
          <!-- <button class="delete" aria-label="delete"></button> -->
        </div>
        <div class="message-body">
          La suppression de ce type de charge entrainera la suppression de:<br><br>
          <ul>
            <li><span class="tag is-danger">10</span>&nbsp;&nbsp;<strong>Charge(s)</strong></li><br>
          </ul>
          <div class="columns ">
            <div class="column is-offset-one-third"><br>
              <button type="button" class="button is-danger is-outlined" name="button" @click="deleteTypecharge">Supprimer</button>
              <button type="button" class="button is-danger is-outlined" name="button" @click="cancel">Annuler</button>
            </div>
          </div>
        </div>

      </article>
    </div>
  </div>

</template>

<script>
export default {
  data(){
    return{
      typecharge:'',
    }
  },
  created(){
    this.getTypecharge(this.$route.params.id);
  },

  methods: {
    getTypecharge(id){
      axios.get('/typecharges/'+id)
        .then(response => {
          this.typecharge = response.data;
      });
    },
    deleteTypecharge(){
      axios.delete('/typecharges/'+this.$route.params.id)
          .then(response => {
            this.$root.getTypecharges();
            this.$parent.getTotaleTypecharges();
            this.$router.go(-1);
          })
          .catch(function(err){
            console.log(err);
          });
    },

    cancel(){
      this.$router.go(-1);
    }
  }
}
</script>

<style lang="css">
</style>
