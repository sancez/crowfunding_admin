<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends MY_Controller  {
    function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		echo "Logs";
		$table = '';
		$data = array(
			'id'					=> "",
			'username_posting'		=> $username_posting,
			'username_comment'		=> $username_comment,
			'id_percakapan_publik'	=> $id_percakapan_publik,
			'pesan'					=> $pesan,
			'tgl_pesan'				=> $tgl_pesan,
			'suka'					=> $suka,
			'status'				=> 'Belum Dibaca'
		);
		$this->db->insert($table,$data);
	}

    
}