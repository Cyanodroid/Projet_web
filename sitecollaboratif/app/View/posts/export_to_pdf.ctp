<?php
    $content = '<page>SALUT</page>';
    App::import('Vendor', 'html2pdf/html2pdf');
    $pdf = new HTML2PDF('P', 'A4', 'fr');
    $pdf->pdf->SetDisplayMode('fullpage');
    $pdf->writeHTML($content);
    $pdf->Output('fichier.pdf', 'D');
?>