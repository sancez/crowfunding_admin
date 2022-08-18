<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_transaksi extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
      	$this->user = $this->session->userdata("user");
		$this->foglobal->CheckSessionLogin();
        $this->load->model("manajemen_transaksi/manajemen_transaksi_jual_beli");
        $this->load->model("manajemen_transaksi/manajemen_transaksi_biaya_admin");
        $this->load->model("manajemen_transaksi/manajemen_transaksi_isi_saldo");
		$this->load->library("Pdf");
		$this->load->library("Pdf_manajemen_transaksi_jual_beli");
		$this->load->library("Pdf_manajemen_transaksi_isi_saldo");
		$this->load->library("Pdf_manajemen_transaksi_biaya_admin");
		$this->load->library("excel");
	}
	public function jual_beli(){
		$this->load->view("manajemen_transaksi_jual_beli", array("manajemen_transaksi" => "active", "manajemen_transaksi_jual_beli" => "active"));
	}
	public function biaya_admin(){
		$this->load->view("manajemen_transaksi_biaya_admin", array("manajemen_transaksi" => "active", "manajemen_transaksi_biaya_admin" => "active"));
	}
	public function isi_saldo(){
		$this->load->view("manajemen_transaksi_isi_saldo", array("manajemen_transaksi" => "active", "manajemen_transaksi_isi_saldo" => "active"));
	}

	public function jual_beli_cetak(){
		$this->foglobal->insert_log_admin($this->user->id, date("Y-m-d H:i:s"), $this->user->nama." melakukan export PDF 'Manajemen Transaksi - Jual Beli'", $this->foglobal->ip_address());
        $param["Sort"] = $_GET["sort"];
        $param["Search"] = $_GET["search"];
        $param["filter"]["status_verifikasi"] = $_GET["status"];
        $param["filter"]["tanggal_mulai"] = $_GET["tanggal_mulai"];
        $param["filter"]["tanggal_selesai"] = $_GET["tanggal_selesai"];
        $Request = $this->manajemen_transaksi_jual_beli->GetManajemenTransaksiJualBeli($param, true);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
			$pdf = new Pdf_manajemen_transaksi_jual_beli('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Transaksi - pembelian saham (primary)');
		    $pdf->SetTopMargin(35);
		    $pdf->setFooterMargin(0);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
		    $pdf->AddPage("L");
		    $html = '
		    	<table>
				    <tr>
		                <td align="center"></td>
		    		</tr>
	            </table>
		    	<table cellpadding="1" style="font-size: 10px;">
		    		<tr>
		                <td width="5%" style="border:0.1px solid black;" valign="middle" align="center">NO</td>
		                <td width="13%" style="border:0.1px solid black;" valign="middle" align="center">No Transaksi</td>
		                <td width="20%" style="border:0.1px solid black;" valign="middle" align="center">Investor</td>
		                <td width="9%" style="border:0.1px solid black;" valign="middle" align="center">Tanggal</td>
		                <td width="11%" style="border:0.1px solid black;" valign="middle" align="center">Total Pembayaran</td>
		                <td width="17%" style="border:0.1px solid black;" valign="middle" align="center">Properti</td>
		                <td width="17%" style="border:0.1px solid black;" valign="middle" align="center">Perusahaan</td>
		                <td width="8%" style="border:0.1px solid black;" valign="middle" align="center">Status</td>
		            </tr>';
			$total_nominal = 0;
			foreach ($Request["data"] as $index => $item) {
				if($item->status_verifikasi == 1){
					$status = "Selesai";
				} else if($item->status_verifikasi == 2){
					$status = "Gagal";
				} else {
					$status = "Proses";
				}
				$total_nominal += $item->total_transaksi;
			    $html .= '
			    	<tr>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.($index+1).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->no_transaksi.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->nama_pemodal.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.date("d M Y H:i:s", strtotime($item->tgl)).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($item->total_transaksi, false, true).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->nama_properti.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->nama_perusahaan.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.$status.'</td>
		            </tr>';
			}
		    $html .= '
		    	<tr>
	                <td style="border:0.1px solid black;" valign="middle" align="center"></td>
	                <td style="border:0.1px solid black;" valign="middle" align="left"></td>
	                <td style="border:0.1px solid black;" valign="middle" align="left"></td>
	                <td style="border:0.1px solid black;" valign="middle" align="left"></td>
	                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($total_nominal, false, true).'</td>
	                <td style="border:0.1px solid black;" valign="middle" align="left"></td>
	                <td style="border:0.1px solid black;" valign="middle" align="left"></td>
	                <td style="border:0.1px solid black;" valign="middle" align="center"></td>
	            </tr>';
		    $html .= '</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Transaksi - pembelian saham (primary).pdf', 'I');
		} else {
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Transaksi - pembelian saham (primary)');
		    $pdf->SetTopMargin(20);
		    $pdf->setFooterMargin(0);
     		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
		    $pdf->AddPage(/*"L"*/);
		    $html='<h3>Data tidak ditemukan</h3>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Transaksi - pembelian saham (primary).pdf', 'I');
		}
	}
	public function biaya_admin_cetak(){
		$this->foglobal->insert_log_admin($this->user->id, date("Y-m-d H:i:s"), $this->user->nama." melakukan export PDF 'Manajemen Transaksi - Biaya Admin'", $this->foglobal->ip_address());
        $param["Sort"] = $_GET["sort"];
        $param["Search"] = $_GET["search"];
        $param["filter"]["status_verifikasi"] = $_GET["status"];
        $param["filter"]["tanggal_mulai"] = $_GET["tanggal_mulai"];
        $param["filter"]["tanggal_selesai"] = $_GET["tanggal_selesai"];
        $Request = $this->manajemen_transaksi_biaya_admin->GetManajemenTransaksiBiayaAdmin($param, true);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
			$pdf = new Pdf_manajemen_transaksi_biaya_admin('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Transaksi - Biaya Admin');
		    $pdf->SetTopMargin(35);
		    $pdf->setFooterMargin(0);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
		    $pdf->AddPage("L");
		    $html = '
		    	<table>
				    <tr>
		                <td align="center"></td>
		    		</tr>
	            </table>
		    	<table cellpadding="1" style="font-size: 10px;">
		    		<tr>
		                <td width="5%" style="border:0.1px solid black;" valign="middle" align="center">NO</td>
		                <td width="15%" style="border:0.1px solid black;" valign="middle" align="center">No Transaksi</td>
		                <td width="9%" style="border:0.1px solid black;" valign="middle" align="center">Tanggal</td>
		                <td width="13%" style="border:0.1px solid black;" valign="middle" align="center">Biaya Administrasi</td>
		                <td width="13%" style="border:0.1px solid black;" valign="middle" align="center">Total Pembayaran</td>
		                <td width="19%" style="border:0.1px solid black;" valign="middle" align="center">Properti</td>
		                <td width="19%" style="border:0.1px solid black;" valign="middle" align="center">Perusahaan</td>
		                <td width="7%" style="border:0.1px solid black;" valign="middle" align="center">Status</td>
		            </tr>';
			$total_biaya_administrasi = 0;
			$total_transaksi = 0;
			foreach ($Request["data"] as $index => $item) {
				if($item->status_verifikasi == 1){
					$status = "Selesai";
				} else if($item->status_verifikasi == 2){
					$status = "Gagal";
				} else {
					$status = "Proses";
				}
				$total_biaya_administrasi += $item->biaya_administrasi;
				$total_transaksi += $item->total_transaksi;
			    $html .= '
			    	<tr>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.($index+1).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->no_transaksi.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.date("d M Y H:i:s", strtotime($item->tgl)).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($item->biaya_administrasi, false, true).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($item->total_transaksi, false, true).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->nama_properti.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->nama_perusahaan.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.$status.'</td>
		            </tr>';
			}
		    $html .= '
		    	<tr>
	                <td style="border:0.1px solid black;" valign="middle" align="center"></td>
	                <td style="border:0.1px solid black;" valign="middle" align="left"></td>
	                <td style="border:0.1px solid black;" valign="middle" align="left"></td>
	                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($total_biaya_administrasi, false, true).'</td>
	                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($total_transaksi, false, true).'</td>
	                <td style="border:0.1px solid black;" valign="middle" align="left"></td>
	                <td style="border:0.1px solid black;" valign="middle" align="left"></td>
	                <td style="border:0.1px solid black;" valign="middle" align="center"></td>
	            </tr>';
		    $html .= '</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Transaksi - Biaya Admin.pdf', 'I');
		} else {
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Transaksi - Biaya Admin');
		    $pdf->SetTopMargin(20);
		    $pdf->setFooterMargin(0);
     		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
		    $pdf->AddPage(/*"L"*/);
		    $html='<h3>Data tidak ditemukan</h3>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Transaksi - Biaya Admin.pdf', 'I');
		}
	}
	public function isi_saldo_cetak(){
		$this->foglobal->insert_log_admin($this->user->id, date("Y-m-d H:i:s"), $this->user->nama." melakukan export PDF 'Manajemen Transaksi - Isi Saldo'", $this->foglobal->ip_address());
        $param["Sort"] = $_GET["sort"];
        $param["Search"] = $_GET["search"];
        $param["filter"]["status"] = $_GET["status"];
        $param["filter"]["tanggal_mulai"] = $_GET["tanggal_mulai"];
        $param["filter"]["tanggal_selesai"] = $_GET["tanggal_selesai"];
        $Request = $this->manajemen_transaksi_isi_saldo->GetManajemenTransaksiIsiSaldo($param, true);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
			$pdf = new Pdf_manajemen_transaksi_isi_saldo('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Transaksi - Isi Saldo');
		    $pdf->SetTopMargin(35);
		    $pdf->setFooterMargin(0);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
		    $pdf->AddPage("L");
		    $html = '
		    	<table>
				    <tr>
		                <td align="center"></td>
		    		</tr>
	            </table>
		    	<table cellpadding="1" style="font-size: 10px;">
		    		<tr>
		                <td width="5%" style="border:0.1px solid black;" valign="middle" align="center">NO</td>
		                <td width="11%" style="border:0.1px solid black;" valign="middle" align="center">No Transaksi</td>
		                <td width="15%" style="border:0.1px solid black;" valign="middle" align="center">Virtual Account</td>
		                <td width="17%" style="border:0.1px solid black;" valign="middle" align="center">Investor</td>
		                <td width="8%" style="border:0.1px solid black;" valign="middle" align="center">Metode Pembayaran</td>
		                <td width="11%" style="border:0.1px solid black;" valign="middle" align="center">Nominal</td>
		                <td width="19%" style="border:0.1px solid black;" valign="middle" align="center">Keterangan</td>
		                <td width="8%" style="border:0.1px solid black;" valign="middle" align="center">Tanggal</td>
		                <td width="7%" style="border:0.1px solid black;" valign="middle" align="center">Status</td>
		            </tr>';
			$total_nominal = 0;
			foreach ($Request["data"] as $index => $item) {
				if($item->status == 1){
					$status = "Selesai";
				} else if($item->status == 2){
					$status = "Gagal";
				} else {
					$status = "Proses";
				}
				$total_nominal += $item->nominal;
			    $html .= '
			    	<tr>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.($index+1).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->no_transaksi.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->va.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->nama_pemodal.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->metode_pembayaran.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($item->nominal, false, true).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->keterangan.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.date("d M Y H:i:s", strtotime($item->created_at)).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.$status.'</td>
		            </tr>';
			}
		    $html .= '
		    	<tr>
	                <td style="border:0.1px solid black;" valign="middle" align="center"></td>
	                <td style="border:0.1px solid black;" valign="middle" align="left"></td>
	                <td style="border:0.1px solid black;" valign="middle" align="left"></td>
	                <td style="border:0.1px solid black;" valign="middle" align="left"></td>
	                <td style="border:0.1px solid black;" valign="middle" align="left"></td>
	                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($total_nominal, false, true).'</td>
	                <td style="border:0.1px solid black;" valign="middle" align="left"></td>
	                <td style="border:0.1px solid black;" valign="middle" align="left"></td>
	                <td style="border:0.1px solid black;" valign="middle" align="center"></td>
	            </tr>';
		    $html .= '</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Transaksi - Isi Saldo.pdf', 'I');
		} else {
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Transaksi - Isi Saldo');
		    $pdf->SetTopMargin(20);
		    $pdf->setFooterMargin(0);
     		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
		    $pdf->AddPage(/*"L"*/);
		    $html='<h3>Data tidak ditemukan</h3>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Transaksi - Isi Saldo.pdf', 'I');
		}
	}



	// 
	public function jual_beli_excel(){
		$this->foglobal->insert_log_admin($this->user->id, date("Y-m-d H:i:s"), $this->user->nama." melakukan export Excel 'Manajemen Transaksi - Jual Beli'", $this->foglobal->ip_address());
        $param["Sort"] = $_GET["sort"];
        $param["Search"] = $_GET["search"];
        $param["filter"]["status_verifikasi"] = $_GET["status"];
        $param["filter"]["tanggal_mulai"] = $_GET["tanggal_mulai"];
        $param["filter"]["tanggal_selesai"] = $_GET["tanggal_selesai"];
        $Request = $this->manajemen_transaksi_jual_beli->GetManajemenTransaksiJualBeli($param, true);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
		  	$object = new PHPExcel();
		  	$object->setActiveSheetIndex(0);
		  	$table_columns = array("No", "No Transaksi", "Investor", "Tanggal", "Waktu", "Total Pembayaran", "Properti", "Perusahaan", "Status");
		  	$column = 0;

			foreach($table_columns as $field){
				$object->getActiveSheet()->setCellValueByColumnAndRow($column, 3, $field);
				$object->getActiveSheet()->getColumnDimension("A")->setWidth(8);
				$object->getActiveSheet()->getColumnDimension("B")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("C")->setWidth(35);
				$object->getActiveSheet()->getColumnDimension("D")->setWidth(14);
				$object->getActiveSheet()->getColumnDimension("E")->setWidth(10);
				$object->getActiveSheet()->getColumnDimension("F")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("G")->setWidth(35);
				$object->getActiveSheet()->getColumnDimension("H")->setWidth(35);
				$object->getActiveSheet()->getColumnDimension("I")->setWidth(12);
				$column++;
			}
			$excel_row = 4;
			$total_nominal = 0;
	    	foreach($array_data as $index => $item){
				if($item->status_verifikasi == 1){
					$status = "Selesai";
				} else if($item->status_verifikasi == 2){
					$status = "Gagal";
				} else {
					$status = "Proses";
				}
				$total_nominal += $item->total_transaksi;
				$object->getActiveSheet()->setCellValueExplicit("A".$excel_row, ($index+1), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("B".$excel_row, $item->no_transaksi, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("C".$excel_row, $item->nama_pemodal, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("D".$excel_row, date("d-m-Y", strtotime($item->tgl)), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("E".$excel_row, date("H:i:s", strtotime($item->tgl)), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("F".$excel_row, $item->total_transaksi, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("G".$excel_row, $item->nama_properti, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("H".$excel_row, $item->nama_perusahaan, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("I".$excel_row, $status, PHPExcel_Cell_DataType::TYPE_STRING);
				$excel_row++;
			}
			$object->getActiveSheet()->setCellValueExplicit("F".$excel_row, $total_nominal, PHPExcel_Cell_DataType::TYPE_STRING);
			$object->setActiveSheetIndex(0)->mergeCells("A1:I1");
			$object->getActiveSheet()->setCellValueExplicit("A1", "Manajemen Transaksi - pembelian saham (primary)", PHPExcel_Cell_DataType::TYPE_STRING);
			$styleBorder = array(
			  	"borders" => array(
					"allborders" => array(
				  		"style" => PHPExcel_Style_Border::BORDER_THIN
					)
			  	)
			);
			$styleCenter = array(
				"alignment" => array(
					"horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);
			$styleRight = array(
				"alignment" => array(
					"horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
				)
			);
			$object->getActiveSheet()->getStyle("A1")->applyFromArray($styleCenter)->getFont()->setBold(true)->setSize(20);
			$object->getActiveSheet()->getStyle("A".$excel_row.":I".$excel_row)->applyFromArray($styleRight)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("D".$excel_row)->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("A3:I3")->applyFromArray($styleCenter)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("A4:A".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("B4:B".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("D4:D".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("E4:E".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("I4:I".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("F4:F".($excel_row-1))->applyFromArray($styleRight);
			$object->getActiveSheet()->getStyle("A3:I".($excel_row-1))->applyFromArray($styleBorder);
			$object->getActiveSheet()->getStyle("A3:I3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$object->getActiveSheet()->getStyle("A3:I3")->getFill()->getStartColor()->setRGB("FFFF01");
			$object->getActiveSheet()->getStyle("A".$excel_row.":J".$excel_row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$object->getActiveSheet()->getStyle("A".$excel_row.":J".$excel_row)->getFill()->getStartColor()->setRGB("92D050");
			$object_writer = PHPExcel_IOFactory::createWriter($object, "Excel5");
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment;filename="."Manajemen Transaksi - pembelian saham (primary).xls");
			$object_writer->save("php://output");
		}
	}
	public function biaya_admin_excel(){
		$this->foglobal->insert_log_admin($this->user->id, date("Y-m-d H:i:s"), $this->user->nama." melakukan export Excel 'Manajemen Transaksi - Biaya Admin'", $this->foglobal->ip_address());
        $param["Sort"] = $_GET["sort"];
        $param["Search"] = $_GET["search"];
        $param["filter"]["status_verifikasi"] = $_GET["status"];
        $param["filter"]["tanggal_mulai"] = $_GET["tanggal_mulai"];
        $param["filter"]["tanggal_selesai"] = $_GET["tanggal_selesai"];
        $Request = $this->manajemen_transaksi_biaya_admin->GetManajemenTransaksiBiayaAdmin($param, true);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
		  	$object = new PHPExcel();
		  	$object->setActiveSheetIndex(0);
		  	$table_columns = array("No", "No Transaksi", "Tanggal", "Waktu", "Biaya Administrasi", "Total Pembayaran", "Properti", "Perusahaan", "Status");
		  	$column = 0;

			foreach($table_columns as $field){
				$object->getActiveSheet()->setCellValueByColumnAndRow($column, 3, $field);
				$object->getActiveSheet()->getColumnDimension("A")->setWidth(8);
				$object->getActiveSheet()->getColumnDimension("B")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("C")->setWidth(14);
				$object->getActiveSheet()->getColumnDimension("D")->setWidth(10);
				$object->getActiveSheet()->getColumnDimension("E")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("F")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("G")->setWidth(35);
				$object->getActiveSheet()->getColumnDimension("H")->setWidth(35);
				$object->getActiveSheet()->getColumnDimension("I")->setWidth(12);
				$column++;
			}
			$excel_row = 4;
			$total_biaya_administrasi = 0;
			$total_transaksi = 0;
	    	foreach($array_data as $index => $item){
				if($item->status_verifikasi == 1){
					$status = "Selesai";
				} else if($item->status_verifikasi == 2){
					$status = "Gagal";
				} else {
					$status = "Proses";
				}
				$total_biaya_administrasi += $item->biaya_administrasi;
				$total_transaksi += $item->total_transaksi;
				$object->getActiveSheet()->setCellValueExplicit("A".$excel_row, ($index+1), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("B".$excel_row, $item->no_transaksi, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("C".$excel_row, date("d-m-Y", strtotime($item->tgl)), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("D".$excel_row, date("H:i:s", strtotime($item->tgl)), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("E".$excel_row, $item->biaya_administrasi, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("F".$excel_row, $item->total_transaksi, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("G".$excel_row, $item->nama_properti, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("H".$excel_row, $item->nama_perusahaan, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("I".$excel_row, $status, PHPExcel_Cell_DataType::TYPE_STRING);
				$excel_row++;
			}
			$object->getActiveSheet()->setCellValueExplicit("E".$excel_row, $total_biaya_administrasi, PHPExcel_Cell_DataType::TYPE_STRING);
			$object->getActiveSheet()->setCellValueExplicit("F".$excel_row, $total_transaksi, PHPExcel_Cell_DataType::TYPE_STRING);
			$object->setActiveSheetIndex(0)->mergeCells("A1:I1");
			$object->getActiveSheet()->setCellValueExplicit("A1", "Manajemen Transaksi - Biaya Admin", PHPExcel_Cell_DataType::TYPE_STRING);
			$styleBorder = array(
			  	"borders" => array(
					"allborders" => array(
				  		"style" => PHPExcel_Style_Border::BORDER_THIN
					)
			  	)
			);
			$styleCenter = array(
				"alignment" => array(
					"horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);
			$styleRight = array(
				"alignment" => array(
					"horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
				)
			);
		  	$table_columns = array("No", "No Transaksi", "Tanggal", "Waktu", "Biaya Administrasi", "Total Pembayaran", "Properti", "Perusahaan", "Status");

			$object->getActiveSheet()->getStyle("A1")->applyFromArray($styleCenter)->getFont()->setBold(true)->setSize(20);
			$object->getActiveSheet()->getStyle("A".$excel_row.":I".$excel_row)->applyFromArray($styleRight)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("D".$excel_row)->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("A3:I3")->applyFromArray($styleCenter)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("A4:A".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("B4:B".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("C4:C".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("D4:D".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("E4:E".($excel_row-1))->applyFromArray($styleRight);
			$object->getActiveSheet()->getStyle("F4:F".($excel_row-1))->applyFromArray($styleRight);
			$object->getActiveSheet()->getStyle("I4:I".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("A3:I".($excel_row-1))->applyFromArray($styleBorder);
			$object->getActiveSheet()->getStyle("A3:I3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$object->getActiveSheet()->getStyle("A3:I3")->getFill()->getStartColor()->setRGB("FFFF01");
			$object->getActiveSheet()->getStyle("A".$excel_row.":I".$excel_row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$object->getActiveSheet()->getStyle("A".$excel_row.":I".$excel_row)->getFill()->getStartColor()->setRGB("92D050");
			$object_writer = PHPExcel_IOFactory::createWriter($object, "Excel5");
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment;filename="."Manajemen Transaksi - Biaya Admin.xls");
			$object_writer->save("php://output");
		}
	}
	public function isi_saldo_excel(){
		$this->foglobal->insert_log_admin($this->user->id, date("Y-m-d H:i:s"), $this->user->nama." melakukan export Excel 'Manajemen Transaksi - Isi Saldo'", $this->foglobal->ip_address());
        $param["Sort"] = $_GET["sort"];
        $param["Search"] = $_GET["search"];
        $param["filter"]["status"] = $_GET["status"];
        $param["filter"]["tanggal_mulai"] = $_GET["tanggal_mulai"];
        $param["filter"]["tanggal_selesai"] = $_GET["tanggal_selesai"];
        $Request = $this->manajemen_transaksi_isi_saldo->GetManajemenTransaksiIsiSaldo($param, true);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
		  	$object = new PHPExcel();
		  	$object->setActiveSheetIndex(0);
		  	$table_columns = array("No", "No Transaksi", "Virtual Account", "Investor", "Metode Pembayaran", "Nominal", "Keterangan", "Tanggal", "Waktu", "Status");
		  	$column = 0;

			foreach($table_columns as $field){
				$object->getActiveSheet()->setCellValueByColumnAndRow($column, 3, $field);
				$object->getActiveSheet()->getColumnDimension("A")->setWidth(8);
				$object->getActiveSheet()->getColumnDimension("B")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("C")->setWidth(25);
				$object->getActiveSheet()->getColumnDimension("D")->setWidth(40);
				$object->getActiveSheet()->getColumnDimension("E")->setWidth(25);
				$object->getActiveSheet()->getColumnDimension("F")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("G")->setWidth(40);
				$object->getActiveSheet()->getColumnDimension("H")->setWidth(14);
				$object->getActiveSheet()->getColumnDimension("I")->setWidth(10);
				$object->getActiveSheet()->getColumnDimension("J")->setWidth(12);
				$column++;
			}
			$excel_row = 4;
			$total_nominal = 0;
	    	foreach($array_data as $index => $item){
				if($item->status == 1){
					$status = "Selesai";
				} else if($item->status == 2){
					$status = "Gagal";
				} else {
					$status = "Proses";
				}
				$total_nominal += $item->nominal;
				$object->getActiveSheet()->setCellValueExplicit("A".$excel_row, ($index+1), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("B".$excel_row, $item->no_transaksi, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("C".$excel_row, $item->va, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("D".$excel_row, $item->nama_pemodal, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("E".$excel_row, $item->metode_pembayaran, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("F".$excel_row, $item->nominal, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("G".$excel_row, $item->keterangan, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("H".$excel_row, date("d-m-Y", strtotime($item->created_at)), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("I".$excel_row, date("H:i:s", strtotime($item->created_at)), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("J".$excel_row, $status, PHPExcel_Cell_DataType::TYPE_STRING);
				$excel_row++;
			}
			$object->getActiveSheet()->setCellValueExplicit("F".$excel_row, $total_nominal, PHPExcel_Cell_DataType::TYPE_STRING);
			$object->setActiveSheetIndex(0)->mergeCells("A1:J1");
			$object->getActiveSheet()->setCellValueExplicit("A1", "Manajemen Transaksi - Isi Saldo", PHPExcel_Cell_DataType::TYPE_STRING);
			$styleBorder = array(
			  	"borders" => array(
					"allborders" => array(
				  		"style" => PHPExcel_Style_Border::BORDER_THIN
					)
			  	)
			);
			$styleCenter = array(
				"alignment" => array(
					"horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);
			$styleRight = array(
				"alignment" => array(
					"horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
				)
			);
			$object->getActiveSheet()->getStyle("A1")->applyFromArray($styleCenter)->getFont()->setBold(true)->setSize(20);
			$object->getActiveSheet()->getStyle("A".$excel_row.":J".$excel_row)->applyFromArray($styleRight)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("D".$excel_row)->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("A3:J3")->applyFromArray($styleCenter)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("A4:A".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("B4:B".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("C4:C".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("F4:F".($excel_row-1))->applyFromArray($styleRight);
			$object->getActiveSheet()->getStyle("H4:H".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("I4:I".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("J4:J".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("A3:J".($excel_row))->applyFromArray($styleBorder);
			$object->getActiveSheet()->getStyle("A3:J3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$object->getActiveSheet()->getStyle("A3:J3")->getFill()->getStartColor()->setRGB("FFFF01");
			$object->getActiveSheet()->getStyle("A".$excel_row.":J".$excel_row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$object->getActiveSheet()->getStyle("A".$excel_row.":J".$excel_row)->getFill()->getStartColor()->setRGB("92D050");
			$object_writer = PHPExcel_IOFactory::createWriter($object, "Excel5");
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment;filename="."Manajemen Transaksi - Isi Saldo.xls");
			$object_writer->save("php://output");
		}
	}
}