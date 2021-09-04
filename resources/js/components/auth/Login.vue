<template>
	<div class="container mt-3">
		<div class="card">
			<div class="card-header">
				Login
			</div>
			<div class="card-body">

				<div class="alert alert-success" v-if="messages.success">
					{{ messages.success }}
				</div>

				<div class="alert alert-danger" v-for="error in messages.errors">
					{{ error[0] }}
				</div>

				<form action="javascript:void(0)" @submit.prevent="login">
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" v-model="credentials.email">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" v-model="credentials.password">
					</div>
					<button class="btn btn-primary" type="submit">Login</button>
					<router-link to="/register">Register</router-link>
				</form>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios';

	export default{
		name: 'login',
		data(){
			return {
				credentials : {
					email: '',
					password: '',
				},
				messages:{
					success: '',
					errors: [],
				},
			}
		},
		methods: {
			login(event){
				let instance = this;

				axios.post('api/login',{
						email: this.credentials.email,
						password: this.credentials.password,
					},{
						headers: {
							Accept: 'application/json',
						},
					})
					.then((response) => {
						instance.messages = {
							success : "",
							errors : [] ,
						};

						if(response.data.response == "success"){

							localStorage.setItem("user_token", response.data.token);
							instance.$store.commit('login',{token: response.data.token});
							instance.$router.push('/');
							// console.log('here');
							// alert('hi');
							
						}
					})
					.catch((error) => {
						instance.messages = {
							success : "",
							errors : error ,
						};

						if(error.response){
							instance.messages.errors = error.response.data.errors;	
						}
					});
			},
		}
	}
</script>