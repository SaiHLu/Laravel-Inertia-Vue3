<template>
  <aside class="col-lg-4">
    <!-- Widget [Search Bar Widget]-->
    <SearchWidget></SearchWidget>

    <!-- Widget [Latest Posts Widget]        -->
    <LatestBlogWidget></LatestBlogWidget>

    <!-- Widget [Categories Widget]-->
    <CategoryWidget></CategoryWidget>

    <!-- Widget [Tags Cloud Widget]-->
    <TagWidget></TagWidget>
  </aside>
</template>

<script>
import SearchWidget from "@/Frontend/Components/Blog/SearchWidget";
import LatestBlogWidget from "@/Frontend/Components/Blog/LatestBlogWidget";
import CategoryWidget from "@/Frontend/Components/Blog/CategoryWidget";
import TagWidget from "@/Frontend/Components/Blog/TagWidget";

export default {
  components: {
    SearchWidget,
    LatestBlogWidget,
    CategoryWidget,
    TagWidget,
  },
};
</script>

<style>
</style>
