@extends('app.mapa.default-header', ['titulo' => "MAPA TOTAIS, MÉDIAS E PERCENTUAIS POR ESPÉCIE"])

@section('content-mapa')
    <table style="width: 100%; margin-bottom: 35px;" class="report-table">
        <thead>
            <tr>
                <th colspan="5">
                    Totais
                </th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th>Espécie</th>
                <th>Valor Total Macho</th>
                <th>Valor Total Fêmea</th>
                <th>Valor Total Outro</th>
                <th>Valor Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mediasEspecie as $media)
                <tr>
                    <td style="text-align: left !important">
                        <small>{{$media->especie_nome}}</small>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="$media->total_especie_value_macho"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="$media->total_especie_value_femea"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="$media->total_especie_value_outro"
                            />
                        </strong>
                    </td>
                    <td class="money" style="float: right; text-align:right">
                        <strong>
                            <x-layouts.badges.info-money
                            :convert="false"
                            :textLength="'sm'"
                            :value="$media->total_especie_value"
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
                <th colspan="5">
                    Percentuais
                </th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th>Espécie</th>
                <th>Percentual Macho</th>
                <th>Percentual Fêmea</th>
                <th>Percentual Outro</th>
                <th>Percentual Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mediasEspecie as $media)
                <tr>
                    <td style="text-align: left !important">
                        <small>{{$media->especie_nome}}</small>
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
                <th colspan="5">
                    Médias
                </th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th>Espécie</th>
                <th>Média Macho</th>
                <th>Média Fêmea</th>
                <th>Média Outro</th>
                <th>Média Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mediasEspecie as $media)
                <tr>
                    <td style="text-align: left !important">
                        <small>{{$media->especie_nome}}</small>
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

    <!-- Footer -->
    <div class="footer">
        <p>Atual Leilões - powered by KOLARES TI - ENGENHARIA DE SOFTWARE ÁGIL</p>
        <p>documento emitido por <b>{{Auth::user()->name}} </b> em <b>{{date('d/m/Y h:i:s')}}</b></p>
    </div>
@endsection