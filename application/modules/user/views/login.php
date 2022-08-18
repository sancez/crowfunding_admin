<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta name="description" content="KTT" />
        <meta name="keywords" content="KTT">
        <meta name="author" content="Web-Izul" />
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/app.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bundles/bootstrap-social/bootstrap-social.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/style.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/components.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/@fortawesome/fontawesome-free/css/all.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/select2/select2.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/select2/select2-bootstrap.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/ladda/ladda-themeless.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/toastr/toastr.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/custom.css?n=").$this->config->item("tahun_assets"); ?>">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url("assets/img/favicon.ico"); ?>" />
    </head>
    <body class="light light-sidebar theme-white">
        <div class="loader"></div>
        <div id="app">
            <section class="section">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Login Admin</h4>
                                </div>
                                <div class="card-body">
                                    <form id="FrmUserLogin" class="form-horizontal form-simple form-user-login" role="form" method="POST" action="/user/ajax_user">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input required id="username" type="text" class="form-control" name="form[username]" autofocus placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="control-label">Password</label>
                                            <input required id="password" type="password" class="form-control" name="form[password]" placeholder="Password">
                                        </div>
                                        <div class="form-group recaptcha">
                                            <?php 
                                                echo "<center>".$this->recaptcha->getWidget()."</center>";
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info btn-lg btn-block ladda-button ladda-button-submit" data-style="slide-up" type="submit"><i class="ft-log-in"></i> Log In</button>
                                        </div>
                                        <input type="hidden" name="form[role]" value="1">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script src="<?php echo base_url("assets/js/app.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/scripts.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/validate/jquery.validate.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/select2/select2.full.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/toastr/toastr.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/spin.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/ladda.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/ladda.jquery.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/proses.js?n=").$this->config->item("tahun_assets"); ?>"></script>
        <?php echo $this->recaptcha->getScriptTag(); ?>
        <script>
            $(document).ready(function(){
                
            });

            var login = $(".form-user-login");
            var FrmUserLogin = $("#FrmUserLogin").validate({
                submitHandler: function(form) {
                    Login(form, function(resp) {
                        if(resp.IsError == true) {
                            grecaptcha.reset();
                            $("#FrmUserLogin").find("input[type=text]").filter(":first").focus();
                        }
                    });
                },
                errorPlacement: function (error, element) {
                    if (element.parent(".input-group").length) { 
                        error.insertAfter(element.parent());      // radio/checkbox?
                    } else if (element.hasClass("select2") || element.hasClass("select2")) {     
                        error.insertAfter(element.next("span"));  // select2
                    } else {                                      
                        error.insertAfter(element);               // default
                    }
                }
            });

            function Login(selectorform, successfunc) {
                successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
                laddasubmit = login.find(".ladda-button-submit");
                var captcha    = $("#g-recaptcha-response").val();
                var formdata   = $(selectorform).serialize() + "&captcha=" + captcha + "&act=login";
                $.ajax({
                    type: "POST",
                    url: base_url + "/user/ajax_user",
                    data: formdata,
                    dataType: "JSON",
                    tryCount: 0,
                    retryLimit: 3,
                    beforeSend: function() {
                        laddasubmit.ladda("start");
                    },
                    success: function(resp){
                        if(resp.IsError == false) {
                            window.location.href = base_url + "/admin.html";
                        } else {
                            laddasubmit.ladda("stop");
                            toastrshow("warning", resp.lsdt, "Peringatan");
                            /*setTimeout(function(){
                                window.location.href = base_url + "/user/login.html";
                            }, 3000);*/
                        }
                        if(successfunc != "") {
                            successfunc(resp);
                        }
                    },
                    error: function(xhr, textstatus, errorthrown) {
                        toastrshow("warning", "Login gagal, mohon periksa koneksi internet anda kembali", "Peringatan");
                        laddasubmit.ladda("stop");
                    }
                });
            }
        </script>
    </body>
</html>
