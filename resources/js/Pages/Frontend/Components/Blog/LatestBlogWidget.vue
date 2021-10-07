<template>
  <div class="widget latest-posts">
    <header>
      <h3 class="h6">Latest Posts</h3>
    </header>
    <div class="blog-posts">
      <template v-for="(blog, index) in getBlogs.data" :key="blog.id">
        <a href="#" v-if="index < 3">
          <div class="item d-flex align-items-center">
            <div class="image">
              <img :src="blog.image" :alt="blog.title" class="img-fluid" />
            </div>
            <div class="title">
              <strong>{{ blog.title }}</strong>
              <div class="d-flex align-items-center">
                <div class="views"><i class="icon-eye"></i> 500</div>
                <div class="comments"><i class="icon-comment"></i>12</div>
              </div>
            </div>
          </div></a
        >
      </template>
    </div>
  </div>
</template>

<script>
import { useBlog } from "@/Frontend/Composables/useBlog";

export default {
  setup() {
    const { getBlogs } = useBlog();

    return { getBlogs };
  },
};
</script>

<style>
</style>
