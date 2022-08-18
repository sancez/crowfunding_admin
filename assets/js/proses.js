// LOCAL
var base_url = location.origin + "/crowfunding_admin";
var cdn_url = location.origin + "/crowfunding_cdn/cdn";

/*//ONLINE
var base_url = location.origin;
var cdn_url = "http://cdn.crowfunding.com";*/

$('input').attr('autocomplete','off');
$('#FrmUserLogin input').attr('autocomplete','on');
if($("html").find(".select").hasClass("select")) {
    $(".select").select2({
        minimumResultsForSearch: -1
    });
}
$(".submit-search-header").click(function(){
    $("#header-search").submit();
});

var datanext = 0, dataprev = 0;
var request  = {"filter": {"kywd": ""}};
var act = "", getfunc = "", interval_total_chat;
var l = $(".ladda-button-submit").ladda();

$(".modal").on('show.bs.modal', function () {
    $(this).find(".modal-body").css({"position": "relative", "overflow-y": "scroll", "overflow-x": "hidden", "max-height": ($(window).height()-160)});
    if($(this).find(".modal-footer").hasClass("modal-footer")) {
        $(this).find(".modal-body").css({"position": "relative", "overflow-y": "scroll", "overflow-x": "hidden", "max-height": ($(window).height()-260)});
    }
    if($(this).attr("id").indexOf("modal-status-") != "-1"){
        $(this).find(".modal-body").css("overflow", "inherit");
    }
    if($(this).find("form").attr("id") != undefined){
        $(this).find(".modal-body").css("overflow-y", "scroll");
        if($(this).find("form").attr("id").indexOf("Status") != "-1"){
            $(this).find(".modal-body").css("overflow", "inherit");
        }
    }
    setTimeout(function(){
        $("body").removeClass("modal-open");
    }, 600);
});

function number_add_zero(str, max) {
    str = str.toString();
    return str.length < max ? number_add_zero("0" + str, max) : str;
}

function lastday(y,m){
    return  new Date(y, m +1, 0).getDate();
}

$("html").on("keyup", ".input-uppercase", function() {
    $(this).val($(this).val().toUpperCase());
}).on("keydown", ".input-uppercase", function() {
    $(this).val($(this).val().toUpperCase());
});

function uploadfile(selectorform, successfunc, action) {
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    var formdata = $(selectorform).serialize() +"&act=uploaddata";
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type : "post",
        url: base_url + formaction,
        data :formdata,
        cache : false,
        dataType: 'json',
        beforeSend: function() {
            l.ladda("start");
        },
        success : function(resp){
            l.ladda("stop");
            if(resp.IsError == false) {
                toastrshow("success", "File sukses upload", "Success");
                $(".responfilehidden").val(resp.Output);
                $("#FrmProsesExcel").submit();
            } else {
                toastrshow("warning", resp.Output, "Warning");
            }
        }
    });
}

function toastrshow(type, title, message) {
    message = (typeof message !== 'undefined') ?  message : "";
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: "slideDown",
        positionClass: "toast-top-right",
        timeOut: 4000,
        onclick: null,
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    }
    switch(type) {
        case "success" : toastr["success"](title, message);  break;
        case "info"    : toastr["info"](title, message);     break;
        case "warning" : toastr["warning"](title, message);  break;
        case "error"   : toastr["error"](title, message);    break;
        default        : toastr["info"](title, message);     break;
    }
}

$('.table-responsive').on('show.bs.dropdown', function () {
    $('.table-responsive').css( "overflow", "inherit" );
});

$('.table-responsive').on('hide.bs.dropdown', function () {
    $('.table-responsive').css( "overflow", "auto" );
});

