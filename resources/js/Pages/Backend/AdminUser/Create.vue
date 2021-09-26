<template>
  <Breadcrumb pageName="Create AdminUser" :breadcrumbs="breadcrumbs" />
  <div class="card card-primary">
    <form @submit.prevent="createAdminUser">
      <div class="card-body">
        <TextInput
          type="text"
          label="User Name"
          v-model="form.name"
          placeholder="User Name"
          :error="form.errors.name"
        />

        <TextInput
          type="email"
          label="Email Address"
          v-model="form.email"
          placeholder="Email Address"
          :error="form.errors.email"
        />

        <SelectInput
          v-model="form.role"
          :error="form.errors.role"
          label="Role"
          class="select2"
        >
          <option v-for="role in roles" :key="role.id" :value="role.id">
            {{ role.name }}
          </option>
        </SelectInput>

        <TextInput
          type="password"
          label="Password"
          v-model="form.password"
          placeholder="Your Password"
          :error="form.errors.password"
        />

        <TextInput
          type="password"
          label="Password Confirmation"
          v-model="form.password_confirmation"
          placeholder="Password Confirmation"
          :error="form.errors.password_confirmation"
        />

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

import AuthLayout from "@/Backend/Layouts/AuthLayout.vue";
import Breadcrumb from "@/Backend/Components/Breadcrumb";
import TextInput from "@/Backend/Components/TextInput";
import SelectInput from "@/Backend/Components/SelectInput";
import Button from "@/Backend/Components/Button";

export default {
  layout: AuthLayout,
  props: {
    roles: Object,
    status: Object,
  },
  components: {
    Breadcrumb,
    TextInput,
    Button,
    SelectInput,
  },
  methods: {
    createAdminUser() {
      this.form.post(route("admin.adminusers.store"), {
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
  setup() {
    const breadcrumbs = [
      {
        link: route("admin.dashboard"),
        text: "Dashboard",
      },
      {
        link: route("admin.adminusers.index"),
        text: "Admin Users",
      },
      {
        link: null,
        text: "Create",
      },
    ];

    const form = useForm({
      name: null,
      email: null,
      role: null,
      password: null,
      password_confirmation: null,
    });

    return { breadcrumbs, form };
  },
};
</script>

<style>
</style>
