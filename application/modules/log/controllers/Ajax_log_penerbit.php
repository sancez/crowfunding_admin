<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_log_penerbit extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("log/log_penerbit");
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
        $Request = $this->log_penerbit->HtmlLogPenerbit($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->log_penerbit->GetLogPenerbit(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function datadropdown() {
        $Request = $this->log_penerbit->DropdownLogPenerbit($this->req);
        return $Request;
    }

    private function insertdata() {
        $Request = $this->log_penerbit->InsertLogPenerbit($this->form);
        return $Request;
    }

    private function updatedata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->log_penerbit->UpdateLogPenerbit($id_update, $this->form);
        return $Request;
    }

    private function deletedata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->log_penerbit->HapusLogPenerbit($id_update);
        return $Request;
    }

    private function aktifdata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->log_penerbit->AktifLogPenerbit($id_update);
        return $Request;
    }
}
