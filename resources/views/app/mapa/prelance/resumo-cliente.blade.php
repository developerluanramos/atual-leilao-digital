@extends('app.mapa.default-header', ['titulo' => "RESUMO CLIENTE PRÉ-LANCE", 'identificador' => 'prelance-resumo-cliente'])

@section('content-mapa-prelance-resumo-cliente')

{{-- <h3>Configuração do pré-lance</h3>
<table style="width: 100%" class="report-table">
    <thead>
        <tr>
            <th></th>
            <th>Data</th>
            <th>Parcelamento</th>
            <th>C. Comprador</th>
            <th>C. Vendedor</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($leilao->config_prelance as $config)
            <tr>
                <td style="text-align: left !important; background-color:{{$config->cor}}; width: 50px;">
                    <div class="flex-shrink-0">
                        <span style="background-color:{{$config->cor}}"></span>
                    </div>
                </td>
                <td class="money" style="float: right; text-align:right">
                    <b>{{ $config->data }}</b>
                </td>
                <td class="money" style="float: right; text-align:right">
                    {{ $config->plano_pagamento->descricao }}
                </td>
                <td>
                    <x-layouts.badges.info-percent
                        :convert="false"
                        :textLength="'sm'"
                        :value="$config->percentual_comissao_comprador"
                    />
                </td>
                <td>
                    <x-layouts.badges.info-percent
                        :convert="false"
                        :textLength="'sm'"
                        :value="$config->percentual_comissao_vendedor"
                    />
                </td>
            </tr>
        @empty
            <b>Nenhuma compra registrada neste leilão</b>
        @endforelse
    </tbody>
</table> --}}
    
@forelse ($leilao->clientes as $cliente)
<h3>Dados comprador</h3>
<table style="width: 100%" class="report-table">
    <tr>
        <td>Nome: </td>
        <td><b>{{$cliente->nome}}</b></td>
        <td>CPF/CNPJ: </td>
        <td><b>{{$cliente->cpf_cnpj}}</b></td>
    </tr>
    <tr>
        <td>Endereço: </td>
        <td><b>{{$cliente->endereco}} - {{$cliente->cidade}} - {{$cliente->uf}}</b></td>
        <td>Email: </td>
        <td><b>{{$cliente->email}}</b></td>
    </tr>
</table>

