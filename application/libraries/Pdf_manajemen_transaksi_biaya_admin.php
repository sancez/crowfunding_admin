<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class Pdf_manajemen_transaksi_biaya_admin extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
    public function Header() {
        $bMargin = $this->getBreakMargin();
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak(false, 0);
        $img_file = base_url("/assets/images/background_pdf_landscape.png");
        $this->Image($img_file, 0, 0, 297, 212, '', '', '', false, 300, '', false, false, 0, false, false, false);
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->setPageMark();
        $this->SetY(4); 
        $this->SetX(120); 
        $this->setFont('Helvetica', 'B', 16);
        $this->Cell(0, 10, 'Manajemen Transaksi', 0, 1, 'L');
        $this->setFont('Helvetica', '', 12);
        $this->SetX(120); 
        $this->Cell(0, 5, 'Data Transaksi Biaya Admin', 0, 1, 'L');
        $this->SetX(120); 
        $this->Cell(0, 5, "Periode Transaksi : ".date("d M Y", strtotime($_GET['tanggal_mulai']))." - ".date("d M Y", strtotime($_GET['tanggal_selesai'])), 0, 1, 'L');
        $this->SetTextColor(145, 145, 145);
        $this->SetFont('Helvetica','B',10);   
        $this->Cell(0, 0, "Tanggal Print : ".date("d M Y"), 0, 1, 'R');
    }
    public function Footer() {
        $this->SetY(-22);
        $this->SetTextColor(145, 145, 145);
        $this->SetFont('Helvetica', 'B', 8);
        $this->SetX(6); 
        $this->Cell(0, 10, 'Dicetak Oleh : '.$_GET['by'], 0, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->Cell(16, 10, 'Halaman '.$this->getAliasNumPage().' dari '.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}
/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */