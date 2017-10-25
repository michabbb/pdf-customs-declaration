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
$pdf->AddPage();

$tbl = <<<EOD
<table border="1" cellpadding="10" nobr="true">
<tbody>
<tr>
<td width="210"><b><font size="15">CUSTOMS<br />DECLRATION</font></b></td>
<td width="100">&nbsp;</td>
<td width="100">&nbsp;</td>
<td width="120"><b><font size="30">CN22</font></b></td>
</tr>
<tr>
<td width="210"><img src="images/checkbox_checked.png"><br>Gift</td>
<td width="100"><img src="images/checkbox_unchecked.png"><br>Documents</td>
<td width="100"><img src="images/checkbox_unchecked.png"><br>Commercial<br>sample</td>
<td width="120"><img src="images/checkbox_unchecked.png"><br>Other</td>
</tr>
<tr>
	<th colspan="2">Quantity and detailed description of contents</th>
<td width="100">Weight (kg)</td>
<td width="100">Value</td>
</tr>
<tr>
<th colspan="2"><br><i>2 x costumes</i></th>
<td width="100"><i>0,200</i></td>
<td width="120"><i>3,50 EUR</i></td>
</tr>
<tr>
<td width="210">&nbsp;</td>
<td width="100">&nbsp;</td>
<td width="100">Total Weight (kg)</td>
<td width="120">Total Value</td>
</tr>
<tr>
<td width="210">&nbsp;</td>
<td width="100">&nbsp;</td>
<td width="100"><b><i>0,200</i></b></td>
<td width="120"><b><i>3,50 EUR</i></b></td>
</tr>
<tr>
<td colspan="4">I, the undersigned whose name and address are given on the item, certify that the particulars given in
this Declaration are correct and that this item does not contain any dangerous article or articles
prohibited by legislation or by postal or customs regulations.<br><br><br><br><b>Date and sender’s signature</b></td>
</tr>
</tbody>
</table>
EOD;

$pdf->writeHTML($tbl);

$pdf->Output('/tmp/customs_declaration.pdf', 'F');