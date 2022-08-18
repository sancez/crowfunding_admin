<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	class Properti extends CI_Model {

		public function __construct() {
	      	parent::__construct();
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	      	$this->user_login = $this->session->userdata("user_login");
	    }

	    public function GetProperti($param, $disable_page=false){
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
    		$this->db->where("status_delete", 0);
			if(isset($param["filter"]["id_lokasi"]) and $param["filter"]["id_lokasi"] != "") {
            	$this->db->where("id_lokasi", $param["filter"]["id_lokasi"]);
			}
			if(isset($param["filter"]["tipe_aset"]) and $param["filter"]["tipe_aset"] != "") {
            	$this->db->where("tipe_aset", $param["filter"]["tipe_aset"]);
			}
			if(isset($param["filter"]["status_projek"]) and $param["filter"]["status_projek"] != "") {
            	$this->db->where("status_projek", $param["filter"]["status_projek"]);
			}
			if(isset($param["filter"]["dividen_period"]) and $param["filter"]["dividen_period"] != "") {
            	$this->db->where("dividen_period", $param["filter"]["dividen_period"]);
			}
			if(isset($param["filter"]["nilai_investasi"]) and $param["filter"]["nilai_investasi"] != "") {
            	if($param["filter"]["nilai_investasi"] == "< 3M"){
            		$this->db->where("jumlah_dana <", 3000000000);
            	}
            	if($param["filter"]["nilai_investasi"] == "3M - 6M"){
            		$this->db->where("jumlah_dana >=", 3000000000);
            		$this->db->where("jumlah_dana <=", 6000000000);
            	}
            	if($param["filter"]["nilai_investasi"] == "> 6M"){
            		$this->db->where("jumlah_dana >", 6000000000);
            	}
			}
			if(isset($param["filter"]["array_id"]) and !empty($param["filter"]["array_id"])) {
				$this->db->where_not_in("id", $param["filter"]["array_id"]);
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
				$this->db->where("id", $param["filter"]["id"]);
				$return_data["data"] = $this->db->get("v_properti")->result();
			} else {
				$return_data["data"] = $this->db->get("v_properti")->result();
	            // START SEARCH & FILTER 
				if(!empty($param["Search"])) {
					$this->db->where("(
						nama LIKE '%".$param["Search"]."%' OR
						alamat LIKE '%".$param["Search"]."%')"
					, NULL, FALSE);
				}
    			$this->db->where("status_delete", 0);
				if(isset($param["filter"]["id_lokasi"]) and $param["filter"]["id_lokasi"] != "") {
	            	$this->db->where("id_lokasi", $param["filter"]["id_lokasi"]);
				}
				if(isset($param["filter"]["tipe_aset"]) and $param["filter"]["tipe_aset"] != "") {
	            	$this->db->where("tipe_aset", $param["filter"]["tipe_aset"]);
				}
				if(isset($param["filter"]["status_projek"]) and $param["filter"]["status_projek"] != "") {
	            	$this->db->where("status_projek", $param["filter"]["status_projek"]);
				}
				if(isset($param["filter"]["dividen_period"]) and $param["filter"]["dividen_period"] != "") {
	            	$this->db->where("dividen_period", $param["filter"]["dividen_period"]);
				}
				if(isset($param["filter"]["nilai_investasi"]) and $param["filter"]["nilai_investasi"] != "") {
	            	if($param["filter"]["nilai_investasi"] == "< 3M"){
	            		$this->db->where("jumlah_dana <", 3000000000);
	            	}
	            	if($param["filter"]["nilai_investasi"] == "3M - 6M"){
	            		$this->db->where("jumlah_dana >=", 3000000000);
	            		$this->db->where("jumlah_dana <=", 6000000000);
	            	}
	            	if($param["filter"]["nilai_investasi"] == "> 6M"){
	            		$this->db->where("jumlah_dana >", 6000000000);
	            	}
				}
				if(isset($param["filter"]["array_id"]) and !empty($param["filter"]["array_id"])) {
					$this->db->where_not_in("id", $param["filter"]["array_id"]);
				}
	            // END SEARCH & FILTER
	            $return_data["paging"]["Count"] = count($return_data["data"]);
	            $return_data["paging"]["DataDari"] = ($args["Limit"]*$args["Page"])-$args["Limit"]+1;
	            $return_data["paging"]["DataSampai"] = $return_data["paging"]["DataDari"]+$return_data["paging"]["Count"]-1;
	            $return_data["paging"]["HalKe"] = $args["Page"];
	            $return_data["paging"]["Total"] = $this->db->get("v_properti")->num_rows();
	            $return_data["paging"]["InfoPage"] = $return_data["paging"]["DataDari"]." - ".$return_data["paging"]["DataSampai"]." from ".$return_data["paging"]["Total"];
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

		public function HtmlProperti($param){
		    $rHtml ="";
			$query = $this->GetProperti($param);
			$array_id = array();
			if(isset($param["filter"]["array_id"]) and !empty($param["filter"]["array_id"])) {
				foreach ($param["filter"]["array_id"] as $item_id) {
					array_push($array_id, $item_id);
				}
			}
			if(!empty($query["data"])) {
				foreach ($query["data"] as $item) {
                    $foto = json_decode($item->foto);
                    if(empty($foto)){
                        $foto = "<img style='width: 100%; height:auto;' src='".base_url("/assets/images/default-placeholder.png")."'>";
                    } else {
                        $foto = "<img style='width: 100%; height:auto;' src='".$this->config->item("cdn_url")."/".$foto[0]."'>";
                    }
                    $status_projek = "";
                    if($item->status_projek == "Selesai"){
                    	$status_projek = "<br><br><label class='bold'><i class='fa fa-calendar-check'></i> ".$item->status_projek."</label>";
                    }
                    if($item->status_projek == "Tersedia"){
                    	$status_projek = "<br><br><a href='".base_url("/properti/edit.html?id=").$item->id."' class='btn btn-primary'>Perbarui</a>";
                    }
                    if($item->status_projek == "Menunggu Konfirmasi"){
                    	$status_projek = "<br><br><label class='bold'><i class='fa fa-history'></i> ".$item->status_projek."</label>";
                    }
                    $persen_terkumpul = round($item->total_saham_terkumpul/$item->total_per_lembar*100);
                    $rHtml .= "<tr>
								    <td><a target='_blank' href='".$this->config->item("home_url")."/properti/detail.html?id=".$item->id."'><center style='max-height: 130px; overflow: hidden;'>".$foto."</center></a></td>
								    <td>
								    	<label class='bold'><a target='_blank' href='".$this->config->item("home_url")."/properti/detail.html?id=".$item->id."'>".$item->nama."</a></label><br><br>
								    	<label>".$item->alamat."</label>
								    	".$status_projek."
								    </td>
								    <td>
								    	<label class='bold'>".$item->total_investor." investor</label><br>
                                        <div class='progress mt-1 mb-1'>
                                            <div class='progress-bar' role='progressbar' aria-valuenow='30' aria-valuemin='0' aria-valuemax='100' style='width:".$persen_terkumpul."%'>
                                            </div>
                                        </div>
								    	<label>Terkumpul ".$persen_terkumpul."% dari ".$item->total_investor."</label><br><br>
								    	<label class='bold'>Durasi Project</label><br>
								    	<label>&nbsp;&nbsp;<i class='las la-calendar' style='font-size: 20px;'></i> Mulai</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								    	<label><i class='las la-calendar-check' style='font-size: 20px;'></i> Selesai</label><br>
								    	<label>".date("d M Y", strtotime($item->tgl_mulai))."</label>&nbsp;&nbsp;&nbsp;
								    	<label>".date("d M Y", strtotime($item->tgl_selesai))."</label>
								    </td>
								    <td class='text-right'>
								    	<label class='mb-1'>Jumlah Dana : </label><br>
								    	<label class='mb-1'>Harga Per Lembar : </label><br>
								    	<label class='mb-1'>Total Saham : </label><br>
								    	<label class='mb-1'>ROI : </label><br>
								    	<label class='mb-1'>Periode Dividen : </label>
								    </td>
								    <td class='text-right'>
								    	<label class='bold mb-1'>".$this->foglobal->rupiah($item->jumlah_dana, true)."</label><br>
								    	<label class='bold mb-1'>".$this->foglobal->rupiah($item->harga_per_lembar, true)."</label><br>
								    	<label class='bold mb-1'>".$this->foglobal->rupiah($item->total_per_lembar)."</label><br>
								    	<label class='bold mb-1'>".$this->foglobal->persen($item->roi)."%</label><br>
								    	<label class='bold mb-1'>".$item->dividen_period."</label><br>
								    </td>
								</tr>";
					array_push($array_id, $item->id);
				}
			} else {
				$rHtml = "<tr><td colspan='5' style='padding: 20px !important;' class='text-center'><span class='badge badge-pill badge-warning text-white p-3'>Properti tidak ditemukan</span></td></tr>";
			}
			$Paging = (!empty($query["paging"])) ? $query["paging"] : "";
			$ReturnData = ["lsdt" => $rHtml, "paging" => $Paging, "array_id" => $array_id];
            return json_encode($ReturnData);
		}

		public function DropdownProperti($param) {
			$rHtml ="";
			$query = $this->GetProperti($param, true);
			if(!empty($query["data"])) {
				foreach ($query["data"] as $item) {
					 $rHtml .= '<option value="'.$item->id.'">'.$item->name_event.'</option>';
				}
			} else {
				$rHtml = '<option disabled value="">No data</option>';
			}
            $ReturnData = ["lsdt" => $rHtml];
            return json_encode($ReturnData);
		}

		public function InsertProperti($args) {
			$properti_dokumen = $args["properti_dokumen"];
			$properti_grafik_progress = $args["properti_grafik_progress"];
			unset($args["properti_dokumen"]);
			unset($args["properti_grafik_progress"]);
			if($args["jumlah_dana"] == "" || $args["harga_per_lembar"] == "" || $args["total_per_lembar"] == "" || $args["dividen_period"] == "" || $args["roi"] == "" || $args["lepas_saham"] == "" || $args["nama"] == "" || $args["latitude"] == "" || $args["longitude"] == "" || $args["alamat"] == "" || $args["id_lokasi"] == ""){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = "Semua form wajib diisi";
				return json_encode($return_data);
			}
			$args["latitude_longitude"] = $args["latitude"].", ".$args["longitude"];
			unset($args["latitude"]);
			unset($args["longitude"]);
			$args["created_at"] = date("Y-m-d H:i:s");
			$args["created_by"] = $this->user->nama;
			$args["updated_at"] = date("Y-m-d H:i:s");
			$args["updated_by"] = $this->user->nama;
			$args["jumlah_dana"] = str_replace(".", "", $args["jumlah_dana"]);
			$args["harga_per_lembar"] = str_replace(".", "", $args["harga_per_lembar"]);
			$args["total_per_lembar"] = str_replace(".", "", $args["total_per_lembar"]);
			$args["status_projek"] = "Menunggu Konfirmasi";
			$args["tgl_mulai"] = date("Y-m-d");
			$args["tgl_selesai"] = date("Y-m-d");
			$query = $this->db->insert("tb_properti", $args);
			if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			} else {
			   	$return_data["query"] = $query;
				$return_data["id"] = $this->db->insert_id();
				$properti_dokumen = json_decode($properti_dokumen, false);
				$data_properti_dokumen = array();
				foreach ($properti_dokumen as $item) {
	            	array_push($data_properti_dokumen, array(
	            		"id_properti"		=> $return_data["id"],
                    	"nama"				=> $item->nama,
						"file"				=> $item->file,
						"keterangan"		=> $item->keterangan,
						"created_at"		=> $item->created_at,
						"updated_at"		=> $item->created_at,
						"created_by"		=> $this->user->nama,
						"updated_by"		=> $this->user->nama
                    ));
                }
				if(!empty($data_properti_dokumen)) {
					$this->db->insert_batch("tb_properti_dokumen", $data_properti_dokumen);
				}
				$properti_grafik_progress = json_decode($properti_grafik_progress, false);
				$data_properti_grafik_progress = array();
				$tgl_mulai = strtotime(date("Y-m-d"));
				$tgl_selesai = strtotime(date("Y-m-d"));
				foreach ($properti_grafik_progress as $item) {
					if(strtotime($item->tgl_mulai) <= $tgl_mulai){
						$tgl_mulai = strtotime($item->tgl_mulai);
					}
					if(strtotime($item->tgl_selesai) >= $tgl_selesai){
						$tgl_selesai = strtotime($item->tgl_selesai);
					}
	            	array_push($data_properti_grafik_progress, array(
	            		"id_properti"		=> $return_data["id"],
                    	"foto"				=> $item->foto,
						"keterangan"		=> $item->keterangan,
						"tgl_mulai"			=> $item->tgl_mulai,
						"tgl_selesai"		=> $item->tgl_selesai,
						"progress"			=> $item->progress
                    ));
                }
				if(!empty($data_properti_grafik_progress)) {
					$this->db->insert_batch("tb_properti_progres", $data_properti_grafik_progress);
		         	$this->db->where("id", $return_data["id"]);
		         	$param_update_properti["tgl_mulai"] = date("Y-m-d", $tgl_mulai);
		         	$param_update_properti["tgl_selesai"] = date("Y-m-d", $tgl_selesai);
				    $this->db->update("tb_properti", $param_update_properti);
				}
				return json_encode($query);
			}
		   	return $query;
        }

        public function UpdateProperti($id_update, $param) {
			$properti_dokumen = $param["properti_dokumen"];
			$properti_grafik_progress = $param["properti_grafik_progress"];
			unset($param["properti_dokumen"]);
			unset($param["properti_grafik_progress"]);
			if($param["jumlah_dana"] == "" || $param["harga_per_lembar"] == "" || $param["total_per_lembar"] == "" || $param["dividen_period"] == "" || $param["roi"] == "" || $param["lepas_saham"] == "" || $param["nama"] == "" || $param["latitude"] == "" || $param["longitude"] == "" || $param["alamat"] == "" || $param["id_lokasi"] == ""){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = "Semua form wajib diisi";
				return json_encode($return_data);
			}
			$param["latitude_longitude"] = $param["latitude"].", ".$param["longitude"];
			unset($param["latitude"]);
			unset($param["longitude"]);
			$param["created_at"] = date("Y-m-d H:i:s");
			$param["created_by"] = $this->user->nama;
			$param["updated_at"] = date("Y-m-d H:i:s");
			$param["updated_by"] = $this->user->nama;
			$param["jumlah_dana"] = str_replace(".", "", $param["jumlah_dana"]);
			$param["harga_per_lembar"] = str_replace(".", "", $param["harga_per_lembar"]);
			$param["total_per_lembar"] = str_replace(".", "", $param["total_per_lembar"]);
			// $param["status_projek"] = "Menunggu Konfirmasi";
         	$this->db->where("id", $id_update);
		    $query = $this->db->update("tb_properti", $param);
			if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			} else {
			    $this->db->where("id_properti", $id_update);
			    $this->db->delete("tb_properti_dokumen");
			    $this->db->where("id_properti", $id_update);
			    $this->db->delete("tb_properti_progres");

			   	$return_data["query"] = $query;
				$return_data["id"] = $id_update;
				$properti_dokumen = json_decode($properti_dokumen, false);
				$data_properti_dokumen = array();
				foreach ($properti_dokumen as $item) {
	            	array_push($data_properti_dokumen, array(
	            		"id_properti"		=> $return_data["id"],
                    	"nama"				=> $item->nama,
						"file"				=> $item->file,
						"keterangan"		=> $item->keterangan,
						"created_at"		=> $item->created_at,
						"updated_at"		=> $item->created_at,
						"created_by"		=> $this->user->nama,
						"updated_by"		=> $this->user->nama
                    ));
                }
				if(!empty($data_properti_dokumen)) {
					$this->db->insert_batch("tb_properti_dokumen", $data_properti_dokumen);
				}
				$properti_grafik_progress = json_decode($properti_grafik_progress, false);
				$data_properti_grafik_progress = array();
				$tgl_mulai = strtotime(date("Y-m-d"));
				$tgl_selesai = strtotime(date("Y-m-d"));
				foreach ($properti_grafik_progress as $item) {
					if(strtotime($item->tgl_mulai) <= $tgl_mulai){
						$tgl_mulai = strtotime($item->tgl_mulai);
					}
					if(strtotime($item->tgl_selesai) >= $tgl_selesai){
						$tgl_selesai = strtotime($item->tgl_selesai);
					}
	            	array_push($data_properti_grafik_progress, array(
	            		"id_properti"		=> $return_data["id"],
                    	"foto"				=> $item->foto,
						"keterangan"		=> $item->keterangan,
						"tgl_mulai"			=> $item->tgl_mulai,
						"tgl_selesai"		=> $item->tgl_selesai,
						"progress"			=> $item->progress
                    ));
                }
				if(!empty($data_properti_grafik_progress)) {
					$this->db->insert_batch("tb_properti_progres", $data_properti_grafik_progress);
		         	$this->db->where("id", $return_data["id"]);
		         	$param_update_properti["tgl_mulai"] = date("Y-m-d", $tgl_mulai);
		         	$param_update_properti["tgl_selesai"] = date("Y-m-d", $tgl_selesai);
				    $this->db->update("tb_properti", $param_update_properti);
				}
				return json_encode($query);
			}
		   	return $query;
        }

        public function HapusProperti($id_update) {
		    $this->db->where("id", $id_update);
		    $query = $this->db->delete("tb_properti");
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			}
		   	return $query;
        }
	}
