<template lang="html">
  <div>
    <div class="row">
      <div class="col-md-4">
      </div>
        <div class="col-md-3">
          <slot name="btnAdd"></slot>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="tableAdd">
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
