<template>
	<div class="c-modal-wrapper" v-if="showModal">
		<div class="c-modal">
			<form action="">
				<div class="form-group">
					<label>Edit Todo</label>
					<input type="text" v-modal="todo" class="form-control">
				</div>
				<button class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</template>

<script>
	export default{
		name: "edit-todo",
		data(){
			return {
				showModal: false,
				todo: "Hello World",
			}
		}
	}
</script>