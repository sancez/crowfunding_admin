<?php
    $userlogin = $this->session->userdata("user");
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta name="description" content="KTT" />
        <meta name="keywords" content="KTT">
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
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url("assets/img/favicon.ico"); ?>" />
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
                                    <button type="button" class="btn btn-info" onclick="location.reload();"><i class="fa fa-sync-alt" title="Refresh"></i></button>
                                    <button type="button" class="btn btn-info ladda-button ladda-button-submit" data-style="slide-up" onclick="SimpanEditUser();"><i class="fa fa-save"></i></button></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-edit-user">
                                    <div class="card-body loading-div-image">
                                        <center>
                                            <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                                        </center>
                                    </div>
                                    <div class="card-body after-loading d-none">
                                        <form id="FrmEditAdmin" class="form-horizontal" role="form" method="POST" action="/admin/ajax_admin">
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-6">
                                                    <div class="form-group after-loading d-none">
                                                        <label class="form-control-label">Foto</label>
                                                        <input type="file" class="form-control form-control-alternative foto" placeholder="Pas Foto">
                                                        <br class="strip-foto d-none">
                                                        <label class="loading-foto d-none"><i class="fa fa-spin fa-sync-alt"></i> </label><button style="margin:2px;" type="button" class="btn btn-sm btn-info detail-foto d-none"><i class="fa fa-external-link-alt"></i> Lihat File</button><button style="margin:2px;" type="button" class="btn btn-sm btn-danger hapus-foto d-none"><i class="fa fa-trash"></i> Hapus File</button>
                                                        <input class="foto_hidden" type="hidden" name="form[foto]" value="">
                                                    </div>
                                                    <div class="form-group after-loading d-none">
                                                        <label class="form-control-label">Nama <span class="text-danger">*</span></label>
                                                        <input required type="text" class="form-control form-control-alternative" placeholder="Nama" name="form[nama]" maxlength="255">
                                                    </div>
                                                    <div class="form-group after-loading d-none">
                                                        <label class="form-control-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                                        <select required class="form-control form-control-alternative select" name="form[jk]">
                                                            <option value="1">Laki-Laki</option>
                                                            <option value="2">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group after-loading d-none">
                                                        <label class="form-control-label">Username <span class="text-danger">*</span></label>
                                                        <input required type="text" class="form-control form-control-alternative" placeholder="Username" name="form[username]" maxlength="30">
                                                    </div>
                                                    <div class="form-group col-lg-9">
                                                        <a class="password-user" data-id=""><i class="fa fa-unlock-alt"></i> Edit Password</a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 offset-lg-2">
                                                    <div class="form-group after-loading d-none">
                                                        <label class="form-control-label">Kota Lahir <span class="text-danger">*</span></label>
                                                        <input required type="text" class="form-control form-control-alternative" placeholder="Kota Lahir" name="form[kota_lahir]" maxlength="30">
                                                    </div>
                                                    <div class="form-group after-loading d-none">
                                                        <label class="form-control-label">Tgl Lahir <span class="text-danger">*</span></label>
                                                        <input required type="text" class="form-control form-control-alternative datepicker-tgl-lahir" placeholder="Tgl Lahir" name="form[tgl_lahir]">
                                                    </div>
                                                    <div class="form-group after-loading d-none">
                                                        <label class="form-control-label">No Telp HP</label>
                                                        <input type="text" class="form-control form-control-alternative" placeholder="No Telp HP" name="form[no_telp_hp]" maxlength="20">
                                                    </div>
                                                    <div class="form-group after-loading d-none">
                                                        <label class="form-control-label">Email</label>
                                                        <input type="email" class="form-control form-control-alternative" placeholder="Email" name="form[email]" maxlength="255">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" class="id_hidden" name="form[id]">
                                            <input type="hidden" class="" name="form[session]" value="1">
                                        </form>
                                    </div>
                                    <div class="card-footer text-right after-loading d-none">
                                        <button class="btn btn-light" onclick="backAway();">Batal</button>
                                        <button type="button" class="btn btn-info ladda-button ladda-button-submit" data-style="slide-up" onclick="SimpanEditUser();"><i class="fa fa-save"></i> Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <?php $this->load->view("other/footer"); ?>
            </div>
        </div>
        <?php $this->load->view("admin/modal/admin_password"); ?>
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
            var user_profil = $(".card-edit-user");
            var post_gambar  = {"form": {"Base64": ""}};
            $(document).ready(function(){
                var id_update = "<?php echo $userlogin->id ?>";
                user_profil.find(".id_hidden").val(id_update);
                user_profil.find(".password-user").attr("data-id", id_update);
                pagename = "/admin/ajax_admin";
                GetDataById(id_update, function(resp) {
                    var resp = resp.data[0];
                    user_profil.find("input[name='form[nama]']").val(resp.nama);
                    user_profil.find("input[name='form[username]']").val(resp.username);
                    user_profil.find("input[name='form[kota_lahir]']").val(resp.kota_lahir);
                    user_profil.find("input[name='form[tgl_lahir]']").val(moment(resp.tgl_lahir).format("DD MMM YYYY"));
                    user_profil.find("input[name='form[no_telp_hp]']").val(resp.no_telp_hp);
                    user_profil.find("input[name='form[email]']").val(resp.email);
                    user_profil.find("select[name='form[jk]']").val(resp.jk);
                    if(resp.foto == "" || resp.foto == null){
                    } else {
                        user_profil.find(".detail-foto, .strip-foto, .hapus-foto").removeClass("d-none");
                        user_profil.find(".foto, .loading-foto").addClass("d-none");
                        user_profil.find("input[name='form[foto]']").val(resp.foto);
                    }
                    user_profil.find(".loading-div-image").addClass("d-none");
                    user_profil.find(".after-loading").removeClass("d-none");
                    user_profil.find("input[name='form[nama]']").focus();
                    user_profil.find(".datepicker-tgl-lahir").datepicker({
                        autoclose: true,
                        format: 'dd M yyyy'
                    });
                });
            });

            function SimpanEditUser(){
                $("#FrmEditAdmin").submit();
            }

            function SimpanPasswordAdmin(){
                $("#FrmPasswordAdmin").submit();
            }
            var FrmEditAdmin = $("#FrmEditAdmin").validate({
                submitHandler: function(form) {
                    laddasubmit = $("html").find(".ladda-button-submit");
                    UpdateData(form, function(resp) {
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
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

            function SimpanPasswordOperator(){
                $("#FrmPasswordOperator").submit();
            }
            var FrmEditOperator = $("#FrmEditOperator").validate({
                submitHandler: function(form) {
                    laddasubmit = $("html").find(".ladda-button-submit");
                    UpdateData(form, function(resp) {
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
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

            var admin_password = $("#modal-password-admin");
            $(".password-user").click(function(){
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
            var FrmPasswordAdmin = $("#FrmPasswordAdmin").validate({
                submitHandler: function(form) {
                    laddasubmit = admin_password.find(".ladda-button-submit");
                    UpdateData(form, function(resp) {

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

            user_profil.find(".foto").change(function() {
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
                                    user_profil.find(".foto_hidden").val("");
                                    user_profil.find(".foto").addClass("d-none");
                                    user_profil.find(".loading-foto").removeClass("d-none");
                                },
                                success: function(respon_file){
                                    if(respon_file.IsError != undefined) {
                                        if(respon_file.ErrorMessage[0].error != undefined) {
                                            toastrshow("warning", respon_file.ErrorMessage[0].error, "Peringatan");
                                        } else {
                                            toastrshow("warning", respon_file.ErrorMessage, "Peringatan");
                                        }
                                    } else {
                                        user_profil.find(".foto_hidden").val(respon_file.Output);
                                        user_profil.find(".detail-foto, .strip-foto, .hapus-foto").removeClass("d-none");
                                        user_profil.find(".foto").addClass("d-none");
                                        user_profil.find(".loading-foto").addClass("d-none");
                                    }
                                },
                                error: function(xhr, textstatus, errorthrown) {
                                    toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
                                    user_profil.find(".hapus-foto").click();
                                    user_profil.find(".loading-foto").addClass("d-none");
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
            user_profil.find(".hapus-foto").click(function(){
                user_profil.find(".foto_hidden").val("");
                user_profil.find(".detail-foto, .strip-foto, .hapus-foto").addClass("d-none");
                user_profil.find(".foto").val("").trigger("change");
                user_profil.find(".foto").removeClass("d-none");
            });
            user_profil.find(".detail-foto").click(function(){
                window.open(cdn_url+"/"+user_profil.find(".foto_hidden").val(), "", "width=800,height=400");
            });
        </script>
    </body>
</html>
