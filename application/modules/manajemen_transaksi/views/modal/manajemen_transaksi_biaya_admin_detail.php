<div class="modal fade" id="modal-detail-manajemen-transaksi-biaya-admin" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title text-white">Detail Transaksi : Transaksi</h5>
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
                        <label class="bold">Detail Pembelian</label>
                        <hr class="mt-0">
                    </div>
                    <div class="row col-12">
                        <div class="col-lg-3 col-md-4 col-sm-5 col-12"><span>Nama Properti</span></div>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-12"><span class="bold nama-properti">-</span></div>
                    </div>
                    <div class="row col-12">
                        <div class="col-lg-3 col-md-4 col-sm-5 col-12"><span>Alamat</span></div>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-12"><span class="bold alamat">-</span></div>
                    </div>
                    <div class="row col-12">
                        <div class="col-lg-3 col-md-4 col-sm-5 col-12"><span>Durasi Proyek</span></div>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-12"><span class="bold durasi-proyek">-</span></div>
                    </div>
                    <div class="row col-12">
                        <div class="col-lg-3 col-md-4 col-sm-5 col-12"><span>Harga Saham</span></div>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-12"><span class="bold harga-saham">-</span></div>
                    </div>
                    <div class="row col-12">
                        <div class="col-lg-3 col-md-4 col-sm-5 col-12"><span>Jumlah Saham</span></div>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-12"><span class="bold jumlah-saham">-</span></div>
                    </div>
                    <div class="row col-12">
                        <div class="col-lg-3 col-md-4 col-sm-5 col-12"><span>Dividen Period</span></div>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-12"><span class="bold dividen-period">-</span></div>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <label class="bold">Detail Transaksi</label>
                        <hr class="mt-0">
                    </div>
                    <div class="row col-12">
                        <div class="col-lg-3 col-md-5 col-sm-6 col-12"><span>Nomor Transaksi</span></div>
                        <div class="col-lg-9 col-md-7 col-sm-6 col-12"><span class="bold no-transaksi">-</span></div>
                    </div>
                    <div class="row col-12">
                        <div class="col-lg-3 col-md-5 col-sm-6 col-12"><span>Tanggal Transaksi</span></div>
                        <div class="col-lg-9 col-md-7 col-sm-6 col-12"><span class="bold tgl-transaksi">-</span></div>
                    </div>
                    <div class="row col-12">
                        <div class="col-lg-3 col-md-5 col-sm-6 col-12"><span>Biaya Administrasi</span></div>
                        <div class="col-lg-9 col-md-7 col-sm-6 col-12"><span class="bold biaya-administrasi text-danger">-</span></div>
                    </div>
                    <div class="row col-12">
                        <div class="col-lg-3 col-md-5 col-sm-6 col-12"><span>Total Pembayaran</span></div>
                        <div class="col-lg-9 col-md-7 col-sm-6 col-12"><span class="bold total-pembayaran">-</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>