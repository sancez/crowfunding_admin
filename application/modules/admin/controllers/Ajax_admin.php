<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_admin extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("admin/admin");
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
        $Request = $this->admin->HtmlAdmin($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->admin->GetAdmin(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function datadropdown() {
        $Request = $this->admin->DropdownAdmin($this->req);
        return $Request;
    }

    private function insertdata() {
        $Request = $this->admin->InsertAdmin($this->form);
        return $Request;
    }

    private function updatedata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->admin->UpdateAdmin($id_update, $this->form);
        return $Request;
    }

    private function deletedata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->admin->HapusAdmin($id_update);
        return $Request;
    }

    private function aktifdata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->admin->AktifAdmin($id_update);
        return $Request;
    }
}
