<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akses extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
	}
	public function index(){
		$this->load->view("akses", array("akses" => "active"));
	}
}