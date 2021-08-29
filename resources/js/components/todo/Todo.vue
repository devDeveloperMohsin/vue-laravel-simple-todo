<template>
	<div class="container mt-3">
		<div class="card">
			<div class="card-header text-capitalize">
				{{ title }}
			</div>
			<div class="card-body">
				<ul class="list-group list-group-flush">
					<todo-item v-for="i in 5" :key="i"></todo-item>
				</ul>
			</div>
		</div>
	</div>
</template>

<script>
	import TodoItem from './TodoItem.vue';
	export default{
		name: "todo",
		components: {
			TodoItem
		},
		computed: {
			title(){
				let title = 'Todo';
				if('filter' in this.$route.params){
					title = `${title} ${this.$route.params.filter}`;
				}
				return title;
			}
		}
	}
</script>