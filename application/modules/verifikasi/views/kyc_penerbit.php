<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta name="description" content="Obsido" />
        <meta name="keywords" content="Obsido Keywords">
        <meta name="author" content="Web-Izul" />
        <title>KYC Penerbit</title>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/app.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/components.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/@fortawesome/fontawesome-free/css/all.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/select2/select2.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/select2/select2-bootstrap.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/ladda/ladda-themeless.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/toastr/toastr.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap-datepicker.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/custom.css?n=").$this->config->item("tahun_assets"); ?>">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url("assets/img/favicon.png"); ?>" />
        <style>
            .inputGroup {
                background-color: #fff;
                display: block;
                position: relative;
            }
            .inputGroup label {
                padding: 9px 10px;
                width: 100%;
                display: block;
                text-align: left;
                cursor: pointer;
                position: relative;
                z-index: 2;
                transition: color 200ms ease-in;
                overflow: hidden;
                background: #ffc6c3fa;
                color: black;
                font-weight: bold;
            }
            .inputGroup label:before {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                content: "";
                background-color: #3abaf4;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%) scale3d(1, 1, 1);
                transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
                opacity: 0;
                z-index: -1;
            }
            .inputGroup label:after {
                width: 32px;
                height: 32px;
                content: "";
                border: 2px solid #d1d7dc;
                background-color: #fff;
                background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
                background-repeat: no-repeat;
                background-position: 2px 3px;
                border-radius: 50%;
                z-index: 2;
                position: absolute;
                right: 5px;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer;
                transition: all 200ms ease-in;
            }
            .inputGroup input:checked ~ label {
                color: #fff;
            }
            .inputGroup input:checked ~ label:before {
                transform: translate(-50%, -50%) scale3d(56, 56, 1);
                opacity: 1;
            }
            .inputGroup input:checked ~ label:after {
                background-color: #3abaf4;
                border-color: #3abaf4;
            }
            .inputGroup input {
                width: 32px;
                height: 32px;
                order: 1;
                z-index: 2;
                position: absolute;
                right: 30px;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer;
                visibility: hidden;
            }

            #FrmKYCPenerbit .form-group {
                margin-bottom: 0px;
            }
        </style>
    </head>
    <body class="light light-sidebar theme-white">
        <div class="loader"></div>
        <div id="app">
            <div class="main-wrapper main-wrapper-1">
                <div class="navbar-bg"></div>
                <?php $this->load->view("other/header"); ?>
                <?php $this->load->view("other/sidebar"); ?>
                <div class="main-content">
                    <section class="section">
                        <div class="row">
                            <div class="content-header-left col-md-4 col-12 mb-2">
                                <h4 class="content-header-title">&nbsp;<i class="far fa-id-card" style="font-size: 23px;"></i>&nbsp;&nbsp;KYC Penerbit</h4>
                            </div>
                            <div class="content-header-right col-md-8 col-12">
                                <div class="form-group float-right div-header-button">
                                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target=".filter" title="Filter Data"><i class="fa fa-filter"></i></button>
                                    <button type="button" class="btn btn-info" onclick="location.reload();"><i class="fa fa-sync-alt" title="Refresh"></i></button>
                                    <div class="btn-group pagination-layout-verifikasi-kyc-penerbit" pagename="/admin/ajax_admin" data-colspan="7" role="group" aria-label="Basic example">
                                        <button type="button" disabled class="btn btn-info disabled prev-head"><i class="fa fa-chevron-left"></i></button>
                                        <button type="button" disabled class="btn btn-info disabled next-head"><i class="fa fa-chevron-right"></i></button>
                                    </div>
                                </div>
                                <div class="form-group float-right div-header-search">
                                    <form id="FrmSearch">
                                        <div class="input-group input-search">
                                            <input type="text" class="form-control kywd" placeholder="Cari (Nama, NIK, NPWP)" title="Cari (Nama, NIK, NPWP)" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body filter collapse show">
                                        <form id="FrmFilter" role="form">
                                            <div class="panel-body row">
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select style="width: 100%;" class="form-control select status-verify">
                                                            <option value="">Semua</option>
                                                            <option selected value="0">Pending</option>
                                                            <option value="1">Disetujui</option>
                                                            <option value="2">Ditolak</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Urutkan</label>
                                                        <select style="width: 100%;" class="form-control select sort">
                                                            <option value="id desc">Default</option>
                                                            <option value="created_at asc">Tanggal [A-Z]</option>
                                                            <option value="created_at desc">Tanggal [Z-A]</option>
                                                            <option value="nama_perusahaan asc">Nama Perusahaan [A-Z]</option>
                                                            <option value="nama_perusahaan desc">Nama Perusahaan [Z-A]</option>
                                                            <option value="nama_penanggung_jawab asc">Penanggung Jawab [A-Z]</option>
                                                            <option value="nama_penanggung_jawab desc">Penanggung Jawab [Z-A]</option>
                                                            <option value="npwp asc">NPWP [A-Z]</option>
                                                            <option value="npwp desc">NPWP [Z-A]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table datatable-verifikasi-kyc-penerbit table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 80px;" class="text-center">Aksi</th>
                                                    <th style="width: 110px;">Tanggal</th>
                                                    <th>Nama Perusahaan</th>
                                                    <th>Penanggung Jawab</th>
                                                    <th>NPWP</th>
                                                    <th style="width: 110px;" class="text-center">Lampiran</th>
                                                    <th style="width: 110px;" class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="7" style="padding: 10px !important;">
                                                        <center>
                                                            <img class="loading-gif-image" src="<?php echo base_url("assets/img/loading-data.gif") ?>" alt="Loading ...">
                                                        </center>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer div-pagination-bottom">
                                        <div class="pagination-layout-verifikasi-kyc-penerbit d-none" pagename="/verifikasi/ajax_verifikasi_kyc_penerbit" data-colspan="7">
                                            <div class="row">
                                                <div class="col-md-4 col-xs-8">
                                                    <form id="FrmGotoPage">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <button type="button" disabled class="btn btn-info disabled first"><i class="fa fa-step-backward"></i></button>
                                                                <button type="button" disabled class="btn btn-info disabled prev"><i class="fa fa-chevron-left"></i></button>
                                                            </div>
                                                            <input type="text" class="form-control text-center" aria-describedby="basic-addon2" onkeypress="return validatedata(event);" value="1">
                                                            <div class="input-group-append">
                                                                <button type="button" disabled class="btn btn-info disabled next"><i class="fa fa-chevron-right"></i></button>
                                                                <button type="button" disabled class="btn btn-info disabled last"><i class="fa fa-step-forward"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-sm-6 d-none d-sm-none d-sm-none d-lg-block">
                                                    <div class="form-group">
                                                        <div class="info text-right info-paging">1 - 10 dari 100 Data | 1 Halaman</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 d-none d-sm-none d-sm-none d-lg-block">
                                                    <div class="form-group">
                                                        <select class="form-control select limit float-right">
                                                            <option value="10" selected>10</option>
                                                            <option value="20">20</option>
                                                            <option value="30">30</option>
                                                            <option value="40">40</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <?php $this->load->view("other/footer"); ?>
            </div>
        </div>
        <?php $this->load->view("verifikasi/modal/kyc_penerbit_edit"); ?>
        <script src="<?php echo base_url("assets/js/moment.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/app.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/scripts.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/bootstrap-datepicker.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/validate/jquery.validate.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/select2/select2.full.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/toastr/toastr.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/spin.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/ladda.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/ladda.jquery.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/proses.js?n=").$this->config->item("tahun_assets"); ?>"></script>
        <script>
            var post_gambar  = {"form": {"Base64": ""}};
            $(document).ready(function(){
                GetDataTable();
            });

            function GetDataTable(){
                var kywd = $("#FrmSearch").find(".kywd").val(), status_verify = $("#FrmFilter").find(".status-verify").val(), sort = $("#FrmFilter").find(".sort").val();
                request["Page"] = 1;
                request["Sort"] = sort;
                request["Search"] = kywd;
                request["filter"]["status_verify"] = status_verify;
                pagename = "/verifikasi/ajax_verifikasi_kyc_penerbit";
                target_table = "verifikasi-kyc-penerbit";
                GetData(request,"listdatahtml",target_table,function(resp){
                    
                }, 7);
                return false;
            }

            $("#FrmSearch").submit(function() {
                GetDataTable();
                return false;
            });
            $("#FrmFilter .status-verify, #FrmFilter .sort").change(function(){
                GetDataTable();
            });


            var kyc_penerbit_edit = $("#modal-edit-kyc-penerbit");

            $(".datatable-verifikasi-kyc-penerbit").on("click", ".btn-lihat-lampiran", function() {
                $("#modal-edit-kyc-penerbit .modal-title").text("KYC Penerbit : Penerbit");
                $("#input-group-1, #input-group-2, #input-group-3, #input-group-4, #input-group-5, #input-group-6, #input-group-7, #input-group-8, #input-group-9, #input-group-10, #input-group-11, #input-group-12, #input-group-13, #input-group-14, #input-group-15, #input-group-16, #input-group-17, #input-group-18, #input-group-19, #input-group-20, #input-group-21, #input-group-22, #input-group-23, #input-group-24").prop("checked", false);
                kyc_penerbit_edit.find("textarea[name='form[alasan_penolakan]']").val("");
                kyc_penerbit_edit.find(".loading-gif-image").removeClass("d-none");
                kyc_penerbit_edit.find(".after-loading").addClass("d-none");
                $("#modal-edit-kyc-penerbit").modal("show");
                var id_update = $(this).attr("data-id");
                kyc_penerbit_edit.find(".id_hidden").val(id_update);
                pagename = "/verifikasi/ajax_verifikasi_kyc_penerbit";
                GetDataById(id_update, function(resp) {
                    var resp_verifikasi = resp.data_verifikasi;
                    var resp = resp.data[0];
                    if(resp_verifikasi.length != 0){
                        if(resp_verifikasi[0].nama_perusahaan == 1){kyc_penerbit_edit.find("input[name='form[nama_perusahaan]']").prop("checked", true);}
                        if(resp_verifikasi[0].email == 1){kyc_penerbit_edit.find("input[name='form[email]']").prop("checked", true);}
                        if(resp_verifikasi[0].data_npwp_perusahaan == 1){kyc_penerbit_edit.find("input[name='form[data_npwp_perusahaan]']").prop("checked", true);}
                        if(resp_verifikasi[0].nama_penanggung_jawab == 1){kyc_penerbit_edit.find("input[name='form[nama_penanggung_jawab]']").prop("checked", true);}
                        if(resp_verifikasi[0].nik_penanggung_jawab == 1){kyc_penerbit_edit.find("input[name='form[nik_penanggung_jawab]']").prop("checked", true);}
                        if(resp_verifikasi[0].provinsi == 1){kyc_penerbit_edit.find("input[name='form[provinsi]']").prop("checked", true);}
                        if(resp_verifikasi[0].kota == 1){kyc_penerbit_edit.find("input[name='form[kota]']").prop("checked", true);}
                        if(resp_verifikasi[0].no_telepon == 1){kyc_penerbit_edit.find("input[name='form[no_telepon]']").prop("checked", true);}
                        if(resp_verifikasi[0].kecamatan == 1){kyc_penerbit_edit.find("input[name='form[kecamatan]']").prop("checked", true);}
                        if(resp_verifikasi[0].kelurahan == 1){kyc_penerbit_edit.find("input[name='form[kelurahan]']").prop("checked", true);}
                        if(resp_verifikasi[0].alamat_lengkap == 1){kyc_penerbit_edit.find("input[name='form[alamat_lengkap]']").prop("checked", true);}
                        if(resp_verifikasi[0].jabatan == 1){kyc_penerbit_edit.find("input[name='form[jabatan]']").prop("checked", true);}
                        if(resp_verifikasi[0].nomor_rekening_perusahaan == 1){kyc_penerbit_edit.find("input[name='form[nomor_rekening_perusahaan]']").prop("checked", true);}
                        if(resp_verifikasi[0].nama_pemilik_rekening_bank == 1){kyc_penerbit_edit.find("input[name='form[nama_pemilik_rekening_bank]']").prop("checked", true);}
                        if(resp_verifikasi[0].nama_bank == 1){kyc_penerbit_edit.find("input[name='form[nama_bank]']").prop("checked", true);}
                        if(resp_verifikasi[0].nama_cabang_bank == 1){kyc_penerbit_edit.find("input[name='form[nama_cabang_bank]']").prop("checked", true);}
                        if(resp_verifikasi[0].siup == 1){kyc_penerbit_edit.find("input[name='form[siup]']").prop("checked", true);}
                        if(resp_verifikasi[0].nib == 1){kyc_penerbit_edit.find("input[name='form[nib]']").prop("checked", true);}
                        if(resp_verifikasi[0].npwp_perusahaan == 1){kyc_penerbit_edit.find("input[name='form[npwp_perusahaan]']").prop("checked", true);}
                        if(resp_verifikasi[0].ktp_penanggung_jawab == 1){kyc_penerbit_edit.find("input[name='form[ktp_penanggung_jawab]']").prop("checked", true);}
                        if(resp_verifikasi[0].ktp_direksi == 1){kyc_penerbit_edit.find("input[name='form[ktp_direksi]']").prop("checked", true);}
                        if(resp_verifikasi[0].ktp_komisaris == 1){kyc_penerbit_edit.find("input[name='form[ktp_komisaris]']").prop("checked", true);}
                        if(resp_verifikasi[0].akta_pendirian_perusahaan == 1){kyc_penerbit_edit.find("input[name='form[akta_pendirian_perusahaan]']").prop("checked", true);}
                        if(resp_verifikasi[0].akta_perubahan_anggaran_dasar_terakhir == 1){kyc_penerbit_edit.find("input[name='form[akta_perubahan_anggaran_dasar_terakhir]']").prop("checked", true);}
                        kyc_penerbit_edit.find("textarea[name='form[alasan_penolakan]']").val(resp_verifikasi[0].alasan_penolakan);
                    }
                    kyc_penerbit_edit.find(".nama-perusahaan").text(resp.nama_perusahaan);
                    kyc_penerbit_edit.find(".email").text(resp.email);
                    kyc_penerbit_edit.find(".data-npwp-perusahaan").text(resp.npwp);
                    kyc_penerbit_edit.find(".nama-penanggung-jawab").text(resp.nama_penanggung_jawab);
                    kyc_penerbit_edit.find(".nik-penanggung-jawab").text(resp.nik_penanggung_jawab);
                    kyc_penerbit_edit.find(".provinsi").text(resp.nama_provinsi);
                    kyc_penerbit_edit.find(".kota").text(resp.nama_kota);
                    kyc_penerbit_edit.find(".no-telepon").text(resp.no_telepon);
                    kyc_penerbit_edit.find(".kecamatan").text(resp.nama_kecamatan);
                    kyc_penerbit_edit.find(".kelurahan").text(resp.kelurahan);
                    kyc_penerbit_edit.find(".alamat-lengkap").text(resp.alamat_lengkap);
                    kyc_penerbit_edit.find(".jabatan").text(resp.jabatan);
                    kyc_penerbit_edit.find(".nomor-rekening-perusahaan").text(resp.nomor_rekening_bank);
                    kyc_penerbit_edit.find(".nama-pemilik-rekening-bank").text(resp.nama_pemilik_rekening_bank);
                    kyc_penerbit_edit.find(".nama-bank").text(resp.nama_bank);
                    kyc_penerbit_edit.find(".nama-cabang-bank").text(resp.nama_cabang_bank);

                    if(resp.unggah_siup == "" || resp.unggah_siup == null){
                        kyc_penerbit_edit.find(".siup").html("-");
                    } else {
                        kyc_penerbit_edit.find(".siup").html("<a style='margin:2px;' class='btn btn-sm btn-info btn-lihat text-white' target='"+cdn_url+"/"+resp.unggah_siup+"'><i class='fa fa-eye'></i> Lihat</a><a target='_blank' download style='margin:2px;' class='btn btn-sm btn-info text-white' href='"+cdn_url+"/"+resp.unggah_siup+"'><i class='fa fa-download'></i> Download</a>");
                    }
                    
                    if(resp.unggah_nib == "" || resp.unggah_nib == null){
                        kyc_penerbit_edit.find(".nib").html("-");
                    } else {
                        kyc_penerbit_edit.find(".nib").html("<a style='margin:2px;' class='btn btn-sm btn-info btn-lihat text-white' target='"+cdn_url+"/"+resp.unggah_nib+"'><i class='fa fa-eye'></i> Lihat</a><a target='_blank' download style='margin:2px;' class='btn btn-sm btn-info text-white' href='"+cdn_url+"/"+resp.unggah_nib+"'><i class='fa fa-download'></i> Download</a>");
                    }
                    
                    if(resp.unggah_npwp_perusahaan == "" || resp.unggah_npwp_perusahaan == null){
                        kyc_penerbit_edit.find(".npwp-perusahaan").html("-");
                    } else {
                        kyc_penerbit_edit.find(".npwp-perusahaan").html("<a style='margin:2px;' class='btn btn-sm btn-info btn-lihat text-white' target='"+cdn_url+"/"+resp.unggah_npwp_perusahaan+"'><i class='fa fa-eye'></i> Lihat</a><a target='_blank' download style='margin:2px;' class='btn btn-sm btn-info text-white' href='"+cdn_url+"/"+resp.unggah_npwp_perusahaan+"'><i class='fa fa-download'></i> Download</a>");
                    }
                    
                    if(resp.unggah_ktp_penanggung_jawab == "" || resp.unggah_ktp_penanggung_jawab == null){
                        kyc_penerbit_edit.find(".ktp-penanggung-jawab").html("-");
                    } else {
                        kyc_penerbit_edit.find(".ktp-penanggung-jawab").html("<a style='margin:2px;' class='btn btn-sm btn-info btn-lihat text-white' target='"+cdn_url+"/"+resp.unggah_ktp_penanggung_jawab+"'><i class='fa fa-eye'></i> Lihat</a><a target='_blank' download style='margin:2px;' class='btn btn-sm btn-info text-white' href='"+cdn_url+"/"+resp.unggah_ktp_penanggung_jawab+"'><i class='fa fa-download'></i> Download</a>");
                    }
                    
                    if(resp.unggah_ktp_direksi == "" || resp.unggah_ktp_direksi == null){
                        kyc_penerbit_edit.find(".ktp-direksi").html("-");
                    } else {
                        kyc_penerbit_edit.find(".ktp-direksi").html("<a style='margin:2px;' class='btn btn-sm btn-info btn-lihat text-white' target='"+cdn_url+"/"+resp.unggah_ktp_direksi+"'><i class='fa fa-eye'></i> Lihat</a><a target='_blank' download style='margin:2px;' class='btn btn-sm btn-info text-white' href='"+cdn_url+"/"+resp.unggah_ktp_direksi+"'><i class='fa fa-download'></i> Download</a>");
                    }
                    
                    if(resp.unggah_ktp_komisaris == "" || resp.unggah_ktp_komisaris == null){
                        kyc_penerbit_edit.find(".ktp-komisaris").html("-");
                    } else {
                        kyc_penerbit_edit.find(".ktp-komisaris").html("<a style='margin:2px;' class='btn btn-sm btn-info btn-lihat text-white' target='"+cdn_url+"/"+resp.unggah_ktp_komisaris+"'><i class='fa fa-eye'></i> Lihat</a><a target='_blank' download style='margin:2px;' class='btn btn-sm btn-info text-white' href='"+cdn_url+"/"+resp.unggah_ktp_komisaris+"'><i class='fa fa-download'></i> Download</a>");
                    }
                    
                    if(resp.unggah_akta_pendirian_perusahaan == "" || resp.unggah_akta_pendirian_perusahaan == null){
                        kyc_penerbit_edit.find(".akta-pendirian-perusahaan").html("-");
                    } else {
                        kyc_penerbit_edit.find(".akta-pendirian-perusahaan").html("<a style='margin:2px;' class='btn btn-sm btn-info btn-lihat text-white' target='"+cdn_url+"/"+resp.unggah_akta_pendirian_perusahaan+"'><i class='fa fa-eye'></i> Lihat</a><a target='_blank' download style='margin:2px;' class='btn btn-sm btn-info text-white' href='"+cdn_url+"/"+resp.unggah_akta_pendirian_perusahaan+"'><i class='fa fa-download'></i> Download</a>");
                    }
                    
                    if(resp.unggah_akta_perubahan_anggaran_dasar_terakhir == "" || resp.unggah_akta_perubahan_anggaran_dasar_terakhir == null){
                        kyc_penerbit_edit.find(".akta-perubahan-anggaran-dasar-terakhir").html("-");
                    } else {
                        kyc_penerbit_edit.find(".akta-perubahan-anggaran-dasar-terakhir").html("<a style='margin:2px;' class='btn btn-sm btn-info btn-lihat text-white' target='"+cdn_url+"/"+resp.unggah_akta_perubahan_anggaran_dasar_terakhir+"'><i class='fa fa-eye'></i> Lihat</a><a target='_blank' download style='margin:2px;' class='btn btn-sm btn-info text-white' href='"+cdn_url+"/"+resp.unggah_akta_perubahan_anggaran_dasar_terakhir+"'><i class='fa fa-download'></i> Download</a>");
                    }
                    kyc_penerbit_edit.find(".loading-gif-image").addClass("d-none");
                    kyc_penerbit_edit.find(".after-loading").removeClass("d-none");
                    $("#modal-edit-kyc-penerbit .modal-title").text("KYC Penerbit : " + resp.nama_perusahaan);
                });
            });
            $("#modal-edit-kyc-penerbit").on("click", ".btn-lihat", function() {
                window.open($(this).attr("target"), "", "width=800,height=400");
            });

            $("#FrmKYCPenerbit").on("change", "input", function() {
                if($("#input-group-1").is(":checked") && $("#input-group-2").is(":checked") && $("#input-group-3").is(":checked") && $("#input-group-4").is(":checked") && $("#input-group-5").is(":checked") && $("#input-group-6").is(":checked") && $("#input-group-7").is(":checked") && $("#input-group-8").is(":checked") && $("#input-group-9").is(":checked") && $("#input-group-10").is(":checked") && $("#input-group-11").is(":checked") && $("#input-group-12").is(":checked") && $("#input-group-13").is(":checked") && $("#input-group-14").is(":checked") && $("#input-group-15").is(":checked") && $("#input-group-16").is(":checked") && $("#input-group-17").is(":checked") && $("#input-group-18").is(":checked") && $("#input-group-19").is(":checked") && $("#input-group-20").is(":checked") && $("#input-group-21").is(":checked") && $("#input-group-22").is(":checked") && $("#input-group-23").is(":checked") && $("#input-group-24").is(":checked")){
                    kyc_penerbit_edit.find(".btn-terima").removeClass("disabled").removeAttr("disabled");
                } else {
                    kyc_penerbit_edit.find(".btn-terima").addClass("disabled").attr("disabled", "disabled");
                }
            });

            function SimpanTolakKYCPenerbit(){
                kyc_penerbit_edit.find("input[name='form[status_verify]']").val(2);
                $("#FrmKYCPenerbit").submit();
            }
            function SimpanTerimaKYCPenerbit(){
                kyc_penerbit_edit.find("input[name='form[status_verify]']").val(1);
                $("#FrmKYCPenerbit").submit();
            }
            var FrmKYCPenerbit = $("#FrmKYCPenerbit").validate({
                submitHandler: function(form) {
                    laddasubmit = kyc_penerbit_edit.find(".ladda-button-submit");
                    UpdateData(form, function(resp) {
                        GetDataTable();
                    }, "", "verifikasidata");
                },
                errorPlacement: function (error, element) {
                    if (element.parent(".input-group").length) { 
                        error.insertAfter(element.parent());      // radio/checkbox?
                    } else if (element.hasClass("select2") || element.hasClass("select")) {
                        error.insertAfter(element.next("span"));  // select2
                    } else {                                      
                        error.insertAfter(element);               // default
                    }
                }
            });
        </script>
    </body>
</html>
