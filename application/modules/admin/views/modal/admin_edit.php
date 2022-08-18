<div class="modal fade" id="modal-edit-admin" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title text-white">Edit Admin : Admin</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FrmEditAdmin" class="form-horizontal form-admin-edit" role="form" method="POST" action="/admin/ajax_admin">
                    <center>
                        <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                    </center>
                    <div class="row after-loading d-none">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Foto</label>
                                <input type="file" class="foto" placeholder="Pas Foto">
                                <br class="strip-foto d-none">
                                <label class="loading-foto d-none"><i class="fa fa-spin fa-sync-alt"></i> </label><button style="margin:2px;" type="button" class="btn btn-sm btn-info detail-foto d-none"><i class="fa fa-external-link-alt"></i> Lihat File</button><button style="margin:2px;" type="button" class="btn btn-sm btn-danger hapus-foto d-none"><i class="fa fa-trash"></i> Hapus File</button>
                                <input class="foto_hidden" type="hidden" name="form[foto]" value="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Nama <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" placeholder="Nama" name="form[nama]" maxlength="255">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select required class="form-control select" name="form[jk]">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Username <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" placeholder="Username" name="form[username]" maxlength="30">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Kota Lahir <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" placeholder="Kota Lahir" name="form[kota_lahir]" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Tgl Lahir <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control datepicker-tgl-lahir" placeholder="Tgl Lahir" name="form[tgl_lahir]">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">No Telp HP</label>
                                <input type="text" class="form-control" placeholder="No Telp HP" name="form[no_telp_hp]" maxlength="20">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="form[email]" maxlength="255">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Jabatan <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" placeholder="Jabatan" name="form[jabatan]" maxlength="20">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Akses <span class="text-danger">*</span></label>
                                <select required style="width: 100%;" class="form-control select2 dropdown-akses" name="form[id_akses]">
                                    <option value="">Pilih Akses</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" class="id_hidden" name="form[id]" value="" placeholder="id_data">
                </form>
            </div>
            <div class="modal-footer after-loading d-none">
                <button class="btn btn-light" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-info ladda-button ladda-button-submit" onclick="SimpanEditAdmin();" data-style="slide-up">Simpan</button>
            </div>
        </div>
    </div>
</div>