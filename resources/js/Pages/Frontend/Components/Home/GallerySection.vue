<template>
  <section class="gallery no-padding">
    <div class="row">
      <template v-for="(blog, index) in blogs" :key="blog.id">
        <div class="mix col-lg-3 col-md-3 col-sm-6" v-if="index < 4">
          <div class="item">
            <a :href="blog.image" data-fancybox="gallery" class="image"
              ><img :src="blog.image" :alt="blog.title" class="img-fluid" />
              <div
                class="overlay d-flex align-items-center justify-content-center"
              >
                <i class="icon-search"></i></div
            ></a>
          </div>
        </div>
      </template>
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
