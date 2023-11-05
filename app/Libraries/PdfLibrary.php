<?php

namespace App\Libraries;

use Mpdf\Mpdf;

class PdfLibrary
{
    public function renderPdf(string $orientation = 'P', string $view, array $data, string $title)
    {
        
        $year = date('Y');
       
        $pdf = new Mpdf(['orientation' => $orientation]);
        // $pdf->SetWatermarkImage('assets/img/logo1.jpg', 0.4, [50, 40]);
        $footer = "<p style='text-align: center;'>Tanzania investment Center &copy; $year </p>";
        $data['title'] = $title;
        
        $pdf->SetHTMLFooter($footer);
        $pdf->showWatermarkImage = true;
        $pdf->WriteHTML(view($view, $data));
        $pdf->Output($title . randomString() . '.pdf', 'D');
    }


    
}
