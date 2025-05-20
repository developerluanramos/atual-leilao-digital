<?php

namespace App\Livewire\Components\App;

use App\Actions\Cliente\ClienteSearchAction;
use App\Models\Cliente;
use App\Models\Lote;
use App\Repositories\Cliente\ClienteEloquentRepository;
use Livewire\Component;

class LeilaoLoteVendedor extends Component
{
    public string $textoBuscaVendedor;
    public array $resultadoBuscaVendedor;
    public array $vendedores;

    public function mount($lote = null)
    {
        if($lote)
        {
            foreach($lote->vendedores()->get()->toArray() as $index => $vendedor)
            {
                $this->addVendedor((array)$vendedor, $vendedor['pivot']['percentual_cota']);
            }
        }
    }

    public function render()
    {
        return view('livewire.components.app.leilao-lote-vendedor');
    }

    public function updatedTextoBuscaVendedor()
    {
        if (!empty($this->textoBuscaVendedor))
        {
            $this->resultadoBuscaVendedor = (new ClienteSearchAction(
                new ClienteEloquentRepository(new Cliente())
            ))->execute($this->textoBuscaVendedor);
        }
    }

    public function addVendedor($vendedor, $percentualCota = 0)
    {
        $vendedor['percentual_cota'] = $percentualCota;
        $this->vendedores[] = $vendedor;
        foreach ($this->vendedores as $index => $vendedor)
        {
            $this->vendedores[$index]['percentual_cota'] = number_format(100 / count($this->vendedores) ?? 1, '2');
        }

        $this->textoBuscaVendedor = "";
        $this->resultadoBuscaVendedor = [];

    }

    public function removerVendedor($index)
    {
        array_splice($this->vendedores, $index, 1);
        foreach ($this->vendedores as $index => $vendedor)
        {
            $this->vendedores[$index]['percentual_cota'] = number_format(100 / count($this->vendedores) ?? 1, '2');
        }
    }
}
