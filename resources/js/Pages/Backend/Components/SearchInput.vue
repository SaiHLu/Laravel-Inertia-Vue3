<template>
  <input
    autocomplete="off"
    type="text"
    name="search"
    placeholder="Search…"
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
    class="form-control"
    v-bind="$attrs"
  />
</template>

<script>
export default {
  props: {
    modelValue: String,
  },
};
</script>

<style>
</style>
