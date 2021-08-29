<template>
	<div class="container mt-3">
		<div class="card">
			<div class="card-header text-capitalize">
				{{ title }}
			</div>
			<div class="card-body">
				<ul class="list-group list-group-flush">
					<todo-item v-for="(todo, index) in todos" :key="index" :todo="todo" v-on:todo-deleted="todoDelete"></todo-item>
				</ul>
			</div>
		</div>
	</div>
</template>

<script>
	import TodoItem from './TodoItem.vue';
	import axios from 'axios';

	export default{
		name: "todo",
		components: {
			TodoItem
		},
		data(){
			return {
				todos: [],
			};
		},
		computed: {
			title(){
				let title = 'Todo';
				if('filter' in this.$route.params){
					title = `${title} ${this.$route.params.filter}`;
				}
				return title;
			}
		},
		mounted(){
			this.fetchData();
		},
		watch: {
			$route(to, from){
				this.fetchData();
			}
		},
		methods: {
			fetchData(){

				let filter = '';
				if('filter' in this.$route.params){
					filter = this.$route.params.filter;
				}

				axios.get(`/api/todo?filter=${filter}`,{
						headers: {
							'Accept': 'application/json',
						}
					})
					.then((response) => {
						this.todos = response.data.data;
					})
					.catch((error) => {
						console.log(error);
					});
			},
			todoDelete(deleteTodoId){
				this.todos = this.todos.filter((todoItem) => {
					return todoItem.id != deleteTodoId;
				});
			}
		}
	}
</script>