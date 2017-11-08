<template lang="html">
  <div v-bind:class="[{'has-danger': value.errors.get(name)} ,' col-md-6']">
			<label for="exampleInputEmail1">
				{{ label }}
			</label>
      <center><img v-if="value.imgs" :src="value.imgs" class="img-thumbnail" style="height:50%;width:50%"></center>
			<div></div>
			<label class="custom-file">
				<input type="file" id="file2" name="imgs" v-on:change="onFileChange" class="custom-file-input">
				<span class="custom-file-control"></span>
			</label>
      <div class="form-control-feedback"  v-if="value.errors.has(name)" v-text="value.errors.get(name)"></div>
  </div>
</template>

<script>
export default {
  props:["value","name","label"],
  methods:{
    onFileChange(e) {
        let files = e.target.files || e.dataTransfer.files;
        if (!files.length)
            return;

        this.createImage(files[0]);
        console.log(files[0]);
    },
    createImage(file) {
        let reader = new FileReader();
        let vm = this;
        reader.onload = (e) => {
            vm.value.imgs = e.target.result;
            vm.value.errors.clear('imgs');
        };
        reader.readAsDataURL(file);

    },
  }
}
</script>

<style lang="css">
</style>
