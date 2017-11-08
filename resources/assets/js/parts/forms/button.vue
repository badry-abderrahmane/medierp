<template lang="html">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4"><br><br>
      <button type="submit"
              v-bind:class="[editing ? 'btn-warning' : 'btn-success', 'btn btn-block']"
              >{{ editing ? 'METTRE A JOUR' : 'AJOUTER' }}
      </button>
    </div>
  </div>

</template>

<script>
export default {
  props:["value","editing"],
}
</script>

<style lang="css">
</style>
