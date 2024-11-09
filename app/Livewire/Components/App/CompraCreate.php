<?php

namespace App\Livewire\Components\App;

use App\Actions\Cliente\ClienteSearchAction;
use App\Actions\Compra\CompraStoreAction;
use App\Http\Controllers\App\Compra\CompraStoreController;
use App\Http\Requests\App\Compra\CompraStoreRequest;
use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Leilao;
use App\Models\Lote;
use App\Models\Parcela;
use App\Models\PlanoPagamento;
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
    public array $vendedores;
    public array $condicoesPagamento;
    public PlanoPagamento $planoPagamento;

    public string $search;
    public array $searchResult;
    public array $parcelas;

    public function mount(Lote $lote)
    {
        $this->lote = $lote;
        $this->vendedores = $lote->vendedores()->get()->toArray();
        $this->leilao = $lote->leilao()->get()->first();
        $this->planoPagamento = new PlanoPagamento();
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
        $this->planoPagamento = $this->lote->prelance_vencedor()->prelance_config()->first()->plano_pagamento()->first();
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
        $this->planoPagamento = $this->lote->plano_pagamento()->first();
        $this->condicoesPagamento = $this->lote->plano_pagamento()->first()->condicoes_pagamento()->get()->toArray();
    }

    public function updatedValorLance()
    {
        $carbonHoje = Carbon::now();
        $this->parcelas = [];

        foreach ($this->condicoesPagamento as $key => $condicaoPagamento)
        {
            foreach($this->vendedores as $indexVendedor => $vendedor)
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
                    
                    $this->parcelas[$indexVendedor][] = [
                        'lote_uuid' => $this->lote->uuid,
                        'leilao_uuid' => $this->leilao->uuid,
                        'valor_original' => $this->valorLance,
                        'valor' => $vendedor['pivot']['percentual_cota'] / 100 * $valor,
                        'repeticoes' => $condicaoPagamento['repeticoes'],
                        'vencimento_em' => $carbonHoje->addMonth()->toDateString(),
                        'incide_comissao_compra' => $incideComissaoComprador,
                        'incide_comissao_venda' => $incideComissaoVendedor,
                        'percentual_comissao_vendedor' => $percentualComissaoVendedor,
                        'percentual_comissao_comprador' => $percentualComissaoComprador,
                        'valor_comissao_comprador' => $vendedor['pivot']['percentual_cota'] / 100 * $valorComissaoComprador,
                        'valor_comissao_vendedor' => $vendedor['pivot']['percentual_cota'] / 100 * $valorComissaoVendedor,
                        'vendedor' => $vendedor
                    ];
                }
            }
        }
        // dd($this->parcelas);
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
        $valorTotal = 0;

        foreach($this->parcelas as $parcelasList) 
        {
            foreach($parcelasList as $parcela) 
            {
                $valorTotal += $parcela['valor'];
            }
        }
        
        return $valorTotal * count($this->compradores);
    }

    public function getValorTotalComissaoVendedorProperty()
    {
        $valorTotal = 0;

        foreach($this->parcelas as $parcelasList) 
        {
            foreach($parcelasList as $parcela) 
            {
                $valorTotal += $parcela['valor_comissao_vendedor'];
            }
        }
        
        return $valorTotal;
        // return array_sum(array_column($this->parcelas, 'valor_comissao_vendedor'));
    }

    public function getValorTotalComissaoCompradorProperty()
    {
        $valorTotal = 0;

        foreach($this->parcelas as $parcelasList) 
        {
            foreach($parcelasList as $parcela) 
            {
                $valorTotal += $parcela['valor_comissao_comprador'];
            }
        }
        
        return $valorTotal;
        // return array_sum(array_column($this->parcelas, 'valor_comissao_comprador'));
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
                'plano_pagamento_uuid' => $this->planoPagamento->uuid,
                'valor_lance' => $this->valorLance,
                'valor' => $this->valorTotalLote / count($this->compradores),
                'valor_comissao_comprador' => $this->valorTotalComissaoComprador,
                'valor_comissao_vendedor' => $this->valorTotalComissaoVendedor,
                'clientes' => $this->compradores,
                'parcelas' => $this->parcelas
            ]);
            
            $request->validate(CompraStoreRequest::rulesForLivewire());

            (new CompraStoreController())->store($request, (new CompraStoreAction(
                new Compra(),
                new Lote(),
                new Parcela()
            )));

            redirect()->to(route('leilao.lote.index', [
                'uuid' => $this->lote->leilao_uuid,
                'aba' => 'lotes'
            ]));
        } catch (Exception $exception) {
            dd($exception->getMessage(), $exception->getFile(), $exception->getLine());
            return redirect()->back()->withErrors($exception);
        }
    }
}
