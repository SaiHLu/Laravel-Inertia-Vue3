<template>
  <div class="form-group">
    <label :for="label">{{ label }}</label>

    <select
      class="form-control"
      :class="{ 'is-invalid': error }"
      :id="label"
      :value="modelValue"
      @change="$emit('update:modelValue', $event.target.value)"
      v-bind="$attrs"
    >
      <slot />
    </select>

    <div v-if="error" class="text-danger">{{ error }}</div>
  </div>
</template>

<script>
export default {
  props: {
    label: {
      type: String,
      required: true,
    },
    modelValue: [String, Number, Boolean],
    error: String,
  },
};
</script>

<style>
</style>
