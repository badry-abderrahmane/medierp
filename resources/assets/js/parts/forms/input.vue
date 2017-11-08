<template lang="html">
  <div class="form-group col-md-4">
    <label :for="name">{{ label }}</label>
    <input type="text" :id="name" :name="name"
                        v-bind:class="[{'is-invalid': value.errors.get(name)} ,'form-control']"
                        v-model="value[name]" />
    <span class="help-block">{{ help }}</span>
    <div class="invalid-feedback" v-if="value.errors.has(name)" v-text="value.errors.get(name)"></div>
  </div>
</template>

<script>
export default {
  props:["value","name","label","help"],
}
</script>

<style lang="css">
</style>
