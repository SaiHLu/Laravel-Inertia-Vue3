<template>
  <button :type="type" class="btn" v-bind="$attrs">
    <slot />
  </button>
</template>

<script>
export default {
  props: {
    type: {
      type: String,
      default: "button",
    },
  },
};
</script>

<style>
</style>
