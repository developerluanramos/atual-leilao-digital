@extends('app.mapa.default-header', ['titulo' => "RANKING DE COMPRADORES"])

@section('content-mapa')
    <table style="width: 100%" class="report-table">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Média</th>
                <th>Valor Total</th>
                {{-- <th>Multiplicador</th>
                <th>C. Comprador</th>
                <th>C. Vendedor</th>
                <th>Total</th> --}}
            </tr>
        </thead>
        <tbody>
            @forelse ($rankingCompradores as $compra)
                <tr>
                    <td style="text-align: left !important">
                        <small>{{$compra->cliente->nome}}</small>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="number_format($compra->media, 2, '.', '')"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="$compra->total"
                            />
                        </strong>
                    </td>
                </tr>
            @empty
                <b>Nenhuma compra registrada neste leilão</b>
            @endforelse
        </tbody>
    </table>
@endsection