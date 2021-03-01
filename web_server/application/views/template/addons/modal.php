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
          <center>
          <a href="<?=base_url($controller.'/loginUser')?>" type="button" class="btn btn-danger">Login As Individual</a>
          <br>
          <a href="<?=base_url($controller.'/loginEstablishment')?>" type="button" class="btn btn-danger">Login As Establishment</a>
        </center>
        </div>
      </div>
    </div>
  </div>
</div>
