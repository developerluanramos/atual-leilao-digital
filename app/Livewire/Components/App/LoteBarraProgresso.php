<?php

namespace App\LiveWire\Components\App;

use App\Repositories\Presenters\PaginationPresenter;
use Livewire\Component;
use stdClass;

class LoteBarraProgresso extends Component
{
    public stdClass $lote;
    
    public function render()
    {
        return view('livewire.components.app.lote-barra-progresso');
    }

    public function mount(stdClass $lote)
    {
        $this->lote = $lote;
    }
}
