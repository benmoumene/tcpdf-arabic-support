<?php
//$Start = getTime();
//$mem_limit = substr(ini_get("memory_limit"), 0, -1);
/*function getTime() {
	$a = explode (' ',microtime());
	return(double) $a[0] + $a[1];
}
function flush2(){
    echo(str_repeat(' ',256));
    // check that buffer is actually set before flushing
    if (ob_get_length()){           
        @ob_flush();
        @flush();
        @ob_end_flush();
    }   
    @ob_start();
}
flush2();

	error_reporting(E_ALL ^ E_NOTICE);
	set_time_limit(0);
	@ini_set("max_execution_time", 1000);
	@ini_set("default_socket_timeout", 240);
*/
//============================================================+
// File name   : example_018.php
// Begin       : 2008-03-06
// Last Update : 2013-05-14
//
// Description : Example 018 for TCPDF class
//               RTL document with Persian language
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: RTL document with Persian language
 * @author Nicola Asuni
 * @since 2008-03-06
 */

// Include the main TCPDF library (search for installation path).

require_once('tcpdf/tcpdf.php');

define ('K_PATH_IMAGES', dirname(__FILE__).'/images/');
define ('PDF_HEADER_TITLE', 'TCPDF Example');
define ('PDF_HEADER_STRING', "by Nicola Asuni - Tecnick.com\www.tcpdf.org");
/**
 * Page orientation (P=portrait, L=landscape).
 */
define ('PDF_PAGE_ORIENTATION', 'P');
define ('PDF_HEADER_LOGO', 'images/logo.png');



// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 018');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
// remove default header/footer
//$pdf->setPrintHeader(false);
//$pdf->setPrintFooter(false);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' *************', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language dependent data:
$lg = Array();
$lg['a_meta_charset'] = 'UTF-8';
$lg['a_meta_dir'] = 'rtl';
$l['a_meta_language'] = 'ar';

// TRANSLATIONS --------------------------------------
$l['w_page'] = 'صفحة';
;

// set some language-dependent strings (optional)
$pdf->setLanguageArray($lg);

// ---------------------------------------------------------

// set LTR direction for english translation
$pdf->setRTL(true);
// set font
//$pdf->SetFont('amiri', '', 18);

//$pdf->SetFontSize(10);

// print newline
$pdf->Ln();
// add a page
$pdf->AddPage();

// Persian and English content
$htmlpersian = '
<style>
	h1 {
		color: navy;
		font-family: droidarabickufi;
		font-size: 24pt;
	}
	p.first {
		color: green;
		font-family: droidarabickufi;
		font-size: 22px;
		line-height: 65px;
		word-wrap: break-word;
	}
</style>

<h1 class="title">سورة القلم <i style="color:#990000"></i></h1>

<p class="first">
ن ۚ وَالْقَلَمِ وَمَا يَسْطُرُونَ(1)

مَا أَنتَ بِنِعْمَةِ رَبِّكَ بِمَجْنُونٍ(2)

وَإِنَّ لَكَ لَأَجْرًا غَيْرَ مَمْنُونٍ(3)

وَإِنَّكَ لَعَلَىٰ خُلُقٍ عَظِيمٍ(4)

فَسَتُبْصِرُ وَيُبْصِرُونَ(5)

بِأَييِّكُمُ الْمَفْتُونُ(6)

