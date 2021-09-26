<template>
  <div class="form-group">
    <div class="custom-control custom-switch">
      <input
        type="checkbox"
        class="custom-control-input"
        :id="label"
        :checked="checked"
        @change="$emit('update:checked', $event.target.checked)"
        v-bind="$attrs"
      />
      <label v-if="label" class="custom-control-label" :for="label">{{
        label
      }}</label>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    checked: Boolean,
    label: String,
  },
};
</script>

<style>
</style>
