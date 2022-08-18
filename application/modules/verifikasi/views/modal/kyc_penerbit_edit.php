<div class="modal fade" id="modal-edit-kyc-penerbit" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title text-white">KYC Penerbit : Penerbit</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FrmKYCPenerbit" class="form-horizontal form-kyc-penerbit-edit" role="form" method="POST" action="/verifikasi/ajax_verifikasi_kyc_penerbit">
                    <center>
                        <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                    </center>
                    <div class="row after-loading d-none">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-lg-12 text-center">
                                        <h3>Data Penerbit</h3>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-1" name="form[nama_perusahaan]" value="1" type="checkbox">
                                                <label for="input-group-1" class="mb-0">Nama Perusahaan</label>
                                            </div>
                                            <label class="nama-perusahaan">-</label>
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
                                                <input id="input-group-3" name="form[data_npwp_perusahaan]" value="1" type="checkbox">
                                                <label for="input-group-3" class="mb-0">NPWP Perusahaan</label>
                                            </div>
                                            <label class="data-npwp-perusahaan">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-4" name="form[nama_penanggung_jawab]" value="1" type="checkbox">
                                                <label for="input-group-4" class="mb-0">Nama Penanggung Jawab</label>
                                            </div>
                                            <label class="nama-penanggung-jawab">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-5" name="form[nik_penanggung_jawab]" value="1" type="checkbox">
                                                <label for="input-group-5" class="mb-0">NIK Penanggung Jawab</label>
                                            </div>
                                            <label class="nik-penanggung-jawab">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-6" name="form[provinsi]" value="1" type="checkbox">
                                                <label for="input-group-6" class="mb-0">Provinsi</label>
                                            </div>
                                            <label class="provinsi">-</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-7" name="form[kota]" value="1" type="checkbox">
                                                <label for="input-group-7" class="mb-0">Kota/Kabupaten</label>
                                            </div>
                                            <label class="kota">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-8" name="form[no_telepon]" value="1" type="checkbox">
                                                <label for="input-group-8" class="mb-0">No Telepon Perusahaan</label>
                                            </div>
                                            <label class="no-telepon">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-9" name="form[kecamatan]" value="1" type="checkbox">
                                                <label for="input-group-9" class="mb-0">Kecamatan</label>
                                            </div>
                                            <label class="kecamatan">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-10" name="form[kelurahan]" value="1" type="checkbox">
                                                <label for="input-group-10" class="mb-0">Kelurahan</label>
                                            </div>
                                            <label class="kelurahan">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-11" name="form[alamat_lengkap]" value="1" type="checkbox">
                                                <label for="input-group-11" class="mb-0">Alamat Lengkap</label>
                                            </div>
                                            <label class="alamat-lengkap">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-12" name="form[jabatan]" value="1" type="checkbox">
                                                <label for="input-group-12" class="mb-0">Jabatan</label>
                                            </div>
                                            <label class="jabatan">-</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-13" name="form[nomor_rekening_perusahaan]" value="1" type="checkbox">
                                                <label for="input-group-13" class="mb-0">Nomor Rekening Perusahaan</label>
                                            </div>
                                            <label class="nomor-rekening-perusahaan">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-14" name="form[nama_pemilik_rekening_bank]" value="1" type="checkbox">
                                                <label for="input-group-14" class="mb-0">Nama Pemilik Rekening Bank</label>
                                            </div>
                                            <label class="nama-pemilik-rekening-bank">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-15" name="form[nama_bank]" value="1" type="checkbox">
                                                <label for="input-group-15" class="mb-0">Nama Bank</label>
                                            </div>
                                            <label class="nama-bank">-</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-16" name="form[nama_cabang_bank]" value="1" type="checkbox">
                                                <label for="input-group-16" class="mb-0">Nama Cabang Bank</label>
                                            </div>
                                            <label class="nama-cabang-bank">-</label>
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
                                                <input id="input-group-17" name="form[siup]" value="1" type="checkbox">
                                                <label for="input-group-17" class="mb-0">SIUP</label>
                                            </div>
                                            <div class="siup mb-2">-</div>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-18" name="form[nib]" value="1" type="checkbox">
                                                <label for="input-group-18" class="mb-0">NIB</label>
                                            </div>
                                            <div class="nib mb-2">-</div>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-19" name="form[npwp_perusahaan]" value="1" type="checkbox">
                                                <label for="input-group-19" class="mb-0">NPWP Perusahaan</label>
                                            </div>
                                            <div class="npwp-perusahaan mb-2">-</div>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-20" name="form[ktp_penanggung_jawab]" value="1" type="checkbox">
                                                <label for="input-group-20" class="mb-0">KTP Penganggung Jawab</label>
                                            </div>
                                            <div class="ktp-penanggung-jawab mb-2">-</div>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-21" name="form[ktp_direksi]" value="1" type="checkbox">
                                                <label for="input-group-21" class="mb-0">KTP Direksi</label>
                                            </div>
                                            <div class="ktp-direksi mb-2">-</div>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-22" name="form[ktp_komisaris]" value="1" type="checkbox">
                                                <label for="input-group-22" class="mb-0">KTP Komisaris</label>
                                            </div>
                                            <div class="ktp-komisaris mb-2">-</div>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-23" name="form[akta_pendirian_perusahaan]" value="1" type="checkbox">
                                                <label for="input-group-23" class="mb-0">Akta Pendirian Perusahaan</label>
                                            </div>
                                            <div class="akta-pendirian-perusahaan mb-2">-</div>
                                        </div>
                                        <div class="form-group">
                                            <div class="inputGroup">
                                                <input id="input-group-24" name="form[akta_perubahan_anggaran_dasar_terakhir]" value="1" type="checkbox">
                                                <label for="input-group-24" class="mb-0">Akta Perubahan Anggaran Dasar Terakhir</label>
                                            </div>
                                            <div class="akta-perubahan-anggaran-dasar-terakhir mb-2">-</div>
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
                <button type="button" class="btn btn-info ladda-button ladda-button-submit disabled btn-terima" disabled onclick="SimpanTerimaKYCPenerbit();" data-style="slide-up">Terima</button>
                <button type="button" class="btn btn-danger ladda-button ladda-button-submit" onclick="SimpanTolakKYCPenerbit();" data-style="slide-up">Tolak</button>
            </div>
        </div>
    </div>
</div>