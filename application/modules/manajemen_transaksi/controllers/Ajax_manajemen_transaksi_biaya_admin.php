<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_manajemen_transaksi_biaya_admin extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("manajemen_transaksi/manajemen_transaksi_biaya_admin");
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
        $Request = $this->manajemen_transaksi_biaya_admin->HtmlManajemenTransaksiBiayaAdmin($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->manajemen_transaksi_biaya_admin->GetManajemenTransaksiBiayaAdmin(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function datadropdown() {
        $Request = $this->manajemen_transaksi_biaya_admin->DropdownManajemenTransaksiBiayaAdmin($this->req);
        return $Request;
    }

    private function insertdata() {
        $Request = $this->manajemen_transaksi_biaya_admin->InsertManajemenTransaksiBiayaAdmin($this->form);
        return $Request;
    }

    private function updatedata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->manajemen_transaksi_biaya_admin->UpdateManajemenTransaksiBiayaAdmin($id_update, $this->form);
        return $Request;
    }

    private function deletedata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->manajemen_transaksi_biaya_admin->HapusManajemenTransaksiBiayaAdmin($id_update);
        return $Request;
    }

    private function aktifdata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->manajemen_transaksi_biaya_admin->AktifManajemenTransaksiBiayaAdmin($id_update);
        return $Request;
    }
}
