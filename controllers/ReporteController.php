<?php

namespace Controllers;

use Mpdf\HTMLParserMode;
use Mpdf\Mpdf;
use MVC\Router;

class ReporteController {
    public static function pdf(Router $router){
        $mpdf = new Mpdf([
            'default_font_size' => '12',
            'default_font' => 'arial',
            'orientation' => 'P',
            'margin_top' => '30',
            'format' => 'Letter',
            'mode' => 'utf-8'
        ]);
        $data = "String de data";

        $html = $router->load('reportes/pdf', [
            'data' => $data
        ]);
        $headerHtml = $router->load('reportes/header');
        $footerHtml = $router->load('reportes/footer');
        $mpdf->SetHTMLHeader($headerHtml);
        $mpdf->SetHTMLFooter($footerHtml);

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

}