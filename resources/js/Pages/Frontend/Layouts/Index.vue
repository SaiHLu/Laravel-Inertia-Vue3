<template>
  <Header />
  <div class="container">
    <div class="row">
      <Main>
        <slot />
      </Main>
      <Aside></Aside>
    </div>
  </div>
  <Footer />
</template>

<script>
import Header from "@/Frontend/Partials/Header";
import Footer from "@/Frontend/Partials/Footer";
import Main from "@/Frontend/Partials/Main";
import Aside from "@/Frontend/Partials/Aside";

export default {
  components: {
    Header,
    Footer,
    Main,
    Aside,
  },
};
</script>

<style>
</style>
