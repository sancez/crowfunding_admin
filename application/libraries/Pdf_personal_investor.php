<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class Pdf_personal_investor extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
    public function Header() {
        $bMargin = $this->getBreakMargin();
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak(false, 0);
        $img_file = base_url("/assets/images/background_pdf.png");
        $this->Image($img_file, 0, 0, 212, 297, '', '', '', false, 300, '', false, false, 0, false, false, false);
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->setPageMark();
        $this->SetY(4); 
        $this->SetX(120); 
        $this->setFont('Helvetica', 'B', 16);
        $this->Cell(0, 10, 'Verifikasi', 0, 1, 'L');
        $this->setFont('Helvetica', '', 12);
        $this->SetX(120); 
        $this->Cell(0, 5, 'Data Personal Investor', 0, 1, 'L');
        $this->SetTextColor(145, 145, 145);
        $this->SetFont('Helvetica','B',10);   
        $this->Cell(0, 17, "Tanggal Print : ".date("d M Y"), 0, 1, 'R');
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