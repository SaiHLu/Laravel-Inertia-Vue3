<template>
  <Breadcrumb pageName="Create User" :breadcrumbs="User.create" />
  <div class="card card-primary">
    <form @submit.prevent="createUser">
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
import Button from "@/Backend/Components/Button";
import { useBreadcrumbs } from "@/Backend/Composables/useBreadcrumbs.js";
import { toastMessage } from "@/Backend/Composables/useToastMessage.js";

export default {
  layout: AuthLayout,
  props: {
    status: Object,
  },
  components: { Breadcrumb, TextInput, Button },
  setup(props) {
    const { User } = useBreadcrumbs;

    const form = useForm({
      name: null,
      email: null,
      password: null,
      password_confirmation: null,
    });

    const createUser = () => {
      form.post(route("admin.users.store"), {
        preserveState: true,
        onSuccess: () => {
          form.reset();
          toastMessage("success", props.status.success, "top-right");
        },
      });
    };

    return { User, form, createUser };
  },
};
</script>

<style>
</style>
