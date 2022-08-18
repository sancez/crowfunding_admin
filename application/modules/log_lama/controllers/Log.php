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
}