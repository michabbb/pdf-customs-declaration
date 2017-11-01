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
<td width="210"><b><font size="15">CUSTOMS<br />DECLRATION</font><br><font size="11">Déclaration en douane</font></b></td>
<td width="100">&nbsp;</td>
<td width="100">&nbsp;</td>
<td width="120"><b><font size="30">CN22</font></b></td>
</tr>
<tr>
<td width="210"><b><font size="15">COUNTRY / CITY</font></b><br><font size="11">Pays de destination</font></td>
<th colspan="3" >&nbsp;</th>
</tr>
<tr>
<td width="210"><img src="images/checkbox_checked.png"><br>Merchandise<br>Marchandise</td>
<td width="100"><img src="images/checkbox_unchecked.png"><br>Documents</td>
<td width="100"><img src="images/checkbox_unchecked.png"><br>Commercial<br>sample<br>échantillon commercial</td>
<td width="120"><img src="images/checkbox_unchecked.png"><br>Gift<br>Cadeau</td>
</tr>
<tr>
	<th colspan="2">Quantity and detailed description of contents<br>Quantité et description détaillée du contenu</th>
<td width="100">Weight (kg)<br>valeur</td>
<td width="100">Value<br>valeur</td>
</tr>
<tr>
<th colspan="2"><br><i>2 x costumes</i></th>
<td width="100"><i>0,200</i></td>
<td width="120"><i>3,50 EUR</i></td>
</tr>
<tr>
<td width="210">&nbsp;</td>
<td width="100">&nbsp;</td>
<td width="100">Total Weight (kg)<br>Poids total</td>
<td width="120">Total Value<br>Valeur totale</td>
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
prohibited by legislation or by postal or customs regulations.<br><br>

Je, soussigné (e), dont le nom et l'adresse figurent sur l'envoi, certifie que les indications données dans
cette déclaration est correcte et que cet article ne contient aucun article ou article dangereux
interdite par la législation ou par la réglementation postale ou douanière.

<br><br><b>Date and sender’s signature</b><br><br>
<b>01.11.2017</b>&nbsp;<img src="images/signature.jpg">
</td>
</tr>
</tbody>
</table>
EOD;

$pdf->writeHTML($tbl);

$pdf->Output('/tmp/customs_declaration.pdf', 'F');