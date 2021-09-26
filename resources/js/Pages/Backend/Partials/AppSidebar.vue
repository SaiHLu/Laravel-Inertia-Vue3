<template>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img
        :src="'/img/backend/AdminLTELogo.png'"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: 0.8"
      />
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img
            :src="'/img/backend/avatar.png'"
            class="img-circle elevation-2"
            alt="User Image"
          />
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <Link :href="route('admin.dashboard')" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </Link>
          </li>
          <li class="nav-header">Users Management</li>
          <li class="nav-item">
            <Link :href="route('admin.adminusers.index')" class="nav-link">
              <i class="nav-icon fa fa-users" aria-hidden="true"></i>
              <p>Admin Users</p>
            </Link>
          </li>
          <li class="nav-item">
            <Link :href="route('admin.users.index')" class="nav-link">
              <i class="nav-icon fa fa-users" aria-hidden="true"></i>
              <p>Users</p>
            </Link>
          </li>
          <li class="nav-item">
            <Link :href="route('admin.roles.index')" class="nav-link">
              <i class="nav-icon fa fa-tasks" aria-hidden="true"></i>
              <p>Roles</p>
            </Link>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: { Link },
};
</script>

<style>
</style>
