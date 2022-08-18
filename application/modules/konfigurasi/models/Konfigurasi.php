<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	class Konfigurasi extends CI_Model {

		public function __construct() {
	      	parent::__construct();
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	      	$this->user_login = $this->session->userdata("user_login");
	    }

	    public function GetKonfigurasi(){
			$this->db->where("name", "Biaya Admin");
			$return_data["biaya_admin"] = $this->db->get("tb_setting")->result();

			$this->db->where("name", "Harga Wajar");
			$return_data["harga_wajar"] = $this->db->get("tb_setting")->result();

			$this->db->where("name", "Batas Investasi");
			$return_data["batas_investasi"] = $this->db->get("tb_setting")->result();

			$this->db->where("name", "Batas Topup");
			$return_data["batas_topup"] = $this->db->get("tb_setting")->result();

			$this->db->where("name", "Penghasilan Pertahun");
			$return_data["penghasilan_pertahun"] = $this->db->get("tb_setting")->result();

			$this->db->where("name", "Maksimal Foto Properti");
			$return_data["maksimal_foto_properti"] = $this->db->get("tb_setting")->result();
			return $return_data;
		}

        public function UpdateKonfigurasi($param) {
			$this->db->where("name", "Biaya Admin");
			$param_biaya_admin["value"] = str_replace(".", "", $param["biaya_admin"]);
			$param_biaya_admin["updated_at"] = date("Y-m-d H:i:s");
			$param_biaya_admin["updated_by"] = $this->user->nama;
		    $query = $this->db->update("tb_setting", $param_biaya_admin);
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			} else {
				$this->db->where("name", "Maksimal Foto Properti");
				$param_maksimal_foto_properti["value"] = $param["maksimal_foto_properti"];
				$param_maksimal_foto_properti["updated_at"] = date("Y-m-d H:i:s");
				$param_maksimal_foto_properti["updated_by"] = $this->user->nama;
			    $query = $this->db->update("tb_setting", $param_maksimal_foto_properti);
			    if(!$query){
				   	$return_data["IsError"] = true;
					$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
					return json_encode($return_data);
				} else {
					$this->db->where("name", "Harga Wajar");
					$param_harga_wajar["value"] = str_replace(".", "", $param["harga_wajar"]);
					$param_harga_wajar["updated_at"] = date("Y-m-d H:i:s");
					$param_harga_wajar["updated_by"] = $this->user->nama;
				    $query = $this->db->update("tb_setting", $param_harga_wajar);
				    if(!$query){
					   	$return_data["IsError"] = true;
						$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
						return json_encode($return_data);
					} else {
						$this->db->where("name", "Batas Topup");
						$param_batas_topup["value"] = str_replace(".", "", $param["batas_topup"]);
						$param_batas_topup["updated_at"] = date("Y-m-d H:i:s");
						$param_batas_topup["updated_by"] = $this->user->nama;
					    $query = $this->db->update("tb_setting", $param_batas_topup);
					    if(!$query){
						   	$return_data["IsError"] = true;
							$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
							return json_encode($return_data);
						} else {
							$this->db->where("name", "Batas Investasi");
							$param_batas_investasi["value"] = str_replace(".", "", $param["batas_investasi"]);
							$param_batas_investasi["updated_at"] = date("Y-m-d H:i:s");
							$param_batas_investasi["updated_by"] = $this->user->nama;
						    $query = $this->db->update("tb_setting", $param_batas_investasi);
						    if(!$query){
							   	$return_data["IsError"] = true;
								$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
								return json_encode($return_data);
							} else {
								$this->db->where("name", "Penghasilan Pertahun");
								$param_penghasilan_pertahun["value"] = str_replace(".", "", $param["penghasilan_pertahun"]);
								$param_penghasilan_pertahun["updated_at"] = date("Y-m-d H:i:s");
								$param_penghasilan_pertahun["updated_by"] = $this->user->nama;
							    $query = $this->db->update("tb_setting", $param_penghasilan_pertahun);
							    if(!$query){
								   	$return_data["IsError"] = true;
									$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
									return json_encode($return_data);
								}
							}
						}
					}
				}
			}
		   	return $query;
        }
	}