function GetDropdownLokasi(selected, kategori, successfunc, target, option_tambahan) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    option_tambahan = (typeof option_tambahan !== 'undefined') ?  option_tambahan : "";
    var request_dropdown_lokasi  = {"filter": {"kywd": ""}};
    request_dropdown_lokasi["filter"]["option_tambahan"] = option_tambahan;
    request_dropdown_lokasi["filter"]["status"] = kategori;
    $.ajax({
        type: "POST",
        url: base_url + "/lokasi/ajax_lokasi",
        data: {act:"datadropdown", req:request_dropdown_lokasi},
        dataType: "JSON",
        tryCount: 0,
        retryLimit : 3,
        success: function(resp){
            if(target == "" || target == null || target == undefined){
                if(resp.lsdt && resp.lsdt != "undefined") {
                    if(typeof $(".select2.dropdown-lokasi").attr("multiple") !== typeof undefined && $(".select2.dropdown-lokasi").attr("multiple") !== false) {
                        var result  = resp.lsdt;
                    } else {
                        var result  = "<option value=''>Pilih Lokasi</option>";
                        result += resp.lsdt;
                    }
                    $(".dropdown-lokasi").html(result);
                    if(selected != "") {
                        $(".dropdown-lokasi").val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-lokasi").select2({
                    disabled: false
                });
                $(".loading-dropdown-lokasi").addClass("hidden");
            } else {
                if(resp.lsdt && resp.lsdt != "undefined") {
                    var result  = "<option value=''>Pilih Lokasi</option>";
                        result += resp.lsdt;
                    $(".dropdown-lokasi-"+target).html(result);
                    if(selected != "") {
                        $(".dropdown-lokasi-"+target).val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-lokasi-"+target).select2({
                    disabled: false
                });
                $(".loading-dropdown-lokasi-"+target).addClass("hidden");
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            if(target == "" || target == null || target == undefined){
                $(".select2.dropdown-lokasi").select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-lokasi").addClass("hidden");
            } else {
                $(".select2.dropdown-lokasi-"+target).select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-lokasi-"+target).addClass("hidden");
            }
        }
    });
}
function GetDropdownPenerbit(selected, kategori, successfunc, target, option_tambahan) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    option_tambahan = (typeof option_tambahan !== 'undefined') ?  option_tambahan : "";
    var request_dropdown_penerbit  = {"filter": {"kywd": ""}};
    request_dropdown_penerbit["filter"]["option_tambahan"] = option_tambahan;
    request_dropdown_penerbit["filter"]["status"] = kategori;
    request_dropdown_penerbit["filter"]["status_verify"] = 1;
    $.ajax({
        type: "POST",
        url: base_url + "/penerbit/ajax_penerbit",
        data: {act:"datadropdown", req:request_dropdown_penerbit},
        dataType: "JSON",
        tryCount: 0,
        retryLimit : 3,
        success: function(resp){
            if(target == "" || target == null || target == undefined){
                if(resp.lsdt && resp.lsdt != "undefined") {
                    if(typeof $(".select2.dropdown-penerbit").attr("multiple") !== typeof undefined && $(".select2.dropdown-penerbit").attr("multiple") !== false) {
                        var result  = resp.lsdt;
                    } else {
                        var result  = "<option value=''>Pilih Penerbit</option>";
                        result += resp.lsdt;
                    }
                    $(".dropdown-penerbit").html(result);
                    if(selected != "") {
                        $(".dropdown-penerbit").val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-penerbit").select2({
                    disabled: false
                });
                $(".loading-dropdown-penerbit").addClass("hidden");
            } else {
                if(resp.lsdt && resp.lsdt != "undefined") {
                    var result  = "<option value=''>Pilih Penerbit</option>";
                        result += resp.lsdt;
                    $(".dropdown-penerbit-"+target).html(result);
                    if(selected != "") {
                        $(".dropdown-penerbit-"+target).val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-penerbit-"+target).select2({
                    disabled: false
                });
                $(".loading-dropdown-penerbit-"+target).addClass("hidden");
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            if(target == "" || target == null || target == undefined){
                $(".select2.dropdown-penerbit").select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-penerbit").addClass("hidden");
            } else {
                $(".select2.dropdown-penerbit-"+target).select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-penerbit-"+target).addClass("hidden");
            }
        }
    });
}
function GetDropdownAkses(selected, kategori, successfunc, target) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    var request_dropdown_akses  = {"filter": {"kywd": ""}};
    request_dropdown_akses["filter"]["status"] = kategori;
    $.ajax({
        type: "POST",
        url: base_url + "/akses/ajax_akses",
        data: {act:"datadropdown", req:request_dropdown_akses},
        dataType: "JSON",
        tryCount: 0,
        retryLimit : 3,
        success: function(resp){
            if(target == "" || target == null || target == undefined){
                if(resp.lsdt && resp.lsdt != "undefined") {
                    if(typeof $(".select2.dropdown-akses").attr("multiple") !== typeof undefined && $(".select2.dropdown-akses").attr("multiple") !== false) {
                        var result  = resp.lsdt;
                    } else {
                        var result  = "<option value=''>Pilih Akses</option>";
                        result += resp.lsdt;
                    }
                    $(".dropdown-akses").html(result);
                    if(selected != "") {
                        $(".dropdown-akses").val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-akses").select2({
                    disabled: false
                });
                $(".loading-dropdown-akses").addClass("hidden");
            } else {
                if(resp.lsdt && resp.lsdt != "undefined") {
                    var result  = "<option value=''>Pilih Akses</option>";
                        result += resp.lsdt;
                    $(".dropdown-akses-"+target).html(result);
                    if(selected != "") {
                        $(".dropdown-akses-"+target).val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-akses-"+target).select2({
                    disabled: false
                });
                $(".loading-dropdown-akses-"+target).addClass("hidden");
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            if(target == "" || target == null || target == undefined){
                $(".select2.dropdown-akses").select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-akses").addClass("hidden");
            } else {
                $(".select2.dropdown-akses-"+target).select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-akses-"+target).addClass("hidden");
            }
        }
    });
}
function GetDropdownProvinsi(selected, kategori, successfunc, target) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    var request_dropdown_provinsi  = {"filter": {"kywd": ""}};
    request_dropdown_provinsi["filter"]["status"] = kategori;
    $.ajax({
        type: "POST",
        url: base_url + "/master_data/ajax_master_data_provinsi",
        data: {act:"datadropdown", req:request_dropdown_provinsi},
        dataType: "JSON",
        tryCount: 0,
        retryLimit : 3,
        success: function(resp){
            if(target == "" || target == null || target == undefined){
                if(resp.lsdt && resp.lsdt != "undefined") {
                    if(typeof $(".select2.dropdown-provinsi").attr("multiple") !== typeof undefined && $(".select2.dropdown-provinsi").attr("multiple") !== false) {
                        var result  = resp.lsdt;
                    } else {
                        var result  = "<option value=''>Pilih Provinsi</option>";
                        result += resp.lsdt;
                    }
                    $(".dropdown-provinsi").html(result);
                    if(selected != "") {
                        $(".dropdown-provinsi").val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-provinsi").select2({
                    disabled: false
                });
                $(".loading-dropdown-provinsi").addClass("hidden");
            } else {
                if(resp.lsdt && resp.lsdt != "undefined") {
                    var result  = "<option value=''>Pilih Provinsi</option>";
                        result += resp.lsdt;
                    $(".dropdown-provinsi-"+target).html(result);
                    if(selected != "") {
                        $(".dropdown-provinsi-"+target).val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-provinsi-"+target).select2({
                    disabled: false
                });
                $(".loading-dropdown-provinsi-"+target).addClass("hidden");
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            if(target == "" || target == null || target == undefined){
                $(".select2.dropdown-provinsi").select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-provinsi").addClass("hidden");
            } else {
                $(".select2.dropdown-provinsi-"+target).select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-provinsi-"+target).addClass("hidden");
            }
        }
    });
}
function GetDropdownKota(selected, kategori, successfunc, target) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    var request_dropdown_kota = {"filter": {"kywd": ""}};
    request_dropdown_kota["filter"]["id_provinsi"] = kategori;
    $.ajax({
        type: "POST",
        url: base_url + "/master_data/ajax_master_data_kota",
        data: {act:"datadropdown", req:request_dropdown_kota},
        dataType: "JSON",
        tryCount: 0,
        retryLimit : 3,
        success: function(resp){
            if(target == "" || target == null || target == undefined){
                if(resp.lsdt && resp.lsdt != "undefined") {
                    if(typeof $(".select2.dropdown-kota").attr("multiple") !== typeof undefined && $(".select2.dropdown-kota").attr("multiple") !== false) {
                        var result  = resp.lsdt;
                    } else {
                        var result  = "<option value=''>Pilih Kota/Kabupaten</option>";
                        result += resp.lsdt;
                    }
                    $(".dropdown-kota").html(result);
                    if(selected != "") {
                        $(".dropdown-kota").val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-kota").select2({
                    disabled: false
                });
                $(".loading-dropdown-kota").addClass("hidden");
            } else {
                if(resp.lsdt && resp.lsdt != "undefined") {
                    var result  = "<option value=''>Pilih Kota/Kabupaten</option>";
                        result += resp.lsdt;
                    $(".dropdown-kota-"+target).html(result);
                    if(selected != "") {
                        $(".dropdown-kota-"+target).val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-kota-"+target).select2({
                    disabled: false
                });
                $(".loading-dropdown-kota-"+target).addClass("hidden");
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            if(target == "" || target == null || target == undefined){
                $(".select2.dropdown-kota").select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-kota").addClass("hidden");
            } else {
                $(".select2.dropdown-kota-"+target).select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-kota-"+target).addClass("hidden");
            }
        }
    });
}
function GetDropdownKecamatan(selected, kategori, successfunc, target) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    var request_dropdown_kecamatan = {"filter": {"kywd": ""}};
    request_dropdown_kecamatan["filter"]["id_kota"] = kategori;
    $.ajax({
        type: "POST",
        url: base_url + "/master_data/ajax_master_data_kecamatan",
        data: {act:"datadropdown", req:request_dropdown_kecamatan},
        dataType: "JSON",
        tryCount: 0,
        retryLimit : 3,
        success: function(resp){
            if(target == "" || target == null || target == undefined){
                if(resp.lsdt && resp.lsdt != "undefined") {
                    if(typeof $(".select2.dropdown-kecamatan").attr("multiple") !== typeof undefined && $(".select2.dropdown-kecamatan").attr("multiple") !== false) {
                        var result  = resp.lsdt;
                    } else {
                        var result  = "<option value=''>Pilih Kecamatan</option>";
                        result += resp.lsdt;
                    }
                    $(".dropdown-kecamatan").html(result);
                    if(selected != "") {
                        $(".dropdown-kecamatan").val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-kecamatan").select2({
                    disabled: false
                });
                $(".loading-dropdown-kecamatan").addClass("hidden");
            } else {
                if(resp.lsdt && resp.lsdt != "undefined") {
                    var result  = "<option value=''>Pilih Kecamatan</option>";
                        result += resp.lsdt;
                    $(".dropdown-kecamatan-"+target).html(result);
                    if(selected != "") {
                        $(".dropdown-kecamatan-"+target).val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-kecamatan-"+target).select2({
                    disabled: false
                });
                $(".loading-dropdown-kecamatan-"+target).addClass("hidden");
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            if(target == "" || target == null || target == undefined){
                $(".select2.dropdown-kecamatan").select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-kecamatan").addClass("hidden");
            } else {
                $(".select2.dropdown-kecamatan-"+target).select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-kecamatan-"+target).addClass("hidden");
            }
        }
    });
}

