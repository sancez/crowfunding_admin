<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta name="description" content="Obsido" />
        <meta name="keywords" content="Obsido Keywords">
        <meta name="author" content="Web-Izul" />
        <title>Biaya Admin</title>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/app.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/components.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/@fortawesome/fontawesome-free/css/all.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/select2/select2.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/select2/select2-bootstrap.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/ladda/ladda-themeless.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/toastr/toastr.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/daterangepicker/daterangepicker.css"); ?>">
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
                                <h4 class="content-header-title">&nbsp;<i data-feather="trending-up"></i>&nbsp;&nbsp;Biaya Admin</h4>
                            </div>
                            <div class="content-header-right col-md-8 col-12">
                                <div class="form-group float-right div-header-button">
                                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target=".filter" title="Filter Data"><i class="fa fa-filter"></i></button>
                                    <button type="button" class="btn btn-info btn-pdf" title="Export PDF"><i class="fa fa-file-pdf"></i></button>
                                    <button type="button" class="btn btn-info btn-excel" title="Export Excel"><i class="fa fa-file-excel"></i></button>
                                    <button type="button" class="btn btn-info" onclick="location.reload();"><i class="fa fa-sync-alt" title="Refresh"></i></button>
                                    <div class="btn-group pagination-layout-manajemen-transaksi-biaya-admin" pagename="/manajemen_transaksi/ajax_manajemen_transaksi_biaya_admin" data-colspan="8" role="group" aria-label="Basic example">
                                        <button type="button" disabled class="btn btn-info disabled prev-head"><i class="fa fa-chevron-left"></i></button>
                                        <button type="button" disabled class="btn btn-info disabled next-head"><i class="fa fa-chevron-right"></i></button>
                                    </div>
                                </div>
                                <div class="form-group float-right div-header-search">
                                    <form id="FrmSearch">
                                        <div class="input-group input-search">
                                            <input type="text" class="form-control kywd" placeholder="Cari (No Transaksi, Properti, Perusahaan)" title="Cari (No Transaksi, Properti, Perusahaan)" aria-describedby="basic-addon2">
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
                                                        <select style="width: 100%;" class="form-control select status-verifikasi">
                                                            <option value="">Semua</option>
                                                            <option value="0">Proses</option>
                                                            <option value="1">Selesai</option>
                                                            <option value="2">Gagal</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tanggal</label>
                                                        <input type="text" class="form-control tanggal" placeholder="Tanggal">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Urutkan</label>
                                                        <select style="width: 100%;" class="form-control select sort">
                                                            <option value="id desc">Default</option>
                                                            <option value="tgl asc">Tanggal [A-Z]</option>
                                                            <option value="tgl desc">Tanggal [Z-A]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table datatable-manajemen-transaksi-biaya-admin table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 80px;" class="text-center">Aksi</th>
                                                    <th>No Transaksi</th>
                                                    <th>Tanggal</th>
                                                    <th>Biaya Administrasi</th>
                                                    <th>Total Pembayaran</th>
                                                    <th>Properti</th>
                                                    <th>Perusahaan</th>
                                                    <th style="width: 50px;" class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="8" style="padding: 10px !important;">
                                                        <center>
                                                            <img class="loading-gif-image" src="<?php echo base_url("assets/img/loading-data.gif") ?>" alt="Loading ...">
                                                        </center>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer div-pagination-bottom">
                                        <div class="pagination-layout-manajemen-transaksi-biaya-admin d-none" pagename="/manajemen_transaksi/ajax_manajemen_transaksi_biaya_admin" data-colspan="8">
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
        <?php $this->load->view("manajemen_transaksi/modal/manajemen_transaksi_biaya_admin_detail"); ?>
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
        <script src="<?php echo base_url("assets/plugins/daterangepicker/daterangepicker.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/proses.js?n=").$this->config->item("tahun_assets"); ?>"></script>
        <script>
            $("#FrmFilter .tanggal").daterangepicker({
                locale: {
                    format: "DD MMM YYYY"
                }
            });
            
            $(document).ready(function(){
                GetDataTable();
            });

            function GetDataTable(){
                var kywd = $("#FrmSearch").find(".kywd").val(), status_verifikasi = $("#FrmFilter").find(".status-verifikasi").val(), sort = $("#FrmFilter").find(".sort").val(), tanggal_periode = $("#FrmFilter").find(".tanggal").val();
                request["Page"] = 1;
                request["Sort"] = sort;
                request["Search"] = kywd;
                request["filter"]["status_verifikasi"] = status_verifikasi;
                request["filter"]["tanggal_mulai"] = moment(tanggal_periode.slice(0, 11), "DD MMM YYYY").format("YYYY-MM-DD");
                request["filter"]["tanggal_selesai"] = moment(tanggal_periode.substr(tanggal_periode.length - 11), "DD MMM YYYY").format("YYYY-MM-DD");
                pagename = "/manajemen_transaksi/ajax_manajemen_transaksi_biaya_admin";
                target_table = "manajemen-transaksi-biaya-admin";
                GetData(request,"listdatahtml",target_table,function(resp){
                    
                }, 8);
                return false;
            }

            $("#FrmSearch").submit(function() {
                GetDataTable();
                return false;
            });
            $("#FrmFilter .status-verifikasi, #FrmFilter .sort, #FrmFilter .tanggal").change(function(){
                GetDataTable();
            });

            var manajemen_transaksi_biaya_admin_detail = $("#modal-detail-manajemen-transaksi-biaya-admin");
            $(".datatable-manajemen-transaksi-biaya-admin").on("click", ".detail-manajemen-transaksi-biaya-admin", function() {
                $("#modal-detail-manajemen-transaksi-biaya-admin .modal-title").text("Detail Transaksi : Transaksi");
                manajemen_transaksi_biaya_admin_detail.find(".loading-gif-image").removeClass("d-none");
                manajemen_transaksi_biaya_admin_detail.find(".after-loading").addClass("d-none");
                $("#modal-detail-manajemen-transaksi-biaya-admin").modal("show");
                var id_update = $(this).attr("data-id");
                pagename = "/manajemen_transaksi/ajax_manajemen_transaksi_biaya_admin";
                GetDataById(id_update, function(resp) {
                    var resp = resp.data[0];
                    manajemen_transaksi_biaya_admin_detail.find(".nama-properti").text(resp.nama_properti);
                    manajemen_transaksi_biaya_admin_detail.find(".alamat").text(resp.alamat_properti);
                    manajemen_transaksi_biaya_admin_detail.find(".durasi-proyek").text(moment(resp.tgl_mulai).format("DD MMM YYYY")+" - "+moment(resp.tgl_selesai).format("DD MMM YYYY"));
                    manajemen_transaksi_biaya_admin_detail.find(".harga-saham").text("Rp "+rupiah(resp.harga_per_lembar));
                    manajemen_transaksi_biaya_admin_detail.find(".jumlah-saham").text("Rp "+rupiah(resp.jumlah_dana));
                    manajemen_transaksi_biaya_admin_detail.find(".dividen-period").text(resp.dividen_period);
                    manajemen_transaksi_biaya_admin_detail.find(".no-transaksi").text(resp.no_transaksi);
                    manajemen_transaksi_biaya_admin_detail.find(".tgl-transaksi").text(moment(resp.tgl_transaksi).format("DD MMM YYYY HH:mm:ss"));
                    manajemen_transaksi_biaya_admin_detail.find(".biaya-administrasi").text("Rp "+rupiah(resp.biaya_administrasi));
                    manajemen_transaksi_biaya_admin_detail.find(".total-pembayaran").text("Rp "+rupiah(resp.total_transaksi));
                    manajemen_transaksi_biaya_admin_detail.find(".loading-gif-image").addClass("d-none");
                    manajemen_transaksi_biaya_admin_detail.find(".after-loading").removeClass("d-none");
                    $("#modal-detail-manajemen-transaksi-biaya-admin .modal-title").text("Detail Transaksi : " + resp.no_transaksi);
                });
            });

            $(".btn-pdf").click(function(){
                var kywd = $("#FrmSearch").find(".kywd").val(), status_verifikasi = $("#FrmFilter").find(".status-verifikasi").val(), sort = $("#FrmFilter").find(".sort").val(), tanggal_periode = $("#FrmFilter").find(".tanggal").val();
                window.location.href = base_url + "/manajemen_transaksi/biaya_admin_cetak.html?sort="+sort+"&search="+kywd+"&status="+status_verifikasi+"&tanggal_mulai="+moment(tanggal_periode.slice(0, 11), "DD MMM YYYY").format("YYYY-MM-DD")+"&tanggal_selesai="+moment(tanggal_periode.substr(tanggal_periode.length - 11), "DD MMM YYYY").format("YYYY-MM-DD")+"&by="+"<?php echo $this->session->userdata("user")->nama; ?>";
            });
            $(".btn-excel").click(function(){
                var kywd = $("#FrmSearch").find(".kywd").val(), status_verifikasi = $("#FrmFilter").find(".status-verifikasi").val(), sort = $("#FrmFilter").find(".sort").val(), tanggal_periode = $("#FrmFilter").find(".tanggal").val();
                window.location.href = base_url + "/manajemen_transaksi/biaya_admin_excel.html?sort="+sort+"&search="+kywd+"&status="+status_verifikasi+"&tanggal_mulai="+moment(tanggal_periode.slice(0, 11), "DD MMM YYYY").format("YYYY-MM-DD")+"&tanggal_selesai="+moment(tanggal_periode.substr(tanggal_periode.length - 11), "DD MMM YYYY").format("YYYY-MM-DD");
            });
        </script>
    </body>
</html>
