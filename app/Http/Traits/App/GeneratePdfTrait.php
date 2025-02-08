<?php

namespace App\Http\Traits\App;

use App\Models\Compra;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Barryvdh\DomPDF\Pdf as Pdf2;

trait GeneratePdfTrait
{
    public function setOptions(array $options = [
        'defaultFont' => 'sans-serif',
        'enable-javascript' => true,
        'images' => true,
        'isRemoteEnabled' => true,
        'orientation' => 'landascape'
    ])
    {
        return PDF::setOptions($options);
    }

    public function loadView(Pdf2 $pdf, string $view, array $params)
    {
        return $pdf->loadView($view, $params);
    }

    public function stream(Pdf2 $pdf, string $fileName)
    {
        return $pdf->stream($fileName);
    }
}