function validatedata(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

function rupiah(number){
    if(number == null || number == ""){
        return 0;
    }
    number = number.toString().replace(".00", "");
    number = number.replace(".", "");
    var minus_return = "";
    if(number.indexOf("-") != -1){
        number = number.replace("-", "");
        minus_return = "-";
    }
    var inputan = Number(number);
    var number_string = inputan.toString(), sisa = number_string.length % 3, inputan = number_string.substr(0, sisa), ribuan = number_string.substr(sisa).match(/\d{3}/g); if (ribuan) { separator = sisa ? '.' : ''; inputan += separator + ribuan.join('.'); }
    return minus_return+inputan;
}

function backAway() {
    if(history.length === 1){
        history.back();
    } else {
        history.back();
    }
}

function loader(withtable, colspan) {
    colspan = (colspan != "") ? colspan : "10";
    withtable = (typeof withtable !== 'undefined') ?  withtable : false;
    var html  = '';
    if(withtable == true) html += "<tr><td style='padding: 10px !important;' colspan='"+colspan+"' class='text-center'>";
    html += '<center><img class="loading-gif-image" src="'+base_url+'/assets/images/loading-data.gif" alt="Loading ..."></center>';
    if(withtable == true) html += "</td>";
    return html;
}

function resetformvalue(selector) {
    $(selector).trigger("reset"); //Reset value di form. Kecuali Select2
    $(selector + " select").val("").trigger("change"); //Reset seluruh Select2 yang ada di form
}

function GetData(req, action, table, successfunc, colspan) {
    colspan = (colspan != "") ? colspan : "10";
    req = (typeof req !== 'undefined') ?  req : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    act = (action != "") ? action : "listdatahtml";
    $(".datatable-"+table+" tbody").html(loader(true, colspan));
    $.ajax({
        type: "POST",
        url: base_url + pagename,
        data: {act:act, req:req},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.paging.Total != undefined) {
                $(".datatable-"+table+" tbody").html(resp.lsdt);
                pagination(resp.paging, table);
                if(successfunc != "") {
                    getfunc = successfunc;
                    successfunc(resp);
                }
            } else {
                $(".datatable-"+table+" tbody").html(resp.lsdt);
                $(".pagination-layout-"+table).addClass("d-none");
                if(successfunc != "") {
                    getfunc = successfunc;
                    successfunc(resp);
                }
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            $(".datatable-"+table+" tbody").html("<tr><td style='padding: 20px !important;' colspan='"+colspan+"' class='text-center'><span class='badge badge-pill badge-warning'>Periksa koneksi internet anda kembali</span></td></tr>");
            $(".pagination-layout-"+table).addClass("d-none");
        }
    });
}

