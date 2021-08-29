<template>
	<div class="container mt-3">
		<div class="card">
			<div class="card-header">
				Add Todo
			</div>
			<div class="card-body">
				<div class="form-group">
					<label>Write something</label>
					<input type="text" class="form-control" v-model="todo">
				</div>
				<button class="btn btn-primary" @click="submitTodo">Submit</button>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios';

	export default{
		name: "add-todo",
		data(){
			return {
				todo: '',
			}
		},
		methods: {
			submitTodo(){
				axios.post('/api/todo',{
						todo : this.todo,
					},
					{
						headers: {
							'Accept': 'application/json',
							'Content-Type': 'application/json',
						}
					})
					.then((response) => {
						if(response.data.response == "success"){
							this.todo = '';
						}
					})
					.catch((error) => {
						console.log(error);
					})
			},
		}
	}
</script>