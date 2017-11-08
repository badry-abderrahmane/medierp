<template lang="html">
  <div class="">
    form
    <span v-if="$route.params.id"> {{ $route.params.id }}</span>
    <span v-else> Adding</span>
  </div>
</template>

<script>
export default {
}
</script>

<style lang="css">
</style>