function GetDataById(id, successfunc, action, errorfunc) {
    action = (typeof action !== 'undefined') ?  action : "getdatabyid";
    $.ajax({
        type: "POST",
        url: base_url + pagename,
        data: {"act":action, req:id},
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            resp = JSON.parse(resp);
            if(resp.length == 0 || resp.data == "") {
                $(".modal").modal("hide");
                toastrshow("warning", "Data tidak ditemukan", "Peringatan");
            } else {
                successfunc(resp);
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            setTimeout(function(){
                $(".modal").modal("hide");
                toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
            }, 500);
        }
    });
}

function InsertData(selectorform, successfunc, errorfunc) {
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    errorfunc = (typeof errorfunc !== 'undefined') ?  errorfunc : "";
    var formdata   = $(selectorform).serialize() +"&act=insertdata";
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type: "POST",
        url: base_url + formaction,
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            laddasubmit.ladda("start");
        },
        success: function(resp){
            laddasubmit.ladda("stop");
            if(resp.IsError != undefined) {
                if(resp.ErrorMessage[0].error != undefined) {
                    toastrshow("warning", resp.ErrorMessage[0].error, "Peringatan");
                } else {
                    toastrshow("warning", resp.ErrorMessage, "Peringatan");
                }
            } else {
                if(resp == 1 || resp == "1") {
                    toastrshow("success", "Data berhasil disimpan", "Success");
                    $(selectorform).parents(".modal").modal("hide"); //Tutup modal
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                } else {
                    toastrshow("warning", "Data gagal disimpan", "Peringatan");
                }
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            laddasubmit.ladda("stop");
            setTimeout(function(){
                $(".modal").modal("hide");
                toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
            }, 500);
        }
    });
}

