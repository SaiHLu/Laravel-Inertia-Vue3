<template>
  <Link :href="route('frontend.welcome')">Welcome</Link>
  <Link :href="route('admin.dashboard')">Dashboard</Link>

  <h1>About</h1>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Link,
  },
};
</script>

<style>
</style>
