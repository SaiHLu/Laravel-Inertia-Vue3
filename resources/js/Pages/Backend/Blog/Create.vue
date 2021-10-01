<template>
  <Breadcrumb pageName="Create Blog" :breadcrumbs="Blog.create" />
  <div class="card card-primary">
    <form @submit.prevent="createBlog">
      <div class="card-body">
        <TextInput
          type="text"
          label="Blog Title"
          v-model="form.title"
          placeholder="Blog title"
          :error="form.errors.title"
        />

        <TextInput
          type="file"
          label="Image"
          @change="selectImage"
          :error="form.errors.image"
        />

        <div class="mb-3 text-center" v-if="selectedImage">
          <div data-toggle="modal" data-target="#modal-default">
            <img :src="selectedImage" class="img-fluid w-50 h-auto" />
          </div>
        </div>

        <progress
          v-if="form.progress"
          :value="form.progress.percentage"
          max="100"
        >
          {{ form.progress.percentage }}%
        </progress>

        <Button
          type="submit"
          class="btn-primary btn-block"
          :disabled="form.processing"
          >Submit</Button
        >
      </div>
    </form>
    <Modal modalBoxStyle="max-width: 700px !important;">
      <template v-slot:modal-body>
        <img :src="selectedImage" class="img-fluid" />
      </template>
    </Modal>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import { ref } from "@vue/reactivity";

import AuthLayout from "@/Backend/Layouts/AuthLayout.vue";
import Breadcrumb from "@/Backend/Components/Breadcrumb";
import TextInput from "@/Backend/Components/TextInput";
import Button from "@/Backend/Components/Button";
import Modal from "@/Backend/Components/Modal";

import { useBreadcrumbs } from "@/Backend/Composables/useBreadcrumbs.js";
import { toastMessage } from "@/Backend/Composables/useToastMessage.js";

export default {
  layout: AuthLayout,
  props: {
    status: Object,
  },
  components: {
    Breadcrumb,
    TextInput,
    Button,
    Modal,
  },
  setup(props) {
    const { Blog } = useBreadcrumbs;

    const form = useForm({
      title: null,
      image: null,
    });

    const selectedImage = ref("");

    const selectImage = (event) => {
      const file = event.target.files;
      form.image = file[0];

      if (file && file[0]) {
        const reader = new FileReader();

        reader.onload = (e) => {
          selectedImage.value = e.target.result;
        };

        reader.readAsDataURL(file[0]);
      }
    };

    const createBlog = () => {
      form.post(route("admin.blogs.store"), {
        preserveState: true,
        onSuccess: () => {
          form.reset("title", "image");
          selectedImage.value = "";
          toastMessage("success", props.status.success, "top-right");
        },
      });
    };

    return {
      Blog,
      form,
      createBlog,
      selectImage,
      selectedImage,
    };
  },
};
</script>
