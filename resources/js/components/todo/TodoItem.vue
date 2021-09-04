<template>
	<li class="list-group-item d-flex">
		<span 
			:class="{completed : todo.completed}"
			@click="toggleTodoCompletion"
		>
			{{ todo.todo }}
		</span>
		<div class="action ml-auto">
			<router-link :to="{ name: 'edittodo', params: {todo, todo} }" class="btn btn-primary btn-sm">Edit</router-link>
			<button class="btn-danger btn btn-sm" @click="deleteTodo">Delete</button>
		</div>
	</li>
</template>

<script>
	import axios from 'axios';
	export default{
		props: ['todo'],
		methods: {
			deleteTodo(){
				var mainInstance = this;
				
				axios.delete(`/api/todo/${this.$props.todo.id}`)
					.then((response) => {
						if(response.data.response == "success"){
							mainInstance.$emit('todo-deleted',this.$props.todo.id);
						}
					})
					.catch((error) => {
						console.log(error);
					});
			},
			toggleTodoCompletion(){
				var mainInstance = this;
				
				axios.get(`/api/todo/${this.$props.todo.id}`)
					.then((response) => {
						if(response.data.response == "success"){
							mainInstance.$props.todo.completed = !mainInstance.$props.todo.completed;
						}
					})
					.catch((error) => {
						console.log(error);
					});
			}
		}
	}
</script>

<style scoped>
	span{
		cursor: pointer;
	}
	span:hover{
		color: green;
	}
	span.completed{
		text-decoration: line-through;
		color: red;
	}	
</style>