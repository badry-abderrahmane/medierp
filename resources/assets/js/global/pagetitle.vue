<template lang="html">
  <div class="row">
    <div class="col-md-12"><br>
      <center>
        <h3 class="display-4 text-success">
          <i :class="icon"></i>&nbsp;{{ title }}
        </h3>
      </center>
    </div>
  </div>
</template>

<script>
export default {
  props:['title','icon']
}
</script>

<style lang="css">
</style>
