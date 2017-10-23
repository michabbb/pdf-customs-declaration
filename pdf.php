<?php

require 'vendor/autoload.php';

$pdfconfig = [
	'leftMargin' => 7
];

$pdf = new mypdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPDFConfig($pdfconfig);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ich');
$pdf->SetTitle('customs declaration');
$pdf->SetSubject('customs declaration');
// set header and footer fonts
//$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
//$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);
// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
//$pdf->SetMargins(7, 65, 20);
//$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->setFooterMargin(5);
//set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, 5);
//set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
//$pdf->startPageGroup();
//$pdf->AddPage();
$pdf->Output('/tmp/customs_declaration.pdf', 'F');