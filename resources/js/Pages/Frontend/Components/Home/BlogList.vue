<template>
  <section class="featured-posts no-padding-top">
    <div class="container">
      <template v-for="(blog, index) in blogs" :key="blog.id">
        <!-- Post-->
        <div class="row d-flex align-items-stretch" v-if="index % 2 === 0">
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <div class="category">
                    <a href="#">Business</a><a href="#">Technology</a>
                  </div>
                  <a href="post.html">
                    <h2 class="h4">
                      {{ blog.title }}
                    </h2></a
                  >
                </header>
                <p>
                  {{ blog.description }}
                </p>
                <footer class="post-footer d-flex align-items-center">
                  <a
                    href="#"
                    class="author d-flex align-items-center flex-wrap"
                  >
                    <div class="avatar">
                      <img
                        src="img/frontend/avatar-1.jpg"
                        alt="..."
                        class="img-fluid"
                      />
                    </div>
                    <div class="title"><span>John Doe</span></div></a
                  >
                  <div class="date">
                    <i class="icon-clock"></i> 2 months ago
                  </div>
                  <div class="comments"><i class="icon-comment"></i>12</div>
                </footer>
              </div>
            </div>
          </div>
          <div class="image col-lg-5">
            <img :src="blog.image" alt="..." />
          </div>
        </div>
        <!-- Post        -->
        <div class="row d-flex align-items-stretch" v-else>
          <div class="image col-lg-5">
            <img :src="blog.image" alt="..." />
          </div>
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <div class="category">
                    <a href="#">Business</a><a href="#">Technology</a>
                  </div>
                  <a href="post.html">
                    <h2 class="h4">
                      {{ blog.title }}
                    </h2></a
                  >
                </header>
                <p>
                  {{ blog.description }}
                </p>
                <footer class="post-footer d-flex align-items-center">
                  <a
                    href="#"
                    class="author d-flex align-items-center flex-wrap"
                  >
                    <div class="avatar">
                      <img
                        src="img/frontend/avatar-1.jpg"
                        alt="..."
                        class="img-fluid"
                      />
                    </div>
                    <div class="title"><span>John Doe</span></div></a
                  >
                  <div class="date">
                    <i class="icon-clock"></i> 2 months ago
                  </div>
                  <div class="comments"><i class="icon-comment"></i>12</div>
                </footer>
              </div>
            </div>
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
  setup() {},
};
</script>

<style>
</style>
