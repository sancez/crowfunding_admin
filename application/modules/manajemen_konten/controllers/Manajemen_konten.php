<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_konten extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
	}
	public function syarat_dan_ketentuan(){
		$this->load->view("syarat_dan_ketentuan", array("manajemen_konten" => "active", "manajemen_konten_syarat_dan_ketentuan" => "active"));
	}
	public function kebijakan_dan_privasi(){
		$this->load->view("kebijakan_dan_privasi", array("manajemen_konten" => "active", "manajemen_konten_kebijakan_dan_privasi" => "active"));
	}
	public function risiko(){
		$this->load->view("risiko", array("manajemen_konten" => "active", "manajemen_konten_risiko" => "active"));
	}
	public function banner(){
		$this->load->view("banner", array("manajemen_konten" => "active", "manajemen_konten_banner" => "active"));
	}
	public function untuk_di_perhatikan(){
		$this->load->view("untuk_di_perhatikan", array("manajemen_konten" => "active", "manajemen_konten_untuk_di_perhatikan" => "active"));
	}
	public function daftar_penerbit(){
		$this->load->view("daftar_penerbit", array("manajemen_konten" => "active", "manajemen_konten_daftar_penerbit" => "active"));
	}
}