import AddTodo from './components/todo/AddTodo.vue';
import EditTodo from './components/todo/EditTodo.vue';
import Todo from './components/todo/Todo.vue';
import Login from './components/auth/Login.vue';
import Register from './components/auth/Register.vue';
import Error404 from './components/layout/Error404.vue';

export const routes = [
	{
		path: '/',
		component: Todo,
		meta: {
			requiresAuth: true,
		},
	},
	{
		path: '/filter/:filter',
		component: Todo,
		meta: {
			requiresAuth: true,
		},
	},
	{
		path: '/add-todo',
		component: AddTodo,
		meta: {
			requiresAuth: true,
		},
	},
	{
		path: '/edit-todo',
		name: "edittodo",
		component: EditTodo,
		meta: {
			requiresAuth: true,
		},
	},
	{
		path: '/login',
		component: Login,
	},
	{
		path: '/register',
		component: Register,
	},
	{
		path: '*',
		component: Error404,
	}
];