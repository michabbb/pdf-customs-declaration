<?php

require 'vendor/autoload.php';

$pdfconfig = [
	'leftMargin' => 1
];

$pdf = new mypdf('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
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
$pdf->SetMargins(1, 1, 2,true);
$pdf->setHeaderMargin(2);
$pdf->setFooterMargin(0);
//set auto page breaks
$pdf->SetAutoPageBreak(FALSE, 0);
//set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
//$pdf->startPageGroup();
$pdf->AddPage();

$tbl = <<<EOD
<table border="1" cellpadding="1" nobr="true">
<tbody>
<tr>
<td width="210"><b><font size="12">CUSTOMS<br />DECLRATION</font><br><font size="9">Déclaration en douane</font></b></td>
<td width="100">&nbsp;</td>
<td width="100">&nbsp;</td>
<td width="120"><b><font size="30">&nbsp;CN22</font></b></td>
</tr>
<tr>
<td width="210"><b><font size="12">COUNTRY / CITY</font></b><br><font size="9">Pays de destination</font></td>
<th colspan="3" ><b><font size="12">Paris / France</font> </b></th>
</tr>
<tr>
<td width="210"><img src="images/checkbox_checked_20x20.jpg"><br><font size="7">Merchandise<br>Marchandise</font></td>
<td width="100"><img src="images/checkbox_unchecked_20x20.jpg"><br><font size="7">Documents</font></td>
<td width="100"><img src="images/checkbox_unchecked_20x20.jpg"><br><font size="7">Commercial<br>sample<br>échantillon commercial</font></td>
<td width="120"><img src="images/checkbox_unchecked_20x20.jpg"><br><font size="7">Gift<br>Cadeau</font></td>
</tr>
<tr>
	<th colspan="2"><font size="8"><b>Quantity and detailed description of contents<br>Quantité et description détaillée du contenu</b></font></th>
<td width="100"><font size="7">Weight (kg)<br>valeur</font></td>
<td width="100"><font size="7">Value<br>valeur</font></td>
</tr>
<tr>
<th colspan="2"><font size="8"><br><i><b>2 x costumes</b></i></font></th>
<td width="100"><font size="7"><i>0,200</i></font></td>
<td width="120"><font size="7"><i>3,50 EUR</i></font></td>
</tr>
<tr>
<td width="210">&nbsp;</td>
<td width="100">&nbsp;</td>
<td width="100"><font size="7">Total Weight (kg)<br>Poids total</font></td>
<td width="120"><font size="7">Total Value<br>Valeur totale</font></td>
</tr>
<tr>
<td width="210">&nbsp;</td>
<td width="100">&nbsp;</td>
<td width="100"><font size="7"><b><i>0,200</i></b></font></td>
<td width="120"><font size="7"><b><i>3,50 EUR</i></b></font></td>
</tr>
<tr>
<td colspan="4"><font size="7">I, the undersigned whose name and address are given on the item, certify that the particulars given in this Declaration are correct and that this item does not contain any dangerous article or articles prohibited by legislation or by postal or customs regulations.<br>
Je, soussigné (e), dont le nom et l'adresse figurent sur l'envoi, certifie que les indications données dans cette déclaration est correcte et que cet article ne contient aucun article ou article dangereux interdite par la législation ou par la réglementation postale ou douanière.
</font>
<br><b>Date and sender’s signature</b><br>
<b>01.11.2017</b>&nbsp;<img src="images/signature.jpg">
</td>
</tr>
</tbody>
</table>
EOD;

$pdf->writeHTML($tbl);

$pdf->Output('/tmp/customs_declaration.pdf', 'F');