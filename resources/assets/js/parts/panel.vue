<template lang="html">
  <div v-bind:class="[editing ? 'card-accent-warning' : 'card-accent-success', 'card']">
    <div class="card-header">
      <slot name="heading"></slot>
    </div>
    <div class="card-body">
      <slot name="body"></slot>
    </div>
  </div>
</template>

<script>
export default {
  props:["editing"],
}
</script>

<style lang="css">
</style>
