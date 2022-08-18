<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_proyek extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
      	$this->user = $this->session->userdata("user");
		$this->foglobal->CheckSessionLogin();
        $this->load->model("manajemen_proyek/manajemen_proyek_verifikasi_proyek");
        $this->load->model("manajemen_proyek/manajemen_proyek_sedang_berjalan");
        $this->load->model("manajemen_proyek/manajemen_proyek_selesai");
		$this->load->library("Pdf");
		$this->load->library("Pdf_manajemen_proyek");
		$this->load->library("Pdf_manajemen_proyek_sedang_berjalan");
		$this->load->library("Pdf_manajemen_proyek_selesai");
		$this->load->library("excel");
	}
	public function verifikasi_proyek(){
		$this->load->view("verifikasi_proyek", array("manajemen_proyek" => "active", "manajemen_proyek_verifikasi_proyek" => "active"));
	}
	public function verifikasi_proyek_tambah(){
		$this->load->view("verifikasi_proyek_tambah", array("manajemen_proyek" => "active", "manajemen_proyek_verifikasi_proyek" => "active"));
	}
	public function verifikasi_proyek_edit(){
		$this->db->where("id", $_GET["id"]);
		$GetProperti = $this->db->get("v_properti")->result();

		$this->db->where("id_properti", $_GET["id"]);
		$GetDokumen = $this->db->get("tb_properti_dokumen")->result();

		$this->db->where("id_properti", $_GET["id"]);
		$GetGrafik = $this->db->get("tb_properti_progres")->result();

        $this->load->view("verifikasi_proyek_edit", array(
            "properti" => $GetProperti[0],
            "dokumen" => $GetDokumen,
            "grafik" => $GetGrafik,
            "manajemen_proyek" => "active",
            "manajemen_proyek_verifikasi_proyek" => "active"

        ));
	}


	public function sedang_berjalan(){
		$this->load->view("sedang_berjalan", array("manajemen_proyek" => "active", "manajemen_proyek_sedang_berjalan" => "active"));
	}

	public function selesai(){
		$this->load->view("selesai", array("manajemen_proyek" => "active", "manajemen_proyek_selesai" => "active"));
	}

	public function cetak_verifikasi_proyek(){
		$this->foglobal->insert_log_admin($this->user->id, date("Y-m-d H:i:s"), $this->user->nama." melakukan export PDF 'Manajemen Proyek - Verifikasi Proyek'", $this->foglobal->ip_address());
        $param["Sort"] = $_GET["sort"];
        $param["Search"] = $_GET["search"];
        $param["filter"]["status_delete"] = $_GET["status"];
        $Request = $this->manajemen_proyek_verifikasi_proyek->GetManajemenProyekVerifikasiProyek($param, true);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
			$pdf = new Pdf_manajemen_proyek('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Proyek - Verifikasi Proyek');
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
		                <td width="16%" style="border:0.1px solid black;" valign="middle" align="center">Nama</td>
		                <td width="19%" style="border:0.1px solid black;" valign="middle" align="center">Alamat</td>
		                <td width="8%" style="border:0.1px solid black;" valign="middle" align="center">Mulai<br>Selesai</td>
		                <td width="10%" style="border:0.1px solid black;" valign="middle" align="center">Jumlah Dana</td>
		                <td width="10%" style="border:0.1px solid black;" valign="middle" align="center">Harga Saham</td>
		                <td width="10%" style="border:0.1px solid black;" valign="middle" align="center">Total Saham</td>
		                <td width="8%" style="border:0.1px solid black;" valign="middle" align="center">Persentase Saham</td>
		                <td width="8%" style="border:0.1px solid black;" valign="middle" align="center">Periode Dividen</td>
		                <td width="6%" style="border:0.1px solid black;" valign="middle" align="center">Status</td>
		            </tr>';
			foreach ($Request["data"] as $index => $item) {
				if($item->status_delete == 1){
					$status = "Dihapus";
				} else {
					$status = "Aktif";
				}
			    $html .= '
			    	<tr>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.($index+1).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->nama.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->alamat.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.date("d M Y", strtotime($item->tgl_mulai)).'<br>-<br>'.date("d M Y", strtotime($item->tgl_selesai)).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($item->jumlah_dana, false, true).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($item->harga_per_lembar, false, true).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($item->total_per_lembar, false, true).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.$this->foglobal->persen($item->roi).'%</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.$item->dividen_period.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.$status.'</td>
		            </tr>';
			}
		    $html .= '</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Proyek - Verifikasi Proyek.pdf', 'I');
		} else {
			$pdf = new Pdf_manajemen_proyek('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Proyek - Verifikasi Proyek');
		    $pdf->SetTopMargin(35);
		    $pdf->setFooterMargin(0);
     		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
		    $pdf->AddPage(/*"L"*/);
		    $html='<h3>Data tidak ditemukan</h3>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Proyek - Verifikasi Proyek.pdf', 'I');
		}
	}
	public function cetak_sedang_berjalan(){
		$this->foglobal->insert_log_admin($this->user->id, date("Y-m-d H:i:s"), $this->user->nama." melakukan export PDF 'Manajemen Proyek - Sedang Berjalan'", $this->foglobal->ip_address());
        $param["Sort"] = $_GET["sort"];
        $param["Search"] = $_GET["search"];
        $param["filter"]["status_delete"] = $_GET["status"];
        $Request = $this->manajemen_proyek_sedang_berjalan->GetManajemenProyekSedangBerjalan($param, true);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
			$pdf = new Pdf_manajemen_proyek_sedang_berjalan('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Proyek - Sedang Berjalan');
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
		                <td width="16%" style="border:0.1px solid black;" valign="middle" align="center">Nama</td>
		                <td width="19%" style="border:0.1px solid black;" valign="middle" align="center">Alamat</td>
		                <td width="8%" style="border:0.1px solid black;" valign="middle" align="center">Mulai<br>Selesai</td>
		                <td width="10%" style="border:0.1px solid black;" valign="middle" align="center">Jumlah Dana</td>
		                <td width="10%" style="border:0.1px solid black;" valign="middle" align="center">Harga Saham</td>
		                <td width="10%" style="border:0.1px solid black;" valign="middle" align="center">Total Saham</td>
		                <td width="8%" style="border:0.1px solid black;" valign="middle" align="center">Persentase Saham</td>
		                <td width="8%" style="border:0.1px solid black;" valign="middle" align="center">Periode Dividen</td>
		                <td width="6%" style="border:0.1px solid black;" valign="middle" align="center">Status</td>
		            </tr>';
			foreach ($Request["data"] as $index => $item) {
				if($item->status_delete == 1){
					$status = "Dihapus";
				} else {
					$status = "Aktif";
				}
			    $html .= '
			    	<tr>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.($index+1).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->nama.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->alamat.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.date("d M Y", strtotime($item->tgl_mulai)).'<br>-<br>'.date("d M Y", strtotime($item->tgl_selesai)).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($item->jumlah_dana, false, true).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($item->harga_per_lembar, false, true).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($item->total_per_lembar, false, true).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.$this->foglobal->persen($item->roi).'%</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.$item->dividen_period.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.$status.'</td>
		            </tr>';
			}
		    $html .= '</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Proyek - Sedang Berjalan.pdf', 'I');
		} else {
			$pdf = new Pdf_manajemen_proyek_sedang_berjalan('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Proyek - Sedang Berjalan');
		    $pdf->SetTopMargin(35);
		    $pdf->setFooterMargin(0);
     		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
		    $pdf->AddPage(/*"L"*/);
		    $html='<h3>Data tidak ditemukan</h3>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Proyek - Sedang Berjalan.pdf', 'I');
		}
	}
	public function cetak_selesai(){
		$this->foglobal->insert_log_admin($this->user->id, date("Y-m-d H:i:s"), $this->user->nama." melakukan export PDF 'Manajemen Proyek - Selesai'", $this->foglobal->ip_address());
        $param["Sort"] = $_GET["sort"];
        $param["Search"] = $_GET["search"];
        $param["filter"]["status_delete"] = $_GET["status"];
        $Request = $this->manajemen_proyek_selesai->GetManajemenProyekSelesai($param, true);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
			$pdf = new Pdf_manajemen_proyek_selesai('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Proyek - Selesai');
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
		                <td width="16%" style="border:0.1px solid black;" valign="middle" align="center">Nama</td>
		                <td width="19%" style="border:0.1px solid black;" valign="middle" align="center">Alamat</td>
		                <td width="8%" style="border:0.1px solid black;" valign="middle" align="center">Mulai<br>Selesai</td>
		                <td width="10%" style="border:0.1px solid black;" valign="middle" align="center">Jumlah Dana</td>
		                <td width="10%" style="border:0.1px solid black;" valign="middle" align="center">Harga Saham</td>
		                <td width="10%" style="border:0.1px solid black;" valign="middle" align="center">Total Saham</td>
		                <td width="8%" style="border:0.1px solid black;" valign="middle" align="center">Persentase Saham</td>
		                <td width="8%" style="border:0.1px solid black;" valign="middle" align="center">Periode Dividen</td>
		                <td width="6%" style="border:0.1px solid black;" valign="middle" align="center">Status</td>
		            </tr>';
			foreach ($Request["data"] as $index => $item) {
				if($item->status_delete == 1){
					$status = "Dihapus";
				} else {
					$status = "Aktif";
				}
			    $html .= '
			    	<tr>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.($index+1).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->nama.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="left">'.$item->alamat.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.date("d M Y", strtotime($item->tgl_mulai)).'<br>-<br>'.date("d M Y", strtotime($item->tgl_selesai)).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($item->jumlah_dana, false, true).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($item->harga_per_lembar, false, true).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="right">'.$this->foglobal->rupiah($item->total_per_lembar, false, true).'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.$this->foglobal->persen($item->roi).'%</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.$item->dividen_period.'</td>
		                <td style="border:0.1px solid black;" valign="middle" align="center">'.$status.'</td>
		            </tr>';
			}
		    $html .= '</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Proyek - Selesai.pdf', 'I');
		} else {
			$pdf = new Pdf_manajemen_proyek_selesai('P', 'mm', 'A4', true, 'UTF-8', false);
		    $pdf->SetTitle('Manajemen Proyek - Selesai');
		    $pdf->SetTopMargin(35);
		    $pdf->setFooterMargin(0);
     		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		    $pdf->SetAuthor('Author');
		    $pdf->SetDisplayMode('real', 'default');
		    $pdf->AddPage(/*"L"*/);
		    $html='<h3>Data tidak ditemukan</h3>';
            $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output('Manajemen Proyek - Selesai.pdf', 'I');
		}
	}

	public function excel_verifikasi_proyek(){
		$this->foglobal->insert_log_admin($this->user->id, date("Y-m-d H:i:s"), $this->user->nama." melakukan export Excel 'Manajemen Proyek - Verifikasi Proyek'", $this->foglobal->ip_address());
        $param["Sort"] = $_GET["sort"];
        $param["Search"] = $_GET["search"];
        $param["filter"]["status_delete"] = $_GET["status"];
        $Request = $this->manajemen_proyek_verifikasi_proyek->GetManajemenProyekVerifikasiProyek($param, true);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
		  	$object = new PHPExcel();
		  	$object->setActiveSheetIndex(0);
		  	$table_columns = array("No", "Nama", "Alamat", "Mulai", "Selesai", "Jumlah Dana", "Harga Saham", "Total Saham", "Persentase Saham", "Periode Dividen", "Status");
		  	$column = 0;

			foreach($table_columns as $field){
				$object->getActiveSheet()->setCellValueByColumnAndRow($column, 3, $field);
				$object->getActiveSheet()->getColumnDimension("A")->setWidth(8);
				$object->getActiveSheet()->getColumnDimension("B")->setWidth(30);
				$object->getActiveSheet()->getColumnDimension("C")->setWidth(40);
				$object->getActiveSheet()->getColumnDimension("D")->setWidth(15);
				$object->getActiveSheet()->getColumnDimension("E")->setWidth(15);
				$object->getActiveSheet()->getColumnDimension("F")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("G")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("H")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("I")->setWidth(18);
				$object->getActiveSheet()->getColumnDimension("J")->setWidth(15);
				$object->getActiveSheet()->getColumnDimension("K")->setWidth(12);
				$column++;
			}
			$excel_row = 4;
	    	foreach($array_data as $index => $item){
				if($item->status_delete == 1){
					$status = "Dihapus";
				} else {
					$status = "Aktif";
				}
				$object->getActiveSheet()->setCellValueExplicit("A".$excel_row, ($index+1), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("B".$excel_row, $item->nama, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("C".$excel_row, $item->alamat, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("D".$excel_row, date("d-m-Y", strtotime($item->tgl_mulai)), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("E".$excel_row, date("d-m-Y", strtotime($item->tgl_selesai)), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("F".$excel_row, $item->jumlah_dana, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("G".$excel_row, $item->harga_per_lembar, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("H".$excel_row, $item->total_per_lembar, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("I".$excel_row, $item->lepas_saham."%", PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("J".$excel_row, $item->dividen_period, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("K".$excel_row, $status, PHPExcel_Cell_DataType::TYPE_STRING);
				$excel_row++;
			}
			$object->setActiveSheetIndex(0)->mergeCells("A1:K1");
			$object->getActiveSheet()->setCellValueExplicit("A1", "Manajemen Proyek - Verifikasi Proyek", PHPExcel_Cell_DataType::TYPE_STRING);
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
			$object->getActiveSheet()->getStyle("A".$excel_row.":K".$excel_row)->applyFromArray($styleRight)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("D".$excel_row)->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("A3:K3")->applyFromArray($styleCenter)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("A4:A".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("D4:D".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("E4:E".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("F4:F".($excel_row-1))->applyFromArray($styleRight);
			$object->getActiveSheet()->getStyle("G4:G".($excel_row-1))->applyFromArray($styleRight);
			$object->getActiveSheet()->getStyle("H4:H".($excel_row-1))->applyFromArray($styleRight);
			$object->getActiveSheet()->getStyle("I4:I".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("J4:J".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("K4:K".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("A3:K".($excel_row-1))->applyFromArray($styleBorder);
			$object->getActiveSheet()->getStyle("A3:K3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$object->getActiveSheet()->getStyle("A3:K3")->getFill()->getStartColor()->setRGB("FFFF01");
			$object_writer = PHPExcel_IOFactory::createWriter($object, "Excel5");
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment;filename="."Manajemen Proyek - Verifikasi Proyek.xls");
			$object_writer->save("php://output");
		}
	}
	public function excel_sedang_berjalan(){
		$this->foglobal->insert_log_admin($this->user->id, date("Y-m-d H:i:s"), $this->user->nama." melakukan export Excel 'Manajemen Proyek - Sedang Berjalan'", $this->foglobal->ip_address());
        $param["Sort"] = $_GET["sort"];
        $param["Search"] = $_GET["search"];
        $param["filter"]["status_delete"] = $_GET["status"];
        $Request = $this->manajemen_proyek_sedang_berjalan->GetManajemenProyekSedangBerjalan($param, true);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
		  	$object = new PHPExcel();
		  	$object->setActiveSheetIndex(0);
		  	$table_columns = array("No", "Nama", "Alamat", "Mulai", "Selesai", "Jumlah Dana", "Harga Saham", "Total Saham", "Persentase Saham", "Periode Dividen", "Status");
		  	$column = 0;

			foreach($table_columns as $field){
				$object->getActiveSheet()->setCellValueByColumnAndRow($column, 3, $field);
				$object->getActiveSheet()->getColumnDimension("A")->setWidth(8);
				$object->getActiveSheet()->getColumnDimension("B")->setWidth(30);
				$object->getActiveSheet()->getColumnDimension("C")->setWidth(40);
				$object->getActiveSheet()->getColumnDimension("D")->setWidth(15);
				$object->getActiveSheet()->getColumnDimension("E")->setWidth(15);
				$object->getActiveSheet()->getColumnDimension("F")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("G")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("H")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("I")->setWidth(18);
				$object->getActiveSheet()->getColumnDimension("J")->setWidth(15);
				$object->getActiveSheet()->getColumnDimension("K")->setWidth(12);
				$column++;
			}
			$excel_row = 4;
	    	foreach($array_data as $index => $item){
				if($item->status_delete == 1){
					$status = "Dihapus";
				} else {
					$status = "Aktif";
				}
				$object->getActiveSheet()->setCellValueExplicit("A".$excel_row, ($index+1), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("B".$excel_row, $item->nama, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("C".$excel_row, $item->alamat, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("D".$excel_row, date("d-m-Y", strtotime($item->tgl_mulai)), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("E".$excel_row, date("d-m-Y", strtotime($item->tgl_selesai)), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("F".$excel_row, $item->jumlah_dana, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("G".$excel_row, $item->harga_per_lembar, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("H".$excel_row, $item->total_per_lembar, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("I".$excel_row, $item->lepas_saham."%", PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("J".$excel_row, $item->dividen_period, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("K".$excel_row, $status, PHPExcel_Cell_DataType::TYPE_STRING);
				$excel_row++;
			}
			$object->setActiveSheetIndex(0)->mergeCells("A1:K1");
			$object->getActiveSheet()->setCellValueExplicit("A1", "Manajemen Proyek - Sedang Berjalan", PHPExcel_Cell_DataType::TYPE_STRING);
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
			$object->getActiveSheet()->getStyle("A".$excel_row.":K".$excel_row)->applyFromArray($styleRight)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("D".$excel_row)->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("A3:K3")->applyFromArray($styleCenter)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("A4:A".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("D4:D".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("E4:E".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("F4:F".($excel_row-1))->applyFromArray($styleRight);
			$object->getActiveSheet()->getStyle("G4:G".($excel_row-1))->applyFromArray($styleRight);
			$object->getActiveSheet()->getStyle("H4:H".($excel_row-1))->applyFromArray($styleRight);
			$object->getActiveSheet()->getStyle("I4:I".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("J4:J".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("K4:K".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("A3:K".($excel_row-1))->applyFromArray($styleBorder);
			$object->getActiveSheet()->getStyle("A3:K3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$object->getActiveSheet()->getStyle("A3:K3")->getFill()->getStartColor()->setRGB("FFFF01");
			$object_writer = PHPExcel_IOFactory::createWriter($object, "Excel5");
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment;filename="."Manajemen Proyek - Sedang Berjalan.xls");
			$object_writer->save("php://output");
		}
	}
	public function excel_selesai(){
		$this->foglobal->insert_log_admin($this->user->id, date("Y-m-d H:i:s"), $this->user->nama." melakukan export Excel 'Manajemen Proyek - Selesai'", $this->foglobal->ip_address());
        $param["Sort"] = $_GET["sort"];
        $param["Search"] = $_GET["search"];
        $param["filter"]["status_delete"] = $_GET["status"];
        $Request = $this->manajemen_proyek_selesai->GetManajemenProyekSelesai($param, true);
		if(!empty($Request)) {
		    $array_data = $Request["data"];
		  	$object = new PHPExcel();
		  	$object->setActiveSheetIndex(0);
		  	$table_columns = array("No", "Nama", "Alamat", "Mulai", "Selesai", "Jumlah Dana", "Harga Saham", "Total Saham", "Persentase Saham", "Periode Dividen", "Status");
		  	$column = 0;

			foreach($table_columns as $field){
				$object->getActiveSheet()->setCellValueByColumnAndRow($column, 3, $field);
				$object->getActiveSheet()->getColumnDimension("A")->setWidth(8);
				$object->getActiveSheet()->getColumnDimension("B")->setWidth(30);
				$object->getActiveSheet()->getColumnDimension("C")->setWidth(40);
				$object->getActiveSheet()->getColumnDimension("D")->setWidth(15);
				$object->getActiveSheet()->getColumnDimension("E")->setWidth(15);
				$object->getActiveSheet()->getColumnDimension("F")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("G")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("H")->setWidth(20);
				$object->getActiveSheet()->getColumnDimension("I")->setWidth(18);
				$object->getActiveSheet()->getColumnDimension("J")->setWidth(15);
				$object->getActiveSheet()->getColumnDimension("K")->setWidth(12);
				$column++;
			}
			$excel_row = 4;
	    	foreach($array_data as $index => $item){
				if($item->status_delete == 1){
					$status = "Dihapus";
				} else {
					$status = "Aktif";
				}
				$object->getActiveSheet()->setCellValueExplicit("A".$excel_row, ($index+1), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("B".$excel_row, $item->nama, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("C".$excel_row, $item->alamat, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("D".$excel_row, date("d-m-Y", strtotime($item->tgl_mulai)), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("E".$excel_row, date("d-m-Y", strtotime($item->tgl_selesai)), PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("F".$excel_row, $item->jumlah_dana, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("G".$excel_row, $item->harga_per_lembar, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("H".$excel_row, $item->total_per_lembar, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("I".$excel_row, $item->lepas_saham."%", PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("J".$excel_row, $item->dividen_period, PHPExcel_Cell_DataType::TYPE_STRING);
				$object->getActiveSheet()->setCellValueExplicit("K".$excel_row, $status, PHPExcel_Cell_DataType::TYPE_STRING);
				$excel_row++;
			}
			$object->setActiveSheetIndex(0)->mergeCells("A1:K1");
			$object->getActiveSheet()->setCellValueExplicit("A1", "Manajemen Proyek - Selesai", PHPExcel_Cell_DataType::TYPE_STRING);
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
			$object->getActiveSheet()->getStyle("A".$excel_row.":K".$excel_row)->applyFromArray($styleRight)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("D".$excel_row)->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("A3:K3")->applyFromArray($styleCenter)->getFont()->setBold(true);
			$object->getActiveSheet()->getStyle("A4:A".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("D4:D".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("E4:E".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("F4:F".($excel_row-1))->applyFromArray($styleRight);
			$object->getActiveSheet()->getStyle("G4:G".($excel_row-1))->applyFromArray($styleRight);
			$object->getActiveSheet()->getStyle("H4:H".($excel_row-1))->applyFromArray($styleRight);
			$object->getActiveSheet()->getStyle("I4:I".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("J4:J".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("K4:K".($excel_row-1))->applyFromArray($styleCenter);
			$object->getActiveSheet()->getStyle("A3:K".($excel_row-1))->applyFromArray($styleBorder);
			$object->getActiveSheet()->getStyle("A3:K3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$object->getActiveSheet()->getStyle("A3:K3")->getFill()->getStartColor()->setRGB("FFFF01");
			$object_writer = PHPExcel_IOFactory::createWriter($object, "Excel5");
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment;filename="."Manajemen Proyek - Selesai.xls");
			$object_writer->save("php://output");
		}
	}

	public function ActiveInActive(){
		$ActiveInActiveObj = $this->input->post('ActiveInActiveArr');
		$NamaPerusahaan = $this->input->post('NamaPerusahaanArr'); 
		$this->foglobal->insert_log_admin($this->user->id, date("Y-m-d H:i:s"), $this->user->nama." melakukan " . $ActiveInActiveObj ." Pada " . $NamaPerusahaan, $this->foglobal->ip_address());
		$data = [
		"Message" => "Proses ActiveInActive Success Line 540 Controller/Manajemen_proyek.php",
        "User_Id" => $this->user->id,
        "Date" => date("Y-m-d H:i:s"),
        "Proses" => $this->user->nama." melakukan" .$ActiveInActiveObj. "Pada ".$NamaPerusahaan,
        "ip_address" => $this->foglobal->ip_address(),
        "ActiveInActiveArr" => $ActiveInActiveArr
    	];   	

		echo json_encode(["get_Datas" => $data]);		
	}

}