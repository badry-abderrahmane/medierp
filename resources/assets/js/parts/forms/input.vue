<template lang="html">
  <div class="column is-3">
    <label :for="name" class="label">{{ label }}</label>
    <input type="text" :id="name" :name="name"
                        v-bind:class="[ value.errors.get(name) ? 'is-danger' : 'is-primary', 'input']"
                        v-model="value[name]" />
    <span class="help">{{ help }}</span>
    <div class="help is-danger" v-if="value.errors.has(name)" v-text="value.errors.get(name)"></div>
  </div>
</template>

<script>
export default {
  props:["value","name","label","help"],
}
</script>

<style lang="css">
</style>
