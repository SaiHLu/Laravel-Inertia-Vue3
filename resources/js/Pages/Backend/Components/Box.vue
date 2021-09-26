<template>
  <div :class="bgClass">
    <div class="inner">
      <h3>{{ count }}</h3>

      <p>{{ title }}</p>
    </div>
    <div class="icon">
      <i :class="icon"></i>
    </div>
    <a href="#" class="small-box-footer"
      >More info <i class="fas fa-arrow-circle-right"></i
    ></a>
  </div>
</template>

<script>
export default {
  props: {
    bgClass: {
      type: String,
      default: "small-box bg-info",
    },
    count: {
      type: Number,
      default: 0,
    },
    title: {
      type: String,
      required: true,
    },
    icon: {
      type: String,
      default: "ion ion-bag",
    },
  },
};
</script>

<style>
</style>
