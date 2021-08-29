import AddTodo from './components/todo/AddTodo.vue';
import EditTodo from './components/todo/EditTodo.vue';
import Todo from './components/todo/Todo.vue';
import Error404 from './components/layout/Error404.vue';

export const routes = [
	{
		path: '/',
		component: Todo,
	},
	{
		path: '/filter/:filter',
		component: Todo,
	},
	{
		path: '/add-todo',
		component: AddTodo,
	},
	{
		path: '/edit-todo',
		component: EditTodo,
	},
	{
		path: '*',
		component: Error404,
	}
];