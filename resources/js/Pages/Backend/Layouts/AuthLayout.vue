<template>
  <div class="wrapper">
    <app-navbar />
    <app-sidebar />
    <app-content>
      <slot name="content-header" />
      <slot />
    </app-content>
  </div>
</template>

<script>
import AppContent from "@/Backend/Partials/AppContent.vue";
import AppNavbar from "@/Backend/Partials/AppNavbar.vue";
import AppSidebar from "@/Backend/Partials/AppSidebar.vue";

export default {
  components: { AppNavbar, AppSidebar, AppContent },
};
</script>

<style>
</style>
