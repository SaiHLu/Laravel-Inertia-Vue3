<template>
  <nav aria-label="Page navigation" v-if="links.length > 3">
    <ul class="pagination pagination-template d-flex justify-content-center">
      <li class="page-item" v-if="prev_page_url !== null">
        <Link :href="prev_page_url" class="page-link">
          <i class="fa fa-angle-left"></i
        ></Link>
      </li>
      <template v-for="(link, index) in links" :key="index">
        <template
          v-if="
            !link.label.includes('Previous') && !link.label.includes('Next')
          "
        >
          <li class="page-item" v-if="link.url === null">
            {{ link.label }}
          </li>
          <li class="page-item" v-else>
            <Link
              :href="link.url"
              class="page-link"
              :class="{ 'bg-primary text-white': link.active }"
            >
              {{ link.label }}
            </Link>
          </li>
        </template>
      </template>
      <li class="page-item" v-if="next_page_url !== null">
        <Link :href="next_page_url" class="page-link">
          <i class="fa fa-angle-right"></i
        ></Link>
      </li>
    </ul>
  </nav>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  props: {
    links: Array,
    next_page_url: String,
    prev_page_url: String,
  },
  components: { Link },
};
</script>

<style>
</style>
