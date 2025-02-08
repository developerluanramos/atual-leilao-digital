<?php

namespace App\Livewire\Components\App;

use App\Actions\Prelance\PrelanceStoreAction;
use App\Http\Controllers\App\Prelance\PrelanceStoreController;
use Livewire\Component;
use App\Actions\Cliente\ClienteSearchAction;
use App\Http\Requests\App\Prelance\PrelanceStoreRequest;
use App\Models\Cliente;
use App\Models\Leilao;
use App\Models\Lote;
use App\Repositories\Cliente\ClienteEloquentRepository;
use Carbon\Carbon;
use Exception;

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
        if(is_null($this->leilao->config_prelance_atual)) {
            return redirect()->to(route('prelance.index', ['leilaoUuid' => $leilao->uuid]));
        }
        $this->lote = $lote;
        $this->hidden = "hidden";
        $this->searchClientes = "";
        $this->searchResultClientes = [];
        $this->parcelas = [];
        $this->compradores = [];
        $this->incideComissaoVenda = $leilao->config_prelance_atual->incide_comissao_vendedor;
        $this->incideComissaoCompra = $leilao->config_prelance_atual->incide_comissao_comprador;
        $this->valorLance = 0;

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
        $this->valorLance = $this->lote->valor_prelance_calculado;
        $this->updatedValorLance();
    }

    public function updatedValorLance()
    {
        if(!empty($this->compradores) && !empty($this->lote)) {
            $carbonHoje = Carbon::now();
            $this->parcelas = [];
            $condicoesPagamento = $this->leilao->plano_pagamento_prelance->condicoes_pagamento()->get();
            
            if($this->valorLance == 0) {
                $this->valorLance = $this->lote->valor_prelance_calculado;
            }

            foreach ($condicoesPagamento as $key => $condicaoPagamento)
            {
                for($i = 1; $i <= $condicaoPagamento['qtd_parcelas']; $i++) 
                {
                    $valor = ($condicaoPagamento['repeticoes'] * ($this->valorLance * $this->lote->multiplicador) / $this->getQuantidadeCompradoresProperty());
                    $valorComissaoComprador = $this->incideComissaoCompra
                        ? ($this->leilao->config_prelance_atual->percentual_comissao_comprador / 100) * $valor : 0;
                    $valorComissaoVendedor = $this->incideComissaoVenda
                        ? ($this->leilao->config_prelance_atual->percentual_comissao_vendedor / 100) * $valor : 0;

                    $this->parcelas[] = [
                        'valor_original' => $this->valorLance,
                        'valor' => $valor,
                        'repeticoes' => $condicaoPagamento['repeticoes'],
                        'data_pagamento' => $carbonHoje->addMonth()->toDateString(),
                        'incide_comissao_compra' => $this->incideComissaoCompra,
                        'incide_comissao_venda' => $this->incideComissaoVenda,
                        'percentual_comissao_vendedor' => $this->leilao->config_prelance_atual->percentual_comissao_vendedor,
                        'percentual_comissao_comprador' => $this->leilao->config_prelance_atual->percentual_comissao_comprador,
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

    public function registrar()
    {
        try {
            $request = PrelanceStoreRequest::create( route('prelance.store'), "POST", [
                "_token" => csrf_token(),
                'leilao_uuid' => $this->leilao->uuid,
                'lote_uuid' => $this->lote->uuid,
                'prelance_config_uuid' => $this->leilao->config_prelance_atual->uuid,
                'plano_pagamento_uuid' => $this->leilao->plano_pagamento_prelance->uuid,
                'realizado_em' => Carbon::now()->toDateString(),
                'valor_final_prelance' => $this->valorTotalLote,
                'valor' => $this->valorLance,
                'valor_comissao_compra' => $this->valorTotalComissaoComprador,
                'valor_comissao_venda' => $this->valorTotalComissaoVendedor,
                'clientes' => $this->compradores      
            ]);
            
            $request->validate(PrelanceStoreRequest::rulesForLivewire());

            (new PrelanceStoreController())->store($request, (new PrelanceStoreAction()));

            redirect()->to(route('prelance.index', [
                'leilaoUuid' => $this->leilao->uuid
            ]));
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception);
        }
    }
}
