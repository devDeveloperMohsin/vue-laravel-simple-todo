<template>
	<li class="list-group-item d-flex">
		<span>{{ todo.todo }}</span>
		<div class="action ml-auto">
			<router-link to="/edit-todo" class="btn btn-primary btn-sm">Edit</router-link>
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
			}
		}
	}
</script>