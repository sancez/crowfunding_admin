<div class="modal fade" id="modal-inactive-selesai" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title text-white">Inactive Proyek : Proyek</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer after-loading d-none">
                <form id="FrmInactiveSelesai" class="form-horizontal form-selesai-inactive" role="form" method="POST" action="/manajemen_proyek/ajax_manajemen_proyek_selesai">
                    <center>
                        <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                    </center>
                    <input type="hidden" class="id_hidden" name="form[id]" value="" placeholder="id_data">
                    <input type="hidden" name="form[status_active]" value="0">
                    <button class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger ladda-button ladda-button-submit" onclick="SimpanInactiveSelesai();" data-style="slide-up">Inactive</button>
                </form>
            </div>
        </div>
    </div>
</div>