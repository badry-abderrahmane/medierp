<template lang="html">
  <div>
    <div class="columns">
      <div class="column">
        <slot name="filter"></slot>
      </div>
    </div><br>
    <div class="columns">
        <div class="column">
            <table class="table is-bordered is-narrow is-fullwidth" id="tableAdd">
                <thead><slot name="thead"></slot></thead>
                <tbody><slot name="tbody"></slot></tbody>
            </table>
        </div>
    </div>
  </div>
</template>

<script>
export default {
}
</script>

<style lang="css">
</style>
