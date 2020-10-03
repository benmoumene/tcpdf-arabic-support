<?php
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
//require_once('config/tcpdf_config.php');
require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 018');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 018', PDF_HEADER_STRING);

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
//$pdf->SetFont('bahijjannab', '', 18);

//$pdf->SetFontSize(10);

// print newline
$pdf->Ln();
// add a page
$pdf->AddPage();

// Persian and English content
$htmlpersian = '
<style>
      .aya {
        font-family: tahomabd;
        line-height: 62px;
        font-size: 28px;
        text-align: justify;
        width: 550pt;
		color:green;
        position: relative;
        margin-right: auto;
        margin-left: auto;
      }    
    </style>
 <div class="aya"> « ( مُحَمَّدٌ رَّسُولُ اللَّهِ وَالَّذِينَ مَعَهُ أَشِدَّاءُ عَلَى الكُفَّارِ رُحَمَاءُ بَيْنَهُمْ تَرَاهُمْ رُكَّعاً سُجَّداً يَبْتَغُونَ فَضْلاً مِّنَ اللَّهِ وَرِضْوَاناً سِيمَاهُمْ فِي وَجُوهِهِم مِّنْ أَثَرِ السُّجُودِ ذَلِكَ مَثَلُهُمْ فِي التَّوْرَاةِ وَمَثَلُهُمْ فِي الإِنجِيلِ كَزَرْعٍ أَخْرَجَ شَطْأَهُ فَآزَرَهُ فَاسْتَغْلَظَ فَاسْتَوَى عَلَى سُوقِهِ يُعْجِبُ الزُّرَّاعَ لِيَغِيظَ بِهِمُ الكُفَّارَ وَعَدَ اللَّهُ الَّذِينَ آمَنُوا وَعَمِلُوا الصَّالِحَاتِ مِنْهُم مَّغْفِرَةً وَأَجْراً عَظِيما) »  الآية 29 من سورة الفتح .
</div>';
$pdf->WriteHTML($htmlpersian, true, 0, true, 0);


// Restore RTL direction
$pdf->setRTL(true);
// set font
$pdf->SetFont('tahomabd', '', 18);
// print newline
$pdf->Ln();
// Arabic and English content
$pdf->Cell(0, 12, 'بِسْمِ اللهِ الرَّحْمنِ الرَّحِيمِ',0,1,'C');
$htmlcontent1 = '<span color="#FF0000">(محمد رسول الله والذين معه أشداء على الكفار رحماء بينهم تراهم ركعا سجدا يبتغون فضلا من الله ورضوانا سيماهم في وجوههم من أثر السجود ذلك مثلهم في التوراة ومثلهم في الإنجيل كزرع أخرج شطأه فآزره فاستغلظ فاستوى على سوقه يعجب الزراع ليغيظ بهم الكفار وعد الله الذين آمنوا وعملوا الصالحات منهم مغفرة وأجرا عظيما
)</span>';
$pdf->WriteHTML($htmlcontent1, true, 0, true, 0);



// Restore RTL direction
$pdf->setRTL(true);
// set font
$pdf->SetFont('tahomabd', '', 18);
// print newline
$pdf->Ln();
// Arabic and English content
$pdf->Cell(0, 12, 'بِسْمِ اللهِ الرَّحْمنِ الرَّحِيمِ',0,1,'C');
$htmlcontent2 = 'تمَّ بِحمد الله حلّ مشكلة الكتابة باللغة العربية في ملفات الـ<span color="#FF0000">PDF</span> مع دعم الكتابة <span color="#0000FF">من اليمين إلى اليسار</span> و<span color="#009900">الحركَات</span> .<br />تم الحل بواسطة <span color="#993399">amirodz </span>  . ';
$pdf->WriteHTML($htmlcontent2, true, 0, true, 0);

// set LTR direction for english translation
$pdf->setRTL(false);
// print newline
$pdf->Ln();
$pdf->SetFont('tahomabd', '', 18);
// Arabic and English content
$htmlcontent3 = '<span color="#0000ff">This is Arabic "العربية" Example With TCPDF.</span><span color="navy">Free Max SVG Vectors and Icons. Max icons and vector packs for Sketch, Adobe Illustrator and designers. Browse 61 vector icons about Max term</span>';
$pdf->WriteHTML($htmlcontent3, true, 0, true, 0);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_018.pdf', 'I');
//$pdf->Output('example_052.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+