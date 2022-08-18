<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_konfigurasi extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("konfigurasi/konfigurasi");
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

    private function getdatabyid() {
        $Request = $this->konfigurasi->GetKonfigurasi();
        return json_encode($Request);
    }

    private function updatedata() {
        $Request = $this->konfigurasi->UpdateKonfigurasi($this->form);
        return $Request;
    }
}
