<?php
 	App::import('Vendor','tcpdf/xtcpdf');
 
	$pdf = new XTCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);

	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
	$pdf->AddPage();
 
	$html = '<h1>'.$article['Post']['title'].'</h1>';
    $html .= '<p>'.$article['Categories']['title'].'</p>';
   	$html .= '<hr>';
	$html .=  nl2br($article['Post']['contenu']);
	$html .= '<hr>';
 
	$pdf->writeHTML($html, true, false, true, false, '');
 
	$pdf->lastPage();
 
	echo $pdf->Output(APP . 'Files/pdf' . DS . $id . '.pdf', 'F');


	