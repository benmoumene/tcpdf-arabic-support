<?php


//require_once(dirname(__FILE__).'/TCPDF-6.3.2/tcpdf_config.php');


//require_once('TCPDF-6.3.2/tcpdf.php');
require_once('TCPDF-6.4.1/tcpdf.php');

class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		$this->setRTL(true);
		// Logo
		$image_file = 'images/quran-logo.gif';
		$this->Image($image_file, 150, 10, 30, '30', 'gif', '', 'L', false, 300, '', false, false, 0, false, false, false);
		//$this->Image($image_file, '', '', '30');
        
		// Set font
		$this->SetFont('ae_ouhod', 'B', 20);
		// Title
		//$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
		//$this->Cell(0, 15, 'title', 0, 1, '', 0, '', 0);
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		 $this->setRTL(true);
		// Set font
		$this->SetFont('ae_ouhod', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'صفحة '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// create new PDF document
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('مثال بالخط الاميري');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);


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

// arabic and English content
$htmlarabic = '
<style>
h1 {
        font-family: ae_ouhod;
        line-height: 62px;
        font-size: 28px;
        text-align: center;
        width: 550pt;
		color:red;
        position: relative;
        margin-right: auto;
        margin-left: auto;
	    margin-top: auto;
      }  
      .aya {
        font-family: ae_ouhod;
        line-height: 62px;
        font-size: 28px;
        text-align: justify;
        width: 550pt;
		color:green;
        position: relative;
        margin-right: auto;
        margin-left: auto;
	    margin-top: auto;
      }    
    </style>
 <h1>مثال بالخط الاميري</h1><div class="aya"> « ( مُحَمَّدٌ رَّسُولُ الله وَالَّذِينَ مَعَهُ أَشِدَّاءُ عَلَى الكُفَّارِ رُحَمَاءُ بَيْنَهُمْ تَرَاهُمْ رُكَّعاً سُجَّداً يَبْتَغُونَ فَضْلاً مِّنَ اللَّهِ وَرِضْوَاناً سِيمَاهُمْ فِي وَجُوهِهِم مِّنْ أَثَرِ السُّجُودِ ذَلِكَ مَثَلُهُمْ فِي التَّوْرَاةِ وَمَثَلُهُمْ فِي الإِنجِيلِ كَزَرْعٍ أَخْرَجَ شَطْأَهُ فَآزَرَهُ فَاسْتَغْلَظَ فَاسْتَوَى عَلَى سُوقِهِ يُعْجِبُ الزُّرَّاعَ لِيَغِيظَ بِهِمُ الكُفَّارَ وَعَدَ اللَّهُ الَّذِينَ آمَنُوا وَعَمِلُوا الصَّالِحَاتِ مِنْهُم مَّغْفِرَةً وَأَجْراً عَظِيما) »  الآية 29 من سورة الفتح .
</div>';
$pdf->WriteHTML($htmlarabic, true, 0, true, 0);

// add a page
$pdf->AddPage();

// arabic and English content
$htmlarabic = '
<style>
h1 {
        font-family: ae_ouhod;
        line-height: 62px;
        font-size: 28px;
        text-align: center;
        width: 550pt;
		color:red;
        position: relative;
        margin-right: auto;
        margin-left: auto;
	    margin-top: auto;
      }  
      .aya {
        font-family: ae_ouhod;
        line-height: 62px;
        font-size: 28px;
        text-align: justify;
        width: 550pt;
		color:green;
        position: relative;
        margin-right: auto;
        margin-left: auto;
	    margin-top: auto;
      }    
    </style>
 <h1>مثال بالخط الاميري</h1><div class="aya"> « ( محمد رسول الله والذين معه أشداء على الكفار رحماء بينهم تراهم ركعا سجدا يبتغون فضلا من الله ورضوانا سيماهم في وجوههم من أثر السجود ذلك مثلهم في التوراة ومثلهم في الإنجيل كزرع أخرج شطأه فآزره فاستغلظ فاستوى على سوقه يعجب الزراع ليغيظ بهم الكفار وعد الله الذين آمنوا وعملوا الصالحات منهم مغفرة وأجرا عظيما
) »  الآية 29 من سورة الفتح .
</div>';
$pdf->WriteHTML($htmlarabic, true, 0, true, 0);


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_arabic.pdf', 'I');
//$pdf->Output('example_052.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+