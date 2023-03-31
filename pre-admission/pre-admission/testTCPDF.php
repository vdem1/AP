<?php
session_start();
    // Include the main TCPDF library (search for installation path).
require_once('TCPDF-main/examples/tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

$html=<<<EOF

EOF;

// Print text using writeHTMLCell()
$pdf->writeHTML($_SESSION['liste'], true, false, true, false, '');

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output($_SESSION['name'], 'D');

?>