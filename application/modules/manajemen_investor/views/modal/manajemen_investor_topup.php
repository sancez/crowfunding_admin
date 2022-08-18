<div class="modal fade" id="modal-topup-manajemen-investor" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title text-white">Manajemen Investor</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                </center>
                <div class="row after-loading d-none">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-info btn-pdf-topup" title="Export PDF"><i class="fa fa-file-pdf"></i></button>
                        <button type="button" class="btn btn-info btn-excel-topup" title="Export Excel"><i class="fa fa-file-excel"></i></button>
                        <table class="table table-striped table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th style="width: 60px;" class="text-center">No</th>
                                    <th style="width: 170px;" class="text-center">Tanggal</th>
                                    <th class="text-center">Metode Pembayaran</th>
                                    <th style="width: 150px;" class="text-center">No Transaksi</th>
                                    <th class="text-center">Total Payment</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer after-loading d-none">
                <button class="btn btn-light" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>