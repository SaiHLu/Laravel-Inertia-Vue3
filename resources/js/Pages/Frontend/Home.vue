<template>
  <div>
    <Header />
    <HeroSection />
    <IntroSection />
    <BlogList :blogs="blogs.data" />
    <DividerSection />
    <LatestBlog :blogs="blogs.data" />
    <NewsLetter />
    <GallerySection :blogs="blogs.data" />
    <Footer />
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

import Header from "@/Frontend/Partials/Header";
import Footer from "@/Frontend/Partials/Footer";
import HeroSection from "@/Frontend/Components/Home/HeroSection";
import IntroSection from "@/Frontend/Components/Home/IntroSection";
import BlogList from "@/Frontend/Components/Home/BlogList";
import DividerSection from "@/Frontend/Components/Home/DividerSection";
import LatestBlog from "@/Frontend/Components/Home/LatestBlog";
import NewsLetter from "@/Frontend/Components/Home/NewsLetter";
import GallerySection from "@/Frontend/Components/Home/GallerySection";

import { useFilter } from "@/Frontend/Composables/useFilter";
import { watch } from "@vue/runtime-core";

export default {
  props: {
    blogs: Object,
    filters: Object,
  },
  components: {
    Link,
    Header,
    Footer,
    HeroSection,
    IntroSection,
    BlogList,
    DividerSection,
    LatestBlog,
    NewsLetter,
    GallerySection,
  },
  setup() {
    const { getFilter } = useFilter();

    watch(getFilter, () => {
      Inertia.get(
        route("home"),
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
