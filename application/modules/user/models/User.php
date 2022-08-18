<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends CI_Model {

		public function __construct() {
	      	$this->load->database();
	      	parent::__construct();
	    }

        public function Login($param, $func) {
			$args['username'] = $param['username'];
        	$args['password'] = $param['password'];
			$this->db->where("username", $args['username']);
			$get_user = $this->db->get("tb_admin")->result();
			if(!empty($get_user)) {
				if (password_verify($args['password'], $get_user[0]->password)) {
				// if (password_verify($args['password'], str_replace("$", "\$", $get_user[0]->password))) {
				   	$return_data["IsError"] = false;
        			$return_data["Data"] = $get_user[0];
				} else {
				    $return_data["IsError"] = true;
        			$return_data["Data"] = "Login gagal! Password yang anda masukkan salah.";
				}
			} else {
        		$return_data["IsError"] = true;
        		$return_data["Data"] = "Login gagal! Username yang anda masukkan tidak terdaftar.";
			}
			return $return_data;
		}

		public function LoginProcess($captcha, $param, $func) {
			$id_karyawan = "";

			/*if(empty($captcha)) {
				$IsError = true;
				$rHtml = "Mohon masukkan captcha dengan benar";
				goto returnData;
			} else if ($captcha == "tanpa_captcha") {
				$IsError = false;
			} else {
				$response = $this->recaptcha->verifyResponse($captcha);
				if($response["success"] === false) {
					$IsError = true;
					$rHtml = "Mohon masukkan captcha dengan benar";
					goto returnData;
				}
			}*/

			$UserData = $this->Login($param, $func);
			$IsError  = $UserData["IsError"];

			if($UserData["IsError"] == false) {
				$Data = $UserData["Data"];
				$rHtml = "success";
				if(empty($this->session->set_userdata)) {
					$this->session->set_userdata(["user" => $Data, "user_login" => (object)$param]);
				}
				else {
					$this->session->sess_destroy();
					$this->session->set_userdata(["user" => $Data, "user_login" => (object)$param]);
				}
				$this->user = $this->session->userdata("user");

			} else {
				$IsError = true;
				$rHtml = "Login gagal! Hubungi administrator.";

				if(empty($UserData["Data"])) {
					$IsError = true;
					$rHtml = "Login gagal! Username/password yang anda masukkan tidak terdaftar.";
					goto returnData;
				} else {
					$IsError = true;
					$rHtml = $UserData["Data"];
					goto returnData;
				}
			}
			
			returnData:
			$ReturnData = ["IsError" => $IsError, "lsdt" => $rHtml];
			return json_encode($ReturnData);
		}
	}
