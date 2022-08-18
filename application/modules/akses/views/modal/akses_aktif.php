<div class="modal fade" id="modal-aktif-akses" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title text-white">Aktifkan Akses : Akses</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="FrmAktifAkses" class="form-horizontal form-akses-aktif" role="form" method="POST" action="/akses/ajax_akses">
                <div class="modal-body">
                    <center>
                        <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                    </center>
                    <input type="hidden" class="id_hidden" name="form[id]" value="" placeholder="id_data">
                    <button class="btn btn-light after-loading d-none" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info ladda-button ladda-button-submit after-loading d-none" data-style="slide-up">Aktifkan</button>
                </div>
            </form>
        </div>
    </div>
</div>