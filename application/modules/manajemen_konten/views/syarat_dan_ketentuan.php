<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta name="description" content="Obsido" />
        <meta name="keywords" content="Obsido Keywords">
        <meta name="author" content="Web-Izul" />
        <title>Syarat & Ketentuan</title>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/app.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/components.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/@fortawesome/fontawesome-free/css/all.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/select2/select2.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/select2/select2-bootstrap.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/ladda/ladda-themeless.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/toastr/toastr.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/summernote/summernote-bs4.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap-datepicker.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/custom.css?n=").$this->config->item("tahun_assets"); ?>">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url("assets/img/favicon.png"); ?>" />
        <style>
            .modal-backdrop{
                position: relative;
            }
            .modal-dialog{
                margin-top: 100px;
            }
            .form-group.note-form-group.note-group-select-from-files{
                display: none;
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
                                <h4 class="content-header-title">&nbsp;<i data-feather="edit"></i><span>&nbsp;&nbsp;Syarat dan Ketentuan</span></h4>
                            </div>
                            <div class="content-header-right col-md-8 col-12">
                                <div class="form-group float-right div-header-button">
                                    <button type="button" class="btn btn-info" onclick="location.reload();"><i class="fa fa-sync-alt" title="Refresh"></i></button>
                                    <button type="button" class="btn btn-info ladda-button ladda-button-submit after-loading d-none" data-style="slide-up" onclick="SimpanEditSyaratDanKetentuan();"><i class="fa fa-save"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form id="FrmEditSyaratDanKetentuan" class="form-horizontal form-syarat-dan-ketentuan-edit" role="form" method="POST" action="/manajemen_konten/ajax_manajemen_konten_syarat_dan_ketentuan">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <center class="loading-gif-div">
                                                        <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                                                    </center>
                                                    <div class="after-loading d-none">
                                                        <div class="mb-3 terakhir-diperbarui"></div>
                                                        <div id="summernote-syarat-dan-ketentuan"></div>
                                                        <input type="hidden" name="form[value]">
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
        <script src="<?php echo base_url("assets/plugins/summernote/summernote-bs4.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/proses.js?n=").$this->config->item("tahun_assets"); ?>"></script>
        <script>
            $(document).ready(function(){
                pagename = "/manajemen_konten/ajax_manajemen_konten_syarat_dan_ketentuan";
                GetDataById("", function(resp) {
                    var resp = resp.data[0];
                    var resp_summernote = resp.value.replace(/=\\"/g, "=\"").replace(/\\"/g, "\"");
                    $(".terakhir-diperbarui").html("Terakhir diperbarui <b>"+moment(resp.updated_at).format("DD MMM YYYY HH:mm:ss")+"</b> oleh <b>"+resp.updated_by+"</b>")
                    $("#summernote-syarat-dan-ketentuan").html(resp_summernote);
                    $("#summernote-syarat-dan-ketentuan").summernote({
                        placeholder: "Syarat dan Ketentuan",
                        tabsize: 2,
                        height: 500,
                        disableDragAndDrop: true,
                        callbacks: {
                            onPaste: function (e) {
                                var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                                e.preventDefault();
                                document.execCommand('insertText', false, bufferText);
                            }
                        }
                    });
                    $(".loading-gif-div").addClass("d-none");
                    $(".after-loading").removeClass("d-none");
                });
            });

            function SimpanEditSyaratDanKetentuan(){
                var data_summernote_value = $("#summernote-syarat-dan-ketentuan").parent().find(".note-editable").html();
                $("input[name='form[value]']").val(data_summernote_value);
                $("#FrmEditSyaratDanKetentuan").submit();
            }

            var FrmEditSyaratDanKetentuan = $("#FrmEditSyaratDanKetentuan").validate({
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
        </script>
    </body>
</html>
