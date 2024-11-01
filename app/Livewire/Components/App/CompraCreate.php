<?php

namespace App\Livewire\Components\App;

use App\Actions\Cliente\ClienteSearchAction;
use App\Actions\Compra\CompraStoreAction;
use App\Http\Controllers\App\Compra\CompraStoreController;
use App\Http\Requests\App\Compra\CompraStoreRequest;
use App\Models\Cliente;
use App\Models\Leilao;
use App\Models\Lote;
use App\Repositories\Cliente\ClienteEloquentRepository;
use Carbon\Carbon;
use Exception;
use Livewire\Component;

class CompraCreate extends Component
{
    public Lote $lote;
    public Leilao $leilao;
    public bool $temPreLanceVencedor = false;
    public bool $usandoPrelanceConfig = false;
    public bool $incideComissaoCompra;
    public bool $incideComissaoVenda;
    public string $percentualComissaoVenda;
    public string $percentualComissaoCompra;
    public string $valorLance;
    public array $compradores;
    public array $condicoesPagamento;
    public string $search;
    public array $searchResult;
    public array $parcelas;

    public function mount(Lote $lote)
    {
        $this->lote = $lote;
        $this->leilao = $lote->leilao()->get()->first();
        if($this->lote->prelance_vencedor()) {
            $this->temPreLanceVencedor = true;
        } else {
            $this->aplicarConfigLote();
        }
        // $this->search = "";
        // $this->searchResult = [];
        // // -- valor vencedor do pré-lance ou valor mínimo do lote
        // $this->valorLance = $this->lote->valor_estimado;
        // // -- config do pre lance ou condicoes de pagamento ou lote
        // $this->incideComissaoVenda = $this->lote->incide_comissao_venda;
        // $this->incideComissaoCompra = $this->lote->incide_comissao_compra;
        // $this->parcelas = [];
        // $this->compradores = [];
        // if(!empty($this->compradores)) {
        //     $this->updatedValorLance();
        // }
    }

    public function render()
    {
        return view('livewire.components.app.compra-create');
    }

    public function aplicarConfigPrelance()
    {
        $this->temPreLanceVencedor = false;
        $this->usandoPrelanceConfig = true;
        $this->incideComissaoVenda = $this->lote->prelance_vencedor()->prelance_config()->first()->incide_comissao_vendedor;
        $this->incideComissaoCompra = $this->lote->prelance_vencedor()->prelance_config()->first()->incide_comissao_comprador;
        $this->percentualComissaoCompra = $this->lote->prelance_vencedor()->prelance_config()->first()->percentual_comissao_comprador;
        $this->percentualComissaoVenda = $this->lote->prelance_vencedor()->prelance_config()->first()->percentual_comissao_vendedor;
        $this->parcelas = [];
        $this->compradores = $this->lote->prelance_vencedor()->clientes()->get()->toArray();
        $this->valorLance = $this->lote->prelance_vencedor()->valor;
        $this->condicoesPagamento = $this->lote->prelance_vencedor()->prelance_config()->first()->plano_pagamento()->first()->condicoes_pagamento()->get()->toArray();
        
        $this->updatedValorLance();
    }

    public function aplicarConfigLote()
    {
        $this->temPreLanceVencedor = false;
        $this->usandoPrelanceConfig = false;
        // -- essas 4 variáveis não serão utilizadas para o calculo de parcelas
        // -- já que são substituidas pela condição de pagamento caso não seja usado 
        // -- as configs de pré-lance.
        $this->incideComissaoVenda = true; 
        $this->incideComissaoCompra = true; 
        $this->percentualComissaoCompra = 0; 
        $this->percentualComissaoVenda = 0; 
        $this->parcelas = [];
        $this->compradores = [];
        $this->valorLance = 50;
        $this->condicoesPagamento = $this->lote->plano_pagamento()->first()->condicoes_pagamento()->get()->toArray();
    }

