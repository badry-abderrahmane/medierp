<template lang="html">
  <div>
    <div class="row">
      <div class="col-md-12">
        <slot name="filter"></slot>
      </div>
    </div><br>
    <div class="row">
        <div class="col-md-12">
            <table class="table is-bordered" id="tableAdd">
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
