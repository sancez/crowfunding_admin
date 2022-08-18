<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_manajemen_proyek_sedang_berjalan extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("manajemen_proyek/manajemen_proyek_sedang_berjalan");
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
        $Request = $this->manajemen_proyek_sedang_berjalan->HtmlManajemenProyekSedangBerjalan($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->manajemen_proyek_sedang_berjalan->GetManajemenProyekSedangBerjalan(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function updatedata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->manajemen_proyek_sedang_berjalan->UpdateManajemenProyekSedangBerjalan($id_update, $this->form);
        return $Request;
    }
}
