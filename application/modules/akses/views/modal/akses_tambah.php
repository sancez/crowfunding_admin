<div class="modal fade" id="modal-tambah-akses" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title text-white">Tambah Akses</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FrmTambahAkses" class="form-horizontal form-akses-baru" role="form" method="POST" action="/akses/ajax_akses">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Nama <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" placeholder="Nama" name="form[nama]" maxlength="255">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Keterangan</label>
                                <textarea type="text" class="form-control" placeholder="Keterangan" name="form[keterangan]" maxlength="255"></textarea>
                            </div>
                            <div class="form-group mb-1">
                                 <div class="list-group checkbox-list-group">
                                    <div class="list-group-item pt-1 pb-1">
                                        <div data-toggle="collapse" data-target="#tambah-akses-1" style="cursor: pointer;">
                                            <label class="bold mt-1 mb-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Verifikasi</label>
                                            <label class="bold mt-1 mb-0 float-right"><i class="fa fa-chevron-down"></i></label>
                                        </div>
                                        <div id="tambah-akses-1" class="collapse">
                                            <div class="card-body pt-1 pb-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-1-1">
                                                    <label class="custom-control-label bold" for="tambah-akses-1-1" value="Verifikasi - KYC Pemodal Download Data">KYC Pemodal Download Data</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-1-2">
                                                    <label class="custom-control-label bold" for="tambah-akses-1-2" value="Verifikasi - KYC Pemodal Kurasi Pemodal">KYC Pemodal Kurasi Pemodal</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-1-3">
                                                    <label class="custom-control-label bold" for="tambah-akses-1-3" value="Verifikasi - KYC Penerbit Download Data">KYC Penerbit Download Data</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-1-4">
                                                    <label class="custom-control-label bold" for="tambah-akses-1-4" value="Verifikasi - KYC Penerbit Kurasi Penerbit">KYC Penerbit Kurasi Penerbit</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                 <div class="list-group checkbox-list-group">
                                    <div class="list-group-item pt-1 pb-1">
                                        <div data-toggle="collapse" data-target="#tambah-akses-2" style="cursor: pointer;">
                                            <label class="bold mt-1 mb-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manajemen Proyek</label>
                                            <label class="bold mt-1 mb-0 float-right"><i class="fa fa-chevron-down"></i></label>
                                        </div>
                                        <div id="tambah-akses-2" class="collapse">
                                            <div class="card-body pt-1 pb-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-2-1">
                                                    <label class="custom-control-label bold" for="tambah-akses-2-1" value="Manajemen Proyek - Verifikasi Proyek Kurasi">Verifikasi Proyek Kurasi</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-2-2">
                                                    <label class="custom-control-label bold" for="tambah-akses-2-2" value="Manajemen Proyek - Verifikasi Proyek Edit">Verifikasi Proyek Edit</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-2-3">
                                                    <label class="custom-control-label bold" for="tambah-akses-2-3" value="Manajemen Proyek - Verifikasi Proyek Terima & Tolak">Verifikasi Proyek Terima & Tolak</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-2-4">
                                                    <label class="custom-control-label bold" for="tambah-akses-2-4" value="Manajemen Proyek - Verifikasi Proyek Export">Verifikasi Proyek Export</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-2-5">
                                                    <label class="custom-control-label bold" for="tambah-akses-2-5" value="Manajemen Proyek - Verifikasi Proyek Add">Verifikasi Proyek Add</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-2-6">
                                                    <label class="custom-control-label bold" for="tambah-akses-2-6" value="Manajemen Proyek - Sedang Berjalan Dividen">Sedang Berjalan Dividen</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-2-7">
                                                    <label class="custom-control-label bold" for="tambah-akses-2-7" value="Manajemen Proyek - Sedang Berjalan Edit">Sedang Berjalan Edit</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-2-8">
                                                    <label class="custom-control-label bold" for="tambah-akses-2-8" value="Manajemen Proyek - Sedang Berjalan Active/Inactive">Sedang Berjalan Active/Inactive</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-2-9">
                                                    <label class="custom-control-label bold" for="tambah-akses-2-9" value="Manajemen Proyek - Sedang Berjalan Export">Sedang Berjalan Export</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-2-10">
                                                    <label class="custom-control-label bold" for="tambah-akses-2-10" value="Manajemen Proyek - Selesai Edit">Selesai Edit</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-2-11">
                                                    <label class="custom-control-label bold" for="tambah-akses-2-11" value="Manajemen Proyek - Selesai Active/Inactive">Selesai Active/Inactive</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-2-12">
                                                    <label class="custom-control-label bold" for="tambah-akses-2-12" value="Manajemen Proyek - Selesai Transaksi">Selesai Transaksi</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-2-13">
                                                    <label class="custom-control-label bold" for="tambah-akses-2-13" value="Manajemen Proyek - Selesai Export">Selesai Export</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                 <div class="list-group checkbox-list-group">
                                    <div class="list-group-item pt-1 pb-1">
                                        <div data-toggle="collapse" data-target="#tambah-akses-3" style="cursor: pointer;">
                                            <label class="bold mt-1 mb-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manajemen Investor</label>
                                            <label class="bold mt-1 mb-0 float-right"><i class="fa fa-chevron-down"></i></label>
                                        </div>
                                        <div id="tambah-akses-3" class="collapse">
                                            <div class="card-body pt-1 pb-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-3-1">
                                                    <label class="custom-control-label bold" for="tambah-akses-3-1" value="Manajemen Investor - Active/Inactive">Active/Inactive</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-3-2">
                                                    <label class="custom-control-label bold" for="tambah-akses-3-2" value="Manajemen Investor - Export">Export</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-3-3">
                                                    <label class="custom-control-label bold" for="tambah-akses-3-3" value="Manajemen Investor - History Topup & Investment">History Topup & Investment</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-3-4">
                                                    <label class="custom-control-label bold" for="tambah-akses-3-4" value="Manajemen Investor - Lampiran Download & View">Lampiran Download & View</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                 <div class="list-group checkbox-list-group">
                                    <div class="list-group-item pt-1 pb-1">
                                        <div data-toggle="collapse" data-target="#tambah-akses-4" style="cursor: pointer;">
                                            <label class="bold mt-1 mb-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manajemen Penerbit</label>
                                            <label class="bold mt-1 mb-0 float-right"><i class="fa fa-chevron-down"></i></label>
                                        </div>
                                        <div id="tambah-akses-4" class="collapse">
                                            <div class="card-body pt-1 pb-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-4-1">
                                                    <label class="custom-control-label bold" for="tambah-akses-4-1" value="Manajemen Penerbit - Active/Inactive">Active/Inactive</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-4-2">
                                                    <label class="custom-control-label bold" for="tambah-akses-4-2" value="Manajemen Penerbit - Export">Export</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-4-3">
                                                    <label class="custom-control-label bold" for="tambah-akses-4-3" value="Manajemen Penerbit - View Project">View Project</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-4-4">
                                                    <label class="custom-control-label bold" for="tambah-akses-4-4" value="Manajemen Penerbit - History Dividen">History Dividen</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-4-5">
                                                    <label class="custom-control-label bold" for="tambah-akses-4-5" value="Manajemen Penerbit - Lampiran Download & View">Lampiran Download & View</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                 <div class="list-group checkbox-list-group">
                                    <div class="list-group-item pt-1 pb-1">
                                        <div data-toggle="collapse" data-target="#tambah-akses-5" style="cursor: pointer;">
                                            <label class="bold mt-1 mb-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manajemen Transaksi</label>
                                            <label class="bold mt-1 mb-0 float-right"><i class="fa fa-chevron-down"></i></label>
                                        </div>
                                        <div id="tambah-akses-5" class="collapse">
                                            <div class="card-body pt-1 pb-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-5-1">
                                                    <label class="custom-control-label bold" for="tambah-akses-5-1" value="Manajemen Transaksi - Jual/Beli View">Jual/Beli View</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-5-2">
                                                    <label class="custom-control-label bold" for="tambah-akses-5-2" value="Manajemen Transaksi - Jual/Beli Export">Jual/Beli Export</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-5-3">
                                                    <label class="custom-control-label bold" for="tambah-akses-5-3" value="Manajemen Transaksi - Biaya Admin View">Biaya Admin View</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-5-4">
                                                    <label class="custom-control-label bold" for="tambah-akses-5-4" value="Manajemen Transaksi - Biaya Admin Export">Biaya Admin Export</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-5-5">
                                                    <label class="custom-control-label bold" for="tambah-akses-5-5" value="Manajemen Transaksi - Isi Saldo View">Isi Saldo View</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-5-6">
                                                    <label class="custom-control-label bold" for="tambah-akses-5-6" value="Manajemen Transaksi - Isi Saldo Export">Isi Saldo Export</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                 <div class="list-group checkbox-list-group">
                                    <div class="list-group-item pt-1 pb-1">
                                        <div data-toggle="collapse" data-target="#tambah-akses-6" style="cursor: pointer;">
                                            <label class="bold mt-1 mb-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manajemen Konten</label>
                                            <label class="bold mt-1 mb-0 float-right"><i class="fa fa-chevron-down"></i></label>
                                        </div>
                                        <div id="tambah-akses-6" class="collapse">
                                            <div class="card-body pt-1 pb-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-6-1">
                                                    <label class="custom-control-label bold" for="tambah-akses-6-1" value="Manajemen Konten - Syarat & Ketentuan">Syarat & Ketentuan</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-6-2">
                                                    <label class="custom-control-label bold" for="tambah-akses-6-2" value="Manajemen Konten - Kebijakan & Privasi">Kebijakan & Privasi</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-6-3">
                                                    <label class="custom-control-label bold" for="tambah-akses-6-3" value="Manajemen Konten - Risiko">Risiko</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-6-4">
                                                    <label class="custom-control-label bold" for="tambah-akses-6-4" value="Manajemen Konten - Banner">Banner</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-6-5">
                                                    <label class="custom-control-label bold" for="tambah-akses-6-5" value="Manajemen Konten - Footer">Footer</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-6-6">
                                                    <label class="custom-control-label bold" for="tambah-akses-6-6" value="Manajemen Konten - Halaman Penerbit">Halaman Penerbit</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                 <div class="list-group checkbox-list-group">
                                    <div class="list-group-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="tambah-akses-7">
                                            <label class="custom-control-label bold" for="tambah-akses-7" value="Konfigurasi">Konfigurasi</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                 <div class="list-group checkbox-list-group">
                                    <div class="list-group-item pt-1 pb-1">
                                        <div data-toggle="collapse" data-target="#tambah-akses-8" style="cursor: pointer;">
                                            <label class="bold mt-1 mb-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Log</label>
                                            <label class="bold mt-1 mb-0 float-right"><i class="fa fa-chevron-down"></i></label>
                                        </div>
                                        <div id="tambah-akses-8" class="collapse">
                                            <div class="card-body pt-1 pb-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-8-1">
                                                    <label class="custom-control-label bold" for="tambah-akses-8-1" value="Log - Admin">Admin</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-8-2">
                                                    <label class="custom-control-label bold" for="tambah-akses-8-2" value="Log - Penerbit">Penerbit</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-8-3">
                                                    <label class="custom-control-label bold" for="tambah-akses-8-3" value="Log - Pemodal">Pemodal</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                 <div class="list-group checkbox-list-group">
                                    <div class="list-group-item pt-1 pb-1">
                                        <div data-toggle="collapse" data-target="#tambah-akses-9" style="cursor: pointer;">
                                            <label class="bold mt-1 mb-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin</label>
                                            <label class="bold mt-1 mb-0 float-right"><i class="fa fa-chevron-down"></i></label>
                                        </div>
                                        <div id="tambah-akses-9" class="collapse">
                                            <div class="card-body pt-1 pb-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-9-1">
                                                    <label class="custom-control-label bold" for="tambah-akses-9-1" value="Admin - Add">Add</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-9-2">
                                                    <label class="custom-control-label bold" for="tambah-akses-9-2" value="Admin - View">View</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-9-3">
                                                    <label class="custom-control-label bold" for="tambah-akses-9-3" value="Admin - Delete">Delete</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-9-4">
                                                    <label class="custom-control-label bold" for="tambah-akses-9-4" value="Admin - Edit">Edit</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                 <div class="list-group checkbox-list-group">
                                    <div class="list-group-item pt-1 pb-1">
                                        <div data-toggle="collapse" data-target="#tambah-akses-10" style="cursor: pointer;">
                                            <label class="bold mt-1 mb-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Akses</label>
                                            <label class="bold mt-1 mb-0 float-right"><i class="fa fa-chevron-down"></i></label>
                                        </div>
                                        <div id="tambah-akses-10" class="collapse">
                                            <div class="card-body pt-1 pb-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-10-1">
                                                    <label class="custom-control-label bold" for="tambah-akses-10-1" value="Akses - Add">Add</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-10-2">
                                                    <label class="custom-control-label bold" for="tambah-akses-10-2" value="Akses - View">View</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-10-3">
                                                    <label class="custom-control-label bold" for="tambah-akses-10-3" value="Akses - Delete">Delete</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tambah-akses-10-4">
                                                    <label class="custom-control-label bold" for="tambah-akses-10-4" value="Akses - Edit">Edit</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="form[menu]" value="">
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-info ladda-button ladda-button-submit" onclick="SimpanTambahAkses();" data-style="slide-up">Simpan</button>
            </div>
        </div>
    </div>
</div>