<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
	}
	public function admin(){
		$this->load->view("log_admin", array("log" => "active", "log_admin" => "active"));
	}
	public function penerbit(){
		$this->load->view("log_penerbit", array("log" => "active", "log_penerbit" => "active"));
	}
	public function pemodal(){
		$this->load->view("log_pemodal", array("log" => "active", "log_pemodal" => "active"));
	}
}