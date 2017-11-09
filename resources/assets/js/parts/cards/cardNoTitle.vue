<template lang="html">
  <div class="card">
    <div class="card-content">
      <p class="title">
        <slot name="heading"></slot>
      </p>
      <p class="subtitle">
        Jeff Atwood
      </p>
    </div>
    <footer class="card-footer">
      <p class="card-footer-item">
        <span>
          View on <a href="https://twitter.com/codinghorror/status/506010907021828096">Twitter</a>
        </span>
      </p>
      <p class="card-footer-item">
        <span>
          Share on <a href="#">Facebook</a>
        </span>
      </p>
    </footer>
  </div>
</template>

<script>
export default {
}
</script>

<style lang="css">
</style>
