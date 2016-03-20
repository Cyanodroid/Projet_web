<?php
 	App::import('Vendor','tcpdf/xtcpdf');
 
	$pdf = new XTCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
 
	$pdf->AddPage();

	$horizontal_alignment = array('C');

	$html = '<h1>'.$article['Post']['title'].'</h1>';
	$html .= '<p>'.$article['Categories']['title'].'</p>';
   	$html .= '<hr>';

   	$pdf->writeHTML($html, true, false, true, false, '');
   		
	$pdf->Image(APP . 'webroot/img/articles/'.$article['Post']['id'].'.jpg', 10, 37, 190, 113, 'JPG', '', '', true, 150, '', false, false, 1, $horizontal_alignment, false, false);

	$pdf->SetY(145, true, false);

 	$html = '<hr>';

	$html .=  nl2br($article['Post']['contenu']);
	$html .= '<hr>';
 
	$pdf->writeHTML($html, true, false, true, false, '');
   	
	$pdf->lastPage();
 
	echo $pdf->Output(APP . 'Files/pdf' . DS . $id . '.pdf', 'F');
