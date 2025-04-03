@extends('app.mapa.default-header', ['titulo' => "RESUMO LOTES", 'identificador' => 'prelance-resumo-lote'])

@section('content-mapa-prelance-resumo-lote')

<table style="width: 100%" class="report-table">
    <thead>
        <tr>
            <th></th>
            <th>Quantidade</th>
            <th>Lote</th>
            <th>Lance</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($leilao->lotes->sortBy('numero') as $lote)
            <tr>
                <td style="text-align: left !important; background-color:{{$lote->prelance_vencedor()?->prelance_config()?->first()?->cor ?? '#ccc'}}; width: 50px;">
                    <div class="flex-shrink-0">
                        <span style="background-color:{{$lote->prelance_vencedor()?->prelance_config()?->first()?->cor ?? '#ccc'}}">
                            <x-layouts.badges.info-percent
                                :convert="false"
                                :textLength="'sm'"
                                :value="$lote->prelance_vencedor()?->prelance_config()?->first()?->percentual_comissao_comprador"
                            />
                        </span>
                    </div>
                </td>
                <td class="money" style="float: left; text-align:left">
                    <b>{{ $lote->multiplicador }}</b>
                </td>
                <td class="money" style="float: left; text-align:left">
                    <b>{{ $lote->numero }} - {{ $lote->descricao }}</b>
                </td>
                <td class="money" style="float: right; text-align:right">
                    <x-layouts.badges.info-money
                        :convert="false"
                        :textLength="'sm'"
                        :value="$lote->prelance_vencedor()?->valor ?? 0"
                    />
                </td>
                <td class="money" style="float: right; text-align:right; color: blue;">
                    <x-layouts.badges.info-money
                        :convert="false"
                        :textLength="'sm'"
                        :value="$lote->valor_final_prelance ?? 0"
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
            <td><b>{{ $leilao->lotes->sum('multiplicador') }}</b></td>
            <td></td>
            <td></td>
            <td style="font-size: 11px">
                <x-layouts.badges.info-money
                    :textLength="'lg'"
                    :value="$leilao->lotes->sum('valor_prelance')"
                />
            </td>
        </tr>
    </tfoot>
</table>
@endsection