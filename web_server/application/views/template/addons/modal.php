<div class="modal fade" id="modal_panel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= defined('MODAL_TITLE') ? MODAL_TITLE : "EngTech QR Modal" ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <?= defined('MODAL_CONTENT') ? MODAL_CONTENT : "EngTech QR Modal" ?>
        </div>
      </div>
    </div>
  </div>
</div>
