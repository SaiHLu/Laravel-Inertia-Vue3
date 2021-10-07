<template>
  <div class="post-thumbnail">
    <a href="#"
      ><img :src="blog.image" :alt="blog.title" class="img-fluid"
    /></a>
  </div>
  <div class="post-details">
    <div class="post-meta d-flex justify-content-between">
      <div class="date meta-last">{{ blog.created_at }}</div>
      <div class="category"><a href="#">Business</a></div>
    </div>
    <a href="#">
      <h3 class="h4">{{ blog.title }}</h3></a
    >
    <p class="text-muted">
      {{ blog.description }}
    </p>
    <footer class="post-footer d-flex align-items-center">
      <a href="#" class="author d-flex align-items-center flex-wrap">
        <div class="avatar">
          <img
            src="img/frontend/avatar-1.jpg"
            :alt="blog.title"
            class="img-fluid"
          />
        </div>
        <div class="title"><span>John Doe</span></div></a
      >
    </footer>
  </div>
</template>

<script>
export default {
  props: {
    blog: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style>
</style>
