<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	class Manajemen_penerbit extends CI_Model {

		public function __construct() {
	      	parent::__construct();
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	      	$this->user_login = $this->session->userdata("user_login");
	    }

	    public function GetManajemenPenerbit($param, $disable_page=false){
			$args["search"] = "";
            $return_data["data"] = "";
            $return_data["paging"]["Count"] = "";
            // START SEARCH & FILTER
			if(!empty($param["Search"])) {
				$this->db->where("(
					nama_perusahaan LIKE '%".$param["Search"]."%' OR
					npwp LIKE '%".$param["Search"]."%' OR
					nama_properti LIKE '%".$param["Search"]."%' OR
					nama_penanggung_jawab LIKE '%".$param["Search"]."%')"
				, NULL, FALSE);
			}
			if(isset($param["filter"]["status_delete"]) and $param["filter"]["status_delete"] != "") {
            	$this->db->where("status_delete", $param["filter"]["status_delete"]);
			}
        	$this->db->where("status_verify", 1);
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
						nama_properti LIKE '%".$param["Search"]."%' OR
						nama_penanggung_jawab LIKE '%".$param["Search"]."%')"
					, NULL, FALSE);
				}
				if(isset($param["filter"]["status_delete"]) and $param["filter"]["status_delete"] != "") {
	            	$this->db->where("status_delete", $param["filter"]["status_delete"]);
				}
        		$this->db->where("status_verify", 1);
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

		public function HtmlManajemenPenerbit($param){
		    $rHtml ="";
			$query = $this->GetManajemenPenerbit($param);
			
			if(!empty($query["data"])) {
				foreach ($query["data"] as $item) {
					$status_delete = "<span class='badge badge-pill badge-success'>Active</span>";
					$btn_status_delete = "<a class='dropdown-item inactive-manajemen-penerbit' data-id='".$item->id."'>Inactive</a>";
					if($item->status_delete == 1){
						$status_delete = "<span class='badge badge-pill badge-danger'>Inactive</span>";
						$btn_status_delete = "<a class='dropdown-item active-manajemen-penerbit' data-id='".$item->id."'>Active</a>";
					}
					if($item->id_properti == "" || $item->id_properti == null){
						$btn_view_project = "";
					} else {
						$btn_view_project = "<a href='".base_url('manajemen_proyek/verifikasi_proyek_edit.html?id=').$item->id_properti."' class='dropdown-item' data-id='".$item->id."'>View Project</a>
											<a class='dropdown-item dividen-manajemen-penerbit' data-id='".$item->id."'>History Dividen</a>";
					}
                    $rHtml .= "<tr>
								    <td class='text-center' style='padding-top:4px !important;'>
								        <div class='btn-group'>
								            <button class='btn btn-info dropdown-toggle button-menu' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
								                <i class='fa fa-bars'></i>
								            </button>
								            <div class='dropdown-menu'>
								                ".$btn_status_delete."
								                ".$btn_view_project."
								            </div>
								        </div>
								    </td>
								    <td>".$item->nama_perusahaan."</td>
								    <td>".$item->nama_penanggung_jawab."</td>
								    <td>".$item->npwp."</td>
								    <td class='text-center'><a class='btn btn-outline-info btn-lihat-lampiran' data-id='".$item->id."'>Lihat</a></td>
								    <td>".$item->nama_properti."</td>
								    <td class='text-center'>".$status_delete."</td>
								</tr>";
				}
			} else {
				$rHtml = "<tr><td colspan='7' style='padding: 20px !important;' class='text-center'><span class='badge badge-pill badge-warning'>Tidak ada data</span></td></tr>";
			}
			$Paging = (!empty($query["paging"])) ? $query["paging"] : "";
			$ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
            return json_encode($ReturnData);
		}

        public function UpdateManajemenPenerbit($id_update, $param) {
         	$this->db->where("id", $id_update);
		    $query = $this->db->update("tb_penerbit", $param);
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			}
		   	return $query;
        }
	}
