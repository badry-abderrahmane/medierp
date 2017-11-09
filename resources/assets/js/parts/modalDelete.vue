<template lang="html">
  <div id="modal" v-bind:class="[active ? 'is-active' : '', 'modal']">
    <div class="modal-background"></div>
    <div class="notification is-danger">
      <button class="delete"></button>
      <div class="columns">
          <strong>{{ message }}</strong>
      </div>
      <a class="button">Supprimer</a>
      <a class="button">Annuler</a>
    </div>
    <button class="modal-close is-large"></button>
  </div>
</template>

<script>
export default {
  data() {
      return {
          message:'Etes vous sure de vouloir supprimer?',
          active: false,
      };
  },
  created(){
    Event.$on('show-modal-delete', (message) => {
        this.message = message;
        this.active = true;
    });
  }
}
</script>

<style lang="css">
</style>
