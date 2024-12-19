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
        'isRemoteEnabled' => true
    ])
    {
        return PDF::setOptions($options);
    }

    public function loadView(Pdf2 $pdf, string $view, Compra $compra)
    {
        return $pdf->loadView($view, ['compra' => $compra]);
    }

    public function stream(Pdf2 $pdf, string $fileName)
    {
        return $pdf->stream($fileName);
    }
}