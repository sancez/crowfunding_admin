<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
	}
	public function index(){
		$this->load->view("admin", array("admin" => "active"));
	}
}