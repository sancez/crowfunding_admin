<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_manajemen_investor extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("manajemen_investor/manajemen_investor");
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
        $Request = $this->manajemen_investor->HtmlManajemenInvestor($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->manajemen_investor->GetManajemenInvestor(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function updatedata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->manajemen_investor->UpdateManajemenInvestor($id_update, $this->form);
        return $Request;
    }
}
