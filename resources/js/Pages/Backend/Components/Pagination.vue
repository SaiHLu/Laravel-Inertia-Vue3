<template>
  <div class="d-flex flex-wrap justify-content-end mb-1">
    <template v-for="(link, p) in links" :key="p">
      <div
        v-if="link.url === null"
        class="mr-1 mb-1 px-3 py-2 border rounded"
        v-html="link.label"
      />
      <Link
        v-else
        class="mr-1 mb-1 px-3 py-2 border rounded"
        :class="{ 'bg-primary text-white': link.active }"
        :href="link.url"
        v-html="link.label"
      />
    </template>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
  props: {
    links: Array,
  },
  components: {
    Link,
  },
};
</script>