    public function updatedValorLance()
    {
        $carbonHoje = Carbon::now();
        $this->parcelas = [];

        foreach ($this->condicoesPagamento as $key => $condicaoPagamento)
        {
            for($i = 1; $i <= $condicaoPagamento['qtd_parcelas']; $i++) {
                $incideComissaoComprador = $this->usandoPrelanceConfig ? $this->incideComissaoCompra : $condicaoPagamento['incide_comissao_comprador'];
                $incideComissaoVendedor = $this->usandoPrelanceConfig ? $this->incideComissaoVenda : $condicaoPagamento['incide_comissao_vendedor'];
                $percentualComissaoComprador = $this->usandoPrelanceConfig ? $this->percentualComissaoCompra : $condicaoPagamento['percentual_comissao_comprador'];
                $percentualComissaoVendedor = $this->usandoPrelanceConfig ? $this->percentualComissaoVenda : $condicaoPagamento['percentual_comissao_vendedor'];

                $valor = ($condicaoPagamento['repeticoes'] * ($this->valorLance * count($this->lote->itens))) / $this->getQuantidadeCompradoresProperty();
                $valorComissaoComprador = $incideComissaoComprador
                    ? ($percentualComissaoComprador / 100) * $valor : 0;
                $valorComissaoVendedor = $incideComissaoVendedor
                    ? ($percentualComissaoVendedor / 100) * $valor : 0;

                $this->parcelas[] = [
                    'valor_original' => $this->valorLance,
                    'valor' => $valor,
                    'repeticoes' => $condicaoPagamento['repeticoes'],
                    'data_pagamento' => $carbonHoje->addMonth()->toDateString(),
                    'incide_comissao_compra' => $incideComissaoComprador,
                    'incide_comissao_venda' => $incideComissaoVendedor,
                    'percentual_comissao_vendedor' => $percentualComissaoVendedor,
                    'percentual_comissao_comprador' => $percentualComissaoComprador,
                    'valor_comissao_comprador' => $valorComissaoComprador,
                    'valor_comissao_vendedor' => $valorComissaoVendedor
                ];
            }
        }
    }

    public function updatedSearch()
    {
        if (!empty($this->search))
        {
            $this->searchResult = (new ClienteSearchAction(
                new ClienteEloquentRepository(new Cliente())
            ))->execute($this->search);
        }
    }

    public function addComprador($comprador)
    {
        $this->compradores[] = $comprador;
        $this->searchResult = [];
        $this->search = "";
        // if($this->lote->prelance_vencedor()) {
        //     $this->temPreLanceVencedor = true;
        //     $this->aplicarConfigPrelance();
        // } else {
        //     $this->aplicarConfigLote();
        // }
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
            $request = CompraStoreRequest::create( route('compra.store'), "POST", [
                "_token" => csrf_token(),
                'leilao_uuid' => $this->leilao->uuid,
                'lote_uuid' => $this->lote->uuid,
                // 'prelance_config_uuid' => $this->leilao->config_prelance_atual->uuid,
                'plano_pagamento_uuid' => $this->leilao->plano_pagamento_prelance->uuid,
                // 'realizado_em' => Carbon::now()->toDateString(),
                'valor' => $this->valorTotalLote,
                'valor_comissao_comprador' => $this->valorTotalComissaoComprador,
                'valor_comissao_vendedor' => $this->valorTotalComissaoVendedor,
                'clientes' => $this->compradores      
            ]);
            
            $request->validate(CompraStoreRequest::rulesForLivewire());

            (new CompraStoreController())->store($request, (new CompraStoreAction()));

            redirect()->to(route('leilao.lote.index', [
                'uuid' => $this->lote->leilao_uuid,
                'aba' => 'lotes'
            ]));
        } catch (Exception $exception) {
            dd($exception->getMessage());
            return redirect()->back()->withErrors($exception);
        }
    }
}
