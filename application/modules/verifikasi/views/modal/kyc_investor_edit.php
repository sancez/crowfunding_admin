<div class="modal fade" id="modal-edit-kyc-investor" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title text-white">KYC Pemodal : Pemodal</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FrmKYCInvestor" class="form-horizontal form-kyc-investor-edit" role="form" method="POST" action="/verifikasi/ajax_verifikasi_kyc_investor">
                    <center>
                        <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                    </center>
                    <div class="row after-loading d-none">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-lg-12 text-center">
                                        <h3>Data Pemodal</h3>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-1" name="form[nama_lengkap]" value="1" type="checkbox">
                                                <label for="input-group-1" class="mb-0">Nama Lengkap</label>
                                            </div>
                                            <label class="nama-lengkap">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-2" name="form[email]" value="1" type="checkbox">
                                                <label for="input-group-2" class="mb-0">Email</label>
                                            </div>
                                            <label class="email">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-3" name="form[no_telefon]" value="1" type="checkbox">
                                                <label for="input-group-3" class="mb-0">No Telefon</label>
                                            </div>
                                            <label class="no-telefon">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-4" name="form[jenis_kelamin]" value="1" type="checkbox">
                                                <label for="input-group-4" class="mb-0">Jenis Kelamin</label>
                                            </div>
                                            <label class="jenis-kelamin">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-22" name="form[data_nik]" value="1" type="checkbox">
                                                <label for="input-group-22" class="mb-0">NIK</label>
                                            </div>
                                            <label class="data-nik">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-23" name="form[data_npwp]" value="1" type="checkbox">
                                                <label for="input-group-23" class="mb-0">NPWP</label>
                                            </div>
                                            <label class="data-npwp">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-5" name="form[tgl_lahir]" value="1" type="checkbox">
                                                <label for="input-group-5" class="mb-0">Tanggal Lahir</label>
                                            </div>
                                            <label class="tgl-lahir">-</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-6" name="form[status_pernikahan]" value="1" type="checkbox">
                                                <label for="input-group-6" class="mb-0">Status Pernikahan</label>
                                            </div>
                                            <label class="status-pernikahan">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-7" name="form[pekerjaan]" value="1" type="checkbox">
                                                <label for="input-group-7" class="mb-0">Pekerjaan</label>
                                            </div>
                                            <label class="pekerjaan">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-8" name="form[sumber_penghasilan]" value="1" type="checkbox">
                                                <label for="input-group-8" class="mb-0">Sumber Penghasilan</label>
                                            </div>
                                            <label class="sumber-penghasilan">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-9" name="form[pendapatan_pertahun]" value="1" type="checkbox">
                                                <label for="input-group-9" class="mb-0">Pendapatan Pertahun</label>
                                            </div>
                                            <label class="pendapatan-pertahun">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-10" name="form[nama_pemilik_rekening]" value="1" type="checkbox">
                                                <label for="input-group-10" class="mb-0">Nama Pemilik Rekening</label>
                                            </div>
                                            <label class="nama-pemilik-rekening">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-11" name="form[nama_cabang_bank]" value="1" type="checkbox">
                                                <label for="input-group-11" class="mb-0">Nama Cabang Bank</label>
                                            </div>
                                            <label class="nama-cabang-bank">-</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-12" name="form[nama_bank]" value="1" type="checkbox">
                                                <label for="input-group-12" class="mb-0">Nama Bank</label>
                                            </div>
                                            <label class="nama-bank">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-24" name="form[provinsi]" value="1" type="checkbox">
                                                <label for="input-group-24" class="mb-0">Provinsi</label>
                                            </div>
                                            <label class="provinsi">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-13" name="form[kota]" value="1" type="checkbox">
                                                <label for="input-group-13" class="mb-0">Kota/Kabupaten</label>
                                            </div>
                                            <label class="kota">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-14" name="form[kecamatan]" value="1" type="checkbox">
                                                <label for="input-group-14" class="mb-0">Kecamatan</label>
                                            </div>
                                            <label class="kecamatan">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-15" name="form[kelurahan]" value="1" type="checkbox">
                                                <label for="input-group-15" class="mb-0">Desa/Kelurahan</label>
                                            </div>
                                            <label class="kelurahan">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-16" name="form[alamat_lengkap]" value="1" type="checkbox">
                                                <label for="input-group-16" class="mb-0">Alamat Lengkap</label>
                                            </div>
                                            <label class="alamat-lengkap">-</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-lg-12 text-center">
                                        <h3>Data Upload</h3>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-17" name="form[ktp]" value="1" type="checkbox">
                                                <label for="input-group-17" class="mb-0">KTP</label>
                                            </div>
                                            <div class="ktp mb-2">-</div>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-18" name="form[selfie_ktp]" value="1" type="checkbox">
                                                <label for="input-group-18" class="mb-0">Selfie KTP</label>
                                            </div>
                                            <div class="selfie-ktp mb-2">-</div>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-19" name="form[npwp]" value="1" type="checkbox">
                                                <label for="input-group-19" class="mb-0">NPWP</label>
                                            </div>
                                            <div class="npwp mb-2">-</div>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-20" name="form[selfie_npwp]" value="1" type="checkbox">
                                                <label for="input-group-20" class="mb-0">Selfie NPWP</label>
                                            </div>
                                            <div class="selfie-npwp mb-2">-</div>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-21" name="form[buku_tabungan]" value="1" type="checkbox">
                                                <label for="input-group-21" class="mb-0">Buku Tabungan</label>
                                            </div>
                                            <div class="buku-tabungan mb-2">-</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-control-label">Alasan Penolakan</label>
                                        <textarea class="form-control" style="height: 100px;" placeholder="Alasan Penolakan" name="form[alasan_penolakan]"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" class="id_hidden" name="form[id]" value="" placeholder="id_data">
                    <input type="hidden" name="form[status_verify]" value="1">
                </form>
            </div>
            <div class="p-3 after-loading d-none text-center">
                <button type="button" class="btn btn-info ladda-button ladda-button-submit disabled btn-terima" disabled onclick="SimpanTerimaKYCInvestor();" data-style="slide-up">Terima</button>
                <button type="button" class="btn btn-danger ladda-button ladda-button-submit" onclick="SimpanTolakKYCInvestor();" data-style="slide-up">Tolak</button>
            </div>
        </div>
    </div>
</div>