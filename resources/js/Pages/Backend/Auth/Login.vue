<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-6">
          <!-- Login Card -->
          <div class="card card-info">
            <div
              class="
                card-header
                d-flex
                flex-column
                justify-content-center
                align-items-center
              "
            >
              <img :src="'/img/backend/logo/visa.png'" class="img-thumbnail" />
              <h3 class="card-title mt-1">Login to start your session.</h3>
            </div>

            <!-- Form -->
            <form @submit.prevent="login" role="form">
              <div class="card-body">
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

                <ToggleInput
                  v-model:checked="form.remember_me"
                  label="Remember Me"
                />
              </div>

              <div class="card-footer">
                <Button
                  type="submit"
                  class="btn-info btn-block"
                  :disabled="form.processing"
                >
                  Submit
                </Button>
              </div>
            </form>
            <!-- End Form -->
          </div>
          <!-- End Login Card -->
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";

import GuestLayout from "@/Backend/Layouts/GuestLayout.vue";
import TextInput from "@/Backend/Components/TextInput";
import ToggleInput from "@/Backend/Components/ToggleInput";
import Button from "@/Backend/Components/Button";

export default {
  layout: GuestLayout,
  props: {
    status: Object,
  },
  components: { TextInput, ToggleInput, Button },
  methods: {
    login() {
      this.form.post(route("admin.login"), {
        preserveState: true,
        onFinish: () => {
          if (this.status.error) {
            this.toastMessage("error", this.status.error, "top-right");
            this.status.error = null;
          }
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
    const form = useForm({
      email: null,
      password: null,
      remember_me: false,
    });

    return { form };
  },
};
</script>

<style scoped>
.container-fluid {
  height: 100vh;
}
</style>
