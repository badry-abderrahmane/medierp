<template lang="html">
  <div class="card">
    <header class="card-header">
      <p class="card-header-title">
        <slot name="heading"></slot>
      </p>
      <a href="#" class="card-header-icon" aria-label="more options">
        <span class="icon">
          <i class="fa fa-angle-down" aria-hidden="true"></i>
        </span>
      </a>
    </header>
    <div class="card-content">
      <div class="content">
        <slot name="body"></slot>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props:["editing"],
}
</script>

<style lang="css">
</style>
