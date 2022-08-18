<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	class Foglobal extends CI_Model {
			
		protected $user;

		public function __construct() {
			parent::__construct();
	      	$GLOBALS["database"] = $this->load->database("default", TRUE);
		}

		//String : No. Induk Siswa
		public function GeneratePassSiswa($string) {
			return substr(md5($string), 13, 6);
		}


		function insert_log_admin($id_admin, $tgl, $keterangan, $ip_address) {
	        $args_log_admin["id_admin"] = $id_admin;
			$args_log_admin["tgl"] = $tgl;
		    $args_log_admin["keterangan"] = $keterangan;
			$args_log_admin["ip_address"] = $ip_address;
			$query_log_admin = $GLOBALS["database"]->insert("tb_log_admin_2021", $args_log_admin);
			$args_log_admin["message"] = $query_log_admin; 
			return $args_log_admin;
		}

		function ip_address() {
			$ipaddress_local  = getHostByName(getHostName());
			$ipaddress_online = $this->input->ip_address();
			return ($ipaddress_online == "::1") ? $ipaddress_local: $ipaddress_online;
		}

		function secondsToTime($seconds) {
			if($seconds == 0){
				return "0 detik";
			}
	        $days = floor($seconds / 86400);
	        $seconds -= ($days * 86400);

	        $hours = floor($seconds / 3600);
	        $seconds -= ($hours * 3600);

	        $minutes = floor($seconds / 60);
	        $seconds -= ($minutes * 60);

	        $values = array(
	            'day'    => $days,
	            'hour'   => $hours,
	            'minute' => $minutes,
	            'second' => $seconds
	        );

	        $parts = array();

	        foreach ($values as $text => $value) {
	            if ($value > 0) {
	                $parts[] = $value . ' ' . $text . ($value > 1 ? 's' : '');
	            }
	        }
	        $return = implode(' ', $parts);
	        $return = str_replace("days", "hari", $return);
	        $return = str_replace("hours", "jam", $return);
	        $return = str_replace("minutes", "menit", $return);
	        $return = str_replace("seconds", "detik", $return);
	        return $return;
	    }

	    public function send_wa($target, $pesan){
	    	$curl = curl_init();
			$token = "uv45yPhbssTbEFoQmTTM";
			curl_setopt($curl, CURLOPT_HTTPHEADER,
			    array(
			        "Authorization: $token",
			    )
			);
			$data = [
			    'phone' => $target,
			    'type' => 'text',
			    'delay' => 2,
			    'delay_req' => 2,
			    'text' => $pesan
			];
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($curl, CURLOPT_URL, "https://fonnte.com/api/send_message.php");
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
			$result = curl_exec($curl);
			curl_close($curl);
		}

		public function no_hp($no_hp){
			if($no_hp == "" || $no_hp == null){
				return "";
			} else {
				if(substr($no_hp, 0, 1) == "+"){
					$no_hp = substr($no_hp, 1);
				}
				if(substr($no_hp, 0, 1) == "0"){
					$no_hp = substr($no_hp, 1);
					$no_hp = "62".$no_hp;
				}
			}
			return $no_hp;
		}


		public function rupiah($angka, $with_rp = false){
			if($angka == "" || $angka == null){
				return 0;
			} else {
				$angka = str_replace(".00", "", (string)$angka);
				if($with_rp == true){
					$hasil_rupiah = "Rp" . number_format($angka,0,'','.');
					return $hasil_rupiah."";
				} else {
					$hasil_rupiah = number_format($angka,0,'','.');
					return $hasil_rupiah."";
				}
			}
		}

		public function persen($angka){
            if(substr($angka, -2) == "00"){
                $hasil = substr($angka, 0, -3);
            } else {
            	$hasil = $angka;
            }
             return $hasil;
		}

		public function UploadImage($param) {
			$this->api->setAction("ImageUpload");
            $this->api->setParam($param); 
            $output = $this->api->execute();
            return $output;
		}

		public function DeleteImage($param) {
			$this->api->setAction("ImageDelete");
            $this->api->setParam($param); 
            $output = $this->api->execute();
            return $output;
		}
		
		public function MakeJsonError($message) {
			return json_encode([
				"IsError" => true, 
				"ErrMessage" => $message
			]);
		}

		public function encrypt($string) {
			return hash("ripemd160", md5($string));
		}

		public function RandomWord($len = 5) {
		    $word = array_merge(range('a', 'z'), range('A', 'Z'));
		    shuffle($word);
		    return substr(implode($word), 0, $len);
		}

		public function ImgProfile2Photo($db_image) {
			if(preg_match("/(http|https)/", $db_image)) {
				return $db_image;
			} else {
				$img = str_replace("1|", "", $db_image);
				return base_url("assets/upload/images/".$img);
			}
		}

		public function MakeAlert($message, $type = "warning") {
			return "<div class='alert alert-{$type}'><a role='button' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>{$message}</div>";
		}

		public function IDtoTextKey($id) {
			$data = [1 => "Admin", 2 => "Sekolah", 3 => "Pengguna"];
			return (array_key_exists($id, $data)) ? $data[$id]: "Level tidak valid";
		}

		public function IDtoSex($id) {
	      	$data = [1 => "Laki - laki", 2 => "Perempuan"];
	      	return (array_key_exists($id, $data)) ? $data[$id]: "Jenis Kelamin tidak valid";
	    }

	    public function date_abs($tgl) {
	      $bulan  = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
	      $string = explode("-", $tgl);

	      $stgl   = ($string[2] <= 9) ? "0".$string[2]: $string[2];
	      $sbulan = ($string[1] - 1);
	      $sbulan = (array_key_exists($sbulan, $bulan)) ? $bulan[$sbulan]: "Bulan tidak valid";
	      $stahun = $string[0];

	      return $stgl." ".$sbulan." ".$stahun; 
	    }

	    public function IDtoMonth($id) {
	      	$data = [1 => "Januari", 2 => "Februari", 3 => "Maret", 4 => "April", 5 => "Mei", 6 => "Juni",
	      			 7 => "Juli", 8 => "Agustus", 9 => "September", 10 => "Oktober", 11 => "November", 12 => "Desember"];
	      	return (array_key_exists($id, $data)) ? $data[$id]: "Bulan tidak valid";
	    }

	    public function NumbertoMonth($id) {
	      	$data = [1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun",
	      			 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec"];
	      	return (array_key_exists($id, $data)) ? $data[$id]: "Bulan tidak valid";
	    }

	    public function CheckSessionLogin() {
			if(empty($this->session->userdata("user"))) {
				redirect("user/login");
				return;
			} else {
				$this->db->where("name", "Biaya Admin");
				$get_biaya_admin = $this->db->get("tb_setting")->result();
				$biaya_admin = (int)$get_biaya_admin[0]->value;
				
				$this->db->where("name", "Maksimal Foto Properti");
				$get_maksimal_foto_properti = $this->db->get("tb_setting")->result();
				$maksimal_foto_properti = (int)$get_maksimal_foto_properti[0]->value;

				$this->db->where("id", $this->session->userdata("user")->id);
				$get_user = $this->db->get("tb_admin")->result();
	        	if(empty($this->session->set_userdata)) {
					$this->session->set_userdata(["user" => $get_user[0], "biaya_admin" => $biaya_admin, "maksimal_foto_properti" => $maksimal_foto_properti]);
				}
				else {
					$this->session->sess_destroy();
					$this->session->set_userdata(["user" => $get_user[0], "biaya_admin" => $biaya_admin, "maksimal_foto_properti" => $maksimal_foto_properti]);
				}
			}
			return;
		}


		public function HakAkses($no_urut, $redirect = true) {
			$this->user = $this->session->userdata("user");

			$explode = $this->user->hak_akses;
			if (strpos($explode, $no_urut) !== false) {
			    return true;
			} else {
				if($redirect) redirect("not_found");
				return false;
			}
		}

		public function ApiSession($param) {
			$this->api->set("sekolah/m01_administrator/Controller_karyawan/session", $param);
			return $this->api->exec();
		}

		public function CheckStrip($param) {
		    return !empty($param) ? $param : "-";
		}

		public function formatAngka($angka, $precision = 0) { //contoh format sebelum di convert 1000000 
	      if(is_numeric($angka)) {
	        return number_format($angka, $precision, ",", ".");
	      }
	      return $angka;
	    }
	    
		public function ParseGambar($url) {
			if(preg_match("!(http|https)!", $url)) {
				$url = str_replace("https", "http", $url);
				return $url;
			} else {
				$url = str_replace("2|", "", $url);
				return $this->config->item("cdn_url")."/sekolah/images/".$url;
			}
		}
	}
