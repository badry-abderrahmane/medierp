<template lang="html">
  <div class="columns">
    <div class="column is-three-fifths is-offset-one-fifth"><br><br>
      <article class="message is-danger is-medium">
        <div class="message-header">
          <p>Confirmation de suppression</p>
          <!-- <button class="delete" aria-label="delete"></button> -->
        </div>
        <div class="message-body">
          La suppression de ce responsable entrainera la suppression de:<br><br>
          <ul>
            <li><span class="tag is-danger">10</span>&nbsp;&nbsp;<strong>Alimentation(s)</strong></li><br>
            <li><span class="tag is-danger">13</span>&nbsp;&nbsp;<strong>Charge(s)</strong></li>
          </ul>
          <div class="columns ">
            <div class="column is-offset-one-third"><br>
              <button type="button" class="button is-danger is-outlined" name="button" @click="deleteResponsable">Supprimer</button>
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
      responsable:'',
    }
  },
  created(){
    this.getResponsable(this.$route.params.id);
  },

  methods: {
    getResponsable(id){
      axios.get('/responsables/'+id)
        .then(response => {
          this.responsable = response.data;
      });
    },
    deleteResponsable(){
      axios.delete('/responsables/'+this.$route.params.id)
          .then(response => {
            this.$parent.getTotaleResponsables();
            this.$root.getResponsables();
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
