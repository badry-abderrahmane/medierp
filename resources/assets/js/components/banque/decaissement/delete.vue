<template lang="html">
  <div class="columns">
    <div class="column is-three-fifths is-offset-one-fifth"><br><br>
      <article class="message is-danger is-medium">
        <div class="message-header">
          <p>Confirmation de suppression</p>
          <!-- <button class="delete" aria-label="delete"></button> -->
        </div>
        <div class="message-body">
          Etes vous sur de vouloir supprimer ce décaissement<br><br>
          <div class="columns ">
            <div class="column is-offset-one-third"><br>
              <button type="button" class="button is-danger is-outlined" name="button" @click="deleteDecaissement">Supprimer</button>
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
      decaissement:'',
    }
  },
  created(){
    this.getDecaissement(this.$route.params.id);
  },

  methods: {
    getDecaissement(id){
      axios.get('/decaissements/'+id)
        .then(response => {
          this.decaissement = response.data;
      });
    },
    deleteDecaissement(){
      axios.delete('/decaissements/'+this.$route.params.id)
          .then(response => {
            this.$parent.getTotaleDecaissements();
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
