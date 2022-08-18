<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manajemen_investor extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
      	$this->user = $this->session->userdata("user");
		$this->foglobal->CheckSessionLogin();
        $this->load->model("manajemen_investor/manajemen_investor_data");
		$this->load->library("Pdf");
		$this->load->library("Pdf_manajemen_investor");
		$this->load->library("Pdf_manajemen_investor_topup");
		$this->load->library("Pdf_manajemen_investor_investasi");
		$this->load->library("excel");
	}

	public function index(){
		$this->load->view("manajemen_investor", array("manajemen_investor" => "active"));
	}

	public function cetak(){
        $param["Sort"] = $_GET["sort"];
        $param["Search"] = $_GET["search"];
        $param["filter"]["status_delete"] = $_GET["status_delete"];
        $Request = $this->manajemen_investor_data->GetManajemenInvestor($param, true);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
			$pdf = new Pdf_manajemen_investor('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Investor');
		    $pdf->SetTopMargin(35);
		    $pdf->setFooterMargin(0);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
		    $data_list = [];
			foreach ($Request["data"] as $index => $item) {
		    	array_push($data_list, $item);
			}
			$html = '
		    	<table cellpadding="2" style="font-size: 10px;">
		    		<tr>
		                <td width="8%" style="border:0.1px solid black;" valign="middle" align="center">NO</td>
		                <td width="16%" style="border:0.1px solid black;" valign="middle" align="center">Tanggal</td>
		                <td width="27%" style="border:0.1px solid black;" valign="middle" align="center">Nama</td>
		                <td width="19%" style="border:0.1px solid black;" valign="middle" align="center">NIK</td>
		                <td width="21%" style="border:0.1px solid black;" valign="middle" align="center">NPWP</td>
		                <td width="9%" style="border:0.1px solid black;" valign="middle" align="center">Status</td>
		            </tr>';
			foreach ($data_list as $index => $item) {
				if($item->status_delete == 1){
					$status = "Inactive";
				} else {
					$status = "Active";
				}
			    $html .= '
			    	<tr>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.($index+1).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.date("d M Y", strtotime($item->created_at )).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->nama.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->nik.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->npwp.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.$status.'</td>
		            </tr>';
			}
		    $html .= '</table>';
			$pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Investor.pdf', 'I');
		} else {
			$pdf = new Pdf_manajemen_investor('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Investor');
		    $pdf->SetTopMargin(20);
		    $pdf->setFooterMargin(0);
     		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
		    $pdf->AddPage(/*"L"*/);
		    $html='<h3>Data tidak ditemukan</h3>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Investor.pdf', 'I');
		}
	}

	public function excel(){
        $param["Sort"] = $_GET["sort"];
        $param["Search"] = $_GET["search"];
        $param["filter"]["status_delete"] = $_GET["status_delete"];
        $Request = $this->manajemen_investor_data->GetManajemenInvestor($param, true);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
		  	$object = new PHPExcel();
		  	$object->setActiveSheetIndex(0);
		  	$table_columns = array("No", "Tanggal", "Nama", "Jenis Kelamin", "NIK", "NPWP", "Status", "Penghasilan Per Tahun", "NIK", "Status Perkawinan", "Sumber Penghasilan", "Tgl Lahir", "Pekerjaan", "Alamat Lengkap", "No HP", "Email", "Provinsi", "Kota/Kabupaten", "Kecamatan", "Kelurahan", "Nama Bank", "Nama Cabang Bank", "No Rekening", "Nama Pemilik Rekening");
		  	$column = 0;

			foreach($table_columns as $field){
				$object->getActiveSheet()->setCellValueByColumnAndRow($column, 3, $field);
				$object->getActiveSheet()->getColumnDimension("A")->setWidth(8);
				$object->getActiveSheet()->getColumnDimension("B")->setWidth(15);
				$object->getActiveSheet()->getColumnDimension("C")->setWidth(40);
				$object->getActiveSheet()->getColumnDimension("D")->setWidth(15);
				$object->getActiveSheet()->getColumnDimension("E")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("F")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("G")->setWidth(12);

				$object->getActiveSheet()->getColumnDimension("H")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("I")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("J")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("K")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("L")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("M")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("N")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("O")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("P")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("Q")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("R")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("S")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("T")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("U")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("V")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("W")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("X")->setWidth(30);
				$column++;
			}
			$excel_row = 4;
	    	foreach($array_data as $index => $item){
				if($item->status_delete == 1){
					$status = "Inactive";
				} else {
					$status = "Active";
				}
				$object->getActiveSheet()->setCellValueExplicit("A".$excel_row, ($index+1), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("B".$excel_row, date("d-m-Y", strtotime($item->created_at)), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("C".$excel_row, $item->nama, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("D".$excel_row, $item->jenis_kelamin, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("E".$excel_row, $item->nik, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("F".$excel_row, $item->npwp, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("G".$excel_row, $status, PHPExcel_Cell_DataType::TYPE_STRING);

				$object->getActiveSheet()->setCellValueExplicit("H".$excel_row, $item->penghasilan_per_tahun, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("I".$excel_row, $item->nik, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("J".$excel_row, $item->status_perkawinan, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("K".$excel_row, $item->sumber_penghasilan, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("L".$excel_row, date("d-m-Y", strtotime($item->tgl_lahir)), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("M".$excel_row, $item->pekerjaan, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("N".$excel_row, $item->alamat_lengkap, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("O".$excel_row, $item->no_hp, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("P".$excel_row, $item->email, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("Q".$excel_row, $item->nama_provinsi, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("R".$excel_row, $item->nama_kota, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("S".$excel_row, $item->nama_kecamatan, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("T".$excel_row, $item->kelurahan, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("U".$excel_row, $item->nama_bank, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("V".$excel_row, $item->nama_cabang_bank, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("W".$excel_row, $item->nomor_rekening_bank, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("X".$excel_row, $item->nama_pemilik_rekening_bank, PHPExcel_Cell_DataType::TYPE_STRING);
				$excel_row++;
			}
			$object->setActiveSheetIndex(0)->mergeCells("A1:X1");
			$object->getActiveSheet()->setCellValueExplicit("A1", "Manajemen Investor", PHPExcel_Cell_DataType::TYPE_STRING);
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
			$object->getActiveSheet()->getStyle("A".$excel_row.":X".$excel_row)->applyFromArray($styleRight)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("D".$excel_row)->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("A3:X3")->applyFromArray($styleCenter)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("A4:A".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("B4:B".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("D4:D".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("G4:G".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("H4:H".($excel_row-1))->applyFromArray($styleRight);
			$object->getActiveSheet()->getStyle("J4:J".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("L4:L".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("U4:U".($excel_row-1))->applyFromArray($styleCenter);

			$object->getActiveSheet()->getStyle("A3:X".($excel_row-1))->applyFromArray($styleBorder);
			$object->getActiveSheet()->getStyle("A3:X3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$object->getActiveSheet()->getStyle("A3:X3")->getFill()->getStartColor()->setRGB("FFFF01");
			$object_writer = PHPExcel_IOFactory::createWriter($object, "Excel5");
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment;filename="."Manajemen Investor.xls");
			$object_writer->save("php://output");
		}
	}


	public function cetak_topup_investor(){
        $Request = $this->manajemen_investor_data->GetManajemenInvestor(["filter" => ["id" => $_GET["id"]]]);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
			$pdf = new Pdf_manajemen_investor_topup('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Investor Topup - '.$Request["data"][0]->nama);
		    $pdf->SetTopMargin(35);
		    $pdf->setFooterMargin(0);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
		    $data_list = [];
		    $total_topup = 0;
			foreach ($Request["data_topup"] as $index => $item) {
		    	array_push($data_list, $item);
			}
		    $html = '
		    	<table cellpadding="2" style="font-size: 14px;">
		    		<tr>
		                <td width="100%" valign="middle" align="left">'.$Request["data"][0]->nama.'<br></td>
		            </tr>
		        </table>
		    	<table cellpadding="2" style="font-size: 10px;">
		    		<tr>
		                <td width="8%" style="border:0.1px solid black;" valign="middle" align="center">NO</td>
		                <td width="22%" style="border:0.1px solid black;" valign="middle" align="center">Tanggal</td>
		                <td width="32%" style="border:0.1px solid black;" valign="middle" align="center">Metode Pembayaran</td>
		                <td width="20%" style="border:0.1px solid black;" valign="middle" align="center">No Transaksi</td>
		                <td width="18%" style="border:0.1px solid black;" valign="middle" align="center">Total Payment</td>
		            </tr>';
			foreach ($data_list as $index => $item) {
				$total_topup += $item->nominal;
				$html .= '
			    	<tr>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.($index+1).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.date("d M Y H:i:s", strtotime($item->created_at )).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->metode_pembayaran.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.$item->no_transaksi.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($item->nominal).'</td>
		            </tr>';
				if($index == count($data_list)-1){
				    $html .= '
				    	<tr>
			                <td style="border:0.1px solid black;" valign="middle" align="right" colspan="4">Total</td>
			                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($total_topup).'</td>
			            </tr>';
				}
			}
		    $html .= '</table>';
			$pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Investor Topup - '.$Request["data"][0]->nama.'.pdf', 'I');
		} else {
			$pdf = new Pdf_manajemen_investor('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Investor');
		    $pdf->SetTopMargin(20);
		    $pdf->setFooterMargin(0);
     		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
		    $pdf->AddPage(/*"L"*/);
		    $html='<h3>Data tidak ditemukan</h3>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Investor.pdf', 'I');
		}
	}

	public function excel_topup_investor(){
        $Request = $this->manajemen_investor_data->GetManajemenInvestor(["filter" => ["id" => $_GET["id"]]]);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
		  	$object = new PHPExcel();
		  	$object->setActiveSheetIndex(0);
		  	$table_columns = array("No", "Tanggal", "Waktu", "Metode Pembayaran", "No Transaksi", "Total Payment");
		  	$column = 0;

			foreach($table_columns as $field){
				$object->getActiveSheet()->setCellValueByColumnAndRow($column, 3, $field);
				$object->getActiveSheet()->getColumnDimension("A")->setWidth(8);
				$object->getActiveSheet()->getColumnDimension("B")->setWidth(14);
				$object->getActiveSheet()->getColumnDimension("C")->setWidth(9);
				$object->getActiveSheet()->getColumnDimension("D")->setWidth(35);
				$object->getActiveSheet()->getColumnDimension("E")->setWidth(15);
				$object->getActiveSheet()->getColumnDimension("F")->setWidth(16);
				$column++;
			}
			$excel_row = 4;
		    $total_topup = 0;
	    	foreach($Request["data_topup"] as $index => $item){
				$total_topup += $item->nominal;
				$object->getActiveSheet()->setCellValueExplicit("A".$excel_row, ($index+1), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("B".$excel_row, date("d-m-Y", strtotime($item->created_at)), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("C".$excel_row, date("H:i:s", strtotime($item->created_at)), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("D".$excel_row, $item->metode_pembayaran, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("E".$excel_row, $item->no_transaksi, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("F".$excel_row, $item->nominal, PHPExcel_Cell_DataType::TYPE_STRING);
				$excel_row++;
			}
			$object->setActiveSheetIndex(0)->mergeCells("A1:F1");
			$object->getActiveSheet()->setCellValueExplicit("A1", "Manajemen Investor Topup - ".$Request["data"][0]->nama, PHPExcel_Cell_DataType::TYPE_STRING);
			$object->setActiveSheetIndex(0)->mergeCells("A".($excel_row).":E".($excel_row));
			$object->getActiveSheet()->setCellValueExplicit("A".($excel_row), "Total", PHPExcel_Cell_DataType::TYPE_STRING);
			$object->getActiveSheet()->setCellValueExplicit("F".($excel_row), $total_topup, PHPExcel_Cell_DataType::TYPE_STRING);
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
			$object->getActiveSheet()->getStyle("A".$excel_row.":F".$excel_row)->applyFromArray($styleRight)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("D".$excel_row)->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("A3:F3")->applyFromArray($styleCenter)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("A4:A".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("B4:B".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("C4:C".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("E4:E".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("F4:F".($excel_row-1))->applyFromArray($styleRight);
			$object->getActiveSheet()->getStyle("A3:F".($excel_row+0))->applyFromArray($styleBorder);
			$object->getActiveSheet()->getStyle("A3:F3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$object->getActiveSheet()->getStyle("A3:F3")->getFill()->getStartColor()->setRGB("FFFF01");
			$object->getActiveSheet()->getStyle("A".($excel_row).":F".($excel_row))->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$object->getActiveSheet()->getStyle("A".($excel_row).":F".($excel_row))->getFill()->getStartColor()->setRGB("92D050");
			$object_writer = PHPExcel_IOFactory::createWriter($object, "Excel5");
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment;filename="."Manajemen Investor Topup - ".$Request["data"][0]->nama.".xls");
			$object_writer->save("php://output");
		}
	}

	public function cetak_investasi_investor(){
        $Request = $this->manajemen_investor_data->GetManajemenInvestor(["filter" => ["id" => $_GET["id"]]]);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
			$pdf = new Pdf_manajemen_investor_investasi('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Investor Investasi - '.$Request["data"][0]->nama);
		    $pdf->SetTopMargin(40);
		    $pdf->setFooterMargin(0);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
		    $data_list = [];
		    $total_pembelian = 0;
		    $total_penjualan = 0;
			foreach ($Request["data_investasi"] as $index => $item) {
		    	array_push($data_list, $item);
			}
		    $html = '
		    	<table cellpadding="2" style="font-size: 14px;">
		    		<tr>
		                <td width="100%" valign="middle" align="left">'.$Request["data"][0]->nama.'<br></td>
		            </tr>
		        </table>
		    	<table cellpadding="2" style="font-size: 10px;">
		    		<tr>
		                <td width="8%" style="border:0.1px solid black;" valign="middle" align="center">NO</td>
		                <td width="22%" style="border:0.1px solid black;" valign="middle" align="center">Tanggal</td>
		                <td width="13%" style="border:0.1px solid black;" valign="middle" align="center">Jenis</td>
		                <td width="22%" style="border:0.1px solid black;" valign="middle" align="center">No Transaksi</td>
		                <td width="17%" style="border:0.1px solid black;" valign="middle" align="center">Dividen Period</td>
		                <td width="18%" style="border:0.1px solid black;" valign="middle" align="center">Total Payment</td>
		            </tr>';
			foreach ($data_list as $index => $item) {
				if($item->jenis == "Pembelian"){
					$total_pembelian += $item->total_transaksi;
				} else {
					$total_penjualan += $item->total_transaksi;
				}
			    $html .= '
			    	<tr>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.($index+1).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.date("d M Y H:i:s", strtotime($item->tgl)).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.$item->jenis.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.$item->no_transaksi.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.$item->dividen_period.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($item->total_transaksi).'</td>
		            </tr>';
				if($index == count($data_list)-1){
				    $html .= '
				    	<tr>
			                <td style="border:0.1px solid black;" valign="middle" align="right" colspan="5">Total Pembelian</td>
			                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($total_pembelian).'</td>
			            </tr>
				    	<tr>
			                <td style="border:0.1px solid black;" valign="middle" align="right" colspan="5">Total Penjualan</td>
			                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($total_penjualan).'</td>
			            </tr>';
				}
			}
		    $html .= '</table>';
			$pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Investor Investasi - '.$Request["data"][0]->nama.'.pdf', 'I');
		} else {
			$pdf = new Pdf_manajemen_investor('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Investor');
		    $pdf->SetTopMargin(20);
		    $pdf->setFooterMargin(0);
     		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
		    $pdf->AddPage(/*"L"*/);
		    $html='<h3>Data tidak ditemukan</h3>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Investor.pdf', 'I');
		}
	}

	public function excel_investasi_investor(){
        $Request = $this->manajemen_investor_data->GetManajemenInvestor(["filter" => ["id" => $_GET["id"]]]);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
		  	$object = new PHPExcel();
		  	$object->setActiveSheetIndex(0);
		  	$table_columns = array("No", "Tanggal", "Waktu", "Jenis", "No Transaksi", "Dividen Period", "Total Payment");
		  	$column = 0;

			foreach($table_columns as $field){
				$object->getActiveSheet()->setCellValueByColumnAndRow($column, 3, $field);
				$object->getActiveSheet()->getColumnDimension("A")->setWidth(8);
				$object->getActiveSheet()->getColumnDimension("B")->setWidth(14);
				$object->getActiveSheet()->getColumnDimension("C")->setWidth(9);
				$object->getActiveSheet()->getColumnDimension("D")->setWidth(13);
				$object->getActiveSheet()->getColumnDimension("E")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("F")->setWidth(15);
				$object->getActiveSheet()->getColumnDimension("G")->setWidth(16);
				$column++;
			}
			$excel_row = 4;
		    $total_pembelian = 0;
		    $total_penjualan = 0;
	    	foreach($Request["data_investasi"] as $index => $item){
				if($item->jenis == "Pembelian"){
					$total_pembelian += $item->total_transaksi;
				} else {
					$total_penjualan += $item->total_transaksi;
				}
				$object->getActiveSheet()->setCellValueExplicit("A".$excel_row, ($index+1), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("B".$excel_row, date("d-m-Y", strtotime($item->tgl)), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("C".$excel_row, date("H:i:s", strtotime($item->tgl)), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("D".$excel_row, $item->jenis, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("E".$excel_row, $item->no_transaksi, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("F".$excel_row, $item->dividen_period, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("G".$excel_row, $item->nominal, PHPExcel_Cell_DataType::TYPE_STRING);
				$excel_row++;
			}
			$object->setActiveSheetIndex(0)->mergeCells("A1:G1");
			$object->getActiveSheet()->setCellValueExplicit("A1", "Manajemen Investor Investasi - ".$Request["data"][0]->nama, PHPExcel_Cell_DataType::TYPE_STRING);
			$object->setActiveSheetIndex(0)->mergeCells("A".($excel_row).":F".($excel_row));
			$object->getActiveSheet()->setCellValueExplicit("A".($excel_row), "Total Pembelian", PHPExcel_Cell_DataType::TYPE_STRING);
			$object->getActiveSheet()->setCellValueExplicit("G".($excel_row), $total_pembelian, PHPExcel_Cell_DataType::TYPE_STRING);
			$object->setActiveSheetIndex(0)->mergeCells("A".($excel_row+1).":F".($excel_row+1));
			$object->getActiveSheet()->setCellValueExplicit("A".($excel_row+1), "Total Penjualan", PHPExcel_Cell_DataType::TYPE_STRING);
			$object->getActiveSheet()->setCellValueExplicit("G".($excel_row+1), $total_penjualan, PHPExcel_Cell_DataType::TYPE_STRING);
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
			$object->getActiveSheet()->getStyle("A".$excel_row.":G".$excel_row)->applyFromArray($styleRight)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("A".($excel_row+1).":G".($excel_row+1))->applyFromArray($styleRight)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("A3:G3")->applyFromArray($styleCenter)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("A4:A".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("B4:B".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("C4:C".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("D4:D".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("E4:E".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("F4:F".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("G4:G".($excel_row-1))->applyFromArray($styleRight);
			$object->getActiveSheet()->getStyle("A3:G".($excel_row+1))->applyFromArray($styleBorder);
			$object->getActiveSheet()->getStyle("A3:G3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$object->getActiveSheet()->getStyle("A3:G3")->getFill()->getStartColor()->setRGB("FFFF01");
			$object->getActiveSheet()->getStyle("A".($excel_row).":G".($excel_row+1))->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$object->getActiveSheet()->getStyle("A".($excel_row).":G".($excel_row+1))->getFill()->getStartColor()->setRGB("92D050");
			$object_writer = PHPExcel_IOFactory::createWriter($object, "Excel5");
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment;filename="."Manajemen Investor Investasi - ".$Request["data"][0]->nama.".xls");
			$object_writer->save("php://output");
		}
	}

	public function PDFOrExcel()
	{
		$PDFOrExcel = $this->input->post('PDFOrExcel');
		$page= $this->input->post('page'); 
		$this->foglobal->insert_log_admin($this->user->id, date("Y-m-d H:i:s"), $this->user->nama." melakukan export " . $PDFOrExcel ." '". $page."'", $this->foglobal->ip_address());
		$data = [
		"Message" => "Proses Exsport Success Line 540 Controller/Manajemen_proyek.php",
        "User_Id" => $this->user->id,
        "Date" => date("Y-m-d H:i:s"),
        "Proses" => $this->user->nama." melakukan export " . $PDFOrExcel ." '". $page."'",
        "ip_address" => $this->foglobal->ip_address(),      
    	];   	

		echo json_encode(["get_Datas" => $data]);	
	}

	//Muhammad Waizulkarnain(Loger) melakukan verifikasi pemodal 'NIRWAN'
	public function LogActiveInActive(){
		$ActiveInActive = $this->input->post('ActiveInActive');
		$namaObj = $this->input->post('namaObj'); 
		$loger = $this->session->userdata("user")->nama;

		$data =	$this->foglobal->insert_log_admin($this->user->id, date("Y-m-d H:i:s"), $loger." melakukan " . $ActiveInActive ." pemodal '".$namaObj."'", $this->foglobal->ip_address());
		echo json_encode(["get_Datas" => $data]);		
	}



}