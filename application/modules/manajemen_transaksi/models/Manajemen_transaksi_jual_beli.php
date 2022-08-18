<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	class Manajemen_transaksi_jual_beli extends CI_Model {

		public function __construct() {
	      	parent::__construct();
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	      	$this->user_login = $this->session->userdata("user_login");
	    }

	    public function GetManajemenTransaksiJualBeli($param, $disable_page=false){
			$args["search"] = "";
            $return_data["data"] = "";
            $return_data["paging"]["Count"] = "";
            // START SEARCH & FILTER
			if(!empty($param["Search"])) {
				$this->db->where("(
					no_transaksi LIKE '%".$param["Search"]."%' OR
					nama_pemodal LIKE '%".$param["Search"]."%' OR
					nama_properti LIKE '%".$param["Search"]."%' OR
					nama_perusahaan LIKE '%".$param["Search"]."%')"
				, NULL, FALSE);
			}
			if(isset($param["filter"]["status_delete"]) and $param["filter"]["status_delete"] != "") {
            	$this->db->where("status_delete", $param["filter"]["status_delete"]);
			} else {
            	$this->db->where("status_delete", 0);
			}
			if(isset($param["filter"]["tanggal_mulai"]) and $param["filter"]["tanggal_mulai"] != "") {
            	$this->db->where("tgl >=", date("Y-m-d", strtotime($param["filter"]["tanggal_mulai"]))." 00:00:00");
        		$this->db->where("tgl <=", date("Y-m-d", strtotime($param["filter"]["tanggal_selesai"]))." 23:59:59");
			}
			if(isset($param["filter"]["status_verifikasi"]) and $param["filter"]["status_verifikasi"] != "") {
            	$this->db->where("status_verifikasi", $param["filter"]["status_verifikasi"]);
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
				$return_data["data"] = $this->db->get("v_transaksi")->result();
			} else {
				$return_data["data"] = $this->db->get("v_transaksi")->result();
	            // START SEARCH & FILTER 
				if(!empty($param["Search"])) {
					$this->db->where("(
						no_transaksi LIKE '%".$param["Search"]."%' OR
						nama_pemodal LIKE '%".$param["Search"]."%' OR
						nama_properti LIKE '%".$param["Search"]."%' OR
						nama_perusahaan LIKE '%".$param["Search"]."%')"
					, NULL, FALSE);
				}
				if(isset($param["filter"]["status_delete"]) and $param["filter"]["status_delete"] != "") {
	            	$this->db->where("status_delete", $param["filter"]["status_delete"]);
				} else {
	            	$this->db->where("status_delete", 0);
				}
				if(isset($param["filter"]["tanggal_mulai"]) and $param["filter"]["tanggal_mulai"] != "") {
	            	$this->db->where("tgl >=", date("Y-m-d", strtotime($param["filter"]["tanggal_mulai"]))." 00:00:00");
	        		$this->db->where("tgl <=", date("Y-m-d", strtotime($param["filter"]["tanggal_selesai"]))." 23:59:59");
				}
				if(isset($param["filter"]["status_verifikasi"]) and $param["filter"]["status_verifikasi"] != "") {
	            	$this->db->where("status_verifikasi", $param["filter"]["status_verifikasi"]);
				}
	            // END SEARCH & FILTER
	            $return_data["paging"]["Count"] = count($return_data["data"]);
	            $return_data["paging"]["DataDari"] = ($args["Limit"]*$args["Page"])-$args["Limit"]+1;
	            $return_data["paging"]["DataSampai"] = $return_data["paging"]["DataDari"]+$return_data["paging"]["Count"]-1;
	            $return_data["paging"]["HalKe"] = $args["Page"];
	            $return_data["paging"]["Total"] = $this->db->get("v_transaksi")->num_rows();
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

		public function HtmlManajemenTransaksiJualBeli($param){
		    $rHtml ="";
			$query = $this->GetManajemenTransaksiJualBeli($param);
			if(!empty($query["data"])) {
				foreach ($query["data"] as $item) {
					if($item->status_verifikasi == 1){
						$status = "<span class='badge badge-pill badge-success'>Selesai</span>";
					} else if($item->status_verifikasi == 2){
						$status = "<span class='badge badge-pill badge-dabger'>Gagal</span>";
					} else {
						$status = "<span class='badge badge-pill badge-warning'>Proses</span>";
					}
                    $rHtml .= "<tr>
								    <td class='text-center' style='padding-top:4px !important;'>
								        <div class='btn-group'>
								            <button class='btn btn-info dropdown-toggle button-menu' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
								                <i class='fa fa-bars'></i>
								            </button>
								            <div class='dropdown-menu'>
								                <a class='dropdown-item detail-manajemen-transaksi-jual-beli' data-id='".$item->id."'><i class='fa fa-eye button-icon'></i> Detail</a>
								            </div>
								        </div>
								    </td>
								    <td>".$item->no_transaksi."</td>
								    <td>".$item->nama_pemodal."</td>
								    <td>".date("d M Y H:i:s", strtotime($item->tgl))."</td>
								    <td class='text-right'>".$this->foglobal->rupiah($item->total_transaksi, false, true)."</td>
								    <td>".$item->nama_properti."</td>
								    <td>".$item->nama_perusahaan."</td>
								    <td>".$status."</td>
								</tr>";

				}
			} else {
				$rHtml = "<tr><td colspan='8' style='padding: 20px !important;' class='text-center'><span class='badge badge-pill badge-warning'>Tidak ada data</span></td></tr>";
			}
			$Paging = (!empty($query["paging"])) ? $query["paging"] : "";
			$ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
            return json_encode($ReturnData);
		}

		public function DropdownManajemenTransaksiJualBeli($param) {
			$rHtml ="";
			$query = $this->GetManajemenTransaksiJualBeli($param, true);
			if(!empty($query["data"])) {
				foreach ($query["data"] as $item) {
					 $rHtml .= '<option value="'.$item->id.'">'.$item->nama.'</option>';
				}
			} else {
				$rHtml = '<option disabled value="">Tidak Ada Data</option>';
			}
            $ReturnData = ["lsdt" => $rHtml];
            return json_encode($ReturnData);
		}

		public function InsertManajemenTransaksiJualBeli($args) {
			if(isset($args["username"])) {
            	$this->db->where("username", $args["username"]);
            	$GetManajemenTransaksiJualBeli = $this->db->get("tb_transaksi")->result();
				if(!empty($GetManajemenTransaksiJualBeli)){
					$return_data["IsError"] = true;
					$return_data["ErrorMessage"] = "Username telah terdaftar";
					return json_encode($return_data);
				}
			}
			$args["tgl_lahir"] = date("Y-m-d", strtotime($args["tgl_lahir"]));
		    $args["password"] = password_hash($args["password"], PASSWORD_DEFAULT);
			$args["created_at"] = date("Y-m-d H:i:s");
			$args["updated_at"] = date("Y-m-d H:i:s");
			$args["created_by"] = $this->user->nama;
			$args["updated_by"] = $this->user->nama;
			$query = $this->db->insert("tb_transaksi", $args);
			if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			}
		   	return $query;
        }

        public function UpdateManajemenTransaksiJualBeli($id_update, $param) {
         	$this->db->where("id", $id_update);
			$param["updated_at"] = date("Y-m-d H:i:s");
			$param["updated_by"] = $this->user->nama;
		    $query = $this->db->update("tb_transaksi", $param);
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			}
		   	return $query;
        }

        public function HapusManajemenTransaksiJualBeli($id_update) {
         	$this->db->where("id", $id_update);
		    $param["status_delete"] = 1;
			$param["updated_at"] = date("Y-m-d H:i:s");
			$param["updated_by"] = $this->user->nama;
		    $query = $this->db->update("tb_transaksi", $param);
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			}
		   	return $query;
        }

        public function AktifManajemenTransaksiJualBeli($id_update) {
         	$this->db->where("id", $id_update);
		    $param["status_delete"] = 0;
			$param["updated_at"] = date("Y-m-d H:i:s");
			$param["updated_by"] = $this->user->nama;
		    $query = $this->db->update("tb_transaksi", $param);
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			}
		   	return $query;
        }
	}
