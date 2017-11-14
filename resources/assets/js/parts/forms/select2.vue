<template lang="html">
    <select>
    </select>
</template>
<script>
export default {
  props: ['options', 'value','name'],
  mounted: function () {
    var vm = this
    $(this.$el)
      // init select2
      .select2({ data: this.options })
      .val(this.value)
      .trigger('change')
      // emit event on change.
      .on('change', function () {
          vm.$emit('input', this.value)
          $('.select2-container--default .select2-selection--single').css({"border-color":"#00d1b2"});
      });
  },
  watch: {
    value: function (value) {
      // update value
      $(this.$el).val(value).trigger('change');
      $('.select2-container--default .select2-selection--single').css({"border-color":"#00d1b2"});
    },
    options: function (options) {
      // update options
      $(this.$el).empty().select2({ data: options })
      // $('.select2-container').css({"background-color":"yellow"});
      $('.select2-container--default .select2-selection--single').css({"border":"solid 1px"});
      $('.select2-container--default .select2-selection--single').css({"border-color":"#00d1b2"});
    }
  },
  destroyed: function () {
    $(this.$el).off().select2('destroy')
  }
}
</script>

<style lang="css">
  select {
    min-width: 220px;
    border: 1px solid transparent;

  }
  .select2-container--default .select2-selection--single{
    height: 2.25em;
  }
</style>
