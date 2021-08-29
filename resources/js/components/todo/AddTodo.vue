<template>
	<div class="container mt-3">
		<div class="card">
			<div class="card-header">
				Add Todo
			</div>
			<div class="card-body">
				<form action="">
					<div class="form-group">
						<label>Write something</label>
						<input type="text" class="form-control" v-model="todo">
					</div>
					<button class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</template>

<script>
	export default{
		name: "add-todo",
		data(){
			return {
				todo: '',
			}
		}
	}
</script>