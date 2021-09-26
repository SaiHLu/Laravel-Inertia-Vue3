<template>
  <div class="w-100">
    <Breadcrumb pageName="Users" :breadcrumbs="breadcrumbs" />

    <div class="d-flex justify-content-between mb-3">
      <SearchInput v-model="form.search" class="w-25" />
      <Link :href="route('admin.users.create')" class="btn btn-primary w-25">
        Add
      </Link>
    </div>

    <data-table :headerRows="headerRows">
      <template v-slot:body>
        <tr v-for="user in users.data" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ user.created_at }}</td>
          <td>
            <Link
              :href="route('admin.users.edit', user.id)"
              class="btn btn-warning mr-1"
            >
              <i class="far fa-edit"></i>
            </Link>
            <button
              @click="confirmDelete(user.id)"
              type="button"
              class="btn btn-danger"
            >
              <i class="far fa-trash-alt"></i>
            </button>
          </td>
        </tr>
      </template>
    </data-table>
    <pagination class="mt-2 mb-4" :links="users.links" />
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import { reactive, watch } from "@vue/runtime-core";
import { Inertia } from "@inertiajs/inertia";
import pickBy from "lodash/pickBy";
import throttle from "lodash/throttle";

import AuthLayout from "@/Backend/Layouts/AuthLayout";
import Breadcrumb from "@/Backend/Components/Breadcrumb.vue";
import DataTable from "@/Backend/Components/DataTable.vue";
import Pagination from "@/Backend/Components/Pagination.vue";
import SearchInput from "@/Backend/Components/SearchInput.vue";

export default {
  layout: AuthLayout,
  props: {
    users: Object,
    filters: Object,
    status: Object,
  },
  components: { Link, Breadcrumb, DataTable, Pagination, SearchInput },
  methods: {
    confirmDelete(userId) {
      this.$swal
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        })
        .then((result) => {
          if (result.isConfirmed) {
            Inertia.delete(route("admin.users.destroy", userId), {
              onSuccess: () => {
                this.$swal.fire("Deleted!", this.status.success, "success");
              },
            });
          }
        });
    },
  },
  setup(props) {
    const breadcrumbs = [
      {
        link: route("admin.dashboard"),
        text: "Dashboard",
      },
      {
        link: null,
        text: "Users",
      },
    ];

    const form = reactive({
      search: props.filters.search,
    });

    watch(
      form,
      throttle(() => {
        Inertia.get(route("admin.users.index"), pickBy(form), {
          preserveState: true,
        });
      }, 500),
      { deep: true }
    );

    const headerRows = ["ID", "Name", "Email", "Created On", "Actions"];

    return { breadcrumbs, headerRows, form };
  },
};
</script>

<style>
</style>