function UpdateData(selectorform, successfunc, errorfunc, namefunct) {
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    errorfunc = (typeof errorfunc !== 'undefined') ?  errorfunc : "";
    namefunct = (typeof namefunct !== 'undefined') ?  namefunct : "updatedata";
    var formdata   = $(selectorform).serialize() +"&act="+namefunct;
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type: "POST",
        url: base_url + formaction,
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            laddasubmit.ladda("start");
        },
        success: function(resp){
            laddasubmit.ladda("stop");
            if(resp.IsError != undefined) {
                if(resp.ErrorMessage[0].error != undefined) {
                    toastrshow("warning", resp.ErrorMessage[0].error, "Peringatan");
                } else {
                    toastrshow("warning", resp.ErrorMessage, "Peringatan");
                }
            } else {
                if(resp == 1 || resp == "1") {
                    toastrshow("success", "Data berhasil disimpan", "Success");
                    $(selectorform).parents(".modal").modal("hide"); //Tutup modal
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                } else {
                    toastrshow("error", "Data gagal disimpan", "Peringatan");
                    if(errorfunc != "") {
                        errorfunc();
                    }
                }
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            laddasubmit.ladda("stop");
            setTimeout(function(){
                $(".modal").modal("hide");
                toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
            }, 500);
        }
    });
}

