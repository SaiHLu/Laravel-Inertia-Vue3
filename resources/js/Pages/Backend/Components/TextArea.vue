<template>
  <div class="form-group">
    <label v-if="label" :for="label">{{ label }}</label>
    <textarea
      :id="label"
      class="form-control"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      v-bind="$attrs"
    ></textarea>
  </div>
</template>

<script>
export default {
  props: {
    label: {
      type: String,
      required: true,
    },
    modelValue: String,
  },
};
</script>

<style>
</style>
