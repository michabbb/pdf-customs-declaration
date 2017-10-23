<?php

/**
 * http://www.tcpdf.org/examples.php
 * http://www.tcpdf.org/doc/classTCPDF.html
 */

// Extend the TCPDF class to create custom Header and Footer
class mypdf extends TCPDF {

	private $pdfConfig;

	public function setPDFConfig($pdfConfig){
		$this->pdfConfig = $pdfConfig;
	}

	//Page header
	public function Header() {
	}

	// Page footer
	public function Footer() {
	}
}