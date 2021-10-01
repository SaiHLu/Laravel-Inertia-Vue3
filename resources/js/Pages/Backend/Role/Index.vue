<template>
  <div class="w-100">
    <Breadcrumb pageName="Roles" :breadcrumbs="Role.index" />

    <div class="d-flex justify-content-between mb-3">
      <SearchInput v-model="form.search" class="w-25" />
      <Link :href="route('admin.roles.create')" class="btn btn-primary w-25">
        Add
      </Link>
    </div>

    <data-table :headerRows="headerRows">
      <template v-slot:body>
        <tr v-for="role in roles.data" :key="role.id">
          <td>{{ role.id }}</td>
          <td>{{ role.name }}</td>
          <td>{{ role.created_at }}</td>
          <td>
            <Link
              :href="route('admin.roles.edit', role.id)"
              class="btn btn-warning mr-1"
            >
              <i class="far fa-edit"></i>
            </Link>
            <button
              @click="deleteRole(role.id)"
              type="button"
              class="btn btn-danger"
            >
              <i class="far fa-trash-alt"></i>
            </button>
          </td>
        </tr>
      </template>
    </data-table>
    <pagination class="mt-2 mb-4" :links="roles.links" />
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import { reactive, toRef, watch } from "@vue/runtime-core";
import { Inertia } from "@inertiajs/inertia";
import pickBy from "lodash/pickBy";
import throttle from "lodash/throttle";

import AuthLayout from "@/Backend/Layouts/AuthLayout";
import Breadcrumb from "@/Backend/Components/Breadcrumb.vue";
import DataTable from "@/Backend/Components/DataTable.vue";
import Pagination from "@/Backend/Components/Pagination.vue";
import SearchInput from "@/Backend/Components/SearchInput.vue";
import { useBreadcrumbs } from "@/Backend/Composables/useBreadcrumbs.js";
import { confirmDelete } from "@/Backend/Composables/useConfirmAlert.js";
import { toastMessage } from "@/Backend/Composables/useToastMessage.js";

export default {
  layout: AuthLayout,
  props: {
    roles: Object,
    filters: Object,
    status: Object,
  },
  components: { Link, Breadcrumb, DataTable, Pagination, SearchInput },
  setup(props) {
    const { Role } = useBreadcrumbs;

    const form = reactive({
      search: props.filters.search,
    });

    watch(
      form,
      throttle(() => {
        Inertia.get(route("admin.roles.index"), pickBy(form), {
          preserveState: true,
        });
      }, 500),
      { deep: true }
    );

    const deleteRole = (roleId) => {
      confirmDelete().then((response) => {
        if (response.isConfirmed) {
          Inertia.delete(route("admin.roles.destroy", roleId), {
            preserveState: true,
            onSuccess: () => {
              toastMessage("success", props.status.success, "top-right");
            },
          });
        }
      });
    };

    const headerRows = ["ID", "Name", "Created On", "Actions"];

    return { Role, headerRows, form, deleteRole };
  },
};
</script>

<style>
</style>
