<template>
  <div>
    <navbar></navbar>

    <div id="main-content">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
  import Navbar from './layout/Navbar.vue';
  import Todo from './todo/Todo.vue';
  import AddTodo from './todo/AddTodo.vue';

  export default {
    components: {Navbar,Todo, AddTodo},
    data(){
      return {
        username: "Analytics Dashboard",
      }
    }
  }
</script>