function DeleteData(selectorform, successfunc, errorfunc) {
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    errorfunc = (typeof errorfunc !== 'undefined') ?  errorfunc : "";
    var formdata   = $(selectorform).serialize() +"&act=deletedata";
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type: "POST",
        url: base_url + formaction,
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            laddasubmit.ladda("start");
        },
        success: function(resp){
            laddasubmit.ladda("stop");
            if(resp == 1 || resp == "1") {
                toastrshow("success", "Data berhasil dihapus", "Success");
                $(selectorform).parents(".modal").modal("hide"); //Tutup modal
                if(successfunc != "") {
                    successfunc(resp);
                }
            } else {
                toastrshow("error", "Data gagal dihapus", "Peringatan");
                if(errorfunc != "") {
                    errorfunc();
                }
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            laddasubmit.ladda("stop");
            setTimeout(function(){
                $(".modal").modal("hide");
                toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
            }, 500);
        }
    });
}


function AktifData(selectorform, successfunc, errorfunc) {
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    errorfunc = (typeof errorfunc !== 'undefined') ?  errorfunc : "";
    var formdata   = $(selectorform).serialize() +"&act=aktifdata";
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type: "POST",
        url: base_url + formaction,
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            laddasubmit.ladda("start");
        },
        success: function(resp){
            laddasubmit.ladda("stop");
            if(resp == 1 || resp == "1") {
                toastrshow("success", "Data berhasil diaktifkan", "Success");
                $(selectorform).parents(".modal").modal("hide"); //Tutup modal
                if(successfunc != "") {
                    successfunc(resp);
                }
            } else {
                toastrshow("error", "Data gagal diaktifkan", "Peringatan");
                if(errorfunc != "") {
                    errorfunc();
                }
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            laddasubmit.ladda("stop");
            setTimeout(function(){
                $(".modal").modal("hide");
                toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
            }, 500);
        }
    });
}

