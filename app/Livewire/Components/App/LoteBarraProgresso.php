<?php

namespace App\LiveWire\Components\App;

use App\Models\Lote;
use App\Repositories\Presenters\PaginationPresenter;
use Livewire\Component;
use stdClass;

class LoteBarraProgresso extends Component
{
    public Lote $lote;
    
    public function render()
    {
        return view('livewire.components.app.lote-barra-progresso');
    }

    public function mount(Lote $lote)
    {
        $this->lote = $lote;
    }

    public function getPercentualValorTotalProperty()
    {
        return $this->lote->valor_total * 100/$this->lote->valor_estimado;
    }

    public function getPercentualValorEstimadoProperty()
    {
        return $this->lote->valor_estimado * 100/$this->lote->valor_total;
    }

    public function getPercentualValorExcedenteProperty()
    {
        return $this->lote->valor_total * 100/$this->lote->valor_estimado - 100;
    }

    public function getValorExcedenteProperty()
    {
        return $this->lote->valor_total - $this->lote->valor_estimado;
    }
}
