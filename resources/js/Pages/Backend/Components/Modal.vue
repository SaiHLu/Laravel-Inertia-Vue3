<template>
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog" :style="modalBoxStyle">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{ modalTitle }}</h4>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <slot name="modal-body" />
        </div>
        <div class="modal-footer justify-content-between">
          <slot name="modal-footer" />
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</template>

<script>
export default {
  props: {
    modalTitle: String,
    modalBoxStyle: String,
  },
};
</script>

<style>
</style>
