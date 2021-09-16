<template>
  <div>
    <Link :href="route('frontend.about')">About</Link>
    <Link :href="route('admin.dashboard')">Dashboard</Link>

    <h1>Welcome Frontend</h1>
  </div>
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
