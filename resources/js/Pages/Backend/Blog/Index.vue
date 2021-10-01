<template>
  <div class="w-100">
    <Breadcrumb pageName="Blogs" :breadcrumbs="Blog.index" />

    <div class="d-flex justify-content-between mb-3">
      <SearchInput v-model="form.search" class="w-25" />
      <Link :href="route('admin.blogs.create')" class="btn btn-primary w-25">
        Add
      </Link>
    </div>

    <data-table :headerRows="headerRows">
      <template v-slot:body>
        <tr v-for="blog in blogs.data" :key="blog.id">
          <td>{{ blog.id }}</td>
          <td>{{ blog.title }}</td>
          <td>
            <img
              :src="blog.image"
              class="img-thumbnail"
              style="width: 100px; height: 50px"
              :alt="blog.title"
            />
          </td>
          <td>{{ blog.created_at }}</td>
          <td>
            <Link
              :href="route('admin.blogs.edit', blog.id)"
              class="btn btn-warning mr-1"
            >
              <i class="far fa-edit"></i>
            </Link>
            <button
              @click="deleteBlog(blog.id)"
              type="button"
              class="btn btn-danger"
            >
              <i class="far fa-trash-alt"></i>
            </button>
          </td>
        </tr>
      </template>
    </data-table>
    <pagination class="mt-2 mb-4" :links="blogs.links" />
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

import { useBreadcrumbs } from "@/Backend/Composables/useBreadcrumbs.js";
import { confirmDelete } from "@/Backend/Composables/useConfirmAlert.js";
import { toastMessage } from "@/Backend/Composables/useToastMessage.js";

export default {
  layout: AuthLayout,
  props: {
    blogs: Object,
    filters: Object,
    status: Object,
  },
  components: {
    Link,
    Breadcrumb,
    DataTable,
    Pagination,
    SearchInput,
  },
  setup(props) {
    const { Blog } = useBreadcrumbs;

    const form = reactive({
      search: props.filters.search,
    });

    watch(
      form,
      throttle(() => {
        Inertia.get(route("admin.blogs.index"), pickBy(form), {
          preserveState: true,
        });
      }, 500),
      { deep: true }
    );

    const deleteBlog = (blogId) => {
      confirmDelete().then((response) => {
        if (response.isConfirmed) {
          Inertia.delete(route("admin.blogs.destroy", blogId), {
            preserveState: true,
            onSuccess: () => {
              toastMessage("success", props.status.success, "top-right");
            },
          });
        }
      });
    };

    const headerRows = ["ID", "Title", "Image", "Created On", "Actions"];

    return { Blog, headerRows, form, deleteBlog };
  },
};
</script>

<style>
</style>
