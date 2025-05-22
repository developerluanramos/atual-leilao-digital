@extends('app.mapa.default-header', ['titulo' => "MAPA MÉDIAS TOTAIS", 'identificador' => 'media_geral'])

@section('content-mapa-media_geral')
    <script src="https://www.google.com/jsapi"></script>
    <style>
        .pie-chart {
            width: 600px;
            height: 400px;
            margin: 0 auto;
        }
        .text-center{
            text-align: center;
        }
    </style>
    <!-- Relatório 1: Vendas por Raça -->
    <div>
        <h3>Vendas por Raça</h3>
        <table class="report-table">
            <thead>
            <tr>
                <th style="background-color: transparent"></th>
                <th colspan="4">TOTAIS</th>
                <th colspan="4">QUANTITATIVOS</th>
                <th colspan="4">MÉDIAS</th>
            </tr>
            <tr>
                <th>Raça</th>
                <th class="text-right">Macho</th>
                <th class="text-right">Fêmea</th>
                <th class="text-right">Outro</th>
                <th class="text-right">Total</th>
                <th class="text-center">Macho</th>
                <th class="text-center">Fêmea</th>
                <th class="text-center">Outro</th>
                <th class="text-center">Total</th>
                <th class="text-right">Macho</th>
                <th class="text-right">Fêmea</th>
                <th class="text-right">Outro</th>
                <th class="text-right">Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vendasPorRaca as $raca)
                <tr>
                    <td style="text-align: left">{{ $raca['raca_nome'] }}</td>
                    <td class="text-right" style="text-align: right">
                        <x-layouts.badges.info-money
                            :convert="true"
                            :textLength="'sm'"
                            :value="$raca['valor_macho']"
                        />
                    </td>
                    <td class="text-right" style="text-align: right">
                        <x-layouts.badges.info-money
                            :convert="true"
                            :textLength="'sm'"
                            :value="$raca['valor_femea']"
                        />
                    </td>
                    <td class="text-right" style="text-align: right">
                        <x-layouts.badges.info-money
                            :convert="true"
                            :textLength="'sm'"
                            :value="$raca['valor_outro']"
                        />
                    </td>
                    <td class="text-right money" style="text-align: right">
                        <x-layouts.badges.info-money
                            :convert="true"
                            :textLength="'sm'"
                            :value="$raca['valor_total']"
                        />
                    </td>
                    <td class="text-center">{{ $raca['qtd_macho'] }}</td>
                    <td class="text-center">{{ $raca['qtd_femea'] }}</td>
                    <td class="text-center">{{ $raca['qtd_outro'] }}</td>
                    <td class="text-center">{{ $raca['qtd_total'] }}</td>
                    <td class="text-right" style="text-align: right">
                        <x-layouts.badges.info-money
                            :convert="true"
                            :textLength="'sm'"
                            :value="$raca['media_macho']"
                        />
                    </td>
                    <td class="text-right" style="text-align: right">
                        <x-layouts.badges.info-money
                            :convert="true"
                            :textLength="'sm'"
                            :value="$raca['media_femea']"
                        />
                    </td>
                    <td class="text-right" style="text-align: right">
                        <x-layouts.badges.info-money
                            :convert="true"
                            :textLength="'sm'"
                            :value="$raca['media_outro']"
                        />
                    </td>
                    <td class="text-right money" style="text-align: right">
                        <x-layouts.badges.info-money
                            :convert="true"
                            :textLength="'sm'"
                            :value="$raca['media_total']"
                        />
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr style="font-weight: bold;">
                <td>TOTAL</td>
                <td class="text-right" style="text-align: right">
                    <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'sm'"
                        :value="$vendasPorRaca->sum('valor_macho')"
                    />
                </td>
                <td class="text-right" style="text-align: right">
                    <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'sm'"
                        :value="$vendasPorRaca->sum('valor_femea')"
                    />
                </td>
                <td class="text-right" style="text-align: right">
                    <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'sm'"
                        :value="$vendasPorRaca->sum('valor_outro')"
                    />
                </td>
                <td class="text-right" style="text-align: right">
                    <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'sm'"
                        :value="$vendasPorRaca->sum('valor_total')"
                    />
                </td>
                <td class="text-center">{{ $vendasPorRaca->sum('qtd_macho') }}</td>
                <td class="text-center">{{ $vendasPorRaca->sum('qtd_femea') }}</td>
                <td class="text-center">{{ $vendasPorRaca->sum('qtd_outro') }}</td>
                <td class="text-center">{{ $vendasPorRaca->sum('qtd_total') }}</td>
                <td class="text-right" style="text-align: right">
                    <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'sm'"
                        :value="$vendasPorRaca->sum('valor_macho') / ($vendasPorRaca->sum('valor_macho') ? $vendasPorRaca->sum('qtd_macho'): 1)"
                    />
                </td>
                <td class="text-right" style="text-align: right">
                    <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'sm'"
                        :value="$vendasPorRaca->sum('valor_femea') / ($vendasPorRaca->sum('valor_femea') ? $vendasPorRaca->sum('qtd_femea'): 1)"
                    />
                </td>
                <td class="text-right" style="text-align: right">
                    <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'sm'"
                        :value="$vendasPorRaca->sum('valor_outro') / ($vendasPorRaca->sum('valor_outro') ? $vendasPorRaca->sum('qtd_outro'): 1)"
                    />
                </td>
                <td class="text-right" style="text-align: right">
                    <x-layouts.badges.info-money
                        :convert="true"
                        :textLength="'sm'"
                        :value="$vendasPorRaca->sum('valor_total') / $vendasPorRaca->sum('qtd_total')"
                    />
                </td>
            </tr>
            </tfoot>
        </table>

        <div style="display: flex; justify-content: center; margin-top: 30px;  width: 100%;">
            <div style="display: flex; width: 32%; float: left; margin-right: 1%; text-align: center">
                <h3>Gráfico de Totais</h3>
                <small>Totais de vendas por Gzênero</small>
                <img src="{{ $chartVendasPorGenero }}"
                     style="width: 100%; height: 190px; object-fit: contain;"
                     alt="Gráfico de Vendas">
            </div>
            <div style="display: flex; width: 32%; float: left; text-align: center">
                <h3>Gráfico quantitativo por Gênero</h3>
                <small>Quantidade de vendas por gênero</small>
                <img src="{{ $chartMediasPorGenero }}"
                     style="width: 100%; height: 190px; object-fit: contain;"
                     alt="Gráfico de Vendas">
            </div>
            <div style="display: flex; width: 32%; float:right; text-align: center">
                <h3>Gráfico quantitativo por Raça</h3>
                <small>Quantidade de animais vendidos por Raça</small>
                <img src="{{ $chartVendasPorRaca }}"
                     style="width: 100%; height: 190px; object-fit: contain;"
                     alt="Gráfico de Vendas">
            </div>
        </div>
    </div>

    <div class="page-break"></div>
    <!-- Relatório 2: Vendas por Vendedor e Gênero -->
    <div>
        <h3>Vendas por Vendedor e Gênero</h3>
        <table class="report-table">
            <thead>
            <tr>
                <th>Vendedor</th>
                <th class="text-center">Macho (Qtd)</th>
                <th class="text-center">Fêmea (Qtd)</th>
                <th class="text-center">Outro (Qtd)</th>
                <th class="text-right">Valor Macho</th>
                <th class="text-right">Valor Fêmea</th>
                <th class="text-right">Valor Outro</th>
                <th class="text-right">% Macho</th>
                <th class="text-right">% Fêmea</th>
                <th class="text-right">% Outro</th>
                <th class="text-right">Valor Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vendasPorVendedor as $vendedor)
                <tr>
                    <td>{{ $vendedor->vendedor_nome }}</td>
                    <td class="text-center">{{ $vendedor->qtd_macho }}</td>
                    <td class="text-center">{{ $vendedor->qtd_femea }}</td>
                    <td class="text-center">{{ $vendedor->qtd_outro }}</td>
                    <td class="text-right">{{ number_format($vendedor->valor_macho, 2, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($vendedor->valor_femea, 2, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($vendedor->valor_outro, 2, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($vendedor->perc_macho, 2, ',', '.') }}%</td>
                    <td class="text-right">{{ number_format($vendedor->perc_femea, 2, ',', '.') }}%</td>
                    <td class="text-right">{{ number_format($vendedor->perc_outro, 2, ',', '.') }}%</td>
                    <td class="text-right">{{ number_format($vendedor->valor_total, 2, ',', '.') }}</td>
                </tr>
            @endforeach
{{--            <tr style="font-weight: bold; background-color: #f8f9fa;">--}}
{{--                <td>TOTAL</td>--}}
{{--                <td class="text-center">{{ $vendasPorVendedor->sum('qtd_macho') }}</td>--}}
{{--                <td class="text-center">{{ $vendasPorVendedor->sum('qtd_femea') }}</td>--}}
{{--                <td class="text-center">{{ $vendasPorVendedor->sum('qtd_outro') }}</td>--}}
{{--                <td class="text-right">{{ number_format($vendasPorVendedor->sum('valor_macho'), 2, ',', '.') }}</td>--}}
{{--                <td class="text-right">{{ number_format($vendasPorVendedor->sum('valor_femea'), 2, ',', '.') }}</td>--}}
{{--                <td class="text-right">{{ number_format($vendasPorVendedor->sum('valor_outro'), 2, ',', '.' }}</td>--}}
{{--                <td class="text-right">{{ number_format($vendasPorVendedor->avg('perc_macho'), 2, ',', '.' }}%</td>--}}
{{--                <td class="text-right">{{ number_format($vendasPorVendedor->avg('perc_femea'), 2, ',', '.' }}%</td>--}}
{{--                <td class="text-right">{{ number_format($vendasPorVendedor->avg('perc_outro'), 2, ',', '.' }}%</td>--}}
{{--                <td class="text-right">{{ number_format($vendasPorVendedor->sum('valor_total'), 2, ',', '.' }}</td>--}}
{{--            </tr>--}}
            </tbody>
        </table>
    </div>
@endsection
