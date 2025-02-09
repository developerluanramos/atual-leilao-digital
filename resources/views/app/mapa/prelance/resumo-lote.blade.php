@extends('app.mapa.default-header', ['titulo' => "RESUMO LOTES", 'identificador' => 'prelance-resumo-lote'])

@section('content-mapa-prelance-resumo-lote')

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
            <th>Lote</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($leilao->lotes as $lote)
            <tr>
                <td style="text-align: left !important; background-color:{{$lote->prelance_vencedor()?->prelance_config()?->first()?->cor ?? '#ccc'}}; width: 50px;">
                    <div class="flex-shrink-0">
                        <span style="background-color:{{$lote->prelance_vencedor()?->prelance_config()?->first()?->cor ?? '#ccc'}}"></span>
                    </div>
                </td>
                <td class="money" style="float: left; text-align:left">
                    <b>{{ $lote->numero }} - {{ $lote->descricao }}</b>
                </td>
                <td class="money" style="float: right; text-align:right">
                    <x-layouts.badges.info-money
                        :convert="false"
                        :textLength="'sm'"
                        :value="$lote->prelance_vencedor()->valor"
                    />
                </td>
            </tr>
        @empty
            <b>Nenhuma compra registrada neste leilão</b>
        @endforelse
    </tbody>
</table>
@endsection