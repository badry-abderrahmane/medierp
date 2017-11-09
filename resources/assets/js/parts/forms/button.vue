<template lang="html">
  <div class="column is-narrow">
    <label class="label">&nbsp;</label>
    <button type="submit"
            v-bind:class="[editing ? '' : '', 'button is-primary']"
            >
            <span class="icon is-small">
              <i v-bind:class="[editing ? 'fa-refresh' : 'fa-save', 'fa']"></i>
            </span>&nbsp;&nbsp;&nbsp;
            {{ editing ? 'Mettre à jour' : 'Enregistrer' }}&nbsp;&nbsp;&nbsp;
    </button>
  </div>
</template>

<script>
export default {
  props:["value","editing"],
}
</script>

<style lang="css">
</style>
