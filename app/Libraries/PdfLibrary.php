<?php

namespace App\Libraries;

use Mpdf\Mpdf;

class PdfLibrary
{
    public function renderPdf(string $orientation = 'P', string $view, array $data, string $title)
    {
        
        $year = date('Y');
        $companyNme = company()->companyName;
        $pdf = new Mpdf(['orientation' => $orientation]);
        // $pdf->SetWatermarkImage('assets/img/logo1.jpg', 0.4, [50, 40]);
        $footer = "<p style='text-align: center;'>$companyNme &copy; $year </p>";
     
        
        $pdf->SetHTMLFooter($footer);
        $pdf->showWatermarkImage = true;
        $pdf->WriteHTML(view($view, $data));
        $pdf->Output($title . randomString() . '.pdf', 'D');
    }


    
}
