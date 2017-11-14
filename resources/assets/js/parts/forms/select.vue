<template lang="html">
  <div class="column is-3">
    <label :for="name" class="label">{{ label }}</label>
    <div class="field">
      <div class="control">
        <div v-bind:class="[ value.errors.get(name) ? 'is-danger' : 'is-primary', '']">
          <select :name="name" style="min-width:220px;" class="select2"
                                      v-model="value[name]" @change="value.errors.clear(name)">
                <option v-for="item in list" v-bind:value="item.id"> {{ item.name }}</option>
          </select>
        </div>
      </div>
      <span class="help">{{ help }}</span>
      <div class="help is-danger" v-if="value.errors.has(name)" v-text="value.errors.get(name)"></div>
    </div>
  </div>
</template>

<script>
export default {
  props:["value","name","list","label","help"],
}
</script>

<style lang="css">
</style>
