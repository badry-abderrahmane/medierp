<template>
  <div class="column is-3">
    <label :for="name" class="label">{{ label }}</label>
    <flat-pickr v-model="value[name]" :id="name" :name="name"
                v-bind:class="[ value.errors.get(name) ? 'is-danger' : 'is-primary', 'input']"
                input-class="input is-primary">

              </flat-pickr>
    <span class="help">{{ help }}</span>
    <div class="help is-danger" v-if="value.errors.has(name)" v-text="value.errors.get(name)"></div>
  </div>
</template>

<script>
  import flatPickr from 'vue-flatpickr-component';
  import 'flatpickr/dist/flatpickr.css';
  require("flatpickr/dist/themes/material_green.css")
  export default {
    props:["value","name","label","help"],
    data () {
      return {
        date: null,
      }
    },
    components: {
      flatPickr
    }
  }
</script>
