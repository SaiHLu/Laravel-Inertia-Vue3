<template>
  <Breadcrumb pageName="Create Role" :breadcrumbs="Role.create" />

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
import { useBreadcrumbs } from "@/Backend/Composables/useBreadcrumbs.js";
import { toastMessage } from "@/Backend/Composables/useToastMessage.js";

export default {
  layout: AuthLayout,
  props: {
    permissions: Object,
    status: Object,
  },
  components: { Breadcrumb, TextInput, Button },
  setup(props) {
    const { Role } = useBreadcrumbs;

    const form = useForm({
      name: "",
      permissions: [],
    });

    const createRole = () => {
      form.post(route("admin.roles.store"), {
        preserveState: true,
        onSuccess: () => {
          form.reset();
          toastMessage("success", props.status.success, "top-right");
        },
      });
    };

    return { form, Role, createRole };
  },
};
</script>

<style>
</style>
