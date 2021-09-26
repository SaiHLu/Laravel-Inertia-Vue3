<template>
  <div class="card">
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th v-for="header in headerRows" :key="header">{{ header }}</th>
          </tr>
        </thead>
        <tbody>
          <slot name="body" />
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    headerRows: {
      type: Array,
      required: true,
    },
  },
};
</script>

<style>
</style>
