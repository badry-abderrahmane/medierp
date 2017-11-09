<template lang="html">
  <div id="modal" v-bind:class="[active ? 'is-active' : '', 'modal']">
    <div class="modal-background"></div>
    <div class="notification is-danger"><br>
      <button class="delete" @click="cancel"></button>
      <div class="columns"><br><br>
        <span class="icon has-text-warning">
          <i class="fa fa-warning"></i>
        </span>
        <strong>{{ message }}</strong>
      </div>
      <div class="columns is-centered">
        <div class="column is-narrow">
            <a class="button is-danger is-inverted" @click="confirm">Supprimer</a>
        </div>
        <div class="column is-narrow">
            <a class="button" @click="cancel">Annuler</a>
        </div>
      </div>
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
          item:'',
      };
  },
  created(){
    Event.$on('show-modal-delete', (message,item) => {
        this.message = message;
        this.active = true;
        this.item = item;
    });
  },
  methods:{
    confirm(){
      Event.$emit('modal-confirmed',this.item);
      this.active = false;
    },
    cancel(){
      this.active = false;
    }
  }
}
</script>

<style lang="css">
</style>
