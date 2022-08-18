<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta name="description" content="Obsido" />
        <meta name="keywords" content="Obsido Keywords">
        <meta name="author" content="Web-Izul" />
        <title>Manajemen Investor </title>
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

            #modal-edit-manajemen-investor .form-group {
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
                                <h4 class="content-header-title">&nbsp;<i data-feather="users"></i>&nbsp;&nbsp;Manajemen Investor</h4>
                            </div>
                            <div class="content-header-right col-md-8 col-12">
                                <div class="form-group float-right div-header-button">
                                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target=".filter" title="Filter Data"><i class="fa fa-filter"></i></button>
                                    <button type="button" class="btn btn-info btn-pdf" onclick="LogPDFExcel('PDF')" title="Export PDF"><i class="fa fa-file-pdf"></i></button>
                                    <button type="button" class="btn btn-info btn-excel" onclick="LogPDFExcel('Excel')" title="Export Excel"><i class="fa fa-file-excel"></i></button>
                                    <button type="button" class="btn btn-info" onclick="location.reload();"><i class="fa fa-sync-alt" title="Refresh"></i></button>
                                    <div class="btn-group pagination-layout-manajemen-investor" pagename="/manajemen_investor/ajax_manajemen_investor" data-colspan="7" role="group" aria-label="Basic example">
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
                                                        <select style="width: 100%;" class="form-control select status-delete">
                                                            <option selected value="">Semua</option>
                                                            <option value="1">Inactive</option>
                                                            <option value="0">Active</option>
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
                                                            <option value="nama asc">Nama [A-Z]</option>
                                                            <option value="nama desc">Nama [Z-A]</option>
                                                            <option value="nik asc">NIK [A-Z]</option>
                                                            <option value="nik desc">NIK [Z-A]</option>
                                                            <option value="npwp asc">NPWP [A-Z]</option>
                                                            <option value="npwp desc">NPWP [Z-A]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table datatable-manajemen-investor table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 80px;" class="text-center">Aksi</th>
                                                    <th style="width: 110px;">Tanggal</th>
                                                    <th>Nama</th>
                                                    <th>NIK</th>
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
                                        <div class="pagination-layout-manajemen-investor d-none" pagename="/manajemen_investor/ajax_manajemen_investor" data-colspan="7">
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
        <?php $this->load->view("manajemen_investor/modal/manajemen_investor_edit"); ?>
        <?php $this->load->view("manajemen_investor/modal/manajemen_investor_status"); ?>
        <?php $this->load->view("manajemen_investor/modal/manajemen_investor_topup"); ?>
        <?php $this->load->view("manajemen_investor/modal/manajemen_investor_investasi"); ?>
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
                var kywd = $("#FrmSearch").find(".kywd").val(), status_delete = $("#FrmFilter").find(".status-delete").val(), sort = $("#FrmFilter").find(".sort").val();
                request["Page"] = 1;
                request["Sort"] = sort;
                request["Search"] = kywd;
                request["filter"]["status_delete"] = status_delete;
                pagename = "/manajemen_investor/ajax_manajemen_investor";
                target_table = "manajemen-investor";
                GetData(request,"listdatahtml",target_table,function(resp){
                    
                }, 7);
                return false;
            }

            $("#FrmSearch").submit(function() {
                GetDataTable();
                return false;
            });
            $("#FrmFilter .status-delete, #FrmFilter .sort").change(function(){
                GetDataTable();
            });

            var manajemen_investor_edit = $("#modal-edit-manajemen-investor");
            var manajemen_investor_status = $("#modal-status-manajemen-investor");
            var manajemen_investor_topup = $("#modal-topup-manajemen-investor");
            var manajemen_investor_investasi = $("#modal-investasi-manajemen-investor");

            $(".datatable-manajemen-investor").on("click", ".btn-lihat-lampiran", function() {
                $("#modal-edit-manajemen-investor .modal-title").text("Manajemen Investor : Investor");
                $("#input-group-1, #input-group-2, #input-group-3, #input-group-4, #input-group-5, #input-group-6, #input-group-7, #input-group-8, #input-group-9, #input-group-10, #input-group-11, #input-group-12, #input-group-13, #input-group-14, #input-group-15, #input-group-16, #input-group-17, #input-group-18, #input-group-19, #input-group-20, #input-group-21").prop("checked", false);
                manajemen_investor_edit.find("textarea[name='form[alasan_penolakan]']").val("");
                manajemen_investor_edit.find(".loading-gif-image").removeClass("d-none");
                manajemen_investor_edit.find(".after-loading").addClass("d-none");
                $("#modal-edit-manajemen-investor").modal("show");
                var id_update = $(this).attr("data-id");
                manajemen_investor_edit.find(".id_hidden").val(id_update);
                pagename = "/manajemen_investor/ajax_manajemen_investor";
                GetDataById(id_update, function(resp) {
                    var resp_manajemen_investor = resp.data_verifikasi;
                    var resp = resp.data[0];
                    if(resp_manajemen_investor.length != 0){
                        if(resp_manajemen_investor[0].nama_lengkap == 1){manajemen_investor_edit.find("input[name='form[nama_lengkap]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].email == 1){manajemen_investor_edit.find("input[name='form[email]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].no_telefon == 1){manajemen_investor_edit.find("input[name='form[no_telefon]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].jenis_kelamin == 1){manajemen_investor_edit.find("input[name='form[jenis_kelamin]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].data_nik == 1){manajemen_investor_edit.find("input[name='form[data_nik]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].data_npwp == 1){manajemen_investor_edit.find("input[name='form[data_npwp]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].tgl_lahir == 1){manajemen_investor_edit.find("input[name='form[tgl_lahir]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].status_pernikahan == 1){manajemen_investor_edit.find("input[name='form[status_pernikahan]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].pekerjaan == 1){manajemen_investor_edit.find("input[name='form[pekerjaan]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].sumber_penghasilan == 1){manajemen_investor_edit.find("input[name='form[sumber_penghasilan]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].pendapatan_pertahun == 1){manajemen_investor_edit.find("input[name='form[pendapatan_pertahun]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].nama_pemilik_rekening == 1){manajemen_investor_edit.find("input[name='form[nama_pemilik_rekening]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].nama_cabang_bank == 1){manajemen_investor_edit.find("input[name='form[nama_cabang_bank]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].nama_bank == 1){manajemen_investor_edit.find("input[name='form[nama_bank]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].provinsi == 1){manajemen_investor_edit.find("input[name='form[provinsi]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].kota == 1){manajemen_investor_edit.find("input[name='form[kota]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].kecamatan == 1){manajemen_investor_edit.find("input[name='form[kecamatan]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].kelurahan == 1){manajemen_investor_edit.find("input[name='form[kelurahan]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].alamat_lengkap == 1){manajemen_investor_edit.find("input[name='form[alamat_lengkap]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].ktp == 1){manajemen_investor_edit.find("input[name='form[ktp]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].selfie_ktp == 1){manajemen_investor_edit.find("input[name='form[selfie_ktp]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].npwp == 1){manajemen_investor_edit.find("input[name='form[npwp]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].selfie_npwp == 1){manajemen_investor_edit.find("input[name='form[selfie_npwp]']").prop("checked", true);}
                        if(resp_manajemen_investor[0].buku_tabungan == 1){manajemen_investor_edit.find("input[name='form[buku_tabungan]']").prop("checked", true);}
                        manajemen_investor_edit.find("textarea[name='form[alasan_penolakan]']").val(resp_manajemen_investor[0].alasan_penolakan);
                    }
                    manajemen_investor_edit.find(".nama-lengkap").text(resp.nama);
                    manajemen_investor_edit.find(".email").text(resp.email);
                    manajemen_investor_edit.find(".no-telefon").text(resp.no_hp);
                    manajemen_investor_edit.find(".jenis-kelamin").text(resp.jenis_kelamin);
                    manajemen_investor_edit.find(".data-nik").text(resp.nik);
                    manajemen_investor_edit.find(".data-npwp").text(resp.npwp);
                    manajemen_investor_edit.find(".tgl-lahir").text(moment(resp.tgl_lahir).format("DD MMM YYYY"));
                    manajemen_investor_edit.find(".status-pernikahan").text(resp.status_perkawinan);
                    manajemen_investor_edit.find(".pekerjaan").text(resp.pekerjaan);
                    manajemen_investor_edit.find(".sumber-penghasilan").text(resp.sumber_penghasilan);
                    manajemen_investor_edit.find(".pendapatan-pertahun").text(rupiah(resp.penghasilan_per_tahun));
                    manajemen_investor_edit.find(".nama-pemilik-rekening").text(resp.nama_pemilik_rekening_bank);
                    manajemen_investor_edit.find(".nama-cabang-bank").text(resp.nama_cabang_bank);
                    manajemen_investor_edit.find(".nama-bank").text(resp.nama_bank);
                    manajemen_investor_edit.find(".provinsi").text(resp.nama_provinsi);
                    manajemen_investor_edit.find(".kota").text(resp.nama_kota);
                    manajemen_investor_edit.find(".kecamatan").text(resp.nama_kecamatan);
                    manajemen_investor_edit.find(".kelurahan").text(resp.kelurahan);
                    manajemen_investor_edit.find(".alamat-lengkap").text(resp.alamat_lengkap);

                    if(resp.foto_ktp == "" || resp.foto_ktp == null){
                        manajemen_investor_edit.find(".ktp").html("-");
                    } else {
                        manajemen_investor_edit.find(".ktp").html("<a style='margin:2px;' class='btn btn-sm btn-info btn-lihat text-white' target='"+cdn_url+"/"+resp.foto_ktp+"'><i class='fa fa-eye'></i> Lihat</a><a target='_blank' download style='margin:2px;' class='btn btn-sm btn-info text-white' href='"+cdn_url+"/"+resp.foto_ktp+"'><i class='fa fa-download'></i> Download</a>");
                    }

                    if(resp.foto_selfie_ktp == "" || resp.foto_selfie_ktp == null){
                        manajemen_investor_edit.find(".selfie-ktp").html("-");
                    } else {
                        manajemen_investor_edit.find(".selfie-ktp").html("<a style='margin:2px;' class='btn btn-sm btn-info btn-lihat text-white' target='"+cdn_url+"/"+resp.foto_selfie_ktp+"'><i class='fa fa-eye'></i> Lihat</a><a target='_blank' download style='margin:2px;' class='btn btn-sm btn-info text-white' href='"+cdn_url+"/"+resp.foto_selfie_ktp+"'><i class='fa fa-download'></i> Download</a>");
                    }

                    if(resp.foto_npwp == "" || resp.foto_npwp == null){
                        manajemen_investor_edit.find(".npwp").html("-");
                    } else {
                        manajemen_investor_edit.find(".npwp").html("<a style='margin:2px;' class='btn btn-sm btn-info btn-lihat text-white' target='"+cdn_url+"/"+resp.foto_npwp+"'><i class='fa fa-eye'></i> Lihat</a><a target='_blank' download style='margin:2px;' class='btn btn-sm btn-info text-white' href='"+cdn_url+"/"+resp.foto_npwp+"'><i class='fa fa-download'></i> Download</a>");
                    }

                    if(resp.foto_selfie_npwp == "" || resp.foto_selfie_npwp == null){
                        manajemen_investor_edit.find(".selfie-npwp").html("-");
                    } else {
                        manajemen_investor_edit.find(".selfie-npwp").html("<a style='margin:2px;' class='btn btn-sm btn-info btn-lihat text-white' target='"+cdn_url+"/"+resp.foto_selfie_npwp+"'><i class='fa fa-eye'></i> Lihat</a><a target='_blank' download style='margin:2px;' class='btn btn-sm btn-info text-white' href='"+cdn_url+"/"+resp.foto_selfie_npwp+"'><i class='fa fa-download'></i> Download</a>");
                    }

                    if(resp.foto_buku_tabungan == "" || resp.foto_buku_tabungan == null){
                        manajemen_investor_edit.find(".buku-tabungan").html("-");
                    } else {
                        manajemen_investor_edit.find(".buku-tabungan").html("");
                        var foto_buku_tabungan = JSON.parse(resp.foto_buku_tabungan);
                        $.each(foto_buku_tabungan, function(index, item) {
                            manajemen_investor_edit.find(".buku-tabungan").append("<a style='margin:2px;' class='btn btn-sm btn-info btn-lihat text-white' target='"+cdn_url+"/file_upload/"+item.file+"'><i class='fa fa-eye'></i> Lihat</a><a target='_blank' download style='margin:2px;' class='btn btn-sm btn-info text-white' href='"+cdn_url+"/file_upload/"+item.file+"'><i class='fa fa-download'></i> Download</a><br>");
                        });
                    }
                    manajemen_investor_edit.find(".loading-gif-image").addClass("d-none");
                    manajemen_investor_edit.find(".after-loading").removeClass("d-none");
                    $("#modal-edit-manajemen-investor .modal-title").text("Manajemen Investor : " + resp.nama);
                });
            });
            $(".datatable-manajemen-investor").on("click", ".active-manajemen-investor", function() {
                $("#modal-status-manajemen-investor .modal-title").text("Manajemen Investor");
                manajemen_investor_status.find(".loading-gif-image").removeClass("d-none");
                manajemen_investor_status.find(".after-loading").addClass("d-none");
                $("#modal-status-manajemen-investor").modal("show");
                var id_update = $(this).attr("data-id");
                manajemen_investor_status.find(".id_hidden").val(id_update);
                manajemen_investor_status.find("input[name='form[status_delete]']").val(0);
                pagename = "/manajemen_investor/ajax_manajemen_investor";
                GetDataById(id_update, function(resp) {
                    var resp = resp.data[0];
                    manajemen_investor_status.find(".loading-gif-image").addClass("d-none");
                    manajemen_investor_status.find(".after-loading").removeClass("d-none");
                    $("#modal-status-manajemen-investor .modal-title").text("Activate : " + resp.nama);
                });
                LogActiveInActive("Active",$(this).attr("data-nama"));
            });
            $(".datatable-manajemen-investor").on("click", ".inactive-manajemen-investor", function() {
                $("#modal-status-manajemen-investor .modal-title").text("Manajemen Investor");
                manajemen_investor_status.find(".loading-gif-image").removeClass("d-none");
                manajemen_investor_status.find(".after-loading").addClass("d-none");
                $("#modal-status-manajemen-investor").modal("show");
                var id_update = $(this).attr("data-id");
                manajemen_investor_status.find(".id_hidden").val(id_update);
                manajemen_investor_status.find("input[name='form[status_delete]']").val(1);
                pagename = "/manajemen_investor/ajax_manajemen_investor";
                GetDataById(id_update, function(resp) {
                    var resp = resp.data[0];
                    manajemen_investor_status.find(".loading-gif-image").addClass("d-none");
                    manajemen_investor_status.find(".after-loading").removeClass("d-none");
                    $("#modal-status-manajemen-investor .modal-title").text("Deactivate : " + resp.nama);
                });
                LogActiveInActive("InActive",$(this).attr("data-nama"));
            });
            $(".datatable-manajemen-investor").on("click", ".topup-manajemen-investor", function() {
                $("#modal-topup-manajemen-investor .modal-title").text("Manajemen Investor");
                manajemen_investor_topup.find(".loading-gif-image").removeClass("d-none");
                manajemen_investor_topup.find(".after-loading").addClass("d-none");
                $("#modal-topup-manajemen-investor").modal("show");
                var id_update = $(this).attr("data-id");
                manajemen_investor_topup.find(".id_hidden").val(id_update);
                pagename = "/manajemen_investor/ajax_manajemen_investor";
                GetDataById(id_update, function(resp) {
                    var data_topup = resp.data_topup;
                    var resp = resp.data[0];
                    var html_data_topup = "";
                    var total_topup = 0;
                    if (data_topup.length != 0) {
                        $.each(data_topup, function(index, item) {
                            total_topup += parseInt(item.nominal);
                            html_data_topup += "<tr><td class='text-center'>"+(index+1)+"</td><td class='text-center'>"+moment(item.created_at).format("DD MMM YYYY HH:mm:ss")+"</td><td>"+item.metode_pembayaran+"</td><td class='text-center'>"+item.no_transaksi+"</td><td class='text-right'>Rp "+rupiah(item.nominal)+"</td></tr>";
                        });
                    }
                    manajemen_investor_topup.find("tbody").html(html_data_topup);
                    manajemen_investor_topup.find("tbody").append("<tr><th class='text-right' colspan='4'>Total</th><th class='text-right'>Rp "+rupiah(total_topup)+"</th></tr>");
                    manajemen_investor_topup.find(".btn-pdf-topup").attr("onclick", "GetPDFTopupInvestor("+id_update+")");
                    manajemen_investor_topup.find(".btn-excel-topup").attr("onclick", "GetExcelTopupInvestor("+id_update+")");
                    manajemen_investor_topup.find(".loading-gif-image").addClass("d-none");
                    manajemen_investor_topup.find(".after-loading").removeClass("d-none");
                    $("#modal-topup-manajemen-investor .modal-title").text("History Topup : " + resp.nama);
                });
            });

            $(".datatable-manajemen-investor").on("click", ".investment-manajemen-investor", function() {
                $("#modal-investasi-manajemen-investor .modal-title").text("Manajemen Investor");
                manajemen_investor_investasi.find(".loading-gif-image").removeClass("d-none");
                manajemen_investor_investasi.find(".after-loading").addClass("d-none");
                $("#modal-investasi-manajemen-investor").modal("show");
                var id_update = $(this).attr("data-id");
                manajemen_investor_investasi.find(".id_hidden").val(id_update);
                pagename = "/manajemen_investor/ajax_manajemen_investor";
                GetDataById(id_update, function(resp) {
                    var data_investasi = resp.data_investasi;
                    var resp = resp.data[0];
                    var html_data_investasi = "";
                    var total_pembelian = 0;
                    var total_penjualan = 0;
                    if (data_investasi.length != 0) {
                        $.each(data_investasi, function(index, item) {
                            if(item.jenis == "Pembelian"){
                                total_pembelian += parseInt(item.nominal);
                            } else {
                                total_penjualan += parseInt(item.nominal);
                            }
                            var data_no_transaksi = item.no_transaksi;
                            if(data_no_transaksi == null){
                                data_no_transaksi = "";
                            }
                            html_data_investasi += "<tr><td class='text-center'>"+(index+1)+"</td><td class='text-center'>"+moment(item.tgl).format("DD MMM YYYY HH:mm:ss")+"</td><td>"+item.jenis+"</td><td>"+data_no_transaksi+"</td><td class='text-center'>"+item.dividen_period+"</td><td class='text-right'>Rp "+rupiah(item.total_transaksi)+"</td></tr>";
                        });
                    }
                    manajemen_investor_investasi.find("tbody").html(html_data_investasi);
                    manajemen_investor_investasi.find("tbody").append("<tr><th class='text-right' colspan='5'>Total Pembelian</th><th class='text-right'>Rp "+rupiah(total_pembelian)+"</th></tr>");
                    manajemen_investor_investasi.find("tbody").append("<tr><th class='text-right' colspan='5'>Total Penjualan</th><th class='text-right'>Rp "+rupiah(total_penjualan)+"</th></tr>");
                    manajemen_investor_investasi.find(".btn-pdf-investasi").attr("onclick", "GetPDFInvestasiInvestor("+id_update+")");
                    manajemen_investor_investasi.find(".btn-excel-investasi").attr("onclick", "GetExcelInvestasiInvestor("+id_update+")");
                    manajemen_investor_investasi.find(".loading-gif-image").addClass("d-none");
                    manajemen_investor_investasi.find(".after-loading").removeClass("d-none");
                    $("#modal-investasi-manajemen-investor .modal-title").text("History Investasi : " + resp.nama);
                });
            });
            $("#modal-edit-manajemen-investor").on("click", ".btn-lihat", function() {
                window.open($(this).attr("target"), "", "width=800,height=400");
            });

            var FrmStatusManajemenInvestor = $("#FrmStatusManajemenInvestor").validate({
                submitHandler: function(form) {
                    laddasubmit = manajemen_investor_status.find(".ladda-button-submit");
                    UpdateData(form, function(resp) {
                        GetDataTable();
                    });
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

            $(".btn-pdf").click(function(){
                var kywd = $("#FrmSearch").find(".kywd").val(), status_delete = $("#FrmFilter").find(".status-delete").val(), sort = $("#FrmFilter").find(".sort").val();
                window.location.href = base_url + "/manajemen_investor/cetak.html?sort="+sort+"&search="+kywd+"&status_delete="+status_delete+"&by="+"<?php echo $this->session->userdata("user")->nama; ?>";
            });
            $(".btn-excel").click(function(){
                var kywd = $("#FrmSearch").find(".kywd").val(), status_delete = $("#FrmFilter").find(".status-delete").val(), sort = $("#FrmFilter").find(".sort").val();
                window.location.href = base_url + "/manajemen_investor/excel.html?sort="+sort+"&search="+kywd+"&status_delete="+status_delete;
            });

            function GetPDFTopupInvestor(id_user){
                window.location.href = base_url + "/manajemen_investor/cetak_topup_investor.html?id="+id_user+"&by="+"<?php echo $this->session->userdata("user")->nama; ?>";
            }
            function GetExcelTopupInvestor(id_user){
                window.location.href = base_url + "/manajemen_investor/excel_topup_investor.html?id="+id_user;
            }
            function GetPDFInvestasiInvestor(id_user){
                window.location.href = base_url + "/manajemen_investor/cetak_investasi_investor.html?id="+id_user+"&by="+"<?php echo $this->session->userdata("user")->nama; ?>";
            }
            function GetExcelInvestasiInvestor(id_user){
                window.location.href = base_url + "/manajemen_investor/excel_investasi_investor.html?id="+id_user;
            }
            function LogPDFExcel($PDFOrExcelObj){
                console.log($PDFOrExcelObj);
                var pageObj = "Manajemen Pemodal";
                var PDFOrExcelObj = $PDFOrExcelObj;
                $.ajax({                  
                    type: 'POST',
                    url: '<?php echo base_url('/manajemen_investor/PDFOrExcel')?>',
                    data: {PDFOrExcel:PDFOrExcelObj,page:pageObj},
                    dataType: 'JSON',
                    success: function (respon) {
                        if (respon.success) {
                            
                        }}
                }); 

            }

     
            function LogActiveInActive($ActiveInActiveObj,$namaObj){                
                console.log($namaObj);
                var data = {ActiveInActive:$ActiveInActiveObj,namaObj:$namaObj}
                var url = '<?php echo base_url('/Manajemen_Investor/LogActiveInActive')?>';
                $.ajax({                  
                    type: 'POST',
                    url: url,
                    data: data,
                    dataType: 'JSON',
                    success: function (respon) {
                        if (respon.success) {
                            console.log(respon.success,"success Processing...")
                        }}
                }); 

            }

        </script>
    </body>
</html>
