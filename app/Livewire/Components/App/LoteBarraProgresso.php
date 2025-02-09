<?php

namespace App\LiveWire\Components\App;

use App\Models\Lote;
use App\Repositories\Presenters\PaginationPresenter;
use Livewire\Component;
use stdClass;

class LoteBarraProgresso extends Component
{
    public Lote $lote;
    public string $tipo;
    public $valorLote;
    public $visualizacao;

    public function render()
    {
        return view('livewire.components.app.lote-barra-progresso');
    }

    public function mount(Lote $lote, string $tipo = 'leilao', string $visualizacao = 'all')
    {
        $this->lote = $lote;
        $this->tipo = $tipo;
        $this->visualizacao = $visualizacao;
        $this->valorLote = $this->tipo == 'prelance' ? $this->lote->valor_prelance : $this->lote->valor_total;
    }

    public function getPercentualValorTotalProperty()
    {
        return ($this->tipo == 'prelance' ? $this->lote->valor_prelance : $this->lote->valor_total) * 100/$this->lote->valor_estimado;
    }

    public function getPercentualValorEstimadoProperty()
    {
        return $this->lote->valor_estimado * 100 / ($this->tipo == 'prelance' ? $this->lote->valor_prelance : $this->lote->valor_total);
    }

    public function getPercentualValorExcedenteProperty()
    {
        return ($this->tipo == 'prelance' ? $this->lote->valor_prelance : $this->lote->valor_total) * 100/$this->lote->valor_estimado - 100;
    }

    public function getValorExcedenteProperty()
    {
        return ($this->tipo == 'prelance' ? $this->lote->valor_prelance : $this->lote->valor_total) - $this->lote->valor_estimado;
    }
}
