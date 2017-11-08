<template lang="html">
  <div class="form-group col-md-2">
      <label>{{ label }}</label>
      <select class="form-control" :name="name" v-model="value">
            <option v-for="item in list" v-bind:value="item.id"> {{ item.name }}</option>
      </select>
  </div>
</template>

<script>
export default {
  props:["value","name","list","label"],
}
</script>

<style lang="css">
</style>
