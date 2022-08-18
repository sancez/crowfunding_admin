<div class="modal fade" id="modal-active-sedang-berjalan" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title text-white">Active Proyek : Proyek</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer after-loading d-none">
                <form id="FrmActiveSedangBerjalan" class="form-horizontal form-sedang-berjalan-active" role="form" method="POST" action="/manajemen_proyek/ajax_manajemen_proyek_sedang_berjalan">
                    <center>
                        <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                    </center>
                    <input type="hidden" class="id_hidden" name="form[id]" value="" placeholder="id_data">
                    <input type="hidden" name="form[status_active]" value="1">
                    <button class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info ladda-button ladda-button-submit" onclick="SimpanActiveSedangBerjalan();" data-style="slide-up">Active</button>
                </form>
            </div>
        </div>
    </div>
</div>