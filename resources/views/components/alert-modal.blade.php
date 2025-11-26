
@props([
  'priority' => 'alert alert-danger',
  'message' => 'Something went wrong.'
])

<div class="container-fluid message-modal-container" style="display: none;" id="alert-modal">
  <div class="message-modal {{ $priority }} col-12 col-sm-6 px-4 py-3 d-flex align-items-center position-relative">

    <div class="d-flex align-items-center gap-1">
      <i class="ph ph-warning fs-3"></i>
      <p class="m-0 fw-bold">{{ $message }}</p>
    </div>

    <button class="modal-cancel-btn position-absolute top-0 end-0 m-2" onclick="document.getElementById('alert-modal').remove()">
      <i class="ph-fill ph-x-circle fs-4"></i>
    </button>

  </div>
</div>

<script>
  window.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('alert-modal');
    if (modal) {
      modal.style.display = 'flex';
    }
  });
</script>