إِنَّ رَبَّكَ هُوَ أَعْلَمُ بِمَن ضَلَّ عَن سَبِيلِهِ وَهُوَ أَعْلَمُ بِالْمُهْتَدِينَ(7)
فَلَا تُطِعِ الْمُكَذِّبِينَ(8)
وَدُّوا لَوْ تُدْهِنُ فَيُدْهِنُونَ(9)
وَلَا تُطِعْ كُلَّ حَلَّافٍ مَّهِينٍ(10)
هَمَّازٍ مَّشَّاءٍ بِنَمِيمٍ(11)
مَّنَّاعٍ لِّلْخَيْرِ مُعْتَدٍ أَثِيمٍ(12)
عُتُلٍّ بَعْدَ ذَٰلِكَ زَنِيمٍ(13)
أَن كَانَ ذَا مَالٍ وَبَنِينَ(14)
إِذَا تُتْلَىٰ عَلَيْهِ آيَاتُنَا قَالَ أَسَاطِيرُ الْأَوَّلِينَ(15)
سَنَسِمُهُ عَلَى الْخُرْطُومِ(16)
إِنَّا بَلَوْنَاهُمْ كَمَا بَلَوْنَا أَصْحَابَ الْجَنَّةِ إِذْ أَقْسَمُوا لَيَصْرِمُنَّهَا مُصْبِحِينَ(17)
وَلَا يَسْتَثْنُونَ(18)
فَطَافَ عَلَيْهَا طَائِفٌ مِّن رَّبِّكَ وَهُمْ نَائِمُونَ(19)
فَأَصْبَحَتْ كَالصَّرِيمِ(20)
فَتَنَادَوْا مُصْبِحِينَ(21)
أَنِ اغْدُوا عَلَىٰ حَرْثِكُمْ إِن كُنتُمْ صَارِمِينَ(22)
فَانطَلَقُوا وَهُمْ يَتَخَافَتُونَ(23)
أَن لَّا يَدْخُلَنَّهَا الْيَوْمَ عَلَيْكُم مِّسْكِينٌ(24)
وَغَدَوْا عَلَىٰ حَرْدٍ قَادِرِينَ(25)
فَلَمَّا رَأَوْهَا قَالُوا إِنَّا لَضَالُّونَ(26)
بَلْ نَحْنُ مَحْرُومُونَ(27)
قَالَ أَوْسَطُهُمْ أَلَمْ أَقُل لَّكُمْ لَوْلَا تُسَبِّحُونَ(28)
قَالُوا سُبْحَانَ رَبِّنَا إِنَّا كُنَّا ظَالِمِينَ(29)
فَأَقْبَلَ بَعْضُهُمْ عَلَىٰ بَعْضٍ يَتَلَاوَمُونَ(30)
قَالُوا يَا وَيْلَنَا إِنَّا كُنَّا طَاغِينَ(31)
عَسَىٰ رَبُّنَا أَن يُبْدِلَنَا خَيْرًا مِّنْهَا إِنَّا إِلَىٰ رَبِّنَا رَاغِبُونَ(32)
كَذَٰلِكَ الْعَذَابُ ۖ وَلَعَذَابُ الْآخِرَةِ أَكْبَرُ ۚ لَوْ كَانُوا يَعْلَمُونَ(33)
إِنَّ لِلْمُتَّقِينَ عِندَ رَبِّهِمْ جَنَّاتِ النَّعِيمِ(34)
أَفَنَجْعَلُ الْمُسْلِمِينَ كَالْمُجْرِمِينَ(35)
مَا لَكُمْ كَيْفَ تَحْكُمُونَ(36)
أَمْ لَكُمْ كِتَابٌ فِيهِ تَدْرُسُونَ(37)
إِنَّ لَكُمْ فِيهِ لَمَا تَخَيَّرُونَ(38)
أَمْ لَكُمْ أَيْمَانٌ عَلَيْنَا بَالِغَةٌ إِلَىٰ يَوْمِ الْقِيَامَةِ ۙ إِنَّ لَكُمْ لَمَا تَحْكُمُونَ(39)
سَلْهُمْ أَيُّهُم بِذَٰلِكَ زَعِيمٌ(40)
أَمْ لَهُمْ شُرَكَاءُ فَلْيَأْتُوا بِشُرَكَائِهِمْ إِن كَانُوا صَادِقِينَ(41)
يَوْمَ يُكْشَفُ عَن سَاقٍ وَيُدْعَوْنَ إِلَى السُّجُودِ فَلَا يَسْتَطِيعُونَ(42)
خَاشِعَةً أَبْصَارُهُمْ تَرْهَقُهُمْ ذِلَّةٌ ۖ وَقَدْ كَانُوا يُدْعَوْنَ إِلَى السُّجُودِ وَهُمْ سَالِمُونَ(43)
فَذَرْنِي وَمَن يُكَذِّبُ بِهَٰذَا الْحَدِيثِ ۖ سَنَسْتَدْرِجُهُم مِّنْ حَيْثُ لَا يَعْلَمُونَ(44)
وَأُمْلِي لَهُمْ ۚ إِنَّ كَيْدِي مَتِينٌ(45)
أَمْ تَسْأَلُهُمْ أَجْرًا فَهُم مِّن مَّغْرَمٍ مُّثْقَلُونَ(46)
أَمْ عِندَهُمُ الْغَيْبُ فَهُمْ يَكْتُبُونَ(47)
فَاصْبِرْ لِحُكْمِ رَبِّكَ وَلَا تَكُن كَصَاحِبِ الْحُوتِ إِذْ نَادَىٰ وَهُوَ مَكْظُومٌ(48)
لَّوْلَا أَن تَدَارَكَهُ نِعْمَةٌ مِّن رَّبِّهِ لَنُبِذَ بِالْعَرَاءِ وَهُوَ مَذْمُومٌ(49)
فَاجْتَبَاهُ رَبُّهُ فَجَعَلَهُ مِنَ الصَّالِحِينَ(50)
وَإِن يَكَادُ الَّذِينَ كَفَرُوا لَيُزْلِقُونَكَ بِأَبْصَارِهِمْ لَمَّا سَمِعُوا الذِّكْرَ وَيَقُولُونَ إِنَّهُ لَمَجْنُونٌ(51)
وَمَا هُوَ إِلَّا ذِكْرٌ لِّلْعَالَمِينَ(52)
</p>';
//Write($h, $txt, $link='', $fill=0, $align='', $ln=false, $stretch=0, $firstline=false, $firstblock=false, $maxh=0)
//$pdf->Write(0, $htmlpersian, '', 0, '', true, 0, false, false, 0);

$pdf->writeHTML($htmlpersian, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();
//Close and output PDF document
$pdf->Output('example_018.pdf', 'I');
//$pdf->Output('example_052.pdf', 'D');
/*$End = getTime();
	echo "Time taken = ".number_format(($End - $Start),2)." secs<br/>";
	echo 'Available script memory: '. $mem_limit. ' MB<br/>';
	echo 'Peak memory usage: '. (memory_get_peak_usage(true)/1024)/1024 . ' MB<br/>';
*/
//============================================================+
// END OF FILE
//============================================================+