<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
      	$this->user = $this->session->userdata("user");
		$this->foglobal->CheckSessionLogin();
		$this->load->library("Pdf");
		$this->load->library("Pdf_personal_investor");
		$this->load->library("Pdf_personal_penerbit");
		$this->load->library("excel");
        $this->load->helper('url');
        $this->load->library('zip');
        $this->load->model("verifikasi/verifikasi_kyc_investor");
        $this->load->model("verifikasi/verifikasi_kyc_penerbit");
	}

	public function kyc_investor(){
		$this->load->view("kyc_investor", array("verifikasi" => "active", "verifikasi_kyc_investor" => "active"));
	}
	public function kyc_penerbit(){
		$this->load->view("kyc_penerbit", array("verifikasi" => "active", "verifikasi_kyc_penerbit" => "active"));
	}

    public function get_file_investor() {
        $Request = $this->verifikasi_kyc_investor->GetFileVerifikasiKYCInvestor($_GET["id"]);
        if($Request["data"][0]->foto_ktp == "" || $Request["data"][0]->foto_ktp == null){
        } else {
        	$file_format = explode('.', $Request["data"][0]->foto_ktp);
        	$filepath = FCPATH."/../crowfunding_cdn/cdn/".$Request["data"][0]->foto_ktp;
        	$this->zip->read_file($filepath, "KTP.".end($file_format));
        }
        if($Request["data"][0]->foto_selfie_ktp == "" || $Request["data"][0]->foto_selfie_ktp == null){
        } else {
        	$file_format = explode('.', $Request["data"][0]->foto_selfie_ktp);
        	$filepath = FCPATH."/../crowfunding_cdn/cdn/".$Request["data"][0]->foto_selfie_ktp;
        	$this->zip->read_file($filepath, "Selfie KTP.".end($file_format));
        }
        if($Request["data"][0]->foto_npwp == "" || $Request["data"][0]->foto_npwp == null){
        } else {
        	$file_format = explode('.', $Request["data"][0]->foto_npwp);
        	$filepath = FCPATH."/../crowfunding_cdn/cdn/".$Request["data"][0]->foto_npwp;
        	$this->zip->read_file($filepath, "NPWP.".end($file_format));
        }
        if($Request["data"][0]->foto_selfie_npwp == "" || $Request["data"][0]->foto_selfie_npwp == null){
        } else {
        	$file_format = explode('.', $Request["data"][0]->foto_selfie_npwp);
        	$filepath = FCPATH."/../crowfunding_cdn/cdn/".$Request["data"][0]->foto_selfie_npwp;
        	$this->zip->read_file($filepath, "Selfie NPWP.".end($file_format));
        }
        if($Request["data"][0]->foto_buku_tabungan == "" || $Request["data"][0]->foto_buku_tabungan == null){
        } else {
			foreach (json_decode($Request["data"][0]->foto_buku_tabungan) as $index=>$item) {
	        	$file_format = explode('.', $item->file);
	        	$filepath = FCPATH."/../crowfunding_cdn/cdn/file_upload/".$item->file;
	        	$this->zip->read_file($filepath, "Buku Tabungan - ".($index+1).".".end($file_format));
			}
        }
        $filename = $Request["data"][0]->nama.".zip";
        $this->zip->download($filename);
    }

    public function get_file_penerbit() {
        $Request = $this->verifikasi_kyc_penerbit->GetFileVerifikasiKYCPenerbit($_GET["id"]);

        if($Request["data"][0]->unggah_siup == "" || $Request["data"][0]->unggah_siup == null){
        } else {
        	$file_format = explode('.', $Request["data"][0]->unggah_siup);
        	$filepath = FCPATH."/../crowfunding_cdn/cdn/".$Request["data"][0]->unggah_siup;
        	$this->zip->read_file($filepath, "SIUP.".end($file_format));
        }

        if($Request["data"][0]->unggah_nib == "" || $Request["data"][0]->unggah_nib == null){
        } else {
        	$file_format = explode('.', $Request["data"][0]->unggah_nib);
        	$filepath = FCPATH."/../crowfunding_cdn/cdn/".$Request["data"][0]->unggah_nib;
        	$this->zip->read_file($filepath, "NIB.".end($file_format));
        }

        if($Request["data"][0]->unggah_npwp_perusahaan == "" || $Request["data"][0]->unggah_npwp_perusahaan == null){
        } else {
        	$file_format = explode('.', $Request["data"][0]->unggah_npwp_perusahaan);
        	$filepath = FCPATH."/../crowfunding_cdn/cdn/".$Request["data"][0]->unggah_npwp_perusahaan;
        	$this->zip->read_file($filepath, "NPWP Perusahaan.".end($file_format));
        }

        if($Request["data"][0]->unggah_ktp_penanggung_jawab == "" || $Request["data"][0]->unggah_ktp_penanggung_jawab == null){
        } else {
        	$file_format = explode('.', $Request["data"][0]->unggah_ktp_penanggung_jawab);
        	$filepath = FCPATH."/../crowfunding_cdn/cdn/".$Request["data"][0]->unggah_ktp_penanggung_jawab;
        	$this->zip->read_file($filepath, "KTP Penanggung Jawab.".end($file_format));
        }

        if($Request["data"][0]->unggah_ktp_direksi == "" || $Request["data"][0]->unggah_ktp_direksi == null){
        } else {
        	$file_format = explode('.', $Request["data"][0]->unggah_ktp_direksi);
        	$filepath = FCPATH."/../crowfunding_cdn/cdn/".$Request["data"][0]->unggah_ktp_direksi;
        	$this->zip->read_file($filepath, "KTP Direksi.".end($file_format));
        }

        if($Request["data"][0]->unggah_ktp_komisaris == "" || $Request["data"][0]->unggah_ktp_komisaris == null){
        } else {
        	$file_format = explode('.', $Request["data"][0]->unggah_ktp_komisaris);
        	$filepath = FCPATH."/../crowfunding_cdn/cdn/".$Request["data"][0]->unggah_ktp_komisaris;
        	$this->zip->read_file($filepath, "KTP Komisaris.".end($file_format));
        }

        if($Request["data"][0]->unggah_akta_pendirian_perusahaan == "" || $Request["data"][0]->unggah_akta_pendirian_perusahaan == null){
        } else {
        	$file_format = explode('.', $Request["data"][0]->unggah_akta_pendirian_perusahaan);
        	$filepath = FCPATH."/../crowfunding_cdn/cdn/".$Request["data"][0]->unggah_akta_pendirian_perusahaan;
        	$this->zip->read_file($filepath, "Akta Pendirian Perusahaan.".end($file_format));
        }

        if($Request["data"][0]->unggah_akta_perubahan_anggaran_dasar_terakhir == "" || $Request["data"][0]->unggah_akta_perubahan_anggaran_dasar_terakhir == null){
        } else {
        	$file_format = explode('.', $Request["data"][0]->unggah_akta_perubahan_anggaran_dasar_terakhir);
        	$filepath = FCPATH."/../crowfunding_cdn/cdn/".$Request["data"][0]->unggah_akta_perubahan_anggaran_dasar_terakhir;
        	$this->zip->read_file($filepath, "Akta Perubahan Anggaran Dasar Terakhir.".end($file_format));
        }

        $filename = $Request["data"][0]->nama_perusahaan.".zip";
        $this->zip->download($filename);
    }



    public function get_personal_investor() {
        $Request = $this->verifikasi_kyc_investor->GetFileVerifikasiKYCInvestor($_GET["id"]);
        if(!empty($Request)) {
		    $array_data = $Request["data"];
			$pdf = new Pdf_personal_investor('P', 'mm', 'A4', true, 'UTF-8', false);
	        $pdf->setPrintHeader(true);
	        $pdf->setPrintFooter(true);
		    $pdf->SetTitle('Data Personal Investor - '.$array_data[0]->nama);
		    $pdf->SetTopMargin(40);
		    $pdf->setFooterMargin(0);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
		    $pdf->AddPage(/*"L"*/);
		    $html = '
		    	<table cellpadding="5" style="font-size: 12px;">
		    		<tr nobr="true">
		                <td width="10%"></td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Nama Lengkap</span><br>'.$array_data[0]->nama.'</td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Email</span><br>'.$array_data[0]->email.'</td>
		            </tr>
		    		<tr nobr="true">
		                <td width="10%"></td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">No Telefon</span><br>'.$array_data[0]->no_hp.'</td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Jenis Kelamin</span><br>'.$array_data[0]->jenis_kelamin.'</td>
		            </tr>
		    		<tr nobr="true">
		                <td width="10%"></td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">NIK</span><br>'.$array_data[0]->nik.'</td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">NPWP</span><br>'.$array_data[0]->npwp.'</td>
		            </tr>
		    		<tr nobr="true">
		                <td width="10%"></td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Tanggal Lahir</span><br>'.date("d M Y", strtotime($array_data[0]->tgl_lahir)).'</td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Status Pernikahan</span><br>'.$array_data[0]->status_perkawinan.'</td>
	                </tr>
		    		<tr nobr="true">
		                <td width="10%"></td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Pekerjaan</span><br>'.$array_data[0]->pekerjaan.'</td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Sumber Penghasilan</span><br>'.$array_data[0]->sumber_penghasilan.'</td>
	                </tr>
		    		<tr nobr="true">
		                <td width="10%"></td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Pendapatan Pertahun</span><br>'.$this->foglobal->rupiah($array_data[0]->penghasilan_per_tahun).'</td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Nama Pemilik Rekening</span><br>'.$array_data[0]->nama_pemilik_rekening_bank.'</td>
		            </tr>
		    		<tr nobr="true">
		                <td width="10%"></td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Nama Cabang Bank</span><br>'.$array_data[0]->nama_cabang_bank.'</td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Nama Bank</span><br>'.$array_data[0]->nama_bank.'</td>
	                </tr>
		    		<tr nobr="true">
		                <td width="10%"></td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Provinsi</span><br>'.$array_data[0]->nama_provinsi.'</td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Kota/Kabupaten</span><br>'.$array_data[0]->nama_kota.'</td>
		            </tr>
		    		<tr nobr="true">
		                <td width="10%"></td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Kecamatan</span><br>'.$array_data[0]->nama_kecamatan.'</td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Desa/Kelurahan</span><br>'.$array_data[0]->kelurahan.'</td>
	                </tr>
		    		<tr nobr="true">
		                <td width="10%"></td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Alamat Lengkap</span><br>'.$array_data[0]->alamat_lengkap.'</td>
		            </tr>
		        </table>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Data Personal Investor - '.$array_data[0]->nama.'.pdf', 'I');
		} else {
			$pdf = new Pdf_personal_investor('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Data Personal Investor');
		    $pdf->SetTopMargin(20);
		    $pdf->setFooterMargin(0);
     		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
		    $pdf->AddPage(/*"L"*/);
		    $html='<h3>Data tidak ditemukan</h3>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Data Personal Investor.pdf', 'I');
		}
    }
    public function get_personal_penerbit() {
        $Request = $this->verifikasi_kyc_penerbit->GetFileVerifikasiKYCPenerbit($_GET["id"]);
        if(!empty($Request)) {
		    $array_data = $Request["data"];
			$pdf = new Pdf_personal_penerbit('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Data Personal Penerbit - '.$array_data[0]->nama_perusahaan);
		    $pdf->SetTopMargin(40);
		    $pdf->setFooterMargin(0);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
		    $pdf->AddPage(/*"L"*/);
		    $html = '
		    	<table cellpadding="5" style="font-size: 12px;">
		    		<tr nobr="true">
		                <td width="10%"></td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Nama Perusahaan</span><br>'.$array_data[0]->nama_perusahaan.'</td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Email</span><br>'.$array_data[0]->email.'</td>
		            </tr>
		    		<tr nobr="true">
		                <td width="10%"></td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">NPWP Perusahaan</span><br>'.$array_data[0]->npwp.'</td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Nama Penanggung Jawab</span><br>'.$array_data[0]->nama_penanggung_jawab.'</td>
		            </tr>
		    		<tr nobr="true">
		                <td width="10%"></td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">NIK Penanggung Jawab</span><br>'.$array_data[0]->nik_penanggung_jawab.'</td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Provinsi</span><br>'.$array_data[0]->nama_provinsi.'</td>
		            </tr>
		    		<tr nobr="true">
		                <td width="10%"></td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Kota/Kabupaten</span><br>'.$array_data[0]->nama_kota.'</td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">No Telepon Perusahaan</span><br>'.$array_data[0]->no_telepon.'</td>
		            </tr>
		    		<tr nobr="true">
		                <td width="10%"></td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Kecamatan</span><br>'.$array_data[0]->nama_kecamatan.'</td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Kelurahan</span><br>'.$array_data[0]->kelurahan.'</td>
		            </tr>
		    		<tr nobr="true">
		                <td width="10%"></td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Alamat Lengkap</span><br>'.$array_data[0]->alamat_lengkap.'</td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Jabatan</span><br>'.$array_data[0]->jabatan.'</td>
		            </tr>
		    		<tr nobr="true">
		                <td width="10%"></td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Nomor Rekening Perusahaan</span><br>'.$array_data[0]->nomor_rekening_bank.'</td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Nama Pemilik Rekening Bank</span><br>'.$array_data[0]->nama_pemilik_rekening_bank.'</td>
		            </tr>
		    		<tr nobr="true">
		                <td width="10%"></td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Nama Bank</span><br>'.$array_data[0]->nama_bank.'</td>
		                <td width="45%" valign="middle" align="left"><span style="font-weight: bold;">Nama Cabang Bank</span><br>'.$array_data[0]->nama_cabang_bank.'</td>
		            </tr>
		        </table>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Data Personal Penerbit - '.$array_data[0]->nama_perusahaan.'.pdf', 'I');
		} else {
			$pdf = new Pdf_personal_penerbit('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Data Personal Penerbit');
		    $pdf->SetTopMargin(20);
		    $pdf->setFooterMargin(0);
     		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
		    $pdf->AddPage(/*"L"*/);
		    $html='<h3>Data tidak ditemukan</h3>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Data Personal Investor.pdf', 'I');
		}
    }
}