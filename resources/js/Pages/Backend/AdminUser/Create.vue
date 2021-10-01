<template>
  <Breadcrumb pageName="Create AdminUser" :breadcrumbs="AdminUser.create" />
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
import { useBreadcrumbs } from "@/Backend/Composables/useBreadcrumbs.js";
import { toastMessage } from "@/Backend/Composables/useToastMessage.js";

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
  setup(props) {
    const { AdminUser } = useBreadcrumbs;

    const form = useForm({
      name: null,
      email: null,
      role: null,
      password: null,
      password_confirmation: null,
    });

    const createAdminUser = () => {
      form.post(route("admin.adminusers.store"), {
        preserveState: true,
        onSuccess: () => {
          form.reset();
          toastMessage("success", props.status.success, "top-right");
        },
      });
    };

    return { AdminUser, form, createAdminUser };
  },
};
</script>

<style>
</style>
