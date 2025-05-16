<?php

namespace App\Livewire\Components\App;

use App\Http\Traits\App\GeneratePdfTrait;
use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Leilao;
use App\Models\Lote;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class LeilaoOrdemEntrada extends Component
{
    public $lotes = [];
    public $leilao;

    public function mount($leilao, $lotes)
    {
        $this->lotes = $this->leilao->lotes()
            ->orderBy('ordem_entrada')
            ->orderBy('numero')
            ->get();
        $this->leilao = $leilao;
    }

    public function updateTaskOrder($lotesOrdenados)
    {
        usleep(500000);
        foreach ($lotesOrdenados as $lote)
        {
            Lote::find($lote['value'])->update(['ordem_entrada' => $lote['order']]);
        }

        $this->lotes = $this->leilao->lotes()
            ->orderBy('ordem_entrada')
            ->orderBy('numero')
            ->get();
    }

    public function imprimirOrdemEntrada()
    {
        $options = [
            'defaultFont' => 'sans-serif',
            'enable-javascript' => true,
            'images' => true,
            'isRemoteEnabled' => true,
            'orientation' => 'portrait',
            'encoding' => 'UTF-8',
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
            'defaultEncoding' => 'UTF-8',
        ];

        $leilao = Leilao::with('leiloeiro', 'promotor')
            ->where('uuid', $this->leilao->uuid)
            ->first()
            ->toArray();

        $lotes = $this->lotes->toArray();

        $pdf = Pdf::setOptions($options)
            ->loadView('app.mapa.ordem-entrada', [
                'leilao' => (object)$leilao,
                'lotes' => (object)$lotes,
            ]);

        return $pdf->stream('ordem-entrada.pdf');
    }

    public function render()
    {
        return view('livewire.components.app.leilao-ordem-entrada');
    }
}
