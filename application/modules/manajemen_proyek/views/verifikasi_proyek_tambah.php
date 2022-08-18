<?php
    $maksimal_foto_properti = $this->session->userdata("maksimal_foto_properti");
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta name="description" content="Obsido" />
        <meta name="keywords" content="Obsido Keywords">
        <meta name="author" content="Web-Izul" />
        <title>Tambah Proyek</title>
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
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <style>
            .table thead th {
                vertical-align: middle;
                border-bottom: 2px solid #dee2e6;
            }
            .form-control {
                height: 40px;
            }
            .tab-header{
                font-size: 29px;
                font-weight: 600;
            }
            .tab-header.active{
                border-bottom: 4px solid #0084ff;
                color: #0084ff !important;
            }
            .input-group-text{
                border: 1px solid #ced4da;
            }
            .table-dokumen td, .table-grafik-progress td{
                padding: 9px 7px !important;
            }
            .div-image-judul{
                border: 1px solid #0084ff;
                border-radius: 6px;
                height: 140px;
                width: 230px;
                position: relative;
            }
            .btn-delete-image{
                position: absolute;
                bottom: -1px;
                right: -1px;
            }
            .table-grafik-progress .progress-bar{
                white-space: nowrap; 
                overflow: hidden;
                text-overflow: ellipsis;
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
                                    <button type="button" class="btn btn-info" onclick="location.reload();"><i class="fa fa-sync-alt" title="Refresh"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-0">
                            <div class="col-12 p-3 mt-3 mb-2">
                                <form id="msform" class="font-default form-properti" method="POST" action="/properti/ajax_properti">
                                    <div class="row mb-5 text-center">
                                        <div class="col-sm-3"><a class="tab-header tab-detail active">Detail</a></div>
                                        <div class="col-sm-3"><a class="tab-header tab-deskripsi">Deskripsi</a></div>
                                        <div class="col-sm-3"><a class="tab-header tab-dokumen">Dokumen</a></div>
                                        <div class="col-sm-3"><a class="tab-header tab-grafik-progress">Progres</a></div>
                                    </div>
                                    <div class="card px-0 pt-2 pb-4 pb-0 mt-3 mb-3 shadow div-panel div-panel-detail">
                                        <div class="row ml-0 mr-0">
                                            <div class="col-12 mb-3 pl-4 pr-4 div-overflow-image-judul">
                                                <div class="row row-image-judul">
                                                    <div class="div-image-judul div-image-tambah d-inline m-2 text-info text-center" style="font-size: 50px; padding-top: 40px; cursor: pointer;"><i class="fa fa-plus"></i></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-control-label text-dark">Jumlah Dana</label>
                                                    <input type="text" readonly class="form-control jumlah-dana text-right" placeholder="Jumlah Dana" maxlength="19" name="form[jumlah_dana]" onkeypress="return validatedata(event);">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-control-label text-dark">Harga Saham</label>
                                                    <input type="text" class="form-control harga-per-lembar text-right" placeholder="Harga Saham" maxlength="19" name="form[harga_per_lembar]" onkeypress="return validatedata(event);">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-control-label text-dark">Total Saham</label>
                                                    <input type="text" class="form-control total-per-lembar text-right" placeholder="Total Saham" maxlength="19" name="form[total_per_lembar]" onkeypress="return validatedata(event);">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-control-label text-dark">Periode Dividen</label>
                                                    <select class="form-control select" name="form[dividen_period]">
                                                        <option value="Kuartal">Kuartal</option>
                                                        <option value="Semester">Semester</option>
                                                        <option value="Tahunan">Tahunan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-control-label text-dark">Penerbit</label>
                                                    <select style="width: 100%;" class="form-control select2 dropdown-penerbit" name="form[id_penerbit]">
                                                        <option value="">Penerbit</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-control-label text-dark">Tipe Aset</label>
                                                    <select class="form-control select" name="form[tipe_aset]">
                                                        <option value="Hotel">Hotel</option>
                                                        <option value="Cafe/Restoran">Cafe/Restoran</option>
                                                        <option value="Tempat Usaha Komersil">Tempat Usaha Komersil</option>
                                                        <option value="Ruko">Ruko</option>
                                                        <option value="Vila/Pondok">Vila/Pondok</option>
                                                        <option value="Gedung Perkantoran">Gedung Perkantoran</option>
                                                        <option value="Apartemen">Apartemen</option>
                                                        <option value="Lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-control-label text-dark">Lokasi</label>
                                                    <select style="width: 100%;" class="form-control select2 dropdown-lokasi" name="form[id_lokasi]">
                                                        <option value="">Lokasi</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label text-dark">ROI</label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" placeholder="ROI" name="form[roi]">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label text-dark">Persentase Saham</label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" placeholder="Persentase Saham" name="form[lepas_saham]">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ml-0 mr-0">
                                            <div class="col-lg-8" style="height: 50vh;">
                                                <div id="map" style="width: 100%; height: 100%;"></div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label text-dark">Nama Projek</label>
                                                    <input type="text" class="form-control" placeholder="Nama Projek" maxlength="100" name="form[nama]">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label text-dark">Latitude</label>
                                                    <input type="text" class="form-control" placeholder="Latitude" maxlength="25" name="form[latitude]">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label text-dark">Longitude</label>
                                                    <input type="text" class="form-control" placeholder="Longitude" maxlength="25" name="form[longitude]">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label text-dark">Alamat</label>
                                                    <textarea type="text" class="form-control input-uppercase" placeholder="Alamat" maxlength="150" name="form[alamat]" style="height: 60px;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card px-0 pt-4 pb-4 pb-0 mt-3 mb-3 shadow div-panel div-panel-deskripsi d-none">
                                        <div class="row ml-0 mr-0">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="mt-repeater-deskripsi mt-repeater-group">
                                                        <table class="table table-striped table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th class="bold text-info">Deskripsi</th>
                                                                    <th style="width: 30px;" class="text-center"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody data-repeater-list="form[repeater_deskripsi]" id="mt-repeater-tbody-deskripsi">
                                                                <tr data-repeater-item class="mt-repeater-item">
                                                                    <td>
                                                                        <div class="mt-repeater-input">
                                                                            <input required type="text" class="form-control" placeholder="Deskripsi">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <center>
                                                                            <div class="mt-repeater-input mt-delete">
                                                                                <a role="button" data-repeater-delete class="mt-repeater-delete-deskripsi"><i class="fa fa-trash"></i></a>
                                                                            </div>
                                                                        </center>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <a data-repeater-create role="button" class="btn btn-info btnTambahDeskripsi float-left text-light"><i class="fa fa-plus"></i> Tambah Deskripsi</a>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card px-0 pt-4 pb-4 pb-0 mt-3 mb-3 shadow div-panel div-panel-dokumen d-none">
                                        <div class="row ml-0 mr-0">
                                            <div class="col-lg-12">
                                                <table class="table table-striped table-dokumen">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold text-info">Nama Berkas</th>
                                                            <th class="bold text-info">Keterangan</th>
                                                            <th class="bold text-info" style="width: 200px;">Tanggal Unggah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                                <a class="btn btn-info text-white btn-tambah-berkas"><i class="fa fa-plus"></i> Tambah Berkas</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card px-0 pt-4 pb-4 pb-0 mt-3 mb-3 shadow div-panel div-panel-grafik-progress d-none">
                                        <div class="row ml-0 mr-0">
                                            <div class="col-lg-12 table-responsive">
                                                <table class="table table-striped table-grafik-progress">
                                                    <thead>
                                                        <tr class="bulan-progress">
                                                            <th class="bold text-info" style="min-width: 300px;" colspan="2">Keterangan</th>
                                                            <th class="bold text-info text-center" style="width: 140px; min-width: 140px;">Mulai</th>
                                                            <th class="bold text-info text-center" style="width: 140px; min-width: 140px;">Selesai</th>
                                                            <th class="bold text-info text-center" style="width: 100px; min-width: 100px;">Durasi</th>
                                                            <th class="bold text-info text-center tahun-progress" style="width: 200px; min-width: 200px;">Progres</th>
                                                        </tr>
                                                        <!-- <tr class="bulan-progress">
                                                            <th class="bold text-info" style="width: 300px; min-width: 300px;" colspan="2" rowspan="2">Keterangan</th>
                                                            <th class="bold text-info text-center" style="width: 140px; min-width: 140px;" rowspan="2">Mulai</th>
                                                            <th class="bold text-info text-center" style="width: 140px; min-width: 140px;" rowspan="2">Selesai</th>
                                                            <th class="bold text-info text-center" style="width: 100px; min-width: 100px;" rowspan="2">Durasi</th>
                                                            <th class="bold text-info text-center tahun-progress" style="width: 100px; min-width: 100px;" rowspan="2">Progres</th>
                                                            <th class="bold text-info text-center tahun-progress-tambahan" colspan="4"><?php echo date("Y") ?></th>
                                                        </tr> -->
                                                        <!-- <tr>
                                                            <td class="bold text-info text-center bulan-progress-tambahan" style="width: 100px; min-width: 100px;">Jan-Mar</td>
                                                            <td class="bold text-info text-center bulan-progress-tambahan" style="width: 100px; min-width: 100px;">Apr-Jun</td>
                                                            <td class="bold text-info text-center bulan-progress-tambahan" style="width: 100px; min-width: 100px;">Jul-Sep</td>
                                                            <td class="bold text-info text-center bulan-progress-tambahan" style="width: 100px; min-width: 100px;">Oct-Dec</td>
                                                        </tr> -->
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                            <a class="btn btn-info text-white btn-modal-grafik-progress mt-2 ml-2"><i class="fa fa-plus"></i> Tambah Progres</a>
                                        </div>
                                    </div>
                                    <a class="btn btn-info text-white ladda-button ladda-button-submit float-right" onclick="SimpanTambahProperti();" data-style="slide-up">Simpan</a>
                                    <a href="<?php echo base_url(); ?>" class="btn btn-light float-right mr-3">Batal</a>
                                    <input type="hidden" name="form[foto]">
                                    <input type="hidden" name="form[overview]">
                                    <input type="hidden" name="form[properti_dokumen]">
                                    <input type="hidden" name="form[properti_grafik_progress]">
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
                <?php $this->load->view("other/footer"); ?>
            </div>
        </div>
        <?php $this->load->view("manajemen_proyek/modal/verifikasi_proyek_terima"); ?>
        <?php $this->load->view("manajemen_proyek/modal/verifikasi_proyek_tolak"); ?>
        <?php $this->load->view("properti/modal/properti_foto"); ?>
        <?php $this->load->view("properti/modal/properti_dokumen_tambah"); ?>
        <?php $this->load->view("properti/modal/properti_grafik_progress_tambah"); ?>
        <?php $this->load->view("properti/modal/properti_grafik_progress_edit"); ?>
        <?php $this->load->view("properti/modal/properti_konfirmasi_hapus_html"); ?>
        <?php $this->load->view("properti/modal/properti_tag_gambar_html"); ?>
        <?php // $this->load->view("tool/modal/upload_file_tambah"); ?>
        <?php $this->load->view("tool/modal/upload_file_keterangan_tambah"); ?>
        <div class="modal fade" id="modal-crop" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
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
        <script src="<?php echo base_url("assets/plugins/jquery-repeater/jquery.repeater.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/validate/jquery.validate.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/select2/select2.full.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/toastr/toastr.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/spin.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/ladda.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/ladda.jquery.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/Inputmask-5.x/dist/jquery.inputmask.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/cropperjs-master/docs/js/cropper.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/proses.js?n=").$this->config->item("tahun_assets"); ?>"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRBgpvLaa_dw83y-Q06dklBhL0UOPD6_o&callback=initMap"></script>
        <script>
            var html_tag_delete = "";
            var html_tag_gambar = "";
            GetDropdownLokasi();
            GetDropdownPenerbit();
            var post_gambar  = {"form": {"Base64": ""}};
            initMap();
            var latitude_longitude = "-6.17531773393792,106.82714207114147";
            function initMap() {
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 11,
                    center: { lat: -6.17531773393792, lng: 106.82714207114147 },
                });
                const geocoder = new google.maps.Geocoder();
                const infowindow = new google.maps.InfoWindow();
                map.addListener("click", (mapsMouseEvent) => {
                    $("input[name='form[latitude]']").val(mapsMouseEvent.latLng.toJSON().lat);
                    $("input[name='form[longitude]']").val(mapsMouseEvent.latLng.toJSON().lng);
                    latitude_longitude = mapsMouseEvent.latLng.toJSON().lat+","+mapsMouseEvent.latLng.toJSON().lng;
                    geocodeLatLng(geocoder, map, infowindow, mapsMouseEvent.latLng.toJSON().lat, mapsMouseEvent.latLng.toJSON().lng);
                });
            }
            let markers = [];
            function geocodeLatLng(geocoder, map, infowindow, latit, longit) {
                const input = latitude_longitude;
                const latlngStr = input.split(",", 2);
                const latlng = {
                    lat: parseFloat(latlngStr[0]),
                    lng: parseFloat(latlngStr[1]),
                };
                geocoder.geocode({ location: latlng }, (results, status) => {
                    if (status === "OK") {
                        if (results[0]) {
                            setMapOnAll(null);
                            map.setZoom(11);
                            marker = new google.maps.Marker({
                                position: latlng,
                                icon: "<?php echo base_url("assets/images/icon_mapss.png"); ?>",
                                map: map,
                            });
                            markers.push(marker);
                            infowindow.setContent(results[0].formatted_address);
                            $("textarea[name='form[alamat]']").val(results[0].formatted_address);
                            infowindow.open(map, marker);
                        } else {
                            window.alert("No results found");
                        }
                    } else {
                        setMapOnAll(null);
                        marker = new google.maps.Marker({
                            position: latlng,
                            icon: "<?php echo base_url("assets/images/icon_mapss.png"); ?>",
                            map: map,
                        });
                        markers.push(marker);
                        window.alert("Geocoder failed due to: " + status);
                        infowindow.setContent("Geocoder failed due to: " + status);
                        infowindow.open(map, marker);
                    }
                });
            }
            function setMapOnAll(map) {
                for (let i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }

            $("input[name='form[harga_per_lembar]'], input[name='form[total_per_lembar]']").change(function(){
                var harga_per_lembar = 0;
                var total_per_lembar = 0;
                if($("input[name='form[harga_per_lembar]']").val() != ""){
                    harga_per_lembar = parseInt($("input[name='form[harga_per_lembar]']").val().replace(/\./g,""));
                }
                if($("input[name='form[total_per_lembar]']").val() != ""){
                    total_per_lembar = parseInt($("input[name='form[total_per_lembar]']").val().replace(/\./g,""));
                }
                $("input[name='form[jumlah_dana]']").val(rupiah((harga_per_lembar*total_per_lembar)));
            });

            var properti_dokumen = $("#modal-properti-dokumen");
            var properti_grafik_progress = $("#modal-properti-grafik-progress");
            var properti_grafik_progress_edit = $("#modal-properti-grafik-progress-edit");
            var properti_foto = $("#modal-properti-foto");
            var properti_konfirmasi_hapus_html = $("#modal-properti-konfirmasi-haous-html");
            var properti_tag_ganbar_html = $("#modal-properti-tag-gambar-html");
            var upload_file_tambah = $("#modal-tambah-upload-file");
            $(".btn-tambah-berkas").click(function(){
                /*properti_dokumen.find(".btn-unggah").addClass("disabled").attr("disabled", "disabled");
                $("#modal-properti-dokumen").modal("show");
                properti_dokumen.find(".hapus-foto").click();*/
                $("#modal-tambah-upload-file").modal("show");
                upload_file_tambah.find(".progress-bar").width('0%');
                upload_file_tambah.find(".progress-bar").html('');
                upload_file_tambah.find(".dokumen-keterangan").val("");
                upload_file_tambah.find("input[name='form[file]'], input[name='file']").val("");
            });
            properti_dokumen.find(".foto").change(function() {
                var selector = $(this);
                if (this.files && this.files[0]) {
                    var tipefile = this.files[0].type.toString();
                    var filename = this.files[0].name.toString();
                    var tipefile_array = filename.split(".");
                    var tipefile_data = "."+tipefile_array[tipefile_array.length-1];
                    var real_filename = filename.replace(tipefile_data, "", filename);
                    var tipe = ['text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/vnd.msexcel', 'text/plain', 'application/msexcel', 'application/x-msexcel', 'application/x-ms-excel', 'application/x-excel', 'application/x-dos_ms_excel', 'application/xls', 'application/x-xls', 'application/excel', 'application/download', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel', 'application/x-zip', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/zip', 'application/msword', 'application/pdf', 'application/force-download', 'application/x-download', 'binary/octet-stream'];
                    if(filename.indexOf("'") >= 0 || filename.indexOf('"') >= 0){
                        $(this).val("");
                        toastrshow("warning", "Nama file tidak boleh mengandung ' atau \"", "Peringatan");
                        return;
                    }
                    if(tipe.indexOf(tipefile) == -1) {
                        $(this).val("");
                        toastrshow("warning", "Format salah, pilih file excel/word/pdf", "Peringatan");
                        return;
                    }
                    if((this.files[0].size / 1024) < 5210){
                        var FR = new FileReader();
                        FR.addEventListener("load", function(e) {
                            //var base64 = e.target.result;
                            var base64 = e.target.result.replace("data:"+tipefile+";base64,", '');
                            var ext = filename.split(".").pop();
                            post_gambar["form"]["Base64"] = base64;
                            post_gambar["form"]["Ext"] = ext;
                            post_gambar["form"]["NameFile"] = real_filename;
                            $.ajax({
                                type: "POST",
                                url: base_url + "/tool/ajax_tool",
                                data: {act:"upload_file_name", form:post_gambar},
                                dataType: "JSON",
                                tryCount: 0,
                                retryLimit: 3,
                                beforeSend: function(){
                                    properti_dokumen.find(".foto_file_name").val("");
                                    properti_dokumen.find(".foto_hidden").val("");
                                    properti_dokumen.find(".foto").addClass("d-none");
                                    properti_dokumen.find(".loading-foto").removeClass("d-none");
                                    properti_dokumen.find(".btn-unggah").addClass("disabled").attr("disabled", "disabled");
                                },
                                success: function(respon_file){
                                    if(respon_file.IsError != undefined) {
                                        if(respon_file.ErrorMessage[0].error != undefined) {
                                            toastrshow("warning", respon_file.ErrorMessage[0].error, "Peringatan");
                                        } else {
                                            toastrshow("warning", respon_file.ErrorMessage, "Peringatan");
                                        }
                                    } else {
                                        properti_dokumen.find(".foto_file_name").val(real_filename);
                                        properti_dokumen.find(".foto_hidden").val(respon_file.Output);
                                        properti_dokumen.find(".detail-foto, .strip-foto, .hapus-foto").removeClass("d-none");
                                        properti_dokumen.find(".foto").addClass("d-none");
                                        properti_dokumen.find(".loading-foto").addClass("d-none");
                                        properti_dokumen.find(".btn-unggah").removeClass("disabled").removeAttr("disabled");
                                    }
                                },
                                error: function(xhr, textstatus, errorthrown) {
                                    toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
                                    properti_dokumen.find(".hapus-foto").click();
                                    properti_dokumen.find(".loading-foto").addClass("d-none");
                                }
                            });
                        }); 
                        FR.readAsDataURL(this.files[0]);
                    } else {
                        $(this).val("");
                        toastrshow("warning", "Ukuran file maksimum adalah 5 MB", "Warning");
                    }
                }
            });
            properti_dokumen.find(".hapus-foto").click(function(){
                properti_dokumen.find(".foto_file_name").val("");
                properti_dokumen.find(".foto_hidden").val("");
                properti_dokumen.find(".detail-foto, .strip-foto, .hapus-foto").addClass("d-none");
                properti_dokumen.find(".foto").val("").trigger("change");
                properti_dokumen.find(".foto").removeClass("d-none");
            });
            properti_dokumen.find(".detail-foto").click(function(){
                window.open(cdn_url+"/file_upload/"+properti_dokumen.find(".foto_hidden").val(), "", "width=800,height=400");
            });
            properti_dokumen.find(".btn-unggah").click(function(){
                $("#modal-properti-dokumen").modal("hide");
                $(".table-dokumen tbody").append("<tr><td><a class='bold text-info' onclick='window.open("+'"'+cdn_url+"/file_upload/"+properti_dokumen.find(".foto_hidden").val()+'"'+", \"\", \"width=800,height=400\");'>"+properti_dokumen.find(".foto_file_name").val()+"</a>&nbsp;&nbsp;&nbsp;<a class='bold text-danger btn-delete-dokumen'><i class='fa fa-times'></i></a></td><td>"+moment().format("DD MMM YYYY HH:mm:ss")+"<input type='hidden' class='dokumen-nama' value='"+properti_dokumen.find(".foto_file_name").val()+"'><input type='hidden' class='dokumen-file' value='"+properti_dokumen.find(".foto_hidden").val()+"'><input type='hidden' class='dokumen-keterangan' value='"+properti_dokumen.find(".dokumen-keterangan").val()+"'><input type='hidden' class='dokumen-created-at' value='"+moment().format("YYYY-MM-DD HH:mm:ss")+"'></td></tr>");
            });
            $(".table-dokumen").on("click", ".btn-delete-dokumen", function() {
                html_tag_delete = $(this).parent().parent();
                $("#modal-properti-konfirmasi-haous-html").modal("show");
            });


            $(".btn-modal-grafik-progress").click(function(){
                properti_grafik_progress.find("input").val("");
                properti_grafik_progress.find(".btn-tambah-grafik-progress").addClass("disabled").attr("disabled", "disabled");
                $("#modal-properti-grafik-progress").modal("show");
                properti_grafik_progress.find(".hapus-foto").click();
            });
            properti_grafik_progress.find(".foto").change(function() {
                var selector = $(this);
                if (this.files && this.files[0]) {
                    var tipefile = this.files[0].type.toString();
                    var filename = this.files[0].name.toString();
                    var tipefile_array = filename.split(".");
                    var tipefile_data = "."+tipefile_array[tipefile_array.length-1];
                    var real_filename = filename.replace(tipefile_data, "", filename);
                    var tipe = ['image/png',  'image/x-png', 'image/jpeg', 'image/pjpeg'];
                    if(filename.indexOf("'") >= 0 || filename.indexOf('"') >= 0){
                        $(this).val("");
                        toastrshow("warning", "Nama file tidak boleh mengandung ' atau \"", "Peringatan");
                        return;
                    }
                    if(tipe.indexOf(tipefile) == -1) {
                        $(this).val("");
                        toastrshow("warning", "Format salah, pilih file dengan format png/jpg/jpeg", "Peringatan");
                        return;
                    }
                    if((this.files[0].size / 1024) < 5210){
                        var FR = new FileReader();
                        FR.addEventListener("load", function(e) {
                            //var base64 = e.target.result;
                            var base64 = e.target.result.replace("data:"+tipefile+";base64,", '');
                            var ext = filename.split(".").pop();
                            post_gambar["form"]["Base64"] = base64;
                            post_gambar["form"]["Ext"] = ext;
                            post_gambar["form"]["NameFile"] = real_filename;
                            $.ajax({
                                type: "POST",
                                url: base_url + "/tool/ajax_tool",
                                data: {act:"upload_file_name", form:post_gambar},
                                dataType: "JSON",
                                tryCount: 0,
                                retryLimit: 3,
                                beforeSend: function(){
                                    properti_grafik_progress.find(".foto_file_name").val("");
                                    properti_grafik_progress.find(".foto_hidden").val("");
                                    properti_grafik_progress.find(".foto").addClass("d-none");
                                    properti_grafik_progress.find(".loading-foto").removeClass("d-none");
                                },
                                success: function(respon_file){
                                    if(respon_file.IsError != undefined) {
                                        if(respon_file.ErrorMessage[0].error != undefined) {
                                            toastrshow("warning", respon_file.ErrorMessage[0].error, "Peringatan");
                                        } else {
                                            toastrshow("warning", respon_file.ErrorMessage, "Peringatan");
                                        }
                                    } else {
                                        properti_grafik_progress.find(".foto_file_name").val(real_filename);
                                        properti_grafik_progress.find(".foto_hidden").val(respon_file.Output);
                                        properti_grafik_progress.find(".detail-foto, .strip-foto, .hapus-foto").removeClass("d-none");
                                        properti_grafik_progress.find(".foto").addClass("d-none");
                                        properti_grafik_progress.find(".loading-foto").addClass("d-none");
                                    }
                                },
                                error: function(xhr, textstatus, errorthrown) {
                                    toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
                                    properti_grafik_progress.find(".hapus-foto").click();
                                    properti_grafik_progress.find(".loading-foto").addClass("d-none");
                                }
                            });
                        }); 
                        FR.readAsDataURL(this.files[0]);
                    } else {
                        $(this).val("");
                        toastrshow("warning", "Ukuran file maksimum adalah 5 MB", "Warning");
                    }
                }
            });
            $("#modal-properti-grafik-progress").on("change", "input", function() {
                if(properti_grafik_progress.find(".input-keterangan").val() == "" || properti_grafik_progress.find(".datepicker-tgl-mulai").val() == "" || properti_grafik_progress.find(".datepicker-tgl-selesai").val() == "" || properti_grafik_progress.find(".input-progress").val() == ""){
                    properti_grafik_progress.find(".btn-tambah-grafik-progress").addClass("disabled").attr("disabled", "disabled");
                } else {
                    properti_grafik_progress.find(".btn-tambah-grafik-progress").removeClass("disabled").removeAttr("disabled");
                    properti_grafik_progress.find(".input-durasi").val((parseInt(moment(properti_grafik_progress.find(".datepicker-tgl-selesai").val()).diff(moment(properti_grafik_progress.find(".datepicker-tgl-mulai").val()), "days"))+1)+" hari");
                }
            });
            properti_grafik_progress.find(".hapus-foto").click(function(){
                properti_grafik_progress.find(".foto_file_name").val("");
                properti_grafik_progress.find(".foto_hidden").val("");
                properti_grafik_progress.find(".detail-foto, .strip-foto, .hapus-foto").addClass("d-none");
                properti_grafik_progress.find(".foto").val("").trigger("change");
                properti_grafik_progress.find(".foto").removeClass("d-none");
            });
            properti_grafik_progress.find(".detail-foto").click(function(){
                // window.open(cdn_url+"/file_upload/"+properti_grafik_progress.find(".foto_hidden").val(), "", "width=800,height=400");
                OpenImage(cdn_url+"/file_upload/"+properti_grafik_progress.find(".foto_hidden").val());
            });
            properti_grafik_progress.find(".datepicker-tgl-mulai, .datepicker-tgl-selesai").datepicker({
                autoclose: true,
                format: 'dd M yyyy'
            });
            properti_grafik_progress.find(".datepicker-tgl-mulai, .datepicker-tgl-selesai").focus(function(){
                $(this).blur();
            });
            properti_grafik_progress.find(".btn-tambah-grafik-progress").click(function(){
                $("#modal-properti-grafik-progress").modal("hide");
                var foto_data_url = "";
                if(properti_grafik_progress.find(".foto_hidden").val() != ""){
                    foto_data_url = "<a class='bold text-info' onclick='OpenImage("+'"'+cdn_url+"/file_upload/"+properti_grafik_progress.find(".foto_hidden").val()+'"'+");'><i style='font-size: 30px;' class='fa fa-image'></i></a>";
                }
                $(".table-grafik-progress tbody").append("<tr><td style='width:10px;'>"+foto_data_url+"</td><td><a class='bold text-info edit-keterangan'>"+properti_grafik_progress.find(".input-keterangan").val()+"</a>&nbsp;&nbsp;&nbsp;<a class='bold text-danger btn-delete-grafik-progress'><i class='fa fa-times'></i></a></td><td class='text-center'>"+properti_grafik_progress.find(".datepicker-tgl-mulai").val()+"</td><td class='text-center'>"+properti_grafik_progress.find(".datepicker-tgl-selesai").val()+"</td><td class='text-center'>"+properti_grafik_progress.find(".input-durasi").val()+"</td><td class='text-center'>"+"<div class='progress' style='height: 17px;'><div class='progress-bar' style='width: "+properti_grafik_progress.find(".input-progress").val()+"%;'>"+properti_grafik_progress.find(".input-progress").val()+"%</div></div>"+"<input type='hidden' class='progress-foto' value='"+properti_grafik_progress.find(".foto_hidden").val()+"'><input type='hidden' class='progress-keterangan' value='"+properti_grafik_progress.find(".input-keterangan").val()+"'><input type='hidden' class='progress-tgl-mulai' value='"+moment(properti_grafik_progress.find(".datepicker-tgl-mulai").val()).format("YYYY-MM-DD")+"'><input type='hidden' class='progress-tgl-selesai' value='"+moment(properti_grafik_progress.find(".datepicker-tgl-selesai").val()).format("YYYY-MM-DD")+"'><input type='hidden' class='progress-progress' value='"+properti_grafik_progress.find(".input-progress").val()+"'></td></tr>");
                //CheckTableProgress();
            });
            $(".table-grafik-progress").on("click", ".btn-delete-grafik-progress", function() {
                html_tag_delete = $(this).parent().parent();
                $("#modal-properti-konfirmasi-haous-html").modal("show");
            });

            var index_edit_progress = 0;
            $(".table-grafik-progress").on("click", ".edit-keterangan", function() {
                index_edit_progress = ($(this).parent().parent().index()+1);
                properti_grafik_progress_edit.find(".hapus-foto").click();
                var progress_foto = $(".table-grafik-progress").find("tr:nth-child("+($(this).parent().parent().index()+1)+")").find(".progress-foto").val();
                var progress_keterangan = $(".table-grafik-progress").find("tr:nth-child("+($(this).parent().parent().index()+1)+")").find(".progress-keterangan").val();
                var progress_tgl_mulai = $(".table-grafik-progress").find("tr:nth-child("+($(this).parent().parent().index()+1)+")").find(".progress-tgl-mulai").val();
                var progress_tgl_selesai = $(".table-grafik-progress").find("tr:nth-child("+($(this).parent().parent().index()+1)+")").find(".progress-tgl-selesai").val();
                var progress_progress = $(".table-grafik-progress").find("tr:nth-child("+($(this).parent().parent().index()+1)+")").find(".progress-progress").val();
                properti_grafik_progress_edit.find(".input-keterangan").val(progress_keterangan);
                properti_grafik_progress_edit.find(".datepicker-tgl-mulai").val(moment(progress_tgl_mulai).format("DD MMM YYYY"));
                properti_grafik_progress_edit.find(".datepicker-tgl-selesai").val(moment(progress_tgl_selesai).format("DD MMM YYYY"));
                properti_grafik_progress_edit.find(".input-progress").val(progress_progress);
                properti_grafik_progress_edit.find(".input-durasi").val((parseInt(moment(progress_tgl_selesai).diff(moment(progress_tgl_mulai), "days"))+1)+" hari");
                if(progress_foto == "" || progress_foto == null){
                } else {
                    properti_grafik_progress_edit.find(".detail-foto, .strip-foto, .hapus-foto").removeClass("d-none");
                    properti_grafik_progress_edit.find(".foto, .loading-foto").addClass("d-none");
                    properti_grafik_progress_edit.find(".foto_hidden").val(progress_foto);
                }
                properti_grafik_progress_edit.find(".btn-tambah-grafik-progress").removeClass("disabled").removeAttr("disabled");
                $("#modal-properti-grafik-progress-edit").modal("show");
            });
            properti_grafik_progress_edit.find(".foto").change(function() {
                var selector = $(this);
                if (this.files && this.files[0]) {
                    var tipefile = this.files[0].type.toString();
                    var filename = this.files[0].name.toString();
                    var tipefile_array = filename.split(".");
                    var tipefile_data = "."+tipefile_array[tipefile_array.length-1];
                    var real_filename = filename.replace(tipefile_data, "", filename);
                    var tipe = ['image/png',  'image/x-png', 'image/jpeg', 'image/pjpeg'];
                    if(filename.indexOf("'") >= 0 || filename.indexOf('"') >= 0){
                        $(this).val("");
                        toastrshow("warning", "Nama file tidak boleh mengandung ' atau \"", "Peringatan");
                        return;
                    }
                    if(tipe.indexOf(tipefile) == -1) {
                        $(this).val("");
                        toastrshow("warning", "Format salah, pilih file dengan format png/jpg/jpeg", "Peringatan");
                        return;
                    }
                    if((this.files[0].size / 1024) < 5210){
                        var FR = new FileReader();
                        FR.addEventListener("load", function(e) {
                            //var base64 = e.target.result;
                            var base64 = e.target.result.replace("data:"+tipefile+";base64,", '');
                            var ext = filename.split(".").pop();
                            post_gambar["form"]["Base64"] = base64;
                            post_gambar["form"]["Ext"] = ext;
                            post_gambar["form"]["NameFile"] = real_filename;
                            $.ajax({
                                type: "POST",
                                url: base_url + "/tool/ajax_tool",
                                data: {act:"upload_file_name", form:post_gambar},
                                dataType: "JSON",
                                tryCount: 0,
                                retryLimit: 3,
                                beforeSend: function(){
                                    properti_grafik_progress_edit.find(".foto_file_name").val("");
                                    properti_grafik_progress_edit.find(".foto_hidden").val("");
                                    properti_grafik_progress_edit.find(".foto").addClass("d-none");
                                    properti_grafik_progress_edit.find(".loading-foto").removeClass("d-none");
                                },
                                success: function(respon_file){
                                    if(respon_file.IsError != undefined) {
                                        if(respon_file.ErrorMessage[0].error != undefined) {
                                            toastrshow("warning", respon_file.ErrorMessage[0].error, "Peringatan");
                                        } else {
                                            toastrshow("warning", respon_file.ErrorMessage, "Peringatan");
                                        }
                                    } else {
                                        properti_grafik_progress_edit.find(".foto_file_name").val(real_filename);
                                        properti_grafik_progress_edit.find(".foto_hidden").val(respon_file.Output);
                                        properti_grafik_progress_edit.find(".detail-foto, .strip-foto, .hapus-foto").removeClass("d-none");
                                        properti_grafik_progress_edit.find(".foto").addClass("d-none");
                                        properti_grafik_progress_edit.find(".loading-foto").addClass("d-none");
                                    }
                                },
                                error: function(xhr, textstatus, errorthrown) {
                                    toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
                                    properti_grafik_progress_edit.find(".hapus-foto").click();
                                    properti_grafik_progress_edit.find(".loading-foto").addClass("d-none");
                                }
                            });
                        }); 
                        FR.readAsDataURL(this.files[0]);
                    } else {
                        $(this).val("");
                        toastrshow("warning", "Ukuran file maksimum adalah 5 MB", "Warning");
                    }
                }
            });
            $("#modal-properti-grafik-progress-edit").on("change", "input", function() {
                if(properti_grafik_progress_edit.find(".input-keterangan").val() == "" || properti_grafik_progress_edit.find(".datepicker-tgl-mulai").val() == "" || properti_grafik_progress_edit.find(".datepicker-tgl-selesai").val() == "" || properti_grafik_progress_edit.find(".input-progress").val() == ""){
                    properti_grafik_progress_edit.find(".btn-tambah-grafik-progress").addClass("disabled").attr("disabled", "disabled");
                } else {
                    properti_grafik_progress_edit.find(".btn-tambah-grafik-progress").removeClass("disabled").removeAttr("disabled");
                    properti_grafik_progress_edit.find(".input-durasi").val((parseInt(moment(properti_grafik_progress_edit.find(".datepicker-tgl-selesai").val()).diff(moment(properti_grafik_progress_edit.find(".datepicker-tgl-mulai").val()), "days"))+1)+" hari");
                }
            });
            properti_grafik_progress_edit.find(".hapus-foto").click(function(){
                properti_grafik_progress_edit.find(".foto_file_name").val("");
                properti_grafik_progress_edit.find(".foto_hidden").val("");
                properti_grafik_progress_edit.find(".detail-foto, .strip-foto, .hapus-foto").addClass("d-none");
                properti_grafik_progress_edit.find(".foto").val("").trigger("change");
                properti_grafik_progress_edit.find(".foto").removeClass("d-none");
            });
            properti_grafik_progress_edit.find(".detail-foto").click(function(){
                // window.open(cdn_url+"/file_upload/"+properti_grafik_progress_edit.find(".foto_hidden").val(), "", "width=800,height=400");
                OpenImage(cdn_url+"/file_upload/"+properti_grafik_progress_edit.find(".foto_hidden").val());
            });
            properti_grafik_progress_edit.find(".datepicker-tgl-mulai, .datepicker-tgl-selesai").datepicker({
                autoclose: true,
                format: 'dd M yyyy'
            });
            properti_grafik_progress_edit.find(".datepicker-tgl-mulai, .datepicker-tgl-selesai").focus(function(){
                $(this).blur();
            });
            properti_grafik_progress_edit.find(".btn-tambah-grafik-progress").click(function(){
                $("#modal-properti-grafik-progress-edit").modal("hide");
                var foto_data_url = "";
                if(properti_grafik_progress_edit.find(".foto_hidden").val() != ""){
                    foto_data_url = "<a class='bold text-info' onclick='OpenImage("+'"'+cdn_url+"/file_upload/"+properti_grafik_progress_edit.find(".foto_hidden").val()+'"'+");'><i style='font-size: 30px;' class='fa fa-image'></i></a>";
                }
                $(".table-grafik-progress tbody").find("tr:nth-child("+index_edit_progress+")").html("<td style='width:10px;'>"+foto_data_url+"</td><td><a class='bold text-info edit-keterangan'>"+properti_grafik_progress_edit.find(".input-keterangan").val()+"</a>&nbsp;&nbsp;&nbsp;<a class='bold text-danger btn-delete-grafik-progress'><i class='fa fa-times'></i></a></td><td class='text-center'>"+properti_grafik_progress_edit.find(".datepicker-tgl-mulai").val()+"</td><td class='text-center'>"+properti_grafik_progress_edit.find(".datepicker-tgl-selesai").val()+"</td><td class='text-center'>"+properti_grafik_progress_edit.find(".input-durasi").val()+"</td><td class='text-center'>"+"<div class='progress' style='height: 17px;'><div class='progress-bar' style='width: "+properti_grafik_progress_edit.find(".input-progress").val()+"%;'>"+properti_grafik_progress_edit.find(".input-progress").val()+"%</div></div>"+"<input type='hidden' class='progress-foto' value='"+properti_grafik_progress_edit.find(".foto_hidden").val()+"'><input type='hidden' class='progress-keterangan' value='"+properti_grafik_progress_edit.find(".input-keterangan").val()+"'><input type='hidden' class='progress-tgl-mulai' value='"+moment(properti_grafik_progress_edit.find(".datepicker-tgl-mulai").val()).format("YYYY-MM-DD")+"'><input type='hidden' class='progress-tgl-selesai' value='"+moment(properti_grafik_progress_edit.find(".datepicker-tgl-selesai").val()).format("YYYY-MM-DD")+"'><input type='hidden' class='progress-progress' value='"+properti_grafik_progress_edit.find(".input-progress").val()+"'></td>");
                //CheckTableProgress();
            });


            $(".harga-per-lembar, .total-per-lembar").focus(function(){
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

            $(".div-image-tambah").click(function(){
                properti_foto.find(".btn-unggah-foto").addClass("disabled").attr("disabled", "disabled");
                $("#modal-properti-foto").modal("show");
                properti_foto.find(".hapus-foto").click();
            });

            $(".row-image-judul").on("click", ".btn-delete-image", function() {
                html_tag_delete = $(this).parent();
                $("#modal-properti-konfirmasi-haous-html").modal("show");
            });
            $(".btn-haous-html").click(function(){
                $("#modal-properti-konfirmasi-haous-html").modal("hide");
                html_tag_delete.remove();
                $(".row-image-judul").css("width", ($(".div-image-judul").length*246)+"px");
                if(($(".div-image-judul").length*246) > $(".div-overflow-image-judul").width()){
                    $(".div-overflow-image-judul").css("overflow-x", "scroll");
                } else {
                    $(".div-overflow-image-judul").css("overflow-x", "hidden");
                }
                if($(".div-image-data").length < parseInt("<?php echo $maksimal_foto_properti; ?>")){
                    $(".div-image-tambah").removeClass("d-none").addClass("d-inline");
                } else {
                    $(".div-image-tambah").addClass("d-none").removeClass("d-inline");
                }
                //CheckTableProgress();
            });
            properti_foto.find(".foto").change(function() {
                var selector = $(this);
                if (this.files && this.files[0]) {
                    var tipefile = this.files[0].type.toString();
                    var filename = this.files[0].name.toString();
                    var tipefile_array = filename.split(".");
                    var tipefile_data = "."+tipefile_array[tipefile_array.length-1];
                    var tipe = ['image/png',  'image/x-png', 'image/jpeg', 'image/pjpeg'];
                    if(tipe.indexOf(tipefile) == -1) {
                        $(this).val("");
                        toastrshow("warning", "Format salah, pilih file dengan format png/jpg/jpeg", "Peringatan");
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
            properti_foto.find(".hapus-foto").click(function(){
                properti_foto.find(".foto_hidden").val("");
                properti_foto.find(".detail-foto, .strip-foto, .hapus-foto").addClass("d-none");
                properti_foto.find(".foto").val("").trigger("change");
                properti_foto.find(".foto").removeClass("d-none");
            });
            properti_foto.find(".detail-foto").click(function(){
                // window.open(cdn_url+"/"+properti_foto.find(".foto_hidden").val(), "", "width=800,height=400");
                OpenImage(cdn_url+"/"+properti_foto.find(".foto_hidden").val());
            });
            properti_foto.find(".btn-unggah-foto").click(function(){
                $("#modal-properti-foto").modal("hide");
                $(".div-image-tambah").after("<div class='div-image-judul div-image-data d-inline m-2' style='background-image: url("+'\"'+cdn_url+"/"+properti_foto.find(".foto_hidden").val()+'\"'+"); background-size: cover; background-position: center center;'><a class='btn btn-danger btn-delete-image text-white'><i class='fa fa-times'></i></a><input type='hidden' class='data-foto' value='"+properti_foto.find(".foto_hidden").val()+"'></div>");
                $(".row-image-judul").css("width", ($(".div-image-judul").length*246)+"px");
                if(($(".div-image-judul").length*246) > $(".div-overflow-image-judul").width()){
                    $(".div-overflow-image-judul").css("overflow-x", "scroll");
                } else {
                    $(".div-overflow-image-judul").css("overflow-x", "hidden");
                }
                if($(".div-image-data").length < parseInt("<?php echo $maksimal_foto_properti; ?>")){
                    $(".div-image-tambah").removeClass("d-none").addClass("d-inline");
                } else {
                    $(".div-image-tambah").addClass("d-none").removeClass("d-inline");
                }
            });


            $(document).ready(function(){

            });
            $(".tab-header").click(function(){
                $(".tab-header").removeClass("active");
                $(this).addClass("active");
            });

            $(".tab-detail").click(function(){
                $(".div-panel").addClass("d-none");
                $(".div-panel-detail").removeClass("d-none");
            });
            $(".tab-deskripsi").click(function(){
                $(".div-panel").addClass("d-none");
                $(".div-panel-deskripsi").removeClass("d-none");
            });
            $(".tab-dokumen").click(function(){
                $(".div-panel").addClass("d-none");
                $(".div-panel-dokumen").removeClass("d-none");
            });
            $(".tab-grafik-progress").click(function(){
                $(".div-panel").addClass("d-none");
                $(".div-panel-grafik-progress").removeClass("d-none");
            });

            $(".mt-repeater-deskripsi").each(function(){
                $(this).repeater({
                    show: function () {
                        $(this).slideDown();
                    },
                    hide: function (deleteElement) {
                        $(this).slideUp(deleteElement);
                        setTimeout(function(){
                            var tot_frm = $(".mt-repeater-deskripsi").length;
                            // $(".btnTambahDeskripsi").click();
                        }, 500);
                    },

                    ready: function (setIndexes) {

                    }

                });
            });

            function SimpanTambahProperti(){
                var foto_judul = [];
                var overview = [];
                var properti_dokumen = [];
                var properti_grafik_progress = [];
                $(".div-image-data").each(function(index) {
                    foto_judul.push($(this).find("input").val());
                });
                $("#mt-repeater-tbody-deskripsi tr").each(function(index) {
                    overview.push($(this).find("input").val());
                });
                $(".table-dokumen tbody tr").each(function(index) {
                    properti_dokumen.push({
                        nama : $(this).find(".dokumen-nama").val(), 
                        file : $(this).find(".dokumen-file").val(), 
                        keterangan : $(this).find(".dokumen-keterangan").val(), 
                        created_at : $(this).find(".dokumen-created-at").val()
                    });
                });
                $(".table-grafik-progress tbody tr").each(function(index) {
                    properti_grafik_progress.push({
                        foto : $(this).find(".progress-foto").val(),
                        keterangan : $(this).find(".progress-keterangan").val(),
                        tgl_mulai : $(this).find(".progress-tgl-mulai").val(),
                        tgl_selesai : $(this).find(".progress-tgl-selesai").val(),
                        progress : $(this).find(".progress-progress").val()
                    });
                });
                $("input[name='form[foto]']").val(JSON.stringify(foto_judul));
                $("input[name='form[overview]']").val(JSON.stringify(overview));
                $("input[name='form[properti_dokumen]']").val(JSON.stringify(properti_dokumen));
                $("input[name='form[properti_grafik_progress]']").val(JSON.stringify(properti_grafik_progress));
                $(".form-properti").submit();
            }
            var FrmProperti = $(".form-properti").validate({
                submitHandler: function(form) {
                    laddasubmit = $(".ladda-button-submit");
                    InsertData(form, function(resp) {
                        window.location.href = base_url+"/manajemen_proyek/verifikasi_proyek.html";
                    }, "", "insertdata");
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

            function OpenImage(data_image){
                console.log(data_image);
                html_tag_gambar = "<img src='"+data_image+"' style='width: 100%; height: auto;'>";
                properti_tag_ganbar_html.find(".div-detail-gambar").html(html_tag_gambar);
                $("#modal-properti-tag-gambar-html").modal("show");
            }


            function multiSort(array, sortObject = {}) {
                const sortKeys = Object.keys(sortObject);
                if (!sortKeys.length) {
                    return array;
                }
                for (let key in sortObject) {
                    sortObject[key] = sortObject[key] === 'desc' || sortObject[key] === -1 ? -1 : (sortObject[key] === 'skip' || sortObject[key] === 0 ? 0 : 1);
                }
                const keySort = (a, b, direction) => {
                    direction = direction !== null ? direction : 1;
                    if (a === b) {
                        return 0;
                    }
                    return a > b ? direction : -1 * direction;
                };
                return array.sort((a, b) => {
                    let sorted = 0;
                    let index = 0;
                    while (sorted === 0 && index < sortKeys.length) {
                        const key = sortKeys[index];
                        if (key) {
                            const direction = sortObject[key];
                            sorted = keySort(a[key], b[key], direction);
                            index++;
                        }
                    }
                    return sorted;
                });
            }

            function CheckTableProgress(){
                var properti_grafik_progress_cek_tahun = [];
                $(".table-grafik-progress tbody tr").each(function(index) {
                    properti_grafik_progress_cek_tahun.push({
                        foto : $(this).find(".progress-foto").val(),
                        keterangan : $(this).find(".progress-keterangan").val(),
                        tgl_mulai : $(this).find(".progress-tgl-mulai").val(),
                        int_mulai : moment($(this).find(".progress-tgl-mulai").val()).valueOf(),
                        tgl_selesai : $(this).find(".progress-tgl-selesai").val(),
                        int_selesai : moment($(this).find(".progress-tgl-selesai").val()).valueOf(),
                        progress : $(this).find(".progress-progress").val()
                    });
                });
                console.log("sebelum sort");
                console.log(properti_grafik_progress_cek_tahun);

                console.log("hasil sort");
                var sort_properti_grafik_progress_cek_tahun = multiSort(properti_grafik_progress_cek_tahun, {
                    int_mulai: "desc"
                });
                var html_grafik_progress_cek_data = "";
                $(sort_properti_grafik_progress_cek_tahun).each(function(index, item) {
                    var foto_data_url = "";
                    if(item.foto != ""){
                        foto_data_url = "<a class='bold text-info' onclick='OpenImage("+'"'+cdn_url+"/file_upload/"+item.foto+'"'+");'><i style='font-size: 30px;' class='fa fa-image'></i></a>";
                    }
                    html_grafik_progress_cek_data += "<tr><td style='width:10px;'>"+foto_data_url+"</td><td><a class='bold text-info edit-keterangan'>"+item.keterangan+"</a>&nbsp;&nbsp;&nbsp;<a class='bold text-danger btn-delete-grafik-progress'><i class='fa fa-times'></i></a></td><td class='text-center'>"+moment(item.tgl_mulai).format("DD MMM YYYY")+"</td><td class='text-center'>"+moment(item.tgl_selesai).format("DD MMM YYYY")+"</td><td class='text-center'>"+(parseInt(moment(item.tgl_selesai).diff(moment(item.tgl_mulai), "days"))+1)+" hari"+"</td><td class='text-center'>"+"<div class='progress' style='height: 17px;'><div class='progress-bar' style='width: "+item.progress+"%;'>"+item.progress+"%</div></div>"+"<input type='hidden' class='progress-foto' value='"+item.foto+"'><input type='hidden' class='progress-keterangan' value='"+item.keterangan+"'><input type='hidden' class='progress-tgl-mulai' value='"+moment(item.tgl_mulai).format("YYYY-MM-DD")+"'><input type='hidden' class='progress-tgl-selesai' value='"+moment(item.tgl_selesai).format("YYYY-MM-DD")+"'><input type='hidden' class='progress-progress' value='"+item.progress+"'></td></tr>";
                });
                $(".table-grafik-progress tbody").html(html_grafik_progress_cek_data);
            }


            upload_file_tambah.find(".file-tool").change(function(e) {
                e.preventDefault();
                var selector = $(this);
                if (this.files && this.files[0]) {
                    var tipefile = this.files[0].type.toString();
                    var filename = this.files[0].name.toString();
                    if(filename.indexOf("'") >= 0 || filename.indexOf('"') >= 0){
                        $(this).val("");
                        toastrshow("warning", "Nama file tidak boleh mengandung ' atau \"", "Peringatan");
                        return;
                    }
                    var tipefile_array = filename.split(".");
                    var tipefile_data = tipefile_array[tipefile_array.length-1];
                    if(tipefile_data == "pdf"){
                        
                    } else {
                        $(this).val("");
                        toastrshow("warning", "Format hanya tersedia untuk .pdf", "Peringatan");
                        return;
                    }
                    if((this.files[0].size / 1024) < 25600){

                    } else {
                        $(this).val("");
                        toastrshow("warning", "Ukuran file maksimum adalah 25 MB", "Warning");
                    }
                }
            });
            function SimpanTambahUploadFile(){
                $("#FrmTambahUploadFile").submit();
            }
            var check_status_file = false;
            $("#FrmTambahUploadFile").on('submit', function(e){
                $("#modal-tambah-upload-file").find(".ladda-button-submit").ladda("start");
                if(upload_file_tambah.find(".file-tool").val() == ""){
                    check_status_file = false;
                } else {
                    check_status_file = true;
                    $.ajax({
                        xhr: function() {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function(evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = ((evt.loaded / evt.total) * 100);
                                    upload_file_tambah.find(".progress-bar").width(percentComplete.toFixed(2) + '%');
                                    upload_file_tambah.find(".progress-bar").html(percentComplete.toFixed(2)+'%');
                                }
                            }, false);
                            return xhr;
                        },
                        type: 'POST',
                        url: base_url + "/tool/ajax_upload_file",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                        beforeSend: function(){
                            upload_file_tambah.find(".progress-bar").width('0%');
                        },
                        error:function(){
                            upload_file_tambah.find(".progress-bar").width('0%');
                            toastrshow("warning", "Upload gagal, harap hubungi administrator", "Peringatan");
                            check_status_file = false;
                        },
                        success: function(resp){
                            if(resp == "err"){
                                toastrshow("warning", "Upload gagal, harap hubungi administrator", "Peringatan");
                            } else {
                                var file_name = upload_file_tambah.find(".file-tool")[0].files[0].name;
                                var tipefile_array = file_name.split(".");
                                var tipefile_data = "."+tipefile_array[tipefile_array.length-1];
                                var real_filename = file_name.replace(tipefile_data, "", file_name);
                                upload_file_tambah.find(".foto_file_name").val(real_filename);
                                upload_file_tambah.find(".foto_hidden").val(resp);
                                $("#modal-tambah-upload-file").modal("hide");
                                $(".table-dokumen tbody").append("<tr><td><a class='bold text-info' onclick='window.open("+'"'+cdn_url+"/file_upload/"+upload_file_tambah.find(".foto_hidden").val()+'"'+", \"\", \"width=800,height=400\");'>"+upload_file_tambah.find(".foto_file_name").val()+"</a>&nbsp;&nbsp;&nbsp;<a class='bold text-danger btn-delete-dokumen'><i class='fa fa-times'></i></a></td><td>"+upload_file_tambah.find(".dokumen-keterangan").val()+"</td><td>"+moment().format("DD MMM YYYY HH:mm:ss")+"<input type='hidden' class='dokumen-nama' value='"+upload_file_tambah.find(".foto_file_name").val()+"'><input type='hidden' class='dokumen-file' value='"+upload_file_tambah.find(".foto_hidden").val()+"'><input type='hidden' class='dokumen-keterangan' value='"+upload_file_tambah.find(".dokumen-keterangan").val()+"'><input type='hidden' class='dokumen-created-at' value='"+moment().format("YYYY-MM-DD HH:mm:ss")+"'></td></tr>");
                            }
                            check_status_file = false;
                        }
                    });
                }
            });
            var FrmTambahUploadFile = $("#FrmTambahUploadFile").validate({
                submitHandler: function(form) {
                    laddasubmit = $("#modal-tambah-upload-file").find(".ladda-button-submit");
                    setTimeout(function(){
                        if(upload_file_tambah.find(".file-tool").val() == ""){
                            $("#modal-tambah-upload-file").find(".ladda-button-submit").ladda("stop");
                        } else {
                            StartSaveFile(form);
                        }
                    }, 1000);
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
            function StartSaveFile(form){
                if(check_status_file == false){
                    $("#modal-tambah-upload-file").find(".ladda-button-submit").ladda("stop");
                    // test data
                } else {
                    setTimeout(function(){
                        StartSaveFile(form);
                    }, 1000);
                }
            }

            window.addEventListener('DOMContentLoaded', function() {
                var avatar = document.getElementById('avatar');
                var image = document.getElementById('image');
                var input = document.getElementById('upload-foto-properti');
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
                    cropper = new Cropper(image, {
                        aspectRatio: 1.5,
                        viewMode: 2,
                    });
                }).on('hidden.bs.modal', function() {
                    cropper.destroy();
                    cropper = null;
                });
                document.getElementById('crop').addEventListener('click', function() {
                    var initialAvatarURL;
                    var canvas;
                    $modal.modal('hide');
                    if(cropper) {
                        canvas = cropper.getCroppedCanvas({
                            width: 1200,
                            height: 800,
                        });
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
                                properti_foto.find(".foto_hidden").val("");
                                properti_foto.find(".foto").addClass("d-none");
                                properti_foto.find(".loading-foto").removeClass("d-none");
                                properti_foto.find(".btn-unggah-foto").addClass("disabled").attr("disabled", "disabled");
                            },
                            success: function(respon_file){
                                if(respon_file.IsError != undefined) {
                                    if(respon_file.ErrorMessage[0].error != undefined) {
                                        toastrshow("warning", respon_file.ErrorMessage[0].error, "Peringatan");
                                    } else {
                                        toastrshow("warning", respon_file.ErrorMessage, "Peringatan");
                                    }
                                } else {
                                    properti_foto.find(".foto_hidden").val(respon_file.Output);
                                    properti_foto.find(".detail-foto, .strip-foto, .hapus-foto").removeClass("d-none");
                                    properti_foto.find(".foto").addClass("d-none");
                                    properti_foto.find(".loading-foto").addClass("d-none");
                                    properti_foto.find(".btn-unggah-foto").removeClass("disabled").removeAttr("disabled");
                                }
                            },
                            error: function(xhr, textstatus, errorthrown) {
                                toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
                                properti_foto.find(".hapus-foto").click();
                                properti_foto.find(".loading-foto").addClass("d-none");
                            }
                        });
                    }
                });
            });
        </script>
    </body>
</html>
