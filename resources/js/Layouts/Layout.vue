<template>
  <header class="py-5 px-40 bg-slate-200">
    <div class="flex justify-between items-center max-w-6xl mx-auto">
      <div class="flex items-center">
        <h1 class="text-2xl font-black text-green-700">My App</h1>
        <p class="text-sm ml-4">Welcome back, {{ username }}!</p>
      </div>
      <Nav />
    </div>
  </header>

  <slot />
</template>

<script>
import Nav from "../Components/Nav.vue";

export default {
  components: {
    Nav,
  },
  computed: {
    username() {
      return this.$page.props.auth.user.username;
    },
  },
};
</script>
