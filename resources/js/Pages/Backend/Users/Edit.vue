<template>
  <Breadcrumb pageName="Create User" :breadcrumbs="User.edit" />
  <div class="card card-primary">
    <form @submit.prevent="updateUser">
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
    user: Object,
    status: Object,
  },
  components: { Breadcrumb, TextInput, Button },
  setup(props) {
    const { User } = useBreadcrumbs;

    const form = useForm({
      name: props.user.name,
      email: props.user.email,
      password: null,
      password_confirmation: null,
    });

    const updateUser = () => {
      form.put(route("admin.users.update", props.user.id), {
        preserveState: true,
        onSuccess: () => {
          toastMessage("success", props.status.success, "top-right");
        },
      });
    };

    return { User, form, updateUser };
  },
};
</script>

<style>
</style>
