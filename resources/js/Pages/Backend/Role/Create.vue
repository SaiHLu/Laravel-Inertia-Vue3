<template>
  <Breadcrumb pageName="Create Role" :breadcrumbs="breadcrumbs" />

  <div class="card card-primary">
    <form @submit.prevent="createRole">
      <div class="card-body">
        <TextInput
          type="text"
          label="Role Name"
          v-model="form.name"
          placeholder="Role Name"
          :error="form.errors.name"
        />

        <div class="form-group">
          <label>Permissions</label>
          <div v-if="form.errors.permissions" class="text-danger">
            {{ form.errors.permissions }}
          </div>
          <div
            class="custom-control custom-checkbox"
            v-for="permission in permissions"
            :key="permission.id"
          >
            <input
              type="checkbox"
              :id="permission.id"
              class="custom-control-input"
              :value="permission.id"
              v-model="form.permissions"
            />
            <label :for="permission.id" class="custom-control-label">
              {{ permission.name }}
            </label>
          </div>
        </div>

        <Button
          type="submit"
          class="btn-primary btn-block"
          :disabled="form.processing"
          >Submit</Button
        >
      </div>
    </form>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";

import AuthLayout from "@/Backend/Layouts/AuthLayout";
import Breadcrumb from "@/Backend/Components/Breadcrumb";
import TextInput from "@/Backend/Components/TextInput";
import Button from "@/Backend/Components/Button";

export default {
  layout: AuthLayout,
  props: {
    permissions: Object,
    status: Object,
  },
  components: { Breadcrumb, TextInput, Button },
  methods: {
    createRole() {
      this.form.post(route("admin.roles.store"), {
        preserveState: true,
        onSuccess: () => {
          this.form.reset();
          this.toastMessage("success", this.status.success, "top-right");
          this.status.success = null;
        },
      });
    },
    toastMessage(icon, title, position) {
      this.$swal.fire({
        toast: true,
        icon: icon,
        title: title,
        position: position,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener("mouseenter", this.$swal.stopTimer);
          toast.addEventListener("mouseleave", this.$swal.resumeTimer);
        },
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
        link: route("admin.roles.index"),
        text: "Roles",
      },
      {
        link: null,
        text: "Create",
      },
    ];

    const form = useForm({
      name: "",
      permissions: [],
    });

    return { form, breadcrumbs };
  },
};
</script>

<style>
</style>
