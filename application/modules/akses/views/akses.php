<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta name="description" content="Obsido" />
        <meta name="keywords" content="Obsido Keywords">
        <meta name="author" content="Web-Izul" />
        <title>Akses</title>
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
                                <h4 class="content-header-title">&nbsp;<i data-feather="user-check"></i>&nbsp;&nbsp;Akses</h4>
                            </div>
                            <div class="content-header-right col-md-8 col-12">
                                <div class="form-group float-right div-header-button">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-tambah-akses" title="Tambah Data"><i class="fa fa-plus"></i></button>
                                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target=".filter" title="Filter Data"><i class="fa fa-filter"></i></button>
                                    <button type="button" class="btn btn-info" onclick="location.reload();"><i class="fa fa-sync-alt" title="Refresh"></i></button>
                                    <div class="btn-group pagination-layout-akses" pagename="/akses/ajax_akses" data-colspan="5" role="group" aria-label="Basic example">
                                        <button type="button" disabled class="btn btn-info disabled prev-head"><i class="fa fa-chevron-left"></i></button>
                                        <button type="button" disabled class="btn btn-info disabled next-head"><i class="fa fa-chevron-right"></i></button>
                                    </div>
                                </div>
                                <div class="form-group float-right div-header-search">
                                    <form id="FrmSearch">
                                        <div class="input-group input-search">
                                            <input type="text" class="form-control kywd" placeholder="Cari (Nama, Keterangan)" title="Cari (Nama, Keterangan)" aria-describedby="basic-addon2">
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
                                                            <option value="nama asc">Nama [A-Z]</option>
                                                            <option value="nama desc">Nama [Z-A]</option>
                                                            <option value="keterangan asc">Keterangan [A-Z]</option>
                                                            <option value="keterangan desc">Keterangan [Z-A]</option>
                                                            <option value="created_at asc">Tgl Dibuat [A-Z]</option>
                                                            <option value="created_at desc">Tgl Dibuat [Z-A]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table datatable-akses table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 80px;" class="text-center">Aksi</th>
                                                    <th>Nama</th>
                                                    <th>Keterangan</th>
                                                    <th style="width: 180px;">Tgl Dibuat</th>
                                                    <th style="width: 50px;" class="text-center">Status</th>
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
                                        <div class="pagination-layout-akses d-none" pagename="/akses/ajax_akses" data-colspan="5">
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
        <?php $this->load->view("akses/modal/akses_tambah"); ?>
        <?php $this->load->view("akses/modal/akses_edit"); ?>
        <?php $this->load->view("akses/modal/akses_hapus"); ?>
        <?php $this->load->view("akses/modal/akses_aktif"); ?>
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
                pagename = "/akses/ajax_akses";
                target_table = "akses";
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

            function SimpanTambahAkses(){
                $("#FrmTambahAkses").submit();
            }
            function SimpanEditAkses(){
                $("#FrmEditAkses").submit();
            }
            function SimpanPasswordAkses(){
                $("#FrmPasswordAkses").submit();
            }

            var akses_baru = $("#modal-tambah-akses");
            var akses_edit = $("#modal-edit-akses");
            var akses_hapus = $("#modal-hapus-akses");
            var akses_aktif = $("#modal-aktif-akses");
            akses_baru.find("input[type='checkbox']").change(function(){
                var menu_checked = "";
                akses_baru.find("input[type='checkbox']").each(function(index, element){
                    if(akses_baru.find("#"+element.id).is(":checked")) {
                        menu_checked += akses_baru.find("#"+element.id).parent().find("label").attr("value")+", "
                    }
                });
                akses_baru.find("input[name='form[menu]']").val(menu_checked);
            });
            akses_edit.find("input[type='checkbox']").change(function(){
                var menu_checked = "";
                akses_edit.find("input[type='checkbox']").each(function(index, element){
                    if(akses_edit.find("#"+element.id).is(":checked")) {
                        menu_checked += akses_edit.find("#"+element.id).parent().find("label").attr("value")+", "
                    }
                });
                akses_edit.find("input[name='form[menu]']").val(menu_checked);
            });
            $("#modal-tambah-akses").on('show.bs.modal', function () {
                if(($("#modal-tambah-akses").data('bs.modal') || {})._isShown){

                } else {
                    akses_baru.find("input[name='form[nama]'], input[name='form[menu]'], textarea[name='form[keterangan]']").val("");
                    akses_baru.find(".collapse").collapse("hide");
                    akses_baru.find("input[type='checkbox']").prop("checked", false);
                    $("#modal-tambah-akses").on('shown.bs.modal', function () {
                        akses_baru.find("input[name='form[nama]']").focus();
                    });
                }
                
            });
            $(".datatable-akses").on("click", ".edit-akses", function() {
                akses_edit.find("input[type='checkbox']").prop("checked", false);
                akses_edit.find(".collapse").collapse("hide");
                $("#modal-edit-akses .modal-title").text("Edit Akses : Nama Akses");
                akses_edit.find(".loading-gif-image").removeClass("d-none");
                akses_edit.find(".after-loading").addClass("d-none");
                $("#modal-edit-akses").modal("show");
                var id_update = $(this).attr("data-id");
                akses_edit.find(".id_hidden").val(id_update);
                pagename = "/akses/ajax_akses";
                GetDataById(id_update, function(resp) {
                    var resp = resp.data[0];
                    setTimeout(function(){
                        if(resp.menu == null || resp.menu == ""){

                        } else {
                            $.each(resp.menu.split(", "), function(index, item){
                                akses_edit.find("label[value='"+item+"']").parent().find("input").prop("checked", true).trigger("change");
                                if(item.indexOf(" - ") >= 0){
                                    akses_edit.find("label[value='"+item+"']").parent().parent().parent().collapse("show");
                                }
                            });
                        }
                        akses_edit.find("input[name='form[nama]']").val(resp.nama);
                        akses_edit.find("textarea[name='form[keterangan]']").val(resp.keterangan);
                        setTimeout(function(){
                            akses_edit.find(".loading-gif-image").addClass("d-none");
                            akses_edit.find(".after-loading").removeClass("d-none");
                            akses_edit.find("input[name='form[nama]']").focus();
                            $("#modal-edit-akses .modal-title").text("Edit Akses : " + resp.nama);
                        }, 500);
                    }, 500);
                });
            });
            $(".datatable-akses").on("click", ".hapus-akses", function() {
                $("#modal-hapus-akses .modal-title").text("Hapus Akses : Nama Akses");
                akses_hapus.find(".loading-gif-image").removeClass("d-none");
                akses_hapus.find(".after-loading").addClass("d-none");
                $("#modal-hapus-akses").modal("show");
                var id_update = $(this).attr("data-id");
                akses_hapus.find(".id_hidden").val(id_update);
                pagename = "/akses/ajax_akses";
                GetDataById(id_update, function(resp) {
                    var resp = resp.data[0];
                    akses_hapus.find(".loading-gif-image").addClass("d-none");
                    akses_hapus.find(".after-loading").removeClass("d-none");
                    $("#modal-hapus-akses .modal-title").text("Hapus Akses : " + resp.nama);
                });
            });
            $(".datatable-akses").on("click", ".aktif-akses", function() {
                $("#modal-aktif-akses .modal-title").text("Aktifkan Akses : Nama Akses");
                akses_aktif.find(".loading-gif-image").removeClass("d-none");
                akses_aktif.find(".after-loading").addClass("d-none");
                $("#modal-aktif-akses").modal("show");
                var id_update = $(this).attr("data-id");
                akses_aktif.find(".id_hidden").val(id_update);
                pagename = "/akses/ajax_akses";
                GetDataById(id_update, function(resp) {
                    var resp = resp.data[0];
                    akses_aktif.find(".loading-gif-image").addClass("d-none");
                    akses_aktif.find(".after-loading").removeClass("d-none");
                    $("#modal-aktif-akses .modal-title").text("Aktifkan Akses : " + resp.nama);
                });
            });

            var FrmTambahAkses = $("#FrmTambahAkses").validate({
                submitHandler: function(form) {
                    laddasubmit = akses_baru.find(".ladda-button-submit");
                    InsertData(form, function(resp) {
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
            var FrmEditAkses = $("#FrmEditAkses").validate({
                submitHandler: function(form) {
                    laddasubmit = akses_edit.find(".ladda-button-submit");
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
            var FrmHapusAkses = $("#FrmHapusAkses").validate({
                submitHandler: function(form) {
                    laddasubmit = akses_hapus.find(".ladda-button-submit");
                    DeleteData(form, function(resp) {
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
            var FrmAktifAkses = $("#FrmAktifAkses").validate({
                submitHandler: function(form) {
                    laddasubmit = akses_aktif.find(".ladda-button-submit");
                    AktifData(form, function(resp) {
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
