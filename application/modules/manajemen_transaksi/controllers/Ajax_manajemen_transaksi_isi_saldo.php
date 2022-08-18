<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_manajemen_transaksi_isi_saldo extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("manajemen_transaksi/manajemen_transaksi_isi_saldo");
    }
    public function index() {
        if(!empty($this->session->userdata("user"))) {
            $act = $this->input->post("act");
            $form = $this->input->post("form");
            $this->req  = $this->input->post("req");
            $this->form = $this->input->post("form");
            print_r($this->$act());
        }
    }

    private function listdatahtml() {
        $Request = $this->manajemen_transaksi_isi_saldo->HtmlManajemenTransaksiIsiSaldo($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->manajemen_transaksi_isi_saldo->GetManajemenTransaksiIsiSaldo(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function datadropdown() {
        $Request = $this->manajemen_transaksi_isi_saldo->DropdownManajemenTransaksiIsiSaldo($this->req);
        return $Request;
    }

    private function insertdata() {
        $Request = $this->manajemen_transaksi_isi_saldo->InsertManajemenTransaksiIsiSaldo($this->form);
        return $Request;
    }

    private function updatedata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->manajemen_transaksi_isi_saldo->UpdateManajemenTransaksiIsiSaldo($id_update, $this->form);
        return $Request;
    }

    private function deletedata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->manajemen_transaksi_isi_saldo->HapusManajemenTransaksiIsiSaldo($id_update);
        return $Request;
    }

    private function aktifdata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->manajemen_transaksi_isi_saldo->AktifManajemenTransaksiIsiSaldo($id_update);
        return $Request;
    }
}
