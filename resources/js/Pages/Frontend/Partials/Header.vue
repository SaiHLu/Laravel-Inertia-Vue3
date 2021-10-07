<template>
  <header class="header">
    <!-- Main Navbar-->
    <nav class="navbar navbar-expand-lg">
      <div class="search-area" :style="getShowForm ? 'display: block;' : null">
        <div
          class="
            search-area-inner
            d-flex
            align-items-center
            justify-content-center
          "
        >
          <div class="close-btn" @click="setShowForm">
            <i class="icon-close"></i>
          </div>
          <div class="row d-flex justify-content-center">
            <div class="col-md-8">
              <form @submit.prevent="searchBlog">
                <div class="form-group">
                  <input
                    v-model="search"
                    type="search"
                    name="search"
                    id="search"
                    placeholder="What are you looking for?"
                    autocomplete="off"
                    autofocus
                  />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <!-- Navbar Brand -->
        <div
          class="
            navbar-header
            d-flex
            align-items-center
            justify-content-between
          "
        >
          <!-- Navbar Brand -->
          <Link :href="route('home')" class="navbar-brand"> Your Blog </Link>
          <!-- Toggle Button-->
          <button
            type="button"
            data-toggle="collapse"
            data-target="#navbarcollapse"
            aria-controls="navbarcollapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
            class="navbar-toggler"
          >
            <span></span><span></span><span></span>
          </button>
        </div>
        <!-- Navbar Menu -->
        <div id="navbarcollapse" class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="index.html" class="nav-link active">Home</a>
            </li>
            <li class="nav-item">
              <Link :href="route('blogs.index')" class="nav-link">Blog</Link>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Contact</a>
            </li>
          </ul>
          <div class="navbar-text">
            <a href="#" class="search-btn" @click="setShowForm"
              ><i class="icon-search-1"></i
            ></a>
          </div>
          <ul class="langs navbar-text">
            <a href="#" class="active">EN</a
            ><span> </span
            ><a href="#">ES</a>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
import { ref } from "@vue/runtime-core";
import { Link } from "@inertiajs/inertia-vue3";

import { useFilter } from "@/Frontend/Composables/useFilter";
import { useShowForm } from "@/Frontend/Composables/useShowForm";

export default {
  components: {
    Link,
  },
  setup() {
    const { setFilter } = useFilter();
    const { getShowForm, setShowForm } = useShowForm();

    const search = ref();

    const searchBlog = () => {
      setFilter(search.value);
      setShowForm();
    };

    return { search, searchBlog, getShowForm, setShowForm };
  },
};
</script>

<style></style>
