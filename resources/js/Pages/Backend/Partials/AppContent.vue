<template>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper vh-100">
    <slot name="content-header" />

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <slot />
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</template>

<script>
export default {};
</script>

<style>
</style>
