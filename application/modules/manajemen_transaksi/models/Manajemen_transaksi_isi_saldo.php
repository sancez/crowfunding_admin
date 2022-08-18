<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	class Manajemen_transaksi_isi_saldo extends CI_Model {

		public function __construct() {
	      	parent::__construct();
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	      	$this->user_login = $this->session->userdata("user_login");
	    }

	    public function GetManajemenTransaksiIsiSaldo($param, $disable_page=false){
			$args["search"] = "";
            $return_data["data"] = "";
            $return_data["paging"]["Count"] = "";
            // START SEARCH & FILTER
			if(!empty($param["Search"])) {
				$this->db->where("(
					no_transaksi LIKE '%".$param["Search"]."%' OR
					va LIKE '%".$param["Search"]."%' OR
					nama_pemodal LIKE '%".$param["Search"]."%' OR
					keterangan LIKE '%".$param["Search"]."%')"
				, NULL, FALSE);
			}
			if(isset($param["filter"]["status_delete"]) and $param["filter"]["status_delete"] != "") {
            	$this->db->where("status_delete", $param["filter"]["status_delete"]);
			} else {
            	$this->db->where("status_delete", 0);
			}
			if(isset($param["filter"]["status"]) and $param["filter"]["status"] != "") {
            	$this->db->where("status", $param["filter"]["status"]);
			}
			if(isset($param["filter"]["tanggal_mulai"]) and $param["filter"]["tanggal_mulai"] != "") {
            	$this->db->where("created_at >=", date("Y-m-d", strtotime($param["filter"]["tanggal_mulai"]))." 00:00:00");
        		$this->db->where("created_at <=", date("Y-m-d", strtotime($param["filter"]["tanggal_selesai"]))." 23:59:59");
			}
			$this->db->where("metode_pembayaran !=", "");
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
				$return_data["data"] = $this->db->get("v_topup")->result();
			} else {
				$return_data["data"] = $this->db->get("v_topup")->result();
	            // START SEARCH & FILTER 
				if(!empty($param["Search"])) {
					$this->db->where("(
						no_transaksi LIKE '%".$param["Search"]."%' OR
						va LIKE '%".$param["Search"]."%' OR
						nama_pemodal LIKE '%".$param["Search"]."%' OR
						keterangan LIKE '%".$param["Search"]."%')"
					, NULL, FALSE);
				}
				if(isset($param["filter"]["status_delete"]) and $param["filter"]["status_delete"] != "") {
	            	$this->db->where("status_delete", $param["filter"]["status_delete"]);
				} else {
	            	$this->db->where("status_delete", 0);
				}
				if(isset($param["filter"]["status"]) and $param["filter"]["status"] != "") {
	            	$this->db->where("status", $param["filter"]["status"]);
				}
				if(isset($param["filter"]["tanggal_mulai"]) and $param["filter"]["tanggal_mulai"] != "") {
	            	$this->db->where("created_at >=", date("Y-m-d", strtotime($param["filter"]["tanggal_mulai"]))." 00:00:00");
	        		$this->db->where("created_at <=", date("Y-m-d", strtotime($param["filter"]["tanggal_selesai"]))." 23:59:59");
				}
				$this->db->where("metode_pembayaran !=", "");
	            // END SEARCH & FILTER
	            $return_data["paging"]["Count"] = count($return_data["data"]);
	            $return_data["paging"]["DataDari"] = ($args["Limit"]*$args["Page"])-$args["Limit"]+1;
	            $return_data["paging"]["DataSampai"] = $return_data["paging"]["DataDari"]+$return_data["paging"]["Count"]-1;
	            $return_data["paging"]["HalKe"] = $args["Page"];
	            $return_data["paging"]["Total"] = $this->db->get("v_topup")->num_rows();
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

		public function HtmlManajemenTransaksiIsiSaldo($param){
		    $rHtml ="";
			$query = $this->GetManajemenTransaksiIsiSaldo($param);
			if(!empty($query["data"])) {
				foreach ($query["data"] as $item) {
					if($item->status == 1){
						$status = "<span class='badge badge-pill badge-success'>Selesai</span>";
					} else if($item->status == 2){
						$status = "<span class='badge badge-pill badge-warning'>Gagal</span>";
					} else {
						$status = "<span class='badge badge-pill badge-warning'>Proses</span>";
					}
					
								    /*<td class='text-center' style='padding-top:4px !important;'>
								        <div class='btn-group'>
								            <button class='btn btn-info dropdown-toggle button-menu' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
								                <i class='fa fa-bars'></i>
								            </button>
								            <div class='dropdown-menu'>
								                <a class='dropdown-item detail-manajemen-transaksi-biaya-admin' data-id='".$item->id."'><i class='fa fa-eye button-icon'></i> Detail</a>
								            </div>
								        </div>
								    </td>*/
                    $rHtml .= "<tr>
								    <td>".$item->no_transaksi."</td>
								    <td>".$item->va."</td>
								    <td>".$item->nama_pemodal."</td>
								    <td>".$item->metode_pembayaran."</td>
								    <td class='text-right'>".$this->foglobal->rupiah($item->nominal, false, true)."</td>
								    <td>".$item->keterangan."</td>
								    <td>".date("d M Y H:i:s", strtotime($item->created_at))."</td>
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
	}
