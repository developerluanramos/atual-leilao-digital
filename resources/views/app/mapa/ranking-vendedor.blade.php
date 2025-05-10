@extends('app.mapa.default-header', ['titulo' => "RANKING DE VENDEDORES", 'identificador' => "ranking-vendedor"])

@section('content-mapa-ranking-vendedor')
    <table style="width: 100%" class="report-table">
        <thead>
            <tr>
                <th>Vendedor</th>
                <th>Qtd. Lotes</th>
                <th>Qtd. Itens</th>
                <th>Média por Lote</th>
                <th>Média por item/animal</th>
                <th>Valor Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rankingVendedores as $compra)
                <tr>
                    <td style="text-align: left !important">
                        <small>{{$compra->vendedor->nome}}</small>
                    </td>
                    <td style="">
                        {{$compra->quantidade_lotes}}
                    </td>
                    <td style="">
                        {{$compra->total_itens}}
                    </td>
                    <td style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                                :convert="false"
                                :textLength="'sm'"
                                :value="number_format($compra->media_por_lote, 2, '.', '')"
                            />
                        </strong>
                    </td>
                    <td style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="number_format($compra->media_por_item, 2, '.', '')"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="$compra->total_gasto"
                            />
                        </strong>
                    </td>
                </tr>
            @empty
                <b>Nenhuma compra registrada neste leilão</b>
            @endforelse
        </tbody>
        <tfoot>
        <tr>
            <td>
                <strong>Total</strong>
            </td>
            <td>
                <strong>{{$rankingVendedores->sum('quantidade_lotes')}}</strong>
            </td>
            <td>
                <strong>{{$rankingVendedores->sum('total_itens')}}</strong>
            </td>
            <td style="text-align: right;">
                <x-layouts.badges.info-money
                    :convert="true"
                    :textLength="'sm'"
                    :value="$rankingVendedores->sum('media_por_lote')"
                />
            </td>
            <td style="text-align: right;">
                <x-layouts.badges.info-money
                    :convert="true"
                    :textLength="'sm'"
                    :value="$rankingVendedores->sum('media_por_item')"
                />
            </td>
            <td style="text-align: right;">
                <x-layouts.badges.info-money
                    :convert="true"
                    :textLength="'sm'"
                    :value="$rankingVendedores->sum('total_gasto')"
                />
            </td>
        </tr>
        </tfoot>
    </table>
@endsection
