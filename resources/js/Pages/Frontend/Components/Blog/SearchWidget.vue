<template>
  <div class="widget search">
    <header>
      <h3 class="h6">Search the blog</h3>
    </header>
    <form @submit.prevent="setFilter(search)">
      <div class="form-group">
        <input
          v-model="search"
          type="search"
          placeholder="What are you looking for?"
        />
        <button type="submit" class="submit">
          <i class="icon-search"></i>
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import { ref } from "@vue/reactivity";

import { useFilter } from "@/Frontend/Composables/useFilter";

export default {
  setup() {
    const { setFilter } = useFilter();

    const search = ref();

    return { search, setFilter };
  },
};
</script>

<style>
</style>
