<template lang="html">
  <div class="modal fade" v-bind:id="id" style="display: none;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  	<div class="modal-dialog modal-lg" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="exampleModalLabel">
  					<slot name="title"></slot>
  				</h5>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">
  						×
  					</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<p>
  					<slot name="body"></slot>
  				</p>
  			</div>
  		</div>
  	</div>
  </div>
</template>

<script>
export default {
  props:["id"]
}
</script>

<style lang="css">
</style>
