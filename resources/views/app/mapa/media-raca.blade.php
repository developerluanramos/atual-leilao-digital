@extends('app.mapa.default-header', ['titulo' => "MAPA TOTAIS, MÉDIAS E PERCENTUAIS POR RAÇA", 'identificador' => 'raca'])

@section('content-mapa-raca')

@foreach ($mediasRaca as $raca)
<div class="mt-4">
    <h3 class="text-lg font-bold">Raça: {{ $raca->raca_nome }}</h3>
    <table class="w-full border border-gray-500 report-table">
        <thead>
            <tr class="bg-gray-800 text-white">
                <th class="px-4 py-2">Tipo</th>
                <th class="px-4 py-2">Média (R$)</th>
                <th class="px-4 py-2">Total (R$)</th>
                <th class="px-4 py-2">% do Total</th>
                <th class="px-4 py-2">Quantidade</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr class="bg-gray-700 text-white font-bold">
                <td>Geral</td>
                <td class="money">
                    <x-layouts.badges.info-money 
                        :convert="false"
                        :textLength="'sm'"
                        :value="number_format($raca->media_compra, 2, '.', '')" 
                    />
                </td>
                <td class="money">
                    <x-layouts.badges.info-money 
                        :convert="false"
                        :textLength="'sm'"
                        :value="number_format($raca->total_raca_value, 2, '.', '')" 
                    />
                </td>
                <td>
                    <x-layouts.badges.info-percent 
                        :convert="true"
                        :textLength="'sm'"
                        :value="$raca->percent" 
                    />
                </td>
                <td>{{ $raca->quantidade }}</td>
            </tr>
            <tr class="bg-gray-800 text-white">
                <td>Macho</td>
                <td class="money">
                    <x-layouts.badges.info-money 
                        :convert="false"
                        :textLength="'sm'"
                        :value="number_format($raca->media_compra_macho, 2, '.', '')" 
                    />
                </td>
                <td class="money">
                    <x-layouts.badges.info-money 
                        :convert="false"
                        :textLength="'sm'"
                        :value="number_format($raca->total_raca_value_macho, 2, '.', '')" 
                    />
                </td>
                <td>
                    <x-layouts.badges.info-percent 
                        :convert="true"
                        :textLength="'sm'"
                        :value="$raca->percent_macho" 
                    />
                </td>
                <td>{{ $raca->quantidade_macho }}</td>
            </tr>
            <tr>
                <td class="pl-6">Macho Castrado</td>
                <td class="money">
                    <x-layouts.badges.info-money 
                        :convert="false"
                        :textLength="'sm'"
                        :value="number_format($raca->media_compra_macho_castrado, 2, '.', '')" 
                    />
                </td>
                <td class="money">
                    <x-layouts.badges.info-money 
                        :convert="false"
                        :textLength="'sm'"
                        :value="number_format($raca->total_raca_value_macho_castrado, 2, '.', '')" 
                    />
                </td>
                <td>
                    <x-layouts.badges.info-percent 
                        :convert="true"
                        :textLength="'sm'"
                        :value="$raca->percent_macho_castrado" 
                    />
                </td>
                <td>{{ $raca->quantidade_macho_castrado }}</td>
            </tr>
            <tr class="bg-gray-800 text-white">
                <td>Fêmea</td>
                <td class="money">
                    <x-layouts.badges.info-money 
                        :convert="false"
                        :textLength="'sm'"
                        :value="number_format($raca->media_compra_femea, 2, '.', '')" 
                    />
                </td>
                <td class="money">
                    <x-layouts.badges.info-money 
                        :convert="false"
                        :textLength="'sm'"
                        :value="number_format($raca->total_raca_value_femea, 2, '.', '')" 
                    />
                </td>
                <td>
                    <x-layouts.badges.info-percent 
                        :convert="true"
                        :textLength="'sm'"
                        :value="$raca->percent_femea" 
                    />
                </td>
                <td>{{ $raca->quantidade_femea }}</td>
            </tr>
            <tr>
                <td class="pl-6">Fêmea Castrada</td>
                <td class="money">
                    <x-layouts.badges.info-money 
                        :convert="false"
                        :textLength="'sm'"
                        :value="number_format($raca->media_compra_femea_castrada, 2, '.', '')" 
                    />
                </td>
                <td class="money">
                    <x-layouts.badges.info-money 
                        :convert="false"
                        :textLength="'sm'"
                        :value="number_format($raca->total_raca_value_femea_castrada, 2, '.', '')" 
                    />
                </td>
                <td>
                    <x-layouts.badges.info-percent 
                        :convert="true"
                        :textLength="'sm'"
                        :value="$raca->percent_femea_castrada" 
                    />
                </td>
                <td>{{ $raca->quantidade_femea_castrada }}</td>
            </tr>
            <tr class="bg-gray-800 text-white">
                <td>Outro</td>
                <td class="money">
                    <x-layouts.badges.info-money 
                        :convert="false"
                        :textLength="'sm'"
                        :value="number_format($raca->media_compra_outro, 2, '.', '')" 
                    />
                </td>
                <td class="money">
                    <x-layouts.badges.info-money 
                        :convert="false"
                        :textLength="'sm'"
                        :value="number_format($raca->total_raca_value_outro, 2, '.', '')" 
                    />
                </td>
                <td>
                    <x-layouts.badges.info-percent 
                        :convert="true"
                        :textLength="'sm'"
                        :value="$raca->percent_outro" 
                    />
                </td>
                <td>{{ $raca->quantidade_outro }}</td>
            </tr>
            <tr>
                <td class="pl-6">Outro Castrado</td>
                <td class="money">
                    <x-layouts.badges.info-money 
                        :convert="false"
                        :textLength="'sm'"
                        :value="number_format($raca->media_compra_outro_castrado, 2, '.', '')" 
                    />
                </td>
                <td class="money">
                    <x-layouts.badges.info-money 
                        :convert="false"
                        :textLength="'sm'"
                        :value="number_format($raca->total_raca_value_outro_castrado, 2, '.', '')" 
                    />
                </td>
                <td>
                    <x-layouts.badges.info-percent 
                        :convert="true"
                        :textLength="'sm'"
                        :value="$raca->percent_outro_castrado" 
                    />
                </td>
                <td>{{ $raca->quantidade_outro_castrado }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endforeach





    {{-- <table style="width: 100%; margin-bottom: 35px;" class="report-table">
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
    </table> --}}
@endsection