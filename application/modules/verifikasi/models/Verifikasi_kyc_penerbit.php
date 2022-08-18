<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	class Verifikasi_kyc_penerbit extends CI_Model {

		public function __construct() {
	      	parent::__construct();
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	      	$this->user_login = $this->session->userdata("user_login");
	    }

	    public function GetVerifikasiKYCPenerbit($param, $disable_page=false){
			$args["search"] = "";
            $return_data["data"] = "";
            $return_data["paging"]["Count"] = "";
            // START SEARCH & FILTER
			if(!empty($param["Search"])) {
				$this->db->where("(
					nama_perusahaan LIKE '%".$param["Search"]."%' OR
					npwp LIKE '%".$param["Search"]."%' OR
					nama_penanggung_jawab LIKE '%".$param["Search"]."%')"
				, NULL, FALSE);
			}
			if(isset($param["filter"]["status_verify"]) and $param["filter"]["status_verify"] != "") {
            	$this->db->where("status_verify", $param["filter"]["status_verify"]);
            	if($param["filter"]["status_verify"] == 0){
        			$this->db->where("status_verify_send", 1);
            	}
			}
            // END SEARCH & FILTER
            if(!empty($param["Sort"])) {
            	$param["Sort"] = explode(" ",trim($param["Sort"]));
            	$this->db->order_by($param["Sort"][0], $param["Sort"][1]);
			}
	    	if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"];
            if(!empty($param["Page"])) $args["Page"] = $param["Page"];
            if(empty($param["Page"])){
            	$args["Limit"] = "10";
            	$args["Page"] = "1";
            }
            if(empty($param["Limit"])){
            	$args["Limit"] = "10";
            }
            if($disable_page == true){
            	$args["Limit"] = "0";
            	$args["Page"] = "0";
            }
            $this->db->limit($args["Limit"], ($args["Limit"]*$args["Page"])-$args["Limit"]);
			if(!empty($param["filter"]["id"])) {
				$this->db->reset_query();
				$this->db->where("id", $param["filter"]["id"]);
				$return_data["data"] = $this->db->get("v_penerbit")->result();
				$this->db->where("id_penerbit", $param["filter"]["id"]);
				$return_data["data_verifikasi"] = $this->db->get("tb_verifikasi_penerbit")->result();
			} else {
				$return_data["data"] = $this->db->get("v_penerbit")->result();
	            // START SEARCH & FILTER 
				if(!empty($param["Search"])) {
					$this->db->where("(
						nama_perusahaan LIKE '%".$param["Search"]."%' OR
						npwp LIKE '%".$param["Search"]."%' OR
						nama_penanggung_jawab LIKE '%".$param["Search"]."%')"
					, NULL, FALSE);
				}
				if(isset($param["filter"]["status_verify"]) and $param["filter"]["status_verify"] != "") {
	            	$this->db->where("status_verify", $param["filter"]["status_verify"]);
	            	if($param["filter"]["status_verify"] == 0){
	        			$this->db->where("status_verify_send", 1);
	            	}
				}
	            // END SEARCH & FILTER
	            $return_data["paging"]["Count"] = count($return_data["data"]);
	            $return_data["paging"]["DataDari"] = ($args["Limit"]*$args["Page"])-$args["Limit"]+1;
	            $return_data["paging"]["DataSampai"] = $return_data["paging"]["DataDari"]+$return_data["paging"]["Count"]-1;
	            $return_data["paging"]["HalKe"] = $args["Page"];
	            $return_data["paging"]["Total"] = $this->db->get("v_penerbit")->num_rows();
	            $return_data["paging"]["InfoPage"] = $return_data["paging"]["DataDari"]." - ".$return_data["paging"]["DataSampai"]." dari ".$return_data["paging"]["Total"];
	            if($return_data["paging"]["Count"] != 0 && (int)$args["Limit"] != 0){
	            	$return_data["paging"]["JmlHalTotal"] = ceil($return_data["paging"]["Total"]/(int)$args["Limit"]);
	            } else {
	            	$return_data["paging"]["JmlHalTotal"] = 1;
	            }
	            if((int)$return_data["paging"]["HalKe"] < $return_data["paging"]["JmlHalTotal"]){
	            	$return_data["paging"]["IsNext"] = true;
	            } else {
	            	$return_data["paging"]["IsNext"] = false;
	            }
	            $return_data["paging"]["IsPaging"] = true;
	            if((int)$return_data["paging"]["HalKe"] <= 1){
	            	$return_data["paging"]["IsPrev"] = false;
	            } else {
	            	$return_data["paging"]["IsPrev"] = true;
	            }
			}
		    return $return_data;
		}

		public function HtmlVerifikasiKYCPenerbit($param){
		    $rHtml ="";
			$query = $this->GetVerifikasiKYCPenerbit($param);
			
			if(!empty($query["data"])) {
				foreach ($query["data"] as $item) {
					$status_verify = "<span class='badge badge-pill badge-warning'>Pending</span>";
					if($item->status_verify == 1){
						$status_verify = "<span class='badge badge-pill badge-success'>Disetujui</span>";
					} else if($item->status_verify == 2){
						$status_verify = "<span class='badge badge-pill badge-danger'>Ditolak</span>";
					}
                    $rHtml .= "<tr>
								    <td class='text-center' style='padding-top:4px !important;'>
								        <div class='btn-group'>
								            <button class='btn btn-info dropdown-toggle button-menu' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
								                <i class='fa fa-bars'></i>
								            </button>
								            <div class='dropdown-menu'>
								                <a href='".base_url("/verifikasi/get_file_penerbit?id=").$item->id."' target='_blank' class='dropdown-item'  data-id='".$item->id."'>Download Data Upload</a>
								                <a href='".base_url("/verifikasi/get_personal_penerbit?id=".$item->id."&by=".$this->user->nama)."' target='_blank' class='dropdown-item' data-id='".$item->id."'>Download Data Personal</a>
								            </div>
								        </div>
								    </td>
								    <td>".date("d M Y", strtotime($item->created_at))."</td>
								    <td>".$item->nama_perusahaan."</td>
								    <td>".$item->nama_penanggung_jawab."</td>
								    <td>".$item->npwp."</td>
								    <td class='text-center'><a class='btn btn-outline-info btn-lihat-lampiran' data-id='".$item->id."'>Lihat</a></td>
								    <td class='text-center'>".$status_verify."</td>
								</tr>";
				}
			} else {
				$rHtml = "<tr><td colspan='7' style='padding: 20px !important;' class='text-center'><span class='badge badge-pill badge-warning'>Tidak ada data</span></td></tr>";
			}
			$Paging = (!empty($query["paging"])) ? $query["paging"] : "";
			$ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
            return json_encode($ReturnData);
		}

        public function UpdateVerifikasiKYCPenerbit($id_update, $param) {
         	$this->db->where("id", $id_update);
		    $query = $this->db->update("tb_penerbit", $param);
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			}
		   	return $query;
        }

        public function VerifikasiKYCPenerbit($id_update, $param) {
			$param_update["status_verify"] = $param["status_verify"];
        	if($param_update["status_verify"] == 1){
        	} else {
				$param_update["status_verify_send"] = 0;
        	}         	
         	$this->db->where("id", $id_update);
		    $query = $this->db->update("tb_penerbit", $param_update);
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			} else {
				unset($param["status_verify"]);
			    $this->db->where("id_penerbit", $id_update);
			    $this->db->delete("tb_verifikasi_penerbit");
			    $param["id_penerbit"] = $id_update;
				$this->db->insert("tb_verifikasi_penerbit", $param);
			}
		   	return $query;
        }

        public function GetFileVerifikasiKYCPenerbit($param){
			$this->db->where("id", $param);
			$return_data["data"] = $this->db->get("v_penerbit")->result();
		    return $return_data;
		}
	}
