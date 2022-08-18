<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	class Manajemen_konten_kebijakan_dan_privasi extends CI_Model {

		public function __construct() {
	      	parent::__construct();
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	      	$this->user_login = $this->session->userdata("user_login");
	    }

	    public function GetManajemenKontenKebijakanDanPrivasi(){
			$this->db->where("name", "Kebijakan dan Privasi");
			$return_data["data"] = $this->db->get("tb_setting")->result();
			return $return_data;
		}

        public function UpdateManajemenKontenKebijakanDanPrivasi($param) {
			if($param["value"] == "<p><br></p>"){
			   	$param["value"] = "";
			}
			if($param["value"] == ""){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = "Konten tidak boleh kosong";
				return json_encode($return_data);
			}
			$this->db->where("name", "Kebijakan dan Privasi");
			$param["updated_at"] = date("Y-m-d H:i:s");
			$param["updated_by"] = $this->user->nama;
		    $query = $this->db->update("tb_setting", $param);
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			}
		   	return $query;
        }
	}
