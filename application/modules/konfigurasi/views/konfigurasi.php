<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta name="description" content="Obsido" />
        <meta name="keywords" content="Obsido Keywords">
        <meta name="author" content="Web-Izul" />
        <title>Konfigurasi</title>
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
                                <h4 class="content-header-title">&nbsp;<i data-feather="settings"></i><span>&nbsp;&nbsp;Konfigurasi</span></h4>
                            </div>
                            <div class="content-header-right col-md-8 col-12">
                                <div class="form-group float-right div-header-button">
                                    <button type="button" class="btn btn-info" onclick="location.reload();"><i class="fa fa-sync-alt" title="Refresh"></i></button>
                                    <button type="button" class="btn btn-info ladda-button ladda-button-submit after-loading d-none" data-style="slide-up" onclick="SimpanEditKonfigurasi();"><i class="fa fa-save"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form id="FrmEditKonfigurasi" class="form-horizontal form-konfigurasi" role="form" method="POST" action="/konfigurasi/ajax_konfigurasi">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <center class="loading-gif-div">
                                                        <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                                                    </center>
                                                    <div class="after-loading d-none">
                                                        <div class="row">
                                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Biaya Admin <span class="text-danger">*</span></label>
                                                                    <input required type="text" class="form-control text-right" placeholder="Biaya Admin" maxlength="19" name="form[biaya_admin]" onkeypress="return validatedata(event);">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Harga Wajar <span class="text-danger">*</span></label>
                                                                    <input required type="text" class="form-control text-right" placeholder="Harga Wajar" maxlength="19" name="form[harga_wajar]" onkeypress="return validatedata(event);">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Maksimal Foto Properti <span class="text-danger">*</span></label>
                                                                    <input required type="number" min="1" class="form-control" placeholder="Maksimal Foto Properti" name="form[maksimal_foto_properti]" onkeypress="return validatedata(event);">
                                                                </div>
                                                            </div>
                                                            <div class="offset-lg-3 offset-lg-2 col-xl-3 col-lg-4 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Batas Topup <span class="text-danger">*</span></label>
                                                                    <input required type="text" class="form-control text-right" placeholder="Batas Topup" maxlength="19" name="form[batas_topup]" onkeypress="return validatedata(event);">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Batas Investasi <span class="text-danger">*</span></label>
                                                                    <input required type="text" class="form-control text-right" placeholder="Batas Investasi" maxlength="19" name="form[batas_investasi]" onkeypress="return validatedata(event);">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Penghasilan Pertahun <span class="text-danger">*</span></label>
                                                                    <input required type="text" class="form-control text-right" placeholder="Penghasilan Pertahun" maxlength="19" name="form[penghasilan_pertahun]" onkeypress="return validatedata(event);">
                                                                </div>
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
                pagename = "/konfigurasi/ajax_konfigurasi";
                GetDataById("", function(resp) {
                    console.log(resp);
                    $("input[name='form[biaya_admin]']").val(rupiah(resp.biaya_admin[0].value));
                    $("input[name='form[harga_wajar]']").val(rupiah(resp.harga_wajar[0].value));
                    $("input[name='form[batas_topup]']").val(rupiah(resp.batas_topup[0].value));
                    $("input[name='form[batas_investasi]']").val(rupiah(resp.batas_investasi[0].value));
                    $("input[name='form[penghasilan_pertahun]']").val(rupiah(resp.penghasilan_pertahun[0].value));
                    $("input[name='form[maksimal_foto_properti]']").val(rupiah(resp.maksimal_foto_properti[0].value));
                    $(".loading-gif-div").addClass("d-none");
                    $(".after-loading").removeClass("d-none");
                });
            });


            $("input[name='form[biaya_admin]'], input[name='form[harga_wajar]'], input[name='form[batas_topup]'], input[name='form[batas_investasi]'], input[name='form[penghasilan_pertahun]']").focus(function(){
                var nominal_convert = $(this).val().replace(/\./g,"");
                $(this).val(nominal_convert);
            }).blur(function(){
                if($(this).val() <= 0){
                    $(this).val("0");
                }
                if($.isNumeric($(this).val()) == false){
                    $(this).val("0");
                } else {
                    $(this).val(rupiah(parseFloat($(this).val())));
                }
            });

            function SimpanEditKonfigurasi(){
                $("#FrmEditKonfigurasi").submit();
            }

            var FrmEditKonfigurasi = $("#FrmEditKonfigurasi").validate({
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
