<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta name="description" content="Obsido" />
        <meta name="keywords" content="Obsido Keywords">
        <meta name="author" content="Web-Izul" />
        <title>Verifikasi Proyek</title>
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
        <style type="text/css">
            td {
                padding: 10px 5px !important;
                white-space: normal !important;
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
                                <h4 class="content-header-title">&nbsp;<i data-feather="briefcase"></i>&nbsp;&nbsp;Verifikasi Proyek</h4>
                            </div>
                            <div class="content-header-right col-md-8 col-12">
                                <div class="form-group float-right div-header-button">
                                    <a href="<?php echo base_url("manajemen_proyek/verifikasi_proyek_tambah.html"); ?>" class="btn btn-info" title="Tambah Data"><i class="fa fa-plus"></i></a>
                                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target=".filter" title="Filter Data"><i class="fa fa-filter"></i></button>
                                    <button type="button" class="btn btn-info btn-pdf" title="Export PDF"><i class="fa fa-file-pdf"></i></button>
                                    <button type="button" class="btn btn-info btn-excel" title="Export Excel"><i class="fa fa-file-excel"></i></button>
                                    <button type="button" class="btn btn-info" onclick="location.reload();"><i class="fa fa-sync-alt" title="Refresh"></i></button>
                                    <div class="btn-group pagination-layout-manajemen-proyek-verifikasi-proyek" pagename="/manajemen_proyek/ajax_manajemen_proyek_verifikasi_proyek" data-colspan="5" role="group" aria-label="Basic example">
                                        <button type="button" disabled class="btn btn-info disabled prev-head"><i class="fa fa-chevron-left"></i></button>
                                        <button type="button" disabled class="btn btn-info disabled next-head"><i class="fa fa-chevron-right"></i></button>
                                    </div>
                                </div>
                                <div class="form-group float-right div-header-search">
                                    <form id="FrmSearch">
                                        <div class="input-group input-search">
                                            <input type="text" class="form-control kywd" placeholder="Cari (Nama, Alamat)" title="Cari (Nama, Alamat)" aria-describedby="basic-addon2">
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
                                                            <option selected value="0">Aktif</option>
                                                            <option value="1">Dihapus</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Urutkan</label>
                                                        <select style="width: 100%;" class="form-control select sort">
                                                            <option value="id desc">Default</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table datatable-manajemen-proyek-verifikasi-proyek table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="min-width: 200px; width: 200px;" class="text-center bold"></th>
                                                    <th style="min-width: 280px;" class="bold">Alamato</th>
                                                    <th style="min-width: 220px;" class="bold">Investor</th>
                                                    <th style="min-width: 165px;" class="bold"></th>
                                                    <th style="min-width: 160px;" class="text-right bold">Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="5" style="padding: 10px !important;">
                                                        <center>
                                                            <img class="loading-gif-image" src="<?php echo base_url("assets/img/loading-data.gif") ?>" alt="Loading ...">
                                                        </center>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer div-pagination-bottom">
                                        <div class="pagination-layout-manajemen-proyek-verifikasi-proyek d-none" pagename="/manajemen_proyek/ajax_manajemen_proyek_verifikasi_proyek" data-colspan="5">
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
        <?php $this->load->view("manajemen_proyek/modal/verifikasi_proyek_terima"); ?>
        <?php $this->load->view("manajemen_proyek/modal/verifikasi_proyek_tolak"); ?>
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
            $(document).ready(function(){
                GetDataTable();
            });

            function GetDataTable(){
                var kywd = $("#FrmSearch").find(".kywd").val(), status_delete = $("#FrmFilter").find(".status-delete").val(), sort = $("#FrmFilter").find(".sort").val();
                request["Page"] = 1;
                request["Sort"] = sort;
                request["Search"] = kywd;
                request["filter"]["status_delete"] = status_delete;
                pagename = "/manajemen_proyek/ajax_manajemen_proyek_verifikasi_proyek";
                target_table = "manajemen-proyek-verifikasi-proyek";
                GetData(request,"listdatahtml",target_table,function(resp){
                    
                }, 5);
                return false;
            }

            $("#FrmSearch").submit(function() {
                GetDataTable();
                return false;
            });
            $("#FrmFilter .status-delete, #FrmFilter .sort").change(function(){
                GetDataTable();
            });

            function SimpanTerimaVerifikasiProyek(){
                $("#FrmTerimaVerifikasiProyek").submit();
            }
           
            function SimpanTolakVerifikasiProyek(){
                $("#FrmTolakVerifikasiProyek").submit();
            }

            var verifikasi_proyek_terima = $("#modal-terima-verifikasi-proyek");
            var verifikasi_proyek_tolak = $("#modal-tolak-verifikasi-proyek");

            $(".datatable-manajemen-proyek-verifikasi-proyek").on("click", ".terima-manajemen-proyek-verifikasi-proyek", function() {
                $("#modal-terima-verifikasi-proyek .modal-title").text("Terima Verifikasi Proyek : Verifikasi Proyek");
                verifikasi_proyek_terima.find(".loading-gif-image").removeClass("d-none");
                verifikasi_proyek_terima.find(".after-loading").addClass("d-none");
                $("#modal-terima-verifikasi-proyek").modal("show");
                var id_update = $(this).attr("data-id");
                verifikasi_proyek_terima.find(".id_hidden").val(id_update);
                pagename = "/manajemen_proyek/ajax_manajemen_proyek_verifikasi_proyek";
                GetDataById(id_update, function(resp) {
                    var resp = resp.data[0];
                    verifikasi_proyek_terima.find(".loading-gif-image").addClass("d-none");
                    verifikasi_proyek_terima.find(".after-loading").removeClass("d-none");
                    $("#modal-terima-verifikasi-proyek .modal-title").text("Terima Verifikasi Proyek : " + resp.nama);
                });
            });

           /*function pendingModal(id_update){        
            $("#idPending").val(id_update);
            $("#modal-terima-verifikasi-proyek-pending").modal("show");

           };
           function updatePending(){
            $("#FrmTerimaVerifikasiProyek").submit();
            var noRekening = $("#noRekening").val();
            var idUpdate = $("#idPending").val();
            var statusProjek = "Tersedia";
            var data = {
                noRekening:noRekening,
                idUpdate:idUpdate,
                statusProjek:statusProjek
            }
            $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('/manajemen_proyek/ajax_manajemen_proyek_verifikasi_proyek/UpdateManajemenProyekVerifikasiProyekPending')?>",
                        dataType : "JSON",
                        data : data,
                        success: function(data){                           
                            console.log(data);
                            toastrshow("success", "Data berhasil disimpan", "Success");
                        }
                    });
            }*/
            function SimpanTerimaVerifikasiProyekPending(){
                $("#FrmTerimaVerifikasiProyekPending").submit();
            }
            var verifikasi_proyek_terima_pending = $("#modal-terima-verifikasi-proyek-pending");
            $(".datatable-manajemen-proyek-verifikasi-proyek").on("click", ".terima-manajemen-proyek-verifikasi-proyek-pending", function() {
        
                verifikasi_proyek_terima_pending.find(".loading-gif-image").removeClass("d-none");
                verifikasi_proyek_terima_pending.find(".after-loading").addClass("d-none");
                $("#modal-terima-verifikasi-proyek-pending").modal("show");
                var id_update = $(this).attr("data-id");
                verifikasi_proyek_terima_pending.find(".id_hidden").val(id_update);
                pagename = "/manajemen_proyek/ajax_manajemen_proyek_verifikasi_proyek";
                GetDataById(id_update, function(resp) {
                    var resp = resp.data[0];
                    verifikasi_proyek_terima_pending.find(".loading-gif-image").addClass("d-none");
                    verifikasi_proyek_terima_pending.find(".after-loading").removeClass("d-none");

                });
            });
            ///
            $(".datatable-manajemen-proyek-verifikasi-proyek").on("click", ".tolak-manajemen-proyek-verifikasi-proyek", function() {
                $("#modal-tolak-verifikasi-proyek .modal-title").text("Tolak Verifikasi Proyek : Verifikasi Proyek");
                verifikasi_proyek_tolak.find(".loading-gif-image").removeClass("d-none");
                verifikasi_proyek_tolak.find(".after-loading").addClass("d-none");
                $("#modal-tolak-verifikasi-proyek").modal("show");
                var id_update = $(this).attr("data-id");
                verifikasi_proyek_tolak.find(".id_hidden").val(id_update);
                pagename = "/manajemen_proyek/ajax_manajemen_proyek_verifikasi_proyek";
                GetDataById(id_update, function(resp) {
                    var resp = resp.data[0];
                    verifikasi_proyek_tolak.find(".loading-gif-image").addClass("d-none");
                    verifikasi_proyek_tolak.find(".after-loading").removeClass("d-none");
                    $("#modal-tolak-verifikasi-proyek .modal-title").text("Tolak Verifikasi Proyek : " + resp.nama);
                });
            });

            $(".btn-pdf").click(function(){
                var kywd = $("#FrmSearch").find(".kywd").val(), status_delete = $("#FrmFilter").find(".status-delete").val(), sort = $("#FrmFilter").find(".sort").val();
                window.location.href = base_url + "/manajemen_proyek/cetak_verifikasi_proyek.html?sort="+sort+"&search="+kywd+"&status="+status_delete+"&by="+"<?php echo $this->session->userdata("user")->nama; ?>";
            });
            $(".btn-excel").click(function(){
                var kywd = $("#FrmSearch").find(".kywd").val(), status_delete = $("#FrmFilter").find(".status-delete").val(), sort = $("#FrmFilter").find(".sort").val();
                window.location.href = base_url + "/manajemen_proyek/excel_verifikasi_proyek.html?sort="+sort+"&search="+kywd+"&status="+status_delete;
            });

            var FrmTerimaVerifikasiProyekPending = $("#FrmTerimaVerifikasiProyekPending").validate({
                submitHandler: function(form) {
                    laddasubmit = verifikasi_proyek_terima_pending.find(".ladda-button-submit");
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

            var FrmTerimaVerifikasiProyek = $("#FrmTerimaVerifikasiProyek").validate({
                submitHandler: function(form) {
                    laddasubmit = verifikasi_proyek_terima.find(".ladda-button-submit");
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
            var FrmTolakVerifikasiProyek = $("#FrmTolakVerifikasiProyek").validate({
                submitHandler: function(form) {
                    laddasubmit = verifikasi_proyek_tolak.find(".ladda-button-submit");
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
        </script>
    </body>
</html>
