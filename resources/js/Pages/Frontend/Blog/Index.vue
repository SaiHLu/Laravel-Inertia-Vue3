<template>
  <div class="post col-lg-6" v-for="blog in blogs.data" :key="blog.id">
    <BlogCard :blog="blog" />
  </div>
  <div class="w-100 text-center mt-3">
    <Pagination
      :links="blogs.meta.links"
      :prev_page_url="blogs.links.prev"
      :next_page_url="blogs.links.next"
    />
  </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import { watch } from "@vue/runtime-core";

import Layout from "@/Frontend/Layouts/Index";
import BlogCard from "@/Frontend/Components/Blog/BlogCard";
import Pagination from "@/Frontend/Components/Pagination";

import { useFilter } from "@/Frontend/Composables/useFilter";
import { useBlog } from "@/Frontend/Composables/useBlog";

export default {
  layout: Layout,
  props: {
    blogs: Object,
  },
  components: { BlogCard, Pagination },
  setup(props) {
    const { getFilter } = useFilter();
    const { setBlogs } = useBlog();

    setBlogs(props.blogs);

    watch(getFilter, () => {
      Inertia.get(
        route("blogs.index"),
        { search: getFilter.value },
        {
          preserveState: true,
        }
      );
    });
  },
};
</script>

<style>
</style>
