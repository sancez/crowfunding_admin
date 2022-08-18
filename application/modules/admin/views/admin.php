<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta name="description" content="Obsido" />
        <meta name="keywords" content="Obsido Keywords">
        <meta name="author" content="Web-Izul" />
        <title>Admin</title>
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
                                <h4 class="content-header-title">&nbsp;<i class="far fa-user" style="font-size: 23px;"></i>&nbsp;&nbsp;Admin</h4>
                            </div>
                            <div class="content-header-right col-md-8 col-12">
                                <div class="form-group float-right div-header-button">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-tambah-admin" title="Tambah Data"><i class="fa fa-plus"></i></button>
                                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target=".filter" title="Filter Data"><i class="fa fa-filter"></i></button>
                                    <button type="button" class="btn btn-info" onclick="location.reload();"><i class="fa fa-sync-alt" title="Refresh"></i></button>
                                    <div class="btn-group pagination-layout-admin" pagename="/admin/ajax_admin" data-colspan="11" role="group" aria-label="Basic example">
                                        <button type="button" disabled class="btn btn-info disabled prev-head"><i class="fa fa-chevron-left"></i></button>
                                        <button type="button" disabled class="btn btn-info disabled next-head"><i class="fa fa-chevron-right"></i></button>
                                    </div>
                                </div>
                                <div class="form-group float-right div-header-search">
                                    <form id="FrmSearch">
                                        <div class="input-group input-search">
                                            <input type="text" class="form-control kywd" placeholder="Cari (Nama, Username, No Telp HP, Email, Kota Lahir)" title="Cari (Nama, Username, No Telp HP, Email, Kota Lahir)" aria-describedby="basic-addon2">
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
                                                        <label>Akses</label>
                                                        <select style="width: 100%;" class="form-control select2 dropdown-akses">
                                                            <option value="">Pilih Akses</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <select style="width: 100%;" class="form-control select jk">
                                                            <option value="">Semua</option>
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
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
                                                            <option value="username asc">Username [A-Z]</option>
                                                            <option value="username desc">Username [Z-A]</option>
                                                            <option value="email asc">Email [A-Z]</option>
                                                            <option value="email desc">Email [Z-A]</option>
                                                            <option value="kota_lahir asc">Kota Lahir [A-Z]</option>
                                                            <option value="kota_lahir desc">Kota Lahir [Z-A]</option>
                                                            <option value="tgl_lahir asc">Tgl Lahir [A-Z]</option>
                                                            <option value="tgl_lahir desc">Tgl Lahir [Z-A]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table datatable-admin table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 80px;" class="text-center">Aksi</th>
                                                    <th style="width: 70px;" class="text-center">Foto</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Kota Lahir</th>
                                                    <th>Jabatan</th>
                                                    <th>Akses</th>
                                                    <th style="width: 110px;">Tgl Lahir</th>
                                                    <th style="width: 50px;" class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="11" style="padding: 10px !important;">
                                                        <center>
                                                            <img class="loading-gif-image" src="<?php echo base_url("assets/img/loading-data.gif") ?>" alt="Loading ...">
                                                        </center>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer div-pagination-bottom">
                                        <div class="pagination-layout-admin d-none" pagename="/admin/ajax_admin" data-colspan="11">
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
        <?php $this->load->view("admin/modal/admin_tambah"); ?>
        <?php $this->load->view("admin/modal/admin_edit"); ?>
        <?php $this->load->view("admin/modal/admin_password"); ?>
        <?php $this->load->view("admin/modal/admin_hapus"); ?>
        <?php $this->load->view("admin/modal/admin_aktif"); ?>
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
                GetDropdownAkses();
                GetDataTable();
            });

            function GetDataTable(){
                var kywd = $("#FrmSearch").find(".kywd").val(), id_akses = $("#FrmFilter").find(".dropdown-akses").val(), jk = $("#FrmFilter").find(".jk").val(), status_delete = $("#FrmFilter").find(".status-delete").val(), sort = $("#FrmFilter").find(".sort").val();
                request["Page"] = 1;
                request["Sort"] = sort;
                request["Search"] = kywd;
                request["filter"]["id_akses"] = id_akses;
                request["filter"]["jk"] = jk;
                request["filter"]["status_delete"] = status_delete;
                pagename = "/admin/ajax_admin";
                target_table = "admin";
                GetData(request,"listdatahtml",target_table,function(resp){
                    
                }, 11);
                return false;
            }
            $(".datatable-admin").on("click", ".zoom-foto", function() {
                window.open($(this).find("img").attr("src"), "", "width=800,height=400");
            });

            $("#FrmSearch").submit(function() {
                GetDataTable();
                return false;
            });
            $("#FrmFilter .dropdown-akses, #FrmFilter .jk, #FrmFilter .status-delete, #FrmFilter .sort").change(function(){
                GetDataTable();
            });

            function SimpanTambahAdmin(){
                $("#FrmTambahAdmin").submit();
            }
            function SimpanEditAdmin(){
                $("#FrmEditAdmin").submit();
            }
            function SimpanPasswordAdmin(){
                $("#FrmPasswordAdmin").submit();
            }

            var admin_baru = $("#modal-tambah-admin");
            var admin_edit = $("#modal-edit-admin");
            var admin_password = $("#modal-password-admin");
            var admin_hapus = $("#modal-hapus-admin");
            var admin_aktif = $("#modal-aktif-admin");
            admin_baru.find(".datepicker-tgl-lahir").datepicker({
                autoclose: true,
                format: 'dd M yyyy'
            });
            admin_edit.find(".datepicker-tgl-lahir").datepicker({
                autoclose: true,
                format: 'dd M yyyy'
            });
            admin_baru.find(".datepicker-tgl-lahir").focus(function(){
                $(this).blur();
            });
            admin_edit.find(".datepicker-tgl-lahir").focus(function(){
                $(this).blur();
            });
            $("#modal-tambah-admin").on('show.bs.modal', function () {
                if(($("#modal-tambah-admin").data('bs.modal') || {})._isShown){

                } else {
                    admin_baru.find(".hapus-foto").click();
                    admin_baru.find("input[name='form[nama]'], input[name='form[niy]'], input[name='form[username]'], input[name='form[password]'], input[name='form[kota_lahir]'], input[name='form[tgl_lahir]'], input[name='form[no_telp_hp]'], input[name='form[email]'], input[name='form[jabatan]']").val("");
                    admin_baru.find("select[name='form[jk]']").val("Laki-Laki").trigger("change");
                    admin_baru.find("select[name='form[id_akses]']").val("").trigger("change");
                    $("#modal-tambah-admin").on('shown.bs.modal', function () {
                        admin_baru.find("input[name='form[nama]']").focus();
                    });
                }
                
            });
            $(".datatable-admin").on("click", ".edit-admin", function() {
                admin_edit.find(".hapus-foto").click();
                $("#modal-edit-admin .modal-title").text("Edit Admin : Nama Admin");
                admin_edit.find(".loading-gif-image").removeClass("d-none");
                admin_edit.find(".after-loading").addClass("d-none");
                $("#modal-edit-admin").modal("show");
                var id_update = $(this).attr("data-id");
                admin_edit.find(".id_hidden").val(id_update);
                pagename = "/admin/ajax_admin";
                GetDataById(id_update, function(resp) {
                    var resp = resp.data[0];
                    admin_edit.find("input[name='form[nama]']").val(resp.nama);
                    admin_edit.find("input[name='form[niy]']").val(resp.niy);
                    admin_edit.find("input[name='form[username]']").val(resp.username);
                    admin_edit.find("input[name='form[kota_lahir]']").val(resp.kota_lahir);
                    admin_edit.find("input[name='form[tgl_lahir]']").val(moment(resp.tgl_lahir).format("DD MMM YYYY"));
                    admin_edit.find("input[name='form[no_telp_hp]']").val(resp.no_telp_hp);
                    admin_edit.find("input[name='form[email]']").val(resp.email);
                    admin_edit.find("input[name='form[jabatan]']").val(resp.jabatan);
                    admin_edit.find("select[name='form[jk]']").val(resp.jk).trigger("change");
                    admin_edit.find("select[name='form[id_akses]']").val(resp.id_akses).trigger("change");
                    if(resp.foto == "" || resp.foto == null){
                    } else {
                        admin_edit.find(".detail-foto, .strip-foto, .hapus-foto").removeClass("d-none");
                        admin_edit.find(".foto, .loading-foto").addClass("d-none");
                        admin_edit.find("input[name='form[foto]']").val(resp.foto);
                    }
                    admin_edit.find("input[name='form[tgl_lahir]']").datepicker({
                        autoclose: true,
                        format: 'dd M yyyy'
                    });
                    admin_edit.find(".loading-gif-image").addClass("d-none");
                    admin_edit.find(".after-loading").removeClass("d-none");
                    admin_edit.find("input[name='form[nama]']").focus();
                    $("#modal-edit-admin .modal-title").text("Edit Admin : " + resp.nama);
                });
            });
            $(".datatable-admin, #FrmEditAdmin").on("click", ".password-admin", function() {
                $("#modal-password-admin .modal-title").text("Edit Admin : Nama Admin");
                admin_password.find(".loading-gif-image").removeClass("d-none");
                admin_password.find(".after-loading").addClass("d-none");
                $("#modal-password-admin").modal("show");
                var id_update = $(this).attr("data-id");
                admin_password.find(".id_hidden").val(id_update);
                pagename = "/admin/ajax_admin";
                GetDataById(id_update, function(resp) {
                    var resp = resp.data[0];
                    admin_password.find("input[name='form[password]']").val("");
                    admin_password.find(".loading-gif-image").addClass("d-none");
                    admin_password.find(".after-loading").removeClass("d-none");
                    admin_password.find("input[name='form[password]']").focus();
                    $("#modal-password-admin .modal-title").text("Edit Admin : " + resp.nama);
                });
            });
            $(".datatable-admin").on("click", ".hapus-admin", function() {
                $("#modal-hapus-admin .modal-title").text("Hapus Admin : Nama Admin");
                admin_hapus.find(".loading-gif-image").removeClass("d-none");
                admin_hapus.find(".after-loading").addClass("d-none");
                $("#modal-hapus-admin").modal("show");
                var id_update = $(this).attr("data-id");
                admin_hapus.find(".id_hidden").val(id_update);
                pagename = "/admin/ajax_admin";
                GetDataById(id_update, function(resp) {
                    var resp = resp.data[0];
                    admin_hapus.find(".loading-gif-image").addClass("d-none");
                    admin_hapus.find(".after-loading").removeClass("d-none");
                    $("#modal-hapus-admin .modal-title").text("Hapus Admin : " + resp.nama);
                });
            });
            $(".datatable-admin").on("click", ".aktif-admin", function() {
                $("#modal-aktif-admin .modal-title").text("Aktifkan Admin : Nama Admin");
                admin_aktif.find(".loading-gif-image").removeClass("d-none");
                admin_aktif.find(".after-loading").addClass("d-none");
                $("#modal-aktif-admin").modal("show");
                var id_update = $(this).attr("data-id");
                admin_aktif.find(".id_hidden").val(id_update);
                pagename = "/admin/ajax_admin";
                GetDataById(id_update, function(resp) {
                    var resp = resp.data[0];
                    admin_aktif.find(".loading-gif-image").addClass("d-none");
                    admin_aktif.find(".after-loading").removeClass("d-none");
                    $("#modal-aktif-admin .modal-title").text("Aktifkan Admin : " + resp.nama);
                });
            });

            var FrmTambahAdmin = $("#FrmTambahAdmin").validate({
                submitHandler: function(form) {
                    laddasubmit = admin_baru.find(".ladda-button-submit");
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
            var FrmEditAdmin = $("#FrmEditAdmin").validate({
                submitHandler: function(form) {
                    laddasubmit = admin_edit.find(".ladda-button-submit");
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
            var FrmPasswordAdmin = $("#FrmPasswordAdmin").validate({
                submitHandler: function(form) {
                    laddasubmit = admin_password.find(".ladda-button-submit");
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
            var FrmHapusAdmin = $("#FrmHapusAdmin").validate({
                submitHandler: function(form) {
                    laddasubmit = admin_hapus.find(".ladda-button-submit");
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
            var FrmAktifAdmin = $("#FrmAktifAdmin").validate({
                submitHandler: function(form) {
                    laddasubmit = admin_aktif.find(".ladda-button-submit");
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

            admin_baru.find(".foto").change(function() {
                var selector = $(this);
                if (this.files && this.files[0]) {
                    var tipefile = this.files[0].type.toString();
                    var filename = this.files[0].name.toString();
                    var tipe = ['image/png',  'image/x-png', 'image/jpeg', 'image/pjpeg'];
                    if(tipe.indexOf(tipefile) == -1) {
                        $(this).val("");
                        toastrshow("warning", "Format salah, pilih file dengan format png/jpg/jpeg", "Peringatan");
                        return;
                    }
                    if((this.files[0].size / 1024) < 2048){
                        var FR = new FileReader();
                        FR.addEventListener("load", function(e) {
                            //var base64 = e.target.result;
                            var base64 = e.target.result.replace("data:"+tipefile+";base64,", '');
                            var ext = filename.split(".").pop();
                            post_gambar["form"]["Base64"] = base64;
                            post_gambar["form"]["Ext"] = ext;
                            console.log(post_gambar);
                            $.ajax({
                                type: "POST",
                                url: base_url + "/tool/ajax_tool",
                                data: {act:"upload_file", form:post_gambar},
                                dataType: "JSON",
                                tryCount: 0,
                                retryLimit: 3,
                                beforeSend: function(){
                                    admin_baru.find(".foto_hidden").val("");
                                    admin_baru.find(".foto").addClass("d-none");
                                    admin_baru.find(".loading-foto").removeClass("d-none");
                                },
                                success: function(respon_file){
                                    if(respon_file.IsError != undefined) {
                                        if(respon_file.ErrorMessage[0].error != undefined) {
                                            toastrshow("warning", respon_file.ErrorMessage[0].error, "Peringatan");
                                        } else {
                                            toastrshow("warning", respon_file.ErrorMessage, "Peringatan");
                                        }
                                    } else {
                                        admin_baru.find(".foto_hidden").val(respon_file.Output);
                                        admin_baru.find(".detail-foto, .strip-foto, .hapus-foto").removeClass("d-none");
                                        admin_baru.find(".foto").addClass("d-none");
                                        admin_baru.find(".loading-foto").addClass("d-none");
                                    }
                                },
                                error: function(xhr, textstatus, errorthrown) {
                                    toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
                                    admin_baru.find(".hapus-foto").click();
                                    admin_baru.find(".loading-foto").addClass("d-none");
                                }
                            });
                        }); 
                        FR.readAsDataURL(this.files[0]);
                    } else {
                        $(this).val("");
                        toastrshow("warning", "Ukuran file maksimum adalah 2 MB", "Warning");
                    }
                }
            });
            admin_baru.find(".hapus-foto").click(function(){
                admin_baru.find(".foto_hidden").val("");
                admin_baru.find(".detail-foto, .strip-foto, .hapus-foto").addClass("d-none");
                admin_baru.find(".foto").val("").trigger("change");
                admin_baru.find(".foto").removeClass("d-none");
            });
            admin_baru.find(".detail-foto").click(function(){
                window.open(cdn_url+"/"+admin_baru.find(".foto_hidden").val(), "", "width=800,height=400");
            });
            admin_edit.find(".foto").change(function() {
                var selector = $(this);
                if (this.files && this.files[0]) {
                    var tipefile = this.files[0].type.toString();
                    var filename = this.files[0].name.toString();
                    var tipe = ['image/png',  'image/x-png', 'image/jpeg', 'image/pjpeg'];
                    if(tipe.indexOf(tipefile) == -1) {
                        $(this).val("");
                        toastrshow("warning", "Format salah, pilih file dengan format png/jpg/jpeg", "Peringatan");
                        return;
                    }
                    if((this.files[0].size / 1024) < 2048){
                        var FR = new FileReader();
                        FR.addEventListener("load", function(e) {
                            //var base64 = e.target.result;
                            var base64 = e.target.result.replace("data:"+tipefile+";base64,", '');
                            var ext = filename.split(".").pop();
                            post_gambar["form"]["Base64"] = base64;
                            post_gambar["form"]["Ext"] = ext;
                            console.log(post_gambar);
                            $.ajax({
                                type: "POST",
                                url: base_url + "/tool/ajax_tool",
                                data: {act:"upload_file", form:post_gambar},
                                dataType: "JSON",
                                tryCount: 0,
                                retryLimit: 3,
                                beforeSend: function(){
                                    admin_edit.find(".foto_hidden").val("");
                                    admin_edit.find(".foto").addClass("d-none");
                                    admin_edit.find(".loading-foto").removeClass("d-none");
                                },
                                success: function(respon_file){
                                    if(respon_file.IsError != undefined) {
                                        if(respon_file.ErrorMessage[0].error != undefined) {
                                            toastrshow("warning", respon_file.ErrorMessage[0].error, "Peringatan");
                                        } else {
                                            toastrshow("warning", respon_file.ErrorMessage, "Peringatan");
                                        }
                                    } else {
                                        admin_edit.find(".foto_hidden").val(respon_file.Output);
                                        admin_edit.find(".detail-foto, .strip-foto, .hapus-foto").removeClass("d-none");
                                        admin_edit.find(".foto").addClass("d-none");
                                        admin_edit.find(".loading-foto").addClass("d-none");
                                    }
                                },
                                error: function(xhr, textstatus, errorthrown) {
                                    toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
                                    admin_edit.find(".hapus-foto").click();
                                    admin_edit.find(".loading-foto").addClass("d-none");
                                }
                            });
                        }); 
                        FR.readAsDataURL(this.files[0]);
                    } else {
                        $(this).val("");
                        toastrshow("warning", "Ukuran file maksimum adalah 2 MB", "Warning");
                    }
                }
            });
            admin_edit.find(".hapus-foto").click(function(){
                admin_edit.find(".foto_hidden").val("");
                admin_edit.find(".detail-foto, .strip-foto, .hapus-foto").addClass("d-none");
                admin_edit.find(".foto").val("").trigger("change");
                admin_edit.find(".foto").removeClass("d-none");
            });
            admin_edit.find(".detail-foto").click(function(){
                window.open(cdn_url+"/"+admin_edit.find(".foto_hidden").val(), "", "width=800,height=400");
            });
        </script>
    </body>
</html>
