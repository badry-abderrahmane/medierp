<template lang="html">
  <div class="form-group col-md-4">
      <label>{{ label }}</label>
      <select class="form-control" :name="name"
                                  v-bind:class="[{'is-invalid': value.errors.get(name)} ,'form-control']"
                                  v-model="value[name]" @change="value.errors.clear(name)">
            <option v-for="item in list" v-bind:value="item.id"> {{ item.name }}</option>
      </select>
      <span class="help-block">{{ help }}</span>
      <div class="invalid-feedback" v-if="value.errors.has(name)" v-text="value.errors.get(name)"></div>
  </div>
</template>

<script>
export default {
  props:["value","name","list","label","help"],
}
</script>

<style lang="css">
</style>
