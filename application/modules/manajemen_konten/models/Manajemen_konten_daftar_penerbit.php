<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	class Manajemen_konten_daftar_penerbit extends CI_Model {

		public function __construct() {
	      	parent::__construct();
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	      	$this->user_login = $this->session->userdata("user_login");
	    }

	    public function GetManajemenKontenDaftarPenerbit(){
			$this->db->where("name", "Gambar Daftar Penerbit 1");
			$return_data["data_gambar_1"] = $this->db->get("tb_setting")->result();
			$this->db->where("name", "Gambar Daftar Penerbit 2");
			$return_data["data_gambar_2"] = $this->db->get("tb_setting")->result();
			return $return_data;
		}

        public function UpdateManajemenKontenDaftarPenerbit($param) {
			if($param["gambar_1"] == "" || $param["gambar_2"] == ""){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = "Konten tidak boleh kosong";
				return json_encode($return_data);
			}
			$param_update_gambar_1["value"] = $param["gambar_1"];
			$param_update_gambar_1["updated_at"] = date("Y-m-d H:i:s");
			$param_update_gambar_1["updated_by"] = $this->user->nama;
			$this->db->where("name", "Gambar Daftar Penerbit 1");
		    $query = $this->db->update("tb_setting", $param_update_gambar_1);
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			} else {
				$param_update_gambar_2["value"] = $param["gambar_2"];
				$param_update_gambar_2["updated_at"] = date("Y-m-d H:i:s");
				$param_update_gambar_2["updated_by"] = $this->user->nama;
				$this->db->where("name", "Gambar Daftar Penerbit 2");
			    $query_2 = $this->db->update("tb_setting", $param_update_gambar_2);
			    if(!$query_2){
				   	$return_data["IsError"] = true;
					$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
					return json_encode($return_data);
				}
				return $query_2;
			}
		   	return $query;
        }
	}
