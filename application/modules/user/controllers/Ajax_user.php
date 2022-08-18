<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_user extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("User");
    }
    public function index() {
        $act = $this->input->post("act");
        $this->req  = $this->input->post("req");
        $this->form = $this->input->post("form");
        $this->capt = $this->input->post("captcha");
        $this->is_capt = $this->input->post("is_captcha");
        print_r($this->$act());
    }

    private function login() {
        // $Request = password_hash($Request, PASSWORD_ARGON2I, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 3]);
        $Request = $this->User->LoginProcess($this->capt, $this->form, "Login");
        return $Request;
    }

    private function emptysession() {
        session_start(); 
        session_destroy();
        unset($_SESSION);
        session_regenerate_id(true);
    }

    private function getdatabyid() {
        $Request = $this->User->GetUser(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function updatedata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->User->UpdateUser($id_update, $this->form);
        return $Request;
    }
}
