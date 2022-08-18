<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta name="description" content="Obsido" />
        <meta name="keywords" content="Obsido Keywords">
        <meta name="author" content="Web-Izul" />
        <title>Halaman Penerbit</title>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/app.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/components.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/@fortawesome/fontawesome-free/css/all.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/select2/select2.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/select2/select2-bootstrap.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/ladda/ladda-themeless.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/toastr/toastr.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/cropperjs-master/docs/css/cropper.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap-datepicker.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/custom.css?n=").$this->config->item("tahun_assets"); ?>">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url("assets/img/favicon.png"); ?>" />
        <style>
            .btn-delete-image{
                position: absolute;
                bottom: -1px;
                right: -1px;
            }
            @media (min-width: 1200px){
                .modal-crop {
                    max-width: 96%;
                }
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
                                <h4 class="content-header-title">&nbsp;<i data-feather="edit"></i><span>&nbsp;&nbsp;Halaman Penerbit</span></h4>
                            </div>
                            <div class="content-header-right col-md-8 col-12">
                                <div class="form-group float-right div-header-button">
                                    <button type="button" class="btn btn-info" onclick="location.reload();"><i class="fa fa-sync-alt" title="Refresh"></i></button>
                                    <button type="button" class="btn btn-info ladda-button ladda-button-submit after-loading d-none" data-style="slide-up" onclick="SimpanEditDaftarPenerbit();"><i class="fa fa-save"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form id="FrmEditDaftarPenerbit" class="form-horizontal form-daftar-penerbit-edit" role="form" method="POST" action="/manajemen_konten/ajax_manajemen_konten_daftar_penerbit">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <center class="loading-gif-div">
                                                        <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                                                    </center>
                                                    <div class="after-loading d-none">
                                                        <div class="row">
                                                            <div class="col-12"><h3>Gambar 1</h3></div>
                                                            <div class="col-12 div-input-image-1" style="width: 100%;">
                                                                <div class="btn-image-1 text-primary text-center" style="font-size: 50px; padding-top: 20px; padding-bottom: 20px; cursor: pointer; border: 1px solid #3abaf4;"><i class="fa fa-plus text-info"></i></div>
                                                                <input type="hidden" name="form[gambar_1]">
                                                            </div>
                                                            <div class="col-12 div-output-image-1 d-none" style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-5">
                                                            <div class="col-12"><h3>Gambar 2</h3></div>
                                                            <div class="col-12 div-input-image-2" style="width: 100%;">
                                                                <div class="btn-image-2 text-primary text-center" style="font-size: 50px; padding-top: 20px; padding-bottom: 20px; cursor: pointer; border: 1px solid #3abaf4;"><i class="fa fa-plus text-info"></i></div>
                                                                <input type="hidden" name="form[gambar_2]">
                                                            </div>
                                                            <div class="col-12 div-output-image-2 d-none" style="width: 100%;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
                <?php $this->load->view("other/footer"); ?>
            </div>
        </div>
        <?php $this->load->view("tool/modal/upload_foto"); ?>
        <?php $this->load->view("tool/modal/konfirmasi_hapus_html"); ?>
        <?php $this->load->view("tool/modal/tag_gambar_html"); ?>
        <div class="modal fade" id="modal-crop" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-crop" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Potong Gambar</h5>
                        <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="img-container"> <img id="image" src="https://avatars0.githubusercontent.com/u/3456749"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-info" id="crop">Potong</button>
                    </div>
                </div>
            </div>
        </div>
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
        <script src="<?php echo base_url("assets/plugins/cropperjs-master/docs/js/cropper.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/proses.js?n=").$this->config->item("tahun_assets"); ?>"></script>
        <script>
            var html_tag_delete = "";
            var html_tag_gambar = "";
            var post_gambar  = {"form": {"Base64": ""}};
            var target_edit = "";
            $(document).ready(function(){
                pagename = "/manajemen_konten/ajax_manajemen_konten_daftar_penerbit";
                GetDataById("", function(resp) {
                    var data_gambar_1 = resp.data_gambar_1[0].value;
                    var data_gambar_2 = resp.data_gambar_2[0].value;
                    $(".div-output-image-1").html("<img style='width: 100%;' src='"+cdn_url+"/"+data_gambar_1+"'><a class='btn btn-danger btn-delete-image btn-delete-image-1 text-white'><i class='fa fa-times'></i></a>");
                    $(".div-input-image-1").addClass("d-none");
                    $(".div-output-image-1").removeClass("d-none");
                    $("input[name='form[gambar_1]']").val(data_gambar_1);

                    $(".div-output-image-2").html("<img style='width: 100%;' src='"+cdn_url+"/"+data_gambar_2+"'><a class='btn btn-danger btn-delete-image btn-delete-image-2 text-white'><i class='fa fa-times'></i></a>");
                    $(".div-input-image-2").addClass("d-none");
                    $(".div-output-image-2").removeClass("d-none");
                    $("input[name='form[gambar_2]']").val(data_gambar_2);

                    $(".loading-gif-div").addClass("d-none");
                    $(".after-loading").removeClass("d-none");
                });
            });

            function SimpanEditDaftarPenerbit(){
                $("#FrmEditDaftarPenerbit").submit();
            }

            var FrmEditDaftarPenerbit = $("#FrmEditDaftarPenerbit").validate({
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

            var upload_foto = $("#modal-upload-foto");
            var tag_gambar_html = $("#modal-tag-gambar-html");
            $(".div-image-tambah").click(function(){
                upload_foto.find(".btn-unggah-foto").addClass("disabled").attr("disabled", "disabled");
                $("#modal-upload-foto").modal("show");
                upload_foto.find(".hapus-foto").click();
            });

            $(".row-image-judul").on("click", ".btn-delete-image", function() {
                html_tag_delete = $(this).parent();
                $("#modal-konfirmasi-hapus-html").modal("show");
            });
            $(".btn-hapus-html").click(function(){
                $("#modal-konfirmasi-hapus-html").modal("hide");
                html_tag_delete.remove();
                $(".row-image-judul").css("width", ($(".div-image-judul").length*246)+"px");
                if(($(".div-image-judul").length*246) > $(".div-overflow-image-judul").width()){
                    $(".div-overflow-image-judul").css("overflow-x", "scroll");
                } else {
                    $(".div-overflow-image-judul").css("overflow-x", "hidden");
                }
                if($(".div-image-data").length < parseInt(5)){
                    $(".div-image-tambah").removeClass("d-none").addClass("d-inline");
                } else {
                    $(".div-image-tambah").addClass("d-none").removeClass("d-inline");
                }
                //CheckTableProgress();
            });
            upload_foto.find(".foto").change(function() {
                var selector = $(this);
                if (this.files && this.files[0]) {
                    var tipefile = this.files[0].type.toString();
                    var filename = this.files[0].name.toString();
                    var tipefile_array = filename.split(".");
                    var tipefile_data = "."+tipefile_array[tipefile_array.length-1];
                    var tipe = ['image/png',  'image/x-png', 'image/jpeg', 'image/pjpeg', 'image/svg+xml'];
                    if(tipe.indexOf(tipefile) == -1) {
                        $(this).val("");
                        toastrshow("warning", "Format salah, pilih file dengan format png/jpg/jpeg/svg", "Peringatan");
                        return;
                    }
                    if((this.files[0].size / 1024) < 5210){
                        var FR = new FileReader();
                        FR.addEventListener("load", function(e) {
                            //var base64 = e.target.result;
                            var base64 = e.target.result.replace("data:"+tipefile+";base64,", '');
                            var ext = filename.split(".").pop();
                        }); 
                        FR.readAsDataURL(this.files[0]);
                        $('#modal-crop').modal('show');
                    } else {
                        $(this).val("");
                        toastrshow("warning", "Ukuran file maksimum adalah 5 MB", "Warning");
                    }
                }
            });
            upload_foto.find(".hapus-foto").click(function(){
                upload_foto.find(".foto_hidden").val("");
                upload_foto.find(".detail-foto, .strip-foto, .hapus-foto").addClass("d-none");
                upload_foto.find(".foto").val("").trigger("change");
                upload_foto.find(".foto").removeClass("d-none");
            });
            upload_foto.find(".detail-foto").click(function(){
                // window.open(cdn_url+"/"+upload_foto.find(".foto_hidden").val(), "", "width=800,height=400");
                OpenImage(cdn_url+"/"+upload_foto.find(".foto_hidden").val());
            });
            upload_foto.find(".btn-unggah-foto").click(function(){
                $("#modal-upload-foto").modal("hide");
                if(target_edit == "gambar_1"){
                    $(".div-input-image-1").addClass("d-none");
                    $(".div-output-image-1").html("<img style='width: 100%;' src='"+cdn_url+"/"+upload_foto.find(".foto_hidden").val()+"'><a class='btn btn-danger btn-delete-image btn-delete-image-1 text-white'><i class='fa fa-times'></i></a>");
                    $(".div-output-image-1").removeClass("d-none");
                    $("input[name='form[gambar_1]']").val(upload_foto.find(".foto_hidden").val());
                } else {
                    $(".div-input-image-2").addClass("d-none");
                    $(".div-output-image-2").html("<img style='width: 100%;' src='"+cdn_url+"/"+upload_foto.find(".foto_hidden").val()+"'><a class='btn btn-danger btn-delete-image btn-delete-image-2 text-white'><i class='fa fa-times'></i></a>");
                    $(".div-output-image-2").removeClass("d-none");
                    $("input[name='form[gambar_2]']").val(upload_foto.find(".foto_hidden").val());
                }
            });

            $(".btn-image-1").click(function(){
                target_edit = "gambar_1";
                $("#modal-upload-foto").modal("show");
                upload_foto.find(".hapus-foto").click();
            });
            $(".btn-image-2").click(function(){
                target_edit = "gambar_2";
                $("#modal-upload-foto").modal("show");
                upload_foto.find(".hapus-foto").click();
            });


            $("html").on("click", ".btn-delete-image-1", function() {
                $(".div-input-image-1").removeClass("d-none");
                $(".div-output-image-1").html("");
                $(".div-output-image-1").addClass("d-none");
                $("input[name='form[gambar_1]']").val("");
            });
            $("html").on("click", ".btn-delete-image-2", function() {
                $(".div-input-image-2").removeClass("d-none");
                $(".div-output-image-2").html("");
                $(".div-output-image-2").addClass("d-none");
                $("input[name='form[gambar_2]']").val("");
            });

            window.addEventListener('DOMContentLoaded', function() {
                var avatar = document.getElementById('avatar');
                var image = document.getElementById('image');
                var input = document.getElementById('upload-foto');
                var $modal = $('#modal-crop');
                var cropper;
                $('[data-toggle="tooltip"]').tooltip();
                input.addEventListener('change', function(e) {
                    var files = e.target.files;
                    var done = function(url) {
                        input.value = '';
                        image.src = url;
                        // $modal.modal('show');
                    };
                    var reader;
                    var file;
                    var url;
                    if(files && files.length > 0) {
                        file = files[0];
                        if(URL) {
                            done(URL.createObjectURL(file));
                        } else if(FileReader) {
                            reader = new FileReader();
                            reader.onload = function(e) {
                                done(reader.result);
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                });
                $modal.on('shown.bs.modal', function() {
                    if(target_edit == "gambar_1"){
                        cropper = new Cropper(image, {
                            aspectRatio: 1.5,
                            viewMode: 2,
                        });
                    } else {
                        cropper = new Cropper(image, {
                            aspectRatio: 4.0,
                            viewMode: 2,
                        });
                    }
                }).on('hidden.bs.modal', function() {
                    cropper.destroy();
                    cropper = null;
                });
                document.getElementById('crop').addEventListener('click', function() {
                    var initialAvatarURL;
                    var canvas;
                    $modal.modal('hide');
                    if(cropper) {
                        if(target_edit == "gambar_1"){
                            canvas = cropper.getCroppedCanvas({
                                width: 1200,
                                height: 800,
                            });
                        } else {
                            canvas = cropper.getCroppedCanvas({
                                width: 1200,
                                height: 300,
                            });
                        }
                        var base64 = canvas.toDataURL().replace("data:"+"image/png"+";base64,", '');
                        post_gambar["form"]["Base64"] = base64;
                        post_gambar["form"]["Ext"] = "png";
                        $.ajax({
                            type: "POST",
                            url: base_url + "/tool/ajax_tool",
                            data: {act:"upload_file", form:post_gambar},
                            dataType: "JSON",
                            tryCount: 0,
                            retryLimit: 3,
                            beforeSend: function(){
                                upload_foto.find(".foto_hidden").val("");
                                upload_foto.find(".foto").addClass("d-none");
                                upload_foto.find(".loading-foto").removeClass("d-none");
                                upload_foto.find(".btn-unggah-foto").addClass("disabled").attr("disabled", "disabled");
                            },
                            success: function(respon_file){
                                if(respon_file.IsError != undefined) {
                                    if(respon_file.ErrorMessage[0].error != undefined) {
                                        toastrshow("warning", respon_file.ErrorMessage[0].error, "Peringatan");
                                    } else {
                                        toastrshow("warning", respon_file.ErrorMessage, "Peringatan");
                                    }
                                } else {
                                    upload_foto.find(".foto_hidden").val(respon_file.Output);
                                    upload_foto.find(".detail-foto, .strip-foto, .hapus-foto").removeClass("d-none");
                                    upload_foto.find(".foto").addClass("d-none");
                                    upload_foto.find(".loading-foto").addClass("d-none");
                                    upload_foto.find(".btn-unggah-foto").removeClass("disabled").removeAttr("disabled");
                                }
                            },
                            error: function(xhr, textstatus, errorthrown) {
                                toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
                                upload_foto.find(".hapus-foto").click();
                                upload_foto.find(".loading-foto").addClass("d-none");
                            }
                        });
                    }
                });
            });
            function OpenImage(data_image){
                console.log(data_image);
                html_tag_gambar = "<img src='"+data_image+"' style='width: 100%; height: auto;'>";
                tag_gambar_html.find(".div-detail-gambar").html(html_tag_gambar);
                $("#modal-tag-gambar-html").modal("show");
            }
        </script>
    </body>
</html>
