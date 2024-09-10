<?php

namespace App\Livewire\Components\App;

use Livewire\Component;
use App\Actions\Cliente\ClienteSearchAction;
use App\Models\Cliente;
use App\Models\Leilao;
use App\Models\Lote;
use App\Repositories\Cliente\ClienteEloquentRepository;
use Carbon\Carbon;

class PreLanceCreate extends Component
{
    public Leilao $leilao;
    public $lote;
    public $cliente;

    public array $compradores;
    public string $valorLance;

    public string $searchClientes;
    public array $searchResultClientes;
    public array $parcelas;
    public bool $incideComissaoCompra;
    public bool $incideComissaoVenda;
    public string $hidden;
    
    public function mount(Leilao $leilao, $lote = null, $cliente = null)
    {
        $this->leilao = $leilao;
        $this->lote = $lote;
        $this->hidden = "hidden";
        $this->searchClientes = "";
        $this->searchResultClientes = [];
        $this->parcelas = [];
        $this->compradores = [];
        $this->incideComissaoVenda = true;
        $this->incideComissaoCompra = true;
        $this->valorLance = 0; //$this->formData['lote']['valor_estimado'];

        if(!empty($cliente)) {
            $this->compradores[] = $cliente->toArray(); 
        }
        
        if(!empty($this->compradores)) {
            $this->updatedValorLance();
        }
    }

    public function render()
    {
        return view('livewire.components.app.pre-lance-create');
    }

    public function handleTab()
    {
        if(empty($this->hidden)) {
            $this->hidden = 'hidden';
        } else {
            $this->hidden = '';
        }
    }

    public function selecionarLote(Lote $lote)
    {
        $this->lote = $lote;
        $acrescimoValorLance = 0;
        if(!is_null($this->leilao->config_prelance_atual->percentual_progressao))
        {
            $percentualProgressao = $this->leilao->config_prelance_atual->percentual_progressao / 100;
            $acrescimoValorLance = $percentualProgressao * $this->lote->lance_vencedor()->valor;
        }

        if(!is_null($this->leilao->config_prelance_atual->valor_progressao))
        {
            $acrescimoValorLance = 0;
            $acrescimoValorLance = $this->leilao->config_prelance_atual->valor_progressao;
        }
        error_log($acrescimoValorLance);
        $this->valorLance = $this->lote->lance_vencedor()->valor + $acrescimoValorLance;
        $this->updatedValorLance();
    }

    public function updatedValorLance()
    {
        if(!empty($this->compradores) && !empty($this->lote)) {
            $carbonHoje = Carbon::now();
            $this->parcelas = [];
            $condicoesPagamento = $this->lote->plano_pagamento()->first()->condicoes_pagamento()->get();
            
            if($this->valorLance == 0) {
                $acrescimoValorLance = 0;
                if(!is_null($this->leilao->config_prelance_atual->percentual_progressao))
                {
                    $percentualProgressao = $this->leilao->config_prelance_atual->percentual_progressao / 100;
                    $acrescimoValorLance = $percentualProgressao * $this->lote->lance_vencedor()->valor;
                }

                if(!is_null($this->leilao->config_prelance_atual->valor_progressao))
                {
                    $acrescimoValorLance = 0;
                    $acrescimoValorLance = $this->leilao->config_prelance_atual->valor_progressao;
                }
                
                $this->valorLance = $this->lote->lance_vencedor()->valor + $acrescimoValorLance;
            }

            foreach ($condicoesPagamento as $key => $condicaoPagamento)
            {
                for($i = 0; $i <= $condicaoPagamento['qtd_parcelas']; $i++) 
                {
                    $valor = ($condicaoPagamento['repeticoes'] * ($this->valorLance * $this->lote->itens()->count()) / $this->getQuantidadeCompradoresProperty());
                    $valorComissaoComprador = $this->incideComissaoCompra
                        ? ($condicaoPagamento['percentual_comissao_comprador'] / 100) * $valor : 0;
                    $valorComissaoVendedor = $this->incideComissaoVenda
                        ? ($condicaoPagamento['percentual_comissao_vendedor'] / 100) * $valor : 0;

                    $this->parcelas[] = [
                        'valor_original' => $this->valorLance,
                        'valor' => $valor,
                        'repeticoes' => $condicaoPagamento['repeticoes'],
                        'data_pagamento' => $carbonHoje->addMonth()->toDateString(),
                        'incide_comissao_compra' => $this->incideComissaoCompra,
                        'incide_comissao_venda' => $this->incideComissaoVenda,
                        'percentual_comissao_vendedor' => $condicaoPagamento['percentual_comissao_vendedor'],
                        'percentual_comissao_comprador' => $condicaoPagamento['percentual_comissao_comprador'],
                        'valor_comissao_comprador' => $valorComissaoComprador,
                        'valor_comissao_vendedor' => $valorComissaoVendedor
                    ];
                }
            }
        }
    }

    public function updatedSearchClientes()
    {
        if (!empty($this->searchClientes))
        {
            $this->searchResultClientes = (new ClienteSearchAction(
                new ClienteEloquentRepository(new Cliente())
            ))->execute($this->searchClientes);
        }
    }

    public function updatedLote()
    {
        $this->valorLance = 0;
        
        $this->updatedValorLance();
    }

    public function addComprador($comprador)
    {
        $this->compradores[] = $comprador;
        $this->searchResultClientes = [];
        $this->searchClientes = "";
        $this->updatedValorLance();
    }

    public function removerCliente($index)
    {
        array_splice($this->compradores, $index, 1);
        
        if(!empty($this->compradores))
        {
            $this->updatedValorLance();
        }
    }

    public function removerLote()
    {
        $this->valorLance = 0;
        $this->lote = null;
    }

    public function getValorTotalLoteProperty()
    {
        return array_sum(array_column($this->parcelas, 'valor'));
    }

    public function getValorTotalComissaoVendedorProperty()
    {
        return array_sum(array_column($this->parcelas, 'valor_comissao_vendedor'));
    }

    public function getValorTotalComissaoCompradorProperty()
    {
        return array_sum(array_column($this->parcelas, 'valor_comissao_comprador'));
    }

    public function getDiferencaValorEstimadoProperty()
    {
        return $this->valorTotalLote - $this->lote->valor_estimado;
    }

    public function getDiferencaValorEstimadoPercentualProperty()
    {
        return $this->valorTotalLote - $this->lote->valor_estimado;
    }

    public function getQuantidadeCompradoresProperty()
    {
        return count($this->compradores);
    }
}
