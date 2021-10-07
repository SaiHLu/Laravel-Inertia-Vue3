<template>
  <section class="latest-posts">
    <div class="container">
      <header>
        <h2>Latest from the blog</h2>
        <p class="text-big">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        </p>
      </header>
      <div class="row">
        <template v-for="(blog, index) in blogs" :key="blog.id">
          <div class="post col-md-4" v-if="index < 3">
            <div class="post-thumbnail">
              <a href="post.html"
                ><img :src="blog.image" :alt="blog.title" class="img-fluid"
              /></a>
            </div>
            <div class="post-details">
              <div class="post-meta d-flex justify-content-between">
                <div class="date">{{ blog.created_at }}</div>
                <div class="category"><a href="#">Business</a></div>
              </div>
              <a href="#">
                <h3 class="h4">{{ blog.title }}</h3></a
              >
              <p class="text-muted">
                {{ blog.description }}
              </p>
            </div>
          </div>
        </template>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  props: {
    blogs: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style>
</style>
