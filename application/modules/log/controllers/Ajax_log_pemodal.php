<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_log_pemodal extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("log/log_pemodal");
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
        $Request = $this->log_pemodal->HtmlLogPemodal($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->log_pemodal->GetLogPemodal(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function datadropdown() {
        $Request = $this->log_pemodal->DropdownLogPemodal($this->req);
        return $Request;
    }

    private function insertdata() {
        $Request = $this->log_pemodal->InsertLogPemodal($this->form);
        return $Request;
    }

    private function updatedata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->log_pemodal->UpdateLogPemodal($id_update, $this->form);
        return $Request;
    }

    private function deletedata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->log_pemodal->HapusLogPemodal($id_update);
        return $Request;
    }

    private function aktifdata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->log_pemodal->AktifLogPemodal($id_update);
        return $Request;
    }
}
