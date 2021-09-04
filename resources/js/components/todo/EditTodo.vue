<template>
	<div class="container mt-3">
		<div class="card">
			<div class="card-header">
				Edit Todo
			</div>
			<div class="card-body">
				<div class="alert alert-success" v-if="showSuccess">
					{{ showSuccess }}
				</div>
				<div class="alert alert-danger" v-if="showError">
					{{ showError }}
				</div>
				<div class="alert alert-danger" v-if="!todo">
					System does not identify which todo to edit
				</div>
				<template v-else>
					<div class="form-group">
						<label>Write something</label>
						<input type="text" class="form-control" v-model="todo.todo">
					</div>
					<button class="btn btn-primary" @click="updateTodo">Submit</button>
				</template>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios';

	export default{
		name: "edit-todo",
		data(){
			return {
				todo: null,
				showSuccess: '',
				showError: '',
			};
		},
		created(){
			this.todo = this.$route.params.todo;
		},
		methods: {
			updateTodo(){
				this.showSuccess = '';
				this.showError = '';
				axios.put(`/api/todo/${this.todo.id}`,{
						todo : this.todo.todo
					})
					.then( (response) => {
						this.showSuccess = response.data.message;
						console.log(response);
					} )
					.catch( (error) => {
						console.log(error);
						this.showError = error;
					} );
			}
		}
	}
</script>