<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_verifikasi_kyc_investor extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("verifikasi/verifikasi_kyc_investor");
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
        $Request = $this->verifikasi_kyc_investor->HtmlVerifikasiKYCInvestor($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->verifikasi_kyc_investor->GetVerifikasiKYCInvestor(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function updatedata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->verifikasi_kyc_investor->UpdateVerifikasiKYCInvestor($id_update, $this->form);
        return $Request;
    }

    private function verifikasidata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->verifikasi_kyc_investor->VerifikasiKYCInvestor($id_update, $this->form);
        return $Request;
    }
}
