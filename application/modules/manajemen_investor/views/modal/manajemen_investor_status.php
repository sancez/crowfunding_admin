<div class="modal fade" id="modal-status-manajemen-investor" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title text-white">Manajemen Investor</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="FrmStatusManajemenInvestor" class="form-horizontal form-manajemen-investor-status" role="form" method="POST" action="/manajemen_investor/ajax_manajemen_investor">
                <div class="modal-body">
                    <center>
                        <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                    </center>
                    <input type="hidden" class="id_hidden" name="form[id]" value="" placeholder="id_data">
                    <input type="hidden" class="status_delete" name="form[status_delete]" value="" placeholder="id_data">
                    <button class="btn btn-light after-loading d-none" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit after-loading d-none" data-style="slide-up">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>