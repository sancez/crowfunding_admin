<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	class Manajemen_proyek_selesai extends CI_Model {

		public function __construct() {
	      	parent::__construct();
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	      	$this->user_login = $this->session->userdata("user_login");
	    }

	    public function GetManajemenProyekSelesai($param, $disable_page=false){
			$args["search"] = "";
            $return_data["data"] = "";
            $return_data["paging"]["Count"] = "";
            // START SEARCH & FILTER
			if(!empty($param["Search"])) {
				$this->db->where("(
					nama LIKE '%".$param["Search"]."%' OR
					alamat LIKE '%".$param["Search"]."%')"
				, NULL, FALSE);
			}
			if(isset($param["filter"]["status_delete"]) and $param["filter"]["status_delete"] != "") {
            	$this->db->where("status_delete", $param["filter"]["status_delete"]);
			} else {
            	$this->db->where("status_delete", 0);
			}
        	$this->db->where("status_projek", "Selesai");
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
				$return_data["data"] = $this->db->get("v_properti")->result();

				if(!empty($return_data["data"])) {
	    			$this->db->where("id_penerbit", $return_data["data"][0]->id_penerbit);
					$return_data["history_dana"] = $this->db->get("v_kelola_dana")->result();
				} else {
					$return_data["history_dana"] = "";
				}
			} else {
				$return_data["data"] = $this->db->get("v_properti")->result();
	            // START SEARCH & FILTER 
				if(!empty($param["Search"])) {
					$this->db->where("(
						nama LIKE '%".$param["Search"]."%' OR
						alamat LIKE '%".$param["Search"]."%')"
					, NULL, FALSE);
				}
				if(isset($param["filter"]["status_delete"]) and $param["filter"]["status_delete"] != "") {
	            	$this->db->where("status_delete", $param["filter"]["status_delete"]);
				} else {
	            	$this->db->where("status_delete", 0);
				}
        		$this->db->where("status_projek", "Selesai");
	            // END SEARCH & FILTER
	            $return_data["paging"]["Count"] = count($return_data["data"]);
	            $return_data["paging"]["DataDari"] = ($args["Limit"]*$args["Page"])-$args["Limit"]+1;
	            $return_data["paging"]["DataSampai"] = $return_data["paging"]["DataDari"]+$return_data["paging"]["Count"]-1;
	            $return_data["paging"]["HalKe"] = $args["Page"];
	            $return_data["paging"]["Total"] = $this->db->get("v_properti")->num_rows();
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

		public function HtmlManajemenProyekSelesai($param){
		    $rHtml ="";
			$query = $this->GetManajemenProyekSelesai($param);
			
			if(!empty($query["data"])) {
				foreach ($query["data"] as $item) {
                    $foto = json_decode($item->foto);
                    if(empty($foto)){
                        $foto = "<img style='width: 100%; height:auto;' src='".base_url("/assets/images/default-placeholder.png")."'>";
                    } else {
                        $foto = "<img style='width: 100%; height:auto;' src='".$this->config->item("cdn_url")."/".$foto[0]."'>";
                    }
                    if($item->status_active == 1){
                    	$status_active = "<a class='btn btn-outline-primary inactive-manajemen-proyek-selesai mt-1' style='background-color: white !important; color: #3abaf4 !important; border: 1px solid #3abaf4 !important;' data-id='".$item->id."'><i class='fa fa-eye'></i> Active</a>";
                    } else {
                    	$status_active = "<a class='btn btn-outline-primary active-manajemen-proyek-selesai mt-1' style='background-color: white !important; color: #3abaf4 !important; border: 1px solid #3abaf4 !important;' data-id='".$item->id."'><i class='fa fa-eye-slash'></i> Inactive</a>";
                    }
                    if($item->status_transaksi == 1){
                    	$status_transaksi = "<a class='btn btn-outline-primary on-manajemen-proyek-selesai mt-1' style='background-color: white !important; color: #3abaf4 !important; border: 1px solid #3abaf4 !important;' data-id='".$item->id."'>Transaksi : OFF <i class='fa fa-toggle-on'></i> ON</a>";
                    } else {
                    	$status_transaksi = "<a class='btn btn-outline-primary off-manajemen-proyek-selesai mt-1' style='background-color: white !important; color: #fc544b !important; border: 1px solid #fc544b !important;' data-id='".$item->id."'>Transaksi : OFF <i class='fa fa-toggle-off'></i> ON</a>";
                    }
                    $persen_terkumpul = round($item->total_saham_terkumpul/$item->total_per_lembar*100);
                    $keterangan_status = "<span class='badge badge-pill badge-danger text-white'>Gagal</span>";
                    if($persen_terkumpul == 100){
                    	$keterangan_status = "<span class='badge badge-pill badge-success text-white'>Sukses</span>";
                    }
                   //Show Data Selesai
                    date_default_timezone_set('asia/jakarta');                                        
					if($item->start_date <= date("Y-m-d H:i:s") and $item->start_date != null and $item->start_date != '0000-00-00 00:00:00'){
						$rHtml .= "<tr>
								    <td><a href='".base_url()."/manajemen_proyek/verifikasi_proyek_edit.html?id=".$item->id."'><center style='max-height: 130px; overflow: hidden;'>".$foto."</center></a></td>
								    <td>
								    	<label class='bold'><a href='".base_url()."/manajemen_proyek/verifikasi_proyek_edit.html?id=".$item->id."'>".$item->nama."</a>&nbsp;".$keterangan_status."</label><br>
								    	<label>".$item->alamat."</label>
								    	<br>
								    	<a href='".base_url()."/manajemen_proyek/verifikasi_proyek_edit.html?id=".$item->id."' class='btn btn-outline-primary mt-1' style='background-color: white !important; color: #3abaf4 !important; border: 1px solid #3abaf4 !important;' data-id='".$item->id."'><i class='fa fa-edit'></i> Edit</a>
								    	<a class='btn btn-outline-primary history-dana-manajemen-proyek-selesai mt-1' style='background-color: white !important; color: #3abaf4 !important; border: 1px solid #3abaf4 !important;' data-id='".$item->id."'><i class='fa fa-file-invoice-dollar'></i> History Dana</a>
								    	".$status_active."
								    	".$status_transaksi."
								    </td>
								    <td>
								    	<label class='bold'>".$item->total_investor." investor</label><br>
                                        <div class='progress mt-1 mb-1'>
                                            <div class='progress-bar' role='progressbar' aria-valuenow='30' aria-valuemin='0' aria-valuemax='100' style='width:".$persen_terkumpul."%'>
                                            </div>
                                        </div>
								    	<label>Terkumpul ".$persen_terkumpul."% dari ".$item->total_investor."</label><br>
								    	<label class='bold'>Durasi Project</label><br>
								    	<label>&nbsp;&nbsp;<i class='fa fa-calendar-alt' style='font-size: 20px;'></i> Mulai</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								    	<label><i class='fa fa-calendar-check' style='font-size: 20px;'></i> Selesai</label><br>
								    	<label>".date("d M Y", strtotime($item->tgl_mulai))."</label>&nbsp;&nbsp;&nbsp;
								    	<label>".date("d M Y", strtotime($item->tgl_selesai))."</label>
								    </td>
								    <td class='text-right'>
								    	<label class='mb-1'>Jumlah Dana : </label><br>
								    	<label class='mb-1'>Harga Saham : </label><br>
								    	<label class='mb-1'>Total Saham : </label><br>
								    	<label class='mb-1'>Persentase Saham : </label><br>
								    	<label class='mb-1'>Tipe Aset : </label>
								    	<label class='mb-1'>Periode Dividen : </label>
								    </td>
								    <td class='text-right'>
								    	<label class='bold mb-1'>".$this->foglobal->rupiah($item->jumlah_dana, true)."</label><br>
								    	<label class='bold mb-1'>".$this->foglobal->rupiah($item->harga_per_lembar, true)."</label><br>
								    	<label class='bold mb-1'>".$this->foglobal->rupiah($item->total_per_lembar)."</label><br>
								    	<label class='bold mb-1'>".$this->foglobal->persen($item->lepas_saham)."%</label><br>
								    	<label class='bold mb-1'>".$item->tipe_aset."</label><br>
								    	<label class='bold mb-1'>".$item->dividen_period."</label><br>
								    </td>
								</tr>";
					}
                    //End Show Data Selesai
				}
			} else {
				$rHtml = "<tr><td colspan='5' style='padding: 20px !important;' class='text-center'><span class='badge badge-pill badge-warning text-white p-3'>Properti tidak ditemukan</span></td></tr>";
			}
			$Paging = (!empty($query["paging"])) ? $query["paging"] : "";
			$ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
            return json_encode($ReturnData);
		}

        public function UpdateManajemenProyekSelesai($id_update, $param) {
         	$this->db->where("id", $id_update);
		    $query = $this->db->update("tb_properti", $param);
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			}
		   	return $query;
        }
	}
