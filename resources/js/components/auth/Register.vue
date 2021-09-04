<template>
	<div class="container mt-3">
		<div class="card">
			<div class="card-header">
				Register
			</div>
			<div class="card-body">
				<div class="alert alert-success" v-if="messages.success">
					{{ messages.success }}
				</div>

				<div class="alert alert-danger" v-for="error in messages.errors">
					{{ error[0] }}
				</div>

				<form action="javascript:void(0)" @submit.prevent="register">
					<div class="form-group">
						<label>Name</label>
						<input type="name" class="form-control" v-model="form.name">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" v-model="form.email">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" v-model="form.password">
					</div>
					<button class="btn btn-primary" type="submit">Register</button>
					<router-link to="/login">Already Have Account? Login.</router-link>
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
				form : {
					name: '',
					email: '',
					password: '',
				},
				messages:{
					success: '',
					errors: [],
				}
			}
		},
		methods: {
			register(){
				let instance = this;

				axios.post('api/register',{
						name: this.form.name,
						email: this.form.email,
						password: this.form.password,
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
							instance.messages.success = response.data.message;
						}
					})
					.catch((error) => {
						instance.messages = {
							success : "",
							errors : error ,
						};

						instance.messages.errors = error.response.data.errors;
					});
			},
		}
	}
</script>