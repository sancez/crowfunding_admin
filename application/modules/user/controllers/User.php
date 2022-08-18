<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	public function login(){
		if(!empty($this->session->userdata("user"))) {
            redirect("dashboard");
        } else {
            $this->load->view('user/login.php');
        }
	}

	public function logout() {
        $this->session->sess_destroy();
        redirect("user/login");
    }

    public function edit_profil(){
		$this->load->view("user/edit_profil", array("edit_profil" => "active"));
	}
}