// START PAGINATION -------------------------------------------------------------------
function pagination(page, table) {
    var paginglayout = $(".pagination-layout-"+table);
    var infopage = page.InfoPage+" Records | "+page.JmlHalTotal+" Pages";
    
    paginglayout.removeClass("d-none");
    paginglayout.find("input[type='text']").val(Number(page.HalKe));
    paginglayout.find("div.info").html(infopage);
    if(page.IsNext == true) {
        paginglayout.find(".btn.next, .next-head").removeClass("disabled").removeAttr("disabled");
        paginglayout.find(".btn.last").removeClass("disabled").removeAttr("disabled");
        paginglayout.find(".btn.last").attr("lastpage", page.JmlHalTotal);
        datanext = (Number(page.HalKe) + 1);
    } else {
        paginglayout.find(".btn.next, .next-head").addClass("disabled").attr("disabled", "disabled");
        paginglayout.find(".btn.last").addClass("disabled").attr("disabled", "disabled");
        dataprev = 0;
    }
    if(page.IsPrev == true) {
        paginglayout.find(".btn.prev, .prev-head").removeClass("disabled").removeAttr("disabled");
        paginglayout.find(".btn.first").removeClass("disabled").removeAttr("disabled");
        dataprev = (Number(page.HalKe) - 1);
    } else {
        paginglayout.find(".btn.prev, .prev-head").addClass("disabled").attr("disabled", "disabled");
        paginglayout.find(".btn.first").addClass("disabled").attr("disabled", "disabled");
        dataprev = 0;
    }
}
function setpagination(page, table) {
    var paginglayout = $(".set-pagination-layout-"+table);
    var infopage = page.InfoPage+" Records | "+page.JmlHalTotal+" Pages";
    paginglayout.removeClass("d-none");
    paginglayout.find("input[type='text']").val(Number(page.HalKe));
    paginglayout.find("div.info").html(infopage);
    if(page.IsNext == true) {
        paginglayout.find(".btn.next").removeClass("disabled");
        paginglayout.find(".btn.last").removeClass("disabled");
        paginglayout.find(".btn.last").attr("lastpage", page.JmlHalTotal);
        datanext = (Number(page.HalKe) + 1);
    } else {
        paginglayout.find(".btn.next").addClass("disabled");
        paginglayout.find(".btn.last").addClass("disabled");
        dataprev = 0;
    }
    if(page.IsPrev == true) {
        paginglayout.find(".btn.prev").removeClass("disabled");
        paginglayout.find(".btn.first").removeClass("disabled");
        dataprev = (Number(page.HalKe) - 1);
    } else {
        paginglayout.find(".btn.prev").addClass("disabled");
        paginglayout.find(".btn.first").addClass("disabled");
        dataprev = 0;
    }
}
$(".btn.next").click(function() {
    var table = $(this).parent().parent().parent().parent().attr("class");
    var classdata = table.replace(/modal-footer set-pagination-layout-/g, "", table);
    table = table.replace(classdata, "", table);
    if(table == "modal-footer set-pagination-layout-"){
        pagename = $(this).parent().parent().parent().attr("pagename");
        request["Page"] = datanext;
        GetListGroup(request, act, classdata, getfunc);
    } else {
        pagename = $(this).parent().parent().parent().parent().parent().parent().attr("pagename");
        colspan = $(this).parent().parent().parent().parent().parent().parent().attr("data-colspan");
        var table = $(this).parent().parent().parent().parent().parent().parent().attr("class");
        table = table.replace(/pagination-layout-/g, "", table);
        request["Page"] = datanext;
        GetData(request, act, table, getfunc, colspan);
    }
});
$(".btn.prev").click(function() {
    var table = $(this).parent().parent().parent().parent().attr("class");
    var classdata = table.replace(/modal-footer set-pagination-layout-/g, "", table);
    table = table.replace(classdata, "", table);
    if(table == "modal-footer set-pagination-layout-"){
        pagename = $(this).parent().parent().parent().attr("pagename");
        request["Page"] = dataprev;
        GetListGroup(request, act, classdata, getfunc);
    } else {
        pagename = $(this).parent().parent().parent().parent().parent().parent().attr("pagename");
        colspan = $(this).parent().parent().parent().parent().parent().parent().attr("data-colspan");
        var table = $(this).parent().parent().parent().parent().parent().parent().attr("class");
        table = table.replace(/pagination-layout-/g, "", table);
        request["Page"] = dataprev;
        GetData(request, act, table, getfunc, colspan);
    }
});
$(".btn.first").click(function() {
    var table = $(this).parent().parent().parent().parent().parent().parent().attr("class");
    table = table.replace(/pagination-layout-/g, "", table);
    request["Page"] = 1;
    pagename = $(this).parent().parent().parent().parent().parent().parent().attr("pagename");
    colspan = $(this).parent().parent().parent().parent().parent().parent().attr("data-colspan");
    GetData(request, act, table, getfunc, colspan);
});
$(".btn.last").click(function() {
    var table = $(this).parent().parent().parent().parent().parent().parent().attr("class");
    table = table.replace(/pagination-layout-/g, "", table);
    request["Page"] = $(this).attr('lastpage');
    pagename = $(this).parent().parent().parent().parent().parent().parent().attr("pagename");
    colspan = $(this).parent().parent().parent().parent().parent().parent().attr("data-colspan");
    GetData(request, act, table, getfunc, colspan);
});
$(".limit").change(function() {
    var table = $(this).parent().parent().parent().parent().attr("class");
    table = table.replace(/pagination-layout-/g, "", table);
    var limit = $(this).val();
    pagename = $(this).parent().parent().parent().parent().attr("pagename");
    colspan = $(this).parent().parent().parent().parent().attr("data-colspan");
    request["Limit"] = limit;
    GetData(request, act, table, getfunc, colspan);
});
$("#FrmGotoPage").submit(function() {
    var table = $(this).parent().parent().parent().attr("class");
    table = table.replace(/pagination-layout-/g, "", table);
    var page = $(this).find("input[type='text']").val();
    request["Page"] = page;
    pagename = $(this).parent().parent().parent().attr("pagename");
    colspan = $(this).parent().parent().parent().attr("data-colspan");
    GetData(request, act, table, getfunc, colspan);
    return false;
});

$(".btn.next-head").click(function() {
    var table = $(this).parent().attr("class");
    table = table.replace(/btn-group pagination-layout-/g, "", table);
    request["Page"] = datanext;
    pagename = $(this).parent().attr("pagename");
    colspan = $(this).parent().attr("data-colspan");
    GetData(request, act, table, getfunc, colspan);
});
$(".btn.prev-head").click(function() {
    var table = $(this).parent().attr("class");
    table = table.replace(/btn-group pagination-layout-/g, "", table);
    request["Page"] = dataprev;
    pagename = $(this).parent().attr("pagename");
    colspan = $(this).parent().attr("data-colspan");
    GetData(request, act, table, getfunc, colspan);
});
// END PAGINATION ---------------------------------------------------------------------