<template>
  <slot name="content-header">
    <Breadcrumb pageName="Dashboard" :breadcrumbs="breadcrumbs" />
  </slot>
  <!-- Small boxes (Stat box) -->
  <div class="row w-100">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <Box
        bgClass="small-box bg-info"
        :count="10"
        title="New Orders"
        icon="ion ion-bag"
      />
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <Box
        bgClass="small-box bg-success"
        :count="10"
        title="Bounce Rate"
        icon="ion-stats-bars"
      />
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <Box
        bgClass="small-box bg-warning"
        :count="10"
        title="User Registrations"
        icon="ion ion-person-add"
      />
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <Box
        bgClass="small-box bg-danger"
        :count="10"
        title="Unique Visitors"
        icon="ion ion-pie-graph"
      />
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

import AuthLayout from "@/Backend/Layouts/AuthLayout.vue";
import Box from "@/Backend/Components/Box";
import Breadcrumb from "@/Backend/Components/Breadcrumb";

export default {
  layout: AuthLayout,
  components: {
    Link,
    Box,
    Breadcrumb,
  },
  setup() {
    const breadcrumbs = [
      {
        link: null,
        text: null,
      },
    ];

    return { breadcrumbs };
  },
};
</script>

<style>
</style>
