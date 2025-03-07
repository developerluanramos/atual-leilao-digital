@extends('app.mapa.default-header', ['titulo' => "MAPA TOTAIS, MÉDIAS E PERCENTUAIS POR RAÇA", 'identificador' => 'raca'])

@section('content-mapa-raca')
    <table style="width: 100%; margin-bottom: 35px;" class="report-table">
        <thead>
            <tr>
                <th style="color:blue" colspan="5">
                    Totais
                </th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th>Raça</th>
                <th><b>Total</b> Macho</th>
                <th><b>Total</b> Fêmea</th>
                <th><b>Total</b> Outro</th>
                <th>R$ Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mediasRaca as $media)
                <tr>
                    <td style="text-align: left !important">
                        <small>{{$media->raca_nome}}</small>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="$media->total_raca_value_macho"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="$media->total_raca_value_femea"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="$media->total_raca_value_outro"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="$media->total_raca_value"
                            />
                        </strong>
                    </td>
                </tr>
            @empty
                <b>Nenhuma compra registrada neste leilão</b>
            @endforelse
        </tbody>
    </table>

    <table style="width: 100%; margin-bottom: 35px;" class="report-table">
        <thead>
            <tr>
                <th style="color:blue" colspan="5">
                    Percentuais
                </th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th>Raça</th>
                <th><b>Percentual</b> Macho</th>
                <th><b>Percentual</b> Fêmea</th>
                <th><b>Percentual</b> Outro</th>
                <th>% Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mediasRaca as $media)
                <tr>
                    <td style="text-align: left !important">
                        <small>{{$media->raca_nome}}</small>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-percent
                            :convert="true"
                            :textLength="'sm'"
                            :value="$media->percent_macho"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-percent
                            :convert="true"
                            :textLength="'sm'"
                            :value="$media->percent_femea"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-percent
                            :convert="true"
                            :textLength="'sm'"
                            :value="$media->percent_outro"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-percent
                            :convert="true"
                            :textLength="'sm'"
                            :value="$media->percent"
                            />
                        </strong>
                    </td>
                </tr>
            @empty
                <b>Nenhuma compra registrada neste leilão</b>
            @endforelse
        </tbody>
    </table>

    <table style="width: 100%; margin-bottom: 35px;" class="report-table">
        <thead>
            <tr>
                <th style="color:blue" colspan="5">
                    Médias
                </th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th>Raça</th>
                <th><b>Média</b> Macho</th>
                <th><b>Média</b> Fêmea</th>
                <th><b>Média</b> Outro</th>
                <th>M. Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mediasRaca as $media)
                <tr>
                    <td style="text-align: left !important">
                        <small>{{$media->raca_nome}}</small>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="number_format($media->media_compra_macho, 2, '.', '')"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="number_format($media->media_compra_femea, 2, '.', '')"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="number_format($media->media_compra_outro, 2, '.', '')"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="number_format($media->media_compra, 2, '.', '')"
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