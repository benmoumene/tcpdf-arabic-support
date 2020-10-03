<?php
error_reporting ( E_ALL );
//requires file from tcpdf
//require_once ('tcpdf/config/lang/eng.php');
require_once ('tcpdf/tcpdf.php');
//$exa = new TCPDF ();
$exa = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$exa->SetCreator ( PDF_CREATOR );
$exa->SetAuthor ( 'Vinod kumar' );
$exa->SetTitle ( 'Image with HTML' );
$exa->SetSubject ( 'Example of TCPDF' );
$exa->SetKeywords ( 'TCPDF, PDF, PHP' );
$exa->SetFont ( 'droidarabicnaskh1', '', 18 );
$exa->AddPage ();
$exa->setRTL(true);
// set default header data

/*
$txt = <<<HDOC
 Example of TCPDF
HDOC;
*/

$txt =''.$_POST['editor2'].'';

//$exa->Write ( 0, $txt );
$exa->WriteHTML ( $txt );
$exa->setImageScale ( PDF_IMAGE_SCALE_RATIO );
$exa->setJPEGQuality ( 90 );
$exa->Image ( "images/bg_quran.png" );
$txt = "<h2>Embedded HTML</h2>
This text should have some <em>italic</em> and some <strong>bold</strong>
and the caption should be an &lt;h2&gt;.";
$exa->WriteHTML ( $txt );
$exa->Output ( 'image_and_html.pdf', 'I' );
?> 