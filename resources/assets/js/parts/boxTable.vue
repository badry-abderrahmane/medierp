<template lang="html">
  <div class="m-portlet m-portlet--full-height">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						<slot name="title"></slot>
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				<ul class="m-portlet__nav">
					<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
						<slot name="btnHeader"></slot>
					</li>
				</ul>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="m-widget6">
				<div class="m-widget6__head">
					<div class="m-widget6__item">
						<span class="m-widget6__caption">
							<slot name="col1"></slot>
						</span>
						<span class="m-widget6__caption m--align-center">
							<slot name="col2"></slot>
						</span>
						<span class="m-widget6__caption m--align-center">
							<slot name="col3"></slot>
						</span>
					</div>
				</div>
				<div class="m-widget6__body">
          <slot name="body"></slot>
				</div>
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
