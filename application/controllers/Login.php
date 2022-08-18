<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller  {
    function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		if(!empty($this->session->userdata("user"))) {
            redirect("dashboard");
        } else {
            $this->load->view('user/login.php');
        }
	}

    public function login() {
        if(!empty($this->session->userdata("user"))) {
            redirect("dashboard");
        } else {
            $this->load->view('user/login.php');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->load->view('user/login.php');
    }

    public function session_token_expired() {
        $this->session->sess_destroy();
        $this->session->set_userdata("notifikasi", "<div class='alert alert-warning'><a role='button' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>Silahkan login dahulu untuk melanjutkan</div>");
        $this->load->view('user/login.php');
    }

    /*public function forgot() {
        if(!empty($this->session->userdata("user"))) {
            redirect("beranda");
        } else {
             $this->load->view("login/forgot");
        }
    }

    public function reset() {
        if(!empty($this->session->userdata("user"))) {
            redirect("beranda");
        } else {
            $this->load->view("login/resetpass");
        }
    }*/
}