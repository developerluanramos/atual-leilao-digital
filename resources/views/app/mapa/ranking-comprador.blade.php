@extends('app.mapa.default-header', ['titulo' => "RANKING DE COMPRADORES", 'identificador' => 'ranking-comprador'])

@section('content-mapa-ranking-comprador')
    <table style="width: 100%" class="report-table">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Qtd. Lotes</th>
                <th>Qtd. Itens</th>
                <th>Média Lotes</th>
                <th>Média Itens</th>
                <th>Valor Total</th>
                {{-- <th>Multiplicador</th>
                <th>C. Comprador</th>
                <th>C. Vendedor</th>
                <th>Total</th> --}}
            </tr>
        </thead>
        <tbody>
{{--        @dd($rankingCompradores)--}}
            @forelse ($rankingCompradores as $compra)
                <tr>
                    <td style="text-align: left !important">
                        <small>{{$compra->cliente->nome}}</small>
                    </td>
                    <td style="text-align: center !important">
                        <small>{{$compra->quantidade_lotes}}</small>
                    </td>
                    <td style="text-align: center !important">
                        <small>{{$compra->total_itens}}</small>
                    </td>
                    <td class="" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                                :convert="false"
                                :textLength="'sm'"
                                :value="number_format($compra->media_por_lote, 2, '.', '')"
                            />
                        </strong>
                    </td>
                    <td class="" style="float: right; text-align:right">
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
                    <strong>{{$rankingCompradores->sum('quantidade_lotes')}}</strong>
                </td>
                <td>
                    <strong>{{$rankingCompradores->sum('total_itens')}}</strong>
                </td>
                <td>
                    <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'sm'"
                        :value="$rankingCompradores->sum('media_por_lote')"
                    />
                </td>
                <td>
                    <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'sm'"
                        :value="$rankingCompradores->sum('media_por_item')"
                    />
                </td>
                <td>
                    <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'sm'"
                        :value="$rankingCompradores->sum('total_gasto')"
                    />
                </td>
            </tr>
        </tfoot>
    </table>
@endsection
