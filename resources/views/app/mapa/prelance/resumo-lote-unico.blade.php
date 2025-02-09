@extends('app.mapa.default-header', ['titulo' => "DESCRITIVO LOTES", 'identificador' => 'prelance-descritivo-lote'])

@section('content-mapa-prelance-descritivo-lote')

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

<h3>Dados do Lote</h3>
<table style="width: 100%" class="report-table">
    <thead>
        <tr>
            <th>{{$lote->numero}} - {{$lote->descricao}}</th>
        </tr>
        {{-- <tr>
            <th>{{$lote->numero}} - {{$lote->descricao}}</th>
        </tr> --}}
    </thead>
</table>

<h3>Pré-lances realizados</h3>
<table style="width: 100%" class="report-table">
    <thead>
        <tr>
            <th></th>
            <th>Valor</th>
            <th>Data</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($lote->prelances->reverse() as $prelance)
            <tr>
                <td style="text-align: left !important; background-color:{{$prelance->prelance_config->cor}}; width: 50px;">
                    <div class="flex-shrink-0">
                        <span style="background-color:{{$prelance->prelance_config->cor}}"></span>
                    </div>
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
@endsection