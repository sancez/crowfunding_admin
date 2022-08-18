<div class="modal fade" id="modal-terima-verifikasi-proyek" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title text-white">Terima Verifikasi Proyek : Verifikasi Proyek</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer after-loading d-none">
                <form id="FrmTerimaVerifikasiProyek" class="form-horizontal form-verifikasi-proyek-terima" role="form" method="POST" action="/manajemen_proyek/ajax_manajemen_proyek_verifikasi_proyek">
                    <center>
                        <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                    </center>
                    <input type="hidden" class="id_hidden" name="form[id]" value="" placeholder="id_data">
                    <input type="hidden" name="form[status_projek]" value="Pending">
                   
                    <button class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info ladda-button ladda-button-submit" onclick="SimpanTerimaVerifikasiProyek();" data-style="slide-up">Terima</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-terima-verifikasi-proyek-pending" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">

            <form id="FrmTerimaVerifikasiProyekPending" class="form-horizontal form-verifikasi-proyek-terima" role="form" method="POST" action="/manajemen_proyek/ajax_manajemen_proyek_verifikasi_proyek">

            <div class="modal-header bg-info white">
                <h5 class="modal-title text-white">Escrow Account Number</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="form-group mt-3 ml-4 mb-1" style='width:80%;'>
            <input type="hidden" class="id_hidden" name="form[id]" value="" placeholder="id_data">
                    <input type="hidden" name="form[status_projek]" value="Tersedia">
                    <input type="text" name="form[no_rekening]" placeholder="Type Escrow Account Number" class="form-control" style="width:100%;">
            </div>
            <div class="modal-footer after-loading d-none">                
                    <center>
                        <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                    </center>                    

                    <button class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info ladda-button ladda-button-submit" onclick="SimpanTerimaVerifikasiProyekPending();" data-style="slide-up">Terima</button>                
            </div>
            </form>
        </div>
    </div>
</div>

<!-- 
<div class="modal fade" id="modal-terima-verifikasi-proyek-pending" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title text-white">Escrow Account Number</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="form-group mt-3 ml-4 mb-1" style='width:80%;'>
                <input type="hidden" id="idPending">
                <input type="text" class="form-control" id="noRekening" placeholder="Escrow Account Number">
            </div>
            <div class="modal-footer">
                <form>
                    <input type="hidden" class="id_hidden" name="form[id]" value="" placeholder="id_data">
                    <input type="hidden" name="form[status_projek]" value="Tersedia">

                   <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-danger">Cancel</button>
                   <button type="submit" class="btn btn-primary" onclick="SimpanTerimaVerifikasiProyek()">Comfirm</button>
                </form>
            </div>
        </div>
    </div>
</div> -->