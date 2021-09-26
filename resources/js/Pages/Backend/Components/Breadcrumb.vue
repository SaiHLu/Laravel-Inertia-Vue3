<template>
  <!-- Content Header (Page header) -->
  <div class="content-header w-100">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">{{ pageName }}</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li
              class="breadcrumb-item"
              v-for="link in breadcrumbs"
              :key="link.link"
            >
              <template v-if="link.link">
                <Link :href="link.link"> {{ link.text }}</Link>
              </template>
              <template v-else>
                {{ link.text }}
              </template>
            </li>
          </ol>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: { Link },
  props: {
    pageName: {
      type: String,
      required: true,
    },
    breadcrumbs: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style>
</style>
