@extends('app.mapa.default-header', ['titulo' => "VENDEDORES", 'identificador' => 'prelance-vendedor'])

@section('content-mapa-prelance-vendedor')

<h3>Configuração do pré-lance</h3>
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
                   
                    {{-- {{$config->precentual_comissao_comprador}} --}}
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
</table>

<h3>Lotes</h3>
<table style="width: 100%" class="report-table">
    <thead>
        <tr>
            <th></th>
            <th>Cota</th>
            <th>Lote</th>
            <th>Pré-lance</th>
            <th>C. Comprador</th>
            <th>C. Vendedor</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($lotes->sortBy('numero') as $lote)
            <tr>
                <td style="text-align: left !important; background-color:{{$lote->prelance_vencedor()?->prelance_config()?->first()?->cor ?? '#ccc'}}; width: 50px;">
                    <div class="flex-shrink-0">
                        <span style="background-color:{{$lote->prelance_vencedor()?->prelance_config()?->first()?->cor ?? '#ccc'}}"></span>
                    </div>
                </td>
                <td>
                    <x-layouts.badges.info-percent
                        :convert="false"
                        :textLength="'sm'"
                        :value="$lote->vendedores[0]->pivot->percentual_cota"
                    />
                </td>
                <td style="float: left; text-align:left">
                    <b>{{ $lote->numero }} - {{ $lote->descricao }}</b>
                </td>
                <td class="money" style="float: right; text-align:right">
                    <x-layouts.badges.info-money
                        :convert="false"
                        :textLength="'sm'"
                        :value="$lote->prelance_vencedor()?->valor"
                    />
                </td>
                <td style="float: right; text-align:right">
                    <x-layouts.badges.info-percent
                        :convert="false"
                        :textLength="'sm'"
                        :value="$lote->prelance_vencedor()?->prelance_config()?->first()?->percentual_comissao_comprador"
                    />
                    <strong>
                        <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="number_format($lote->valor_prelance_comissao_compra, 2, '.', '')"
                        />
                    </strong>
                </td>
                <td style="float: right; text-align:right">
                    <x-layouts.badges.info-percent
                        :convert="false"
                        :textLength="'sm'"
                        :value="$lote->prelance_vencedor()?->prelance_config()?->first()?->percentual_comissao_vendedor"
                    />
                    <strong>
                        <x-layouts.badges.info-money
                        :convert="false"
                        :textLength="'sm'"
                        :value="number_format($lote->valor_prelance_comissao_venda, 2, '.', '')"
                        />
                    </strong>
                </td>
                <td class="money" style="float: right; text-align:right">
                    <x-layouts.badges.info-money
                        {{-- :convert="false" --}}
                        :textLength="'sm'"
                        :value="$lote->valor_prelance"
                    />
                </td>
            </tr>
        @empty
            <b>Nenhuma compra registrada neste leilão</b>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="font-size: 14px">
                <x-layouts.badges.info-money
                    {{-- :convert="false" --}}
                    :textLength="'lg'"
                    :value="$lotes->sum('valor_prelance_comissao_compra')"
                />
            </td>
            <td style="font-size: 14px">
                <x-layouts.badges.info-money
                    {{-- :convert="false" --}}
                    :textLength="'lg'"
                    :value="$lotes->sum('valor_prelance_comissao_venda')"
                />
            </td>
            <td style="font-size: 14px">
                <x-layouts.badges.info-money
                    {{-- :convert="false" --}}
                    :textLength="'lg'"
                    :value="$lotes->sum('valor_prelance')"
                />
            </td>
        </tr>
    </tfoot>
</table>

<h3>Ranking de Compradores</h3>
@endsection