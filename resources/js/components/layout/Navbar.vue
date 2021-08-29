<template>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<router-link to="/" class="navbar-brand">Vue Todo</router-link>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		    	<li class="nav-item">
		    		<router-link to="/filter/pending" class="nav-link">Pending</router-link>
		      </li>
		      <li class="nav-item">
		        <router-link to="/filter/completed" class="nav-link">Completed</router-link>
		      </li>
		      <li class="nav-item">
		        <router-link to="/add-todo" class="nav-link">+Add New</router-link>
		      </li>
		    </ul>
		    <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="search" placeholder="Search">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		    </form>
		  </div>			
		</div>
	</nav>
</template>

<script>
	export default{
		name: "navbar"
	}
</script>