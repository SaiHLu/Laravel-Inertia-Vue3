<template>
  <Breadcrumb pageName="Edit Role" :breadcrumbs="Role.edit" />

  <div class="card card-primary">
    <form @submit.prevent="updateRole">
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
              :checked="role_permissions.includes(permission.id)"
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
    role: Object,
    permissions: Object,
    role_permissions: Object,
    status: Object,
  },
  components: { Breadcrumb, TextInput, Button },
  setup(props) {
    const { Role } = useBreadcrumbs;

    const form = useForm({
      name: props.role.name,
      permissions: props.role_permissions,
    });

    const updateRole = () => {
      form.put(route("admin.roles.update", props.role.id), {
        preserveState: true,
        onSuccess: () => {
          toastMessage("success", props.status.success, "top-right");
        },
      });
    };

    return { form, Role, updateRole };
  },
};
</script>

<style>
</style>
