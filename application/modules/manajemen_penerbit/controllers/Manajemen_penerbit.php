<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manajemen_penerbit extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
      	$this->user = $this->session->userdata("user");
		$this->foglobal->CheckSessionLogin();
        $this->load->model("manajemen_penerbit/manajemen_penerbit_data");
		$this->load->library("Pdf");
		$this->load->library("Pdf_manajemen_penerbit");
		$this->load->library("excel");
	}

	public function index(){
		$this->load->view("manajemen_penerbit", array("manajemen_penerbit" => "active"));
	}

	public function cetak(){
        $param["Sort"] = $_GET["sort"];
        $param["Search"] = $_GET["search"];
        $param["filter"]["status_delete"] = $_GET["status_delete"];
        $Request = $this->manajemen_penerbit_data->GetManajemenPenerbit($param, true);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
			$pdf = new Pdf_manajemen_penerbit('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Penerbit');
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
		    		<tr nobr="true">
		                <td width="8%" style="border:0.1px solid black;" valign="middle" align="center">NO</td>
		                <td width="21%" style="border:0.1px solid black;" valign="middle" align="center">Nama Perusahaan</td>
		                <td width="20%" style="border:0.1px solid black;" valign="middle" align="center">Nama Penanggung Jawab</td>
		                <td width="21%" style="border:0.1px solid black;" valign="middle" align="center">NPWP</td>
		                <td width="21%" style="border:0.1px solid black;" valign="middle" align="center">Nama Properti</td>
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
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->nama_perusahaan.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->nama_penanggung_jawab.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->npwp.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->nama_properti.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.$status.'</td>
		            </tr>';
			}
		    $html .= '</table>';
			$pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Penerbit.pdf', 'I');
		} else {
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Penerbit');
		    $pdf->SetTopMargin(20);
		    $pdf->setFooterMargin(0);
     		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
		    $pdf->AddPage(/*"L"*/);
		    $html='<h3>Data tidak ditemukan</h3>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Penerbit.pdf', 'I');
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


	public function excel(){
        $param["Sort"] = $_GET["sort"];
        $param["Search"] = $_GET["search"];
        $param["filter"]["status_delete"] = $_GET["status_delete"];
        $Request = $this->manajemen_penerbit_data->GetManajemenPenerbit($param, true);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
		  	$object = new PHPExcel();
		  	$object->setActiveSheetIndex(0);
		  	$table_columns = array("No", "Nama Perusahaan", "Nama Penanggung Jawab", "NPWP", "Nama Properti", "Status", "NIK Penanggung Jawab", "Jabatan", "No Telepon", "Email", "Provinsi", "Kota/Kabupaten", "Kecamatan", "Kelurahan", "Alamat Lengkap", "Nama Bank", "Nama Cabang Bank", "Nama Pemilik Rekening", "No Rekening");
		  	$column = 0;

			foreach($table_columns as $field){
				$object->getActiveSheet()->setCellValueByColumnAndRow($column, 3, $field);
				$object->getActiveSheet()->getColumnDimension("A")->setWidth(8);
				$object->getActiveSheet()->getColumnDimension("B")->setWidth(35);
				$object->getActiveSheet()->getColumnDimension("C")->setWidth(35);
				$object->getActiveSheet()->getColumnDimension("D")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("E")->setWidth(35);
				$object->getActiveSheet()->getColumnDimension("F")->setWidth(12);

				$object->getActiveSheet()->getColumnDimension("G")->setWidth(20);
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
				$object->getActiveSheet()->setCellValueExplicit("B".$excel_row, $item->nama_perusahaan, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("C".$excel_row, $item->nama_penanggung_jawab, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("D".$excel_row, $item->npwp, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("E".$excel_row, $item->nama_properti, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("F".$excel_row, $status, PHPExcel_Cell_DataType::TYPE_STRING);

				$object->getActiveSheet()->setCellValueExplicit("G".$excel_row, $item->nik_penanggung_jawab, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("H".$excel_row, $item->jabatan, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("I".$excel_row, $item->no_telepon, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("J".$excel_row, $item->email, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("K".$excel_row, $item->nama_provinsi, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("L".$excel_row, $item->nama_kota, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("M".$excel_row, $item->nama_kecamatan, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("N".$excel_row, $item->kelurahan, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("O".$excel_row, $item->alamat_lengkap, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("P".$excel_row, $item->nama_bank, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("Q".$excel_row, $item->nama_cabang_bank, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("R".$excel_row, $item->nama_pemilik_rekening_bank, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("S".$excel_row, $item->nomor_rekening_bank, PHPExcel_Cell_DataType::TYPE_STRING);
				$excel_row++;
			}
			$object->setActiveSheetIndex(0)->mergeCells("A1:S1");
			$object->getActiveSheet()->setCellValueExplicit("A1", "Manajemen Penerbit", PHPExcel_Cell_DataType::TYPE_STRING);
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
			$object->getActiveSheet()->getStyle("A".$excel_row.":S".$excel_row)->applyFromArray($styleRight)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("D".$excel_row)->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("A3:S3")->applyFromArray($styleCenter)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("A4:A".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("F4:F".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("A3:S".($excel_row-1))->applyFromArray($styleBorder);
			$object->getActiveSheet()->getStyle("A3:S3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$object->getActiveSheet()->getStyle("A3:S3")->getFill()->getStartColor()->setRGB("FFFF01");
			$object_writer = PHPExcel_IOFactory::createWriter($object, "Excel5");
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment;filename="."Manajemen Penerbit.xls");
			$object_writer->save("php://output");
		}
	}
}