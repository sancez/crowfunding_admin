<div class="modal fade" id="modal-properti-grafik-progress-edit" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Grafik Progres</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-control-label">Foto</label>
                            <input type="file" class="foto" placeholder="Pas Foto">
                            <br class="strip-foto d-none">
                            <label class="loading-foto d-none"><i class="fa fa-spin fa-sync-alt"></i> </label><button style="margin:2px;" type="button" class="btn btn-sm btn-info detail-foto d-none"><i class="fa fa-external-link-alt"></i> Lihat File</button><button style="margin:2px;" type="button" class="btn btn-sm btn-danger hapus-foto d-none"><i class="fa fa-trash"></i> Hapus File</button>
                            <input class="foto_hidden" type="hidden" value="">
                            <input class="foto_file_name" type="hidden" value=""><br>
                            <i style="font-style: italic; font-size: 13px;">Maksimum 5 MB</i>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Keterangan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control input-keterangan" placeholder="Keterangan" maxlength="100">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Mulai <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control datepicker-tgl-mulai" placeholder="Mulai">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Selesai <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control datepicker-tgl-selesai" placeholder="Selesai">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Progres (%) <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="number" class="form-control input-progress" placeholder="Progres (%)">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Durasi</label>
                                    <input readonly type="text" class="form-control input-durasi" placeholder="Durasi">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-info btn-tambah-grafik-progress">Simpan</button>
            </div>
        </div>
    </div>
</div>