<h3>Vencendo nos seguintes lotes</h3>
<table style="width: 100%" class="report-table">
    <thead>
        <tr>
            <th></th>
            <th>Qtd</th>
            <th>Lote</th>
            <th>Valor Prélance</th>
            {{-- <th>Total C. Compra</th>
            <th>Total C. Venda</th> --}}
            <th>Total Lote</th>
            <th>Data</th>
            <th>Vencedor</th>
        </tr>
    </thead>
    <tbody>
        @php
            // $valorTotalComissaoComprador = 0; 
            // $valorTotalComissaoVendedor = 0;
            $totalMultiplicador = 0; 
            $valorTotal = 0;
        @endphp
        @forelse ($cliente->prelances as $prelance)
            @if($prelance->uuid === $prelance->lote->prelance_vencedor()->uuid)
                @php
                    // $valorTotalComissaoComprador += $prelance->valor_comissao_compra; 
                    // $valorTotalComissaoVendedor += $prelance->valor_comissao_venda; 
                    $totalMultiplicador += $prelance->lote->multiplicador;
                    $valorTotal += $prelance->lote->valor_prelance;
                @endphp
                <tr>
                    <td style="text-align: left !important; background-color:{{$prelance->prelance_config->cor}}; width: 50px;">
                        <div class="flex-shrink-0">
                            <span style="background-color:{{$prelance->prelance_config->cor}}">
                                <x-layouts.badges.info-percent
                                    :convert="false"
                                    :textLength="'sm'"
                                    :value="$prelance->prelance_config->percentual_comissao_comprador"
                                />
                            </span>
                        </div>
                    </td>
                    <td>
                        {{$prelance->lote->multiplicador}}
                    </td>
                    <td style="text-align: left !important">
                        <small>
                            {{$prelance->lote->numero}} - {{$prelance->lote->descricao}}
                        </small>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="number_format($prelance->valor, 2, '.', '')"
                            />
                        </strong>
                    </td>
                    {{-- <td class="money" style="float: right; text-align:right">
                        <x-layouts.badges.info-percent
                            :convert="false"
                            :textLength="'sm'"
                            :value="$prelance->prelance_config->percentual_comissao_comprador"
                        />
                        <strong>
                            <x-layouts.badges.info-money
                                :convert="false"
                                :textLength="'sm'"
                                :value="number_format($prelance->valor_comissao_compra, 2, '.', '')"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <x-layouts.badges.info-percent
                            :convert="false"
                            :textLength="'sm'"
                            :value="$prelance->prelance_config->percentual_comissao_vendedor"
                        />
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="number_format($prelance->valor_comissao_venda, 2, '.', '')"
                            />
                        </strong>
                    </td> --}}
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="number_format($prelance->lote->valor_prelance, 2, '.', '')"
                            />
                        </strong>
                    </td>
                    <td>
                        {{ $prelance->created_at }}
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        @if($prelance->uuid === $prelance->lote->prelance_vencedor()->uuid)
                            <div style="width: 90%; padding: 3px; background-color: greenyellow;">Vencendo</div>
                        @else
                            <div style="width: 90%; padding: 3px; background-color: red;">
                                Superado
                            </div>
                        @endif
                    </td>
                </tr>
            @endif
        @empty
            <b>Nenhuma compra registrada neste leilão</b>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td></td>
            <td> {{$totalMultiplicador}}</td>
            <td></td>
            <td></td>
            {{-- <td>
                <strong>
                    <x-layouts.badges.info-money
                    :convert="false"
                    :textLength="'lg'"
                    :value="number_format($valorTotalComissaoComprador, 2, '.', '')"
                    />
                </strong>
            </td>
            <td>
                <strong>
                    <x-layouts.badges.info-money
                    :convert="false"
                    :textLength="'lg'"
                    :value="number_format($valorTotalComissaoVendedor, 2, '.', '')"
                    />
                </strong>
            </td> --}}
            <td>
                <strong>
                    <x-layouts.badges.info-money
                    :convert="false"
                    :textLength="'lg'"
                    :value="number_format($valorTotal, 2, '.', '')"
                    />
                </strong>
            </td>
            <td></td>
            <td></td>
        </tr>
    </tfoot>
</table>


<h3>Histórico</h3>
<table style="width: 100%" class="report-table">
    <thead>
        <tr>
            <th></th>
            <th>Qtd</th>
            <th>Lote</th>
            <th>Valor</th>
            <th>Vencedor</th>
            <th>Data</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($cliente->prelances as $prelance)
            <tr>
                <td style="text-align: left !important; background-color:{{$prelance->prelance_config->cor}}; width: 50px;">
                    <div class="flex-shrink-0">
                        <span style="background-color:{{$prelance->prelance_config->cor}}">
                            <x-layouts.badges.info-percent
                                :convert="false"
                                :textLength="'sm'"
                                :value="$prelance->prelance_config->percentual_comissao_comprador"
                            />
                        </span>
                    </div>
                </td>
                <td>
                    {{$prelance->lote->multiplicador}}
                </td>
                <td style="text-align: left !important">
                    <small>
                        {{$prelance->lote->numero}} - {{$prelance->lote->descricao}}
                    </small>
                </td>
                <td class="money" style="float: right; text-align:right">
                    <strong>
                        <x-layouts.badges.info-money
                        :convert="false"
                        :textLength="'sm'"
                        :value="number_format($prelance->valor, 2, '.', '')"
                        />
                    </strong>
                </td>
                <td>
                    {{ $prelance->created_at }}
                </td>
                <td class="money" style="float: right; text-align:right">
                    @if($prelance->uuid === $prelance->lote->prelance_vencedor()->uuid)
                        <div style="width: 90%; padding: 3px; background-color: greenyellow;">Vencendo</div>
                    @else
                        <div style="width: 90%; padding: 3px; background-color: red;">
                            Superado
                        </div>
                    @endif
                </td>
            </tr>
        @empty
            <b>Nenhuma compra registrada neste leilão</b>
        @endforelse
    </tbody>
</table>

<div class="page-break"></div>
@empty
    
@endforelse

@endsection