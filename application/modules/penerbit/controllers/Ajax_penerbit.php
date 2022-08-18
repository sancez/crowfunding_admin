<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_penerbit extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("penerbit/penerbit");
    }
    public function index() {
        $act = $this->input->post("act");
        $form = $this->input->post("form");
        $this->req  = $this->input->post("req");
        $this->form = $this->input->post("form");
        print_r($this->$act());
    }

    private function listdatahtml() {
        $Request = $this->penerbit->HtmlPenerbit($this->req);
        return $Request;
    }

    private function getdata() {
        $Request = $this->penerbit->GetPenerbit($this->req);
        return json_encode($Request);
    }

    private function getdatabyid() {
        $Request = $this->penerbit->GetPenerbit(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function datadropdown() {
        $Request = $this->penerbit->DropdownPenerbit($this->req);
        return $Request;
    }
}
