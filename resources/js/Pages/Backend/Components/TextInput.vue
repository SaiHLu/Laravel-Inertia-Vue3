<template>
  <div class="form-group">
    <label v-if="label" :for="label" class="form-label">{{ label }}</label>
    <input
      :type="type"
      :id="label"
      ref="input"
      class="form-control"
      :class="{ 'is-invalid': error }"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      v-bind="$attrs"
    />

    <div v-if="error" class="text-danger">{{ error }}</div>
  </div>
</template>

<script>
export default {
  props: {
    type: {
      type: String,
      default: "text",
    },
    modelValue: String,
    label: String,
    error: String,
  },
};
</script>

<style>
